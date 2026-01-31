<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    // =========================
    // HALAMAN KERANJANG / PESANAN AKTIF
    // =========================
    public function index()
    {
        $categories = Category::withCount('menus')->get();
        $popular_menus = Menu::orderBy('terjual', 'desc')->limit(6)->get();

        $order = Order::with('items.menu')
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        return view('user.page.pesanan.index', compact(
            'categories',
            'popular_menus',
            'order'
        ));
    }

    // =========================
    // RIWAYAT PESANAN
    // =========================
    public function riwayat()
    {
        $orders = Order::with('items.menu')
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'pending')
            ->latest()
            ->get();

        return view('user.page.riwayat.index', compact('orders'));
    }

    // =========================
    // TAMBAH KE KERANJANG
    // =========================
    public function addToCart(Menu $menu)
    {
        $order = Order::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'pending'
            ],
            [
                'kode_order' => 'ORD-' . strtoupper(Str::random(6)),
                'subtotal' => 0,
                'ongkir' => 0,
                'diskon' => 0,
                'total' => 0,
                'alamat_pengiriman' => null,
            ]
        );

        $item = OrderItem::firstOrCreate(
            [
                'order_id' => $order->id,
                'menu_id' => $menu->id
            ],
            [
                'qty' => 1,
                'harga' => $menu->harga_final,
                'subtotal' => $menu->harga_final
            ]
        );

        if (!$item->wasRecentlyCreated) {
            $item->qty += 1;
            $item->subtotal = $item->qty * $menu->harga_final;
            $item->save();
        }

        $order->subtotal = $order->items()->sum('subtotal');
        $order->total = $order->subtotal + $order->ongkir - $order->diskon;
        $order->save();

        return redirect()
            ->route('pesanan')
            ->with('success', 'Menu berhasil ditambahkan ke keranjang');
    }

    // =========================
    // HAPUS PESANAN (RIWAYAT)
    // =========================
    public function destroy(Order $order)
    {
        abort_if($order->user_id !== Auth::id(), 403);
        abort_if($order->status !== 'menunggu_pembayaran', 403);

        // hapus item dulu
        $order->items()->delete();
        $order->delete();

        return back()->with('success', 'Pesanan berhasil dihapus');
    }
}
