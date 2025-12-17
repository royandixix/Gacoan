@extends('admin.layouts.app')

@section('title', 'Pesanan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Pesanan</h1>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Kode</th>
                <th class="p-3 text-left">User</th>
                <th class="p-3 text-left">Total</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Tanggal</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="border-t">
                <td class="p-3 font-medium">{{ $order->kode_order }}</td>
                <td class="p-3">{{ $order->user->name }}</td>
                <td class="p-3">Rp {{ number_format($order->total) }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs {{ $order->statusColor() }}">
                        {{ $order->statusLabel() }}
                    </span>
                </td>
                <td class="p-3">{{ $order->created_at->format('d/m/Y') }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.pesanan.edit', $order->id) }}"
                       class="text-blue-600 hover:underline">
                        Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
