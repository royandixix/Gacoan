<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $order = Order::with('items.menu')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        return view('user.page.keranjang.index', compact('order'));
    }

    public function update(Request $request, OrderItem $item)
    {
        if ($item->order->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $item->update([
            'qty' => $request->qty,
            'subtotal' => $request->qty * $item->harga
        ]);

        $this->recalculateOrder($item->order);

        return back()->with('success', 'Keranjang diperbarui');
    }

    public function remove(OrderItem $item)
    {
        if ($item->order->user_id !== Auth::id()) {
            abort(403);
        }

        $order = $item->order;
        $item->delete();

        $this->recalculateOrder($order);

        return back()->with('success', 'Item dihapus');
    }

    public function checkout(Request $request)
    {
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $request->validate([
            'alamat_pengiriman' => 'required|string',
            'payment_method' => 'required|in:qris,transfer,cod'
        ]);

        $status = $request->payment_method === 'cod'
            ? 'diproses'
            : 'menunggu_pembayaran';

        $order->update([
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'status' => $status,
            'metode_pembayaran' => $request->payment_method,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        if ($request->payment_method === 'qris') {
            return redirect()->route('checkout.qris');
        }

        if ($request->payment_method === 'transfer') {
            return redirect()->route('checkout.transfer');
        }

        // ✅ FIX DI SINI (TIDAK PAKAI pesanan.index)
        return redirect()->route('pesanan')
            ->with('success', 'Pesanan COD berhasil dibuat dan sedang diproses!');
    }

    private function recalculateOrder(Order $order)
    {
        $order->subtotal = $order->items()->sum('subtotal');
        // Pastikan kolom ongkir dan diskon memiliki nilai default 0 di database
        $order->total = $order->subtotal + ($order->ongkir ?? 0) - ($order->diskon ?? 0);
        $order->save();
    }
}
