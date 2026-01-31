@extends('admin.layouts.app')

@section('title', 'Data Pesanan')

@section('content')
    <div class="space-y-8">
        {{-- Header Page --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Daftar Pesanan</h1>
                <p class="text-slate-400 mt-1 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-gacoan-500">
                        <circle cx="8" cy="21" r="1" />
                        <circle cx="19" cy="21" r="1" />
                        <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
                    </svg>
                    Monitor semua transaksi masuk secara real-time
                </p>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-2">
                <button
                    class="px-4 py-2 bg-slate-800 text-slate-300 rounded-xl border border-slate-700 hover:bg-slate-700 transition flex items-center gap-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                    </svg>
                    Filter
                </button>
                <button
                    class="px-4 py-2 bg-gacoan-600 text-white rounded-xl shadow-lg shadow-gacoan-600/20 hover:bg-gacoan-500 transition flex items-center gap-2 text-sm font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <line x1="12" x2="12" y1="15" y2="3" />
                    </svg>
                    Export
                </button>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 rounded-3xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900/50 border-b border-slate-700/50">
                            <th class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em]">Kode
                                Order</th>
                            <th class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em]">Pelanggan
                            </th>
                            <th class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em]">Total
                                Bayar</th>
                            <th
                                class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em] text-center">
                                Status</th>
                            <th class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em]">Tanggal
                            </th>
                            <th
                                class="px-6 py-5 text-[11px] font-black text-slate-500 uppercase tracking-[0.2em] text-right">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/30">
                        @forelse($orders as $order)
                            <tr class="group hover:bg-slate-700/20 transition-all duration-200">
                                {{-- Kode Order --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="text-white font-mono font-bold bg-slate-800 px-3 py-1.5 rounded-lg border border-slate-700 group-hover:border-gacoan-500/50 transition-colors">
                                        #{{ $order->kode_order }}
                                    </span>
                                </td>

                                {{-- Pelanggan --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-slate-700 to-slate-800 border border-slate-600 flex items-center justify-center text-slate-300 font-bold text-sm shadow-inner">
                                            {{ strtoupper(substr($order->user->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p
                                                class="text-sm font-bold text-white group-hover:text-gacoan-400 transition-colors">
                                                {{ $order->user->name }}
                                            </p>
                                            <p class="text-[10px] text-slate-500">{{ $order->user->email ?? 'Customer' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Total & Metode Pembayaran --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-white">
                                        Rp{{ number_format($order->total, 0, ',', '.') }}
                                    </div>
                                    <p class="text-[10px] text-slate-500">
                                        Metode:
                                        {{ $order->payment_method ? ucfirst($order->payment_method) : 'Belum Bayar' }}
                                    </p>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $statusClass = match ($order->status) {
                                            'pending' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                            'diproses' => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
                                            'dikirim' => 'bg-purple-500/10 text-purple-500 border-purple-500/20',
                                            'selesai' => 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20',
                                            'dibatalkan' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                                            default => 'bg-slate-500/10 text-slate-500 border-slate-500/20',
                                        };
                                    @endphp
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest border {{ $statusClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full bg-current animate-pulse"></span>
                                        {{ $order->status_label ?? ucfirst($order->status) }}
                                    </span>
                                </td>

                                {{-- Tanggal --}}
                                <td class="px-6 py-4">
                                    <div class="text-slate-300 text-sm font-medium">
                                        {{ $order->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-[10px] text-slate-500">{{ $order->created_at->format('H:i') }} WIB
                                    </div>
                                </td>

                                {{-- Aksi --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Tombol Bukti Pembayaran (SELALU TAMPIL) --}}
                                        <a href="{{ route('admin.pesanan.viewPaymentPage', $order->id) }}"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition-all duration-300 font-bold text-xs shadow-lg shadow-blue-600/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <rect width="18" height="18" x="3" y="3" rx="2"
                                                    ry="2" />
                                                <circle cx="9" cy="9" r="2" />
                                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                            </svg>
                                            Bukti
                                        </a>
                                        {{-- Tombol Detail Pesanan --}}
                                        <a href="{{ route('admin.pesanan.edit', $order->id) }}"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-gacoan-600 text-slate-300 hover:text-white rounded-lg transition-all duration-300 font-bold text-xs group/btn shadow-lg shadow-black/20">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="group-hover/btn:scale-110 transition-transform">
                                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            Detail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-24 text-center">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="w-20 h-20 bg-slate-800/50 rounded-full flex items-center justify-center mb-4 border border-slate-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-slate-600">
                                                <path d="M16 16v-3a4 4 0 1 0-8 0v3" />
                                                <rect x="3" y="10" width="18" height="12" rx="2" />
                                                <circle cx="12" cy="16" r="1" />
                                                <path d="M21 10V8a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                                            </svg>
                                        </div>
                                        <h3 class="text-white font-bold text-lg">Belum Ada Pesanan</h3>
                                        <p class="text-slate-500 text-sm max-w-xs mx-auto">
                                            Semua pesanan yang masuk ke restoran Anda akan muncul di sini secara otomatis.
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($orders->hasPages())
                <div class="px-6 py-5 bg-slate-900/30 border-t border-slate-700/50">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
