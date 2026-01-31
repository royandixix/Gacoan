@extends('user.layouts.app')

@section('title', 'Pesanan Saya')

@section('content')

<div class="mb-8">
    <div class="flex items-center gap-3 mb-2">
        <div class="bg-gacoan-600 p-3 rounded-lg">
            <i class="fas fa-shopping-bag text-2xl text-white"></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Pesanan Saya</h1>
            <p class="text-gray-600">Kelola pesanan dan lacak pengiriman</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-md p-2 mb-6">
    <div class="flex flex-wrap gap-2">
        <button class="px-6 py-3 rounded-lg font-semibold bg-gacoan-600 text-white">
            Semua ({{ $counts['all'] }})
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600">
            Diproses ({{ $counts['process'] }})
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600">
            Dikirim ({{ $counts['shipping'] }})
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600">
            Selesai ({{ $counts['done'] }})
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600">
            Dibatalkan ({{ $counts['cancel'] }})
        </button>
    </div>
</div>

@if($orders->count())
<div class="space-y-6">
@foreach($orders as $order)

@php
$color = match($order->status){
    'shipping' => 'from-blue-500 to-blue-600',
    'process' => 'from-orange-500 to-orange-600',
    'done' => 'from-green-500 to-green-600',
    'cancel' => 'from-red-500 to-red-600',
};
@endphp

<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="bg-gradient-to-r {{ $color }} px-6 py-4 text-white">
        <div class="flex justify-between">
            <div>
                <p class="text-sm opacity-90">Order #{{ $order->code }}</p>
                <p class="font-bold text-lg">{{ ucfirst($order->status_label) }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm opacity-90">{{ $order->status_time_label }}</p>
                <p class="font-bold text-lg">{{ $order->status_time }}</p>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="space-y-3 mb-4">
            @foreach($order->items as $item)
            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                    <i class="fas fa-bowl-food text-2xl text-gray-400"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-gray-800">{{ $item->menu->nama }}</h4>
                    <p class="text-sm text-gray-500">{{ $item->qty }}x • Rp {{ number_format($item->harga) }}</p>
                </div>
                <p class="font-bold text-gacoan-600">
                    Rp {{ number_format($item->qty * $item->harga) }}
                </p>
            </div>
            @endforeach
        </div>

        <div class="border-t pt-4 space-y-2 mb-4">
            <div class="flex justify-between text-sm">
                <span>Subtotal</span>
                <span>Rp {{ number_format($order->subtotal) }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span>Ongkir</span>
                <span>Rp {{ number_format($order->ongkir) }}</span>
            </div>
            <div class="flex justify-between text-lg font-bold border-t pt-2">
                <span>Total</span>
                <span class="text-gacoan-600">Rp {{ number_format($order->total) }}</span>
            </div>
        </div>

        <div class="flex gap-3">
            <button class="flex-1 bg-gray-100 px-6 py-3 rounded-lg font-semibold">
                Detail Pesanan
            </button>
        </div>
    </div>
</div>

@endforeach
</div>

@else
<div class="bg-white rounded-xl shadow-md p-12 text-center">
    <h3 class="text-xl font-bold mb-2">Belum Ada Pesanan</h3>
    <a href="{{ route('beranda') }}" class="bg-gacoan-600 text-white px-8 py-3 rounded-lg">
        Lihat Menu
    </a>
</div>
@endif

@endsection
