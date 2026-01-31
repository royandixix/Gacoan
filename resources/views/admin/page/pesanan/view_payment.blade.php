@extends('admin.layouts.app')

@section('title', 'Bukti Pembayaran')

@section('content')
<div class="space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-extrabold text-white">Bukti Pembayaran</h1>
        <a href="{{ route('admin.pesanan.index') }}" 
           class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600">
            Kembali
        </a>
    </div>

    {{-- Info Pesanan --}}
    <div class="bg-slate-800/30 p-6 rounded-2xl border border-slate-700 mt-6">
        <h2 class="text-lg font-bold text-white mb-2">Kode Order: #{{ $order->kode_order }}</h2>
        <p class="text-slate-300 mb-4">Pelanggan: {{ $order->user->name }} ({{ $order->user->email }})</p>

        {{-- Bukti Pembayaran --}}
        @if($order->bukti_transfer)
            <div class="border border-slate-600 rounded-lg p-4 bg-slate-900/50">
                <img src="{{ asset('storage/bukti_transfer/' . $order->bukti_transfer) }}" 
     alt="Bukti Pembayaran" 
     class="w-full max-w-md mx-auto rounded-lg shadow-lg">
            </div>
        @else
            <p class="text-rose-500 font-bold">Belum ada bukti pembayaran.</p>
        @endif
    </div>

</div>
@endsection
