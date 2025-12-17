<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * List semua pesanan
     */
    public function index()
    {
        $orders = Order::with('user')
            ->latest()
            ->get();

        return view('admin.page.pesanan.index', compact('orders'));
    }

    /**
     * Detail + form update status
     */
    public function edit($id)
    {
        $order = Order::with('user', 'items.menu')
            ->findOrFail($id);

        return view('admin.page.pesanan.edit', compact('order'));
    }

    /**
     * Update status pesanan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return redirect()
            ->route('admin.pesanan')
            ->with('success', 'Status pesanan berhasil diperbarui');
    }
}
