<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'items.menu'])->latest()->paginate(10);
        return view('admin.page.pesanan.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::with(['user', 'items.menu'])->findOrFail($id);
        return view('admin.page.pesanan.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan'
        ]);

        $order = Order::with('items.menu')->findOrFail($id);

        if ($request->status === 'selesai' && $order->status !== 'selesai') {
            foreach ($order->items as $item) {
                $item->menu->increment('terjual', $item->qty);
            }
        }

        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.pesanan.index')->with('success', 'Status pesanan diperbarui');
    }

    public function viewPaymentProof($id)
    {
        $order = Order::findOrFail($id);

        if (!$order->bukti_transfer) {
            return back()->with('error', 'Bukti pembayaran tidak tersedia');
        }

        $filePath = storage_path('app/public/' . $order->bukti_transfer);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File bukti pembayaran tidak ditemukan');
        }

        return response()->file($filePath);
    }

    public function verifyPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'payment_verified' => 'required|boolean'
        ]);

        $order->update([
            'payment_verified' => $request->payment_verified,
            'status' => $request->payment_verified ? 'diproses' : 'pending'
        ]);

        $message = $request->payment_verified
            ? 'Pembayaran berhasil diverifikasi'
            : 'Pembayaran ditolak';

        return back()->with('success', $message);
    }

    public function viewPayment($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.page.pesanan.view_payment', compact('order'));
    }
}
