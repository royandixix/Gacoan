<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $order = Order::with('items.menu')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if (!$order || $order->items->isEmpty()) {
            return redirect()
                ->route('keranjang.index')
                ->withErrors('Keranjang masih kosong');
        }

        return view('user.page.checkout.index', compact('order'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'alamat_pengiriman' => 'required|string',
            'payment_method' => 'required|in:qris,transfer,cod',
            'menu_ids' => 'required|string',
            'quantities' => 'required|string',
        ]);

        $order = Order::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'pending'],
            [
                'kode_order' => 'ORD-' . strtoupper(Str::random(8)),
                'subtotal' => 0,
                'total' => 0,
            ]
        );

        // reset items
        $order->items()->delete();

        $menuIds = explode(',', $request->menu_ids);
        $quantities = explode(',', $request->quantities);

        foreach ($menuIds as $i => $menuId) {
            $qty = max(1, intval($quantities[$i] ?? 1));

            $menu = Menu::findOrFail($menuId); // 🔥 AMBIL MENU ASLI
            $harga = $menu->harga;

            $order->items()->create([
                'menu_id' => $menu->id,
                'qty' => $qty,
                'harga' => $harga,
                'subtotal' => $harga * $qty,
            ]);
        }

        // hitung ulang
        $subtotal = $order->items()->sum('subtotal');

        $order->update([
            'subtotal' => $subtotal,
            'total' => $subtotal + ($order->ongkir ?? 0) - ($order->diskon ?? 0),
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'payment_method' => $request->payment_method,
            'status' => $request->payment_method === 'cod'
                ? 'diproses'
                : 'menunggu_pembayaran',
        ]);

        return match ($request->payment_method) {
            'qris' => redirect()->route('checkout.qris'),
            'transfer' => redirect()->route('checkout.transfer'),
            default => redirect()->route('riwayat')
                ->with('success', 'Pesanan berhasil dibuat'),
        };
    }

    public function qris()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'menunggu_pembayaran')
            ->latest()
            ->firstOrFail();

        return view('user.page.checkout.qris', compact('order'));
    }

    public function confirmQris()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'menunggu_pembayaran')
            ->firstOrFail();

        $order->update(['status' => 'menunggu_konfirmasi']);

        return redirect()->route('riwayat')
            ->with('success', 'Pembayaran QRIS berhasil');
    }

    public function transfer()
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'menunggu_pembayaran')
            ->latest()
            ->firstOrFail();

        return view('user.page.checkout.transfer_bank', compact('order'));
    }

    public function uploadTransfer(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        $request->validate([
            'bukti_transfer' => 'required|image|max:2048'
        ]);

        $path = $request->file('bukti_transfer')
            ->store('bukti_transfer', 'public');

        $order->update([
            'bukti_transfer' => $path,
            'status' => 'menunggu_konfirmasi'
        ]);

        return redirect()->route('riwayat')
            ->with('success', 'Bukti transfer berhasil diunggah');
    }
}
