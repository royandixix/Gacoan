@extends('admin.layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Detail Pesanan: {{ $order->kode_order }}</h1>

<div class="bg-white rounded-lg shadow p-6 space-y-6">

    {{-- Info User --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <h2 class="text-sm font-semibold text-gray-500">Nama User</h2>
            <p class="mt-1 text-gray-800">{{ $order->user->name }}</p>
        </div>
        <div>
            <h2 class="text-sm font-semibold text-gray-500">Email</h2>
            <p class="mt-1 text-gray-800">{{ $order->user->email }}</p>
        </div>
        <div>
            <h2 class="text-sm font-semibold text-gray-500">Tanggal Pesanan</h2>
            <p class="mt-1 text-gray-800">{{ $order->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    {{-- Status Pesanan --}}
    <form action="{{ route('admin.pesanan.update', $order->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Pesanan</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-gacoan-500 focus:border-gacoan-500">
                    @foreach(['pending', 'diproses', 'selesai', 'batal'] as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Total Pembayaran</label>
                <input type="text" value="Rp {{ number_format($order->total) }}" disabled
                       class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100 cursor-not-allowed">
            </div>
        </div>

        {{-- Alamat Pengiriman --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
            <textarea disabled class="w-full border-gray-300 rounded-lg shadow-sm bg-gray-100 p-2" rows="3">{{ $order->alamat_pengiriman }}</textarea>
        </div>

        {{-- Item Pesanan --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Item Pesanan</h2>
            <div class="overflow-x-auto border rounded-lg">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="p-3 text-left">Menu</th>
                            <th class="p-3 text-left">Qty</th>
                            <th class="p-3 text-left">Harga</th>
                            <th class="p-3 text-left">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($order->items as $item)
                        <tr>
                            <td class="p-3">{{ $item->menu->nama }}</td>
                            <td class="p-3">{{ $item->qty }}</td>
                            <td class="p-3">Rp {{ number_format($item->harga) }}</td>
                            <td class="p-3 font-semibold">Rp {{ number_format($item->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="px-6 py-2 bg-gacoan-600 hover:bg-gacoan-700 text-white rounded-lg font-medium transition">
                Update Status
            </button>
        </div>

    </form>

</div>
@endsection
