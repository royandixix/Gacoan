@extends('user.layouts.app')

@section('title', 'Riwayat Pesanan - Gacoan')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12"
     x-data="{ loaded: false }"
     x-init="setTimeout(() => loaded = true, 50)">

    {{-- HEADER --}}
    <div class="mb-10 transform transition-all duration-700"
         :class="loaded ? 'translate-y-0 opacity-100' : '-translate-y-10 opacity-0'">
        <div class="flex items-center gap-2 mb-2">
            <span class="h-1 w-12 bg-gacoan-600 rounded-full"></span>
            <p class="text-[11px] text-gacoan-600 font-black uppercase tracking-[0.2em]">
                Aktivitas Anda
            </p>
        </div>
        <h1 class="text-4xl font-black tracking-tighter text-gray-900 uppercase leading-none">
            Riwayat <span class="text-transparent bg-clip-text bg-gradient-to-r from-gacoan-600 to-red-500">Pesanan</span>
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

        {{-- LIST PESANAN --}}
        <div class="lg:col-span-2 space-y-6">
            @forelse ($orders as $index => $order)
                <div class="group bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-gacoan-100 transition-all duration-500 overflow-hidden"
                     :class="loaded ? 'translate-x-0 opacity-100' : '-translate-x-8 opacity-0'"
                     style="transition-delay: {{ ($index + 1) * 100 }}ms">

                    <div class="p-6">
                        {{-- TOP SECTION --}}
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-4">
                                <div class="p-3 bg-gray-50 rounded-2xl group-hover:bg-gacoan-50 transition-colors">
                                    <svg class="w-6 h-6 text-gray-400 group-hover:text-gacoan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="id-card-check" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest leading-none mb-1">
                                        ID Transaksi
                                    </p>
                                    <p class="font-black text-gray-900 text-lg">
                                        #{{ $order->kode_order }}
                                    </p>
                                </div>
                            </div>

                            @php
                                $statusMap = [
                                    'menunggu_pembayaran' => ['Belum Bayar', 'bg-red-50 text-red-600 border-red-100'],
                                    'menunggu_konfirmasi' => ['Pengecekan', 'bg-blue-50 text-blue-600 border-blue-100'],
                                    'diproses' => ['Dimasak', 'bg-amber-50 text-amber-600 border-amber-100'],
                                    'selesai' => ['Selesai', 'bg-emerald-50 text-emerald-600 border-emerald-100'],
                                ];
                                $st = $statusMap[$order->status] ?? ['Unknown', 'bg-gray-50 text-gray-500 border-gray-100'];
                            @endphp

                            <span class="text-[10px] font-black uppercase px-4 py-1.5 rounded-full border {{ $st[1] }} shadow-sm">
                                {{ $st[0] }}
                            </span>
                        </div>

                        {{-- ITEMS LIST --}}
                        <div class="space-y-4 mb-6">
                            @foreach ($order->items as $item)
                                <div class="flex justify-between items-center p-3 rounded-2xl bg-gray-50/50">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center justify-center w-8 h-8 rounded-xl bg-white text-xs font-black shadow-sm text-gacoan-600 border border-gray-100">
                                            {{ $item->qty }}x
                                        </div>
                                        <span class="font-bold text-gray-700">
                                            {{ $item->menu->nama }}
                                        </span>
                                    </div>
                                    <span class="font-bold text-gray-900">
                                        Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        {{-- FOOTER CARD --}}
                        <div class="pt-6 border-t border-dashed border-gray-200 flex flex-col sm:flex-row justify-between items-center gap-4">
                            <div class="w-full sm:w-auto">
                                <p class="text-[10px] uppercase tracking-widest font-black text-gray-400 mb-1">
                                    Waktu Transaksi
                                </p>
                                <p class="text-sm font-bold text-gray-600 flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    {{ $order->created_at->format('d M Y • H:i') }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between w-full sm:w-auto gap-6 sm:gap-10">
                                <div class="text-right">
                                    <p class="text-[10px] uppercase tracking-widest font-black text-gray-400">Total Bayar</p>
                                    <p class="text-2xl font-black text-gray-900 italic">
                                        Rp{{ number_format($order->total, 0, ',', '.') }}
                                    </p>
                                </div>

                                @if ($order->status === 'menunggu_pembayaran')
                                    <div class="flex gap-2">
                                        <a href="{{ route($order->payment_method === 'qris' ? 'checkout.qris' : 'checkout.transfer') }}"
                                           class="px-6 py-3 bg-gray-900 text-white text-[11px] font-black rounded-2xl uppercase hover:bg-gacoan-600 transition-all shadow-lg shadow-gray-200 hover:shadow-gacoan-200 active:scale-95">
                                            Bayar
                                        </a>
                                        <form action="{{ route('pesanan.destroy', $order->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus pesanan ini?')">
                                            @csrf @method('DELETE')
                                            <button class="p-3 bg-red-50 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white transition-all active:scale-95">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-32 text-center bg-gray-50 rounded-[3rem] border-2 border-dashed border-gray-200"
                     :class="loaded ? 'opacity-100 scale-100' : 'opacity-0 scale-95'">
                    <div class="mb-4 flex justify-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                        </div>
                    </div>
                    <p class="text-gray-900 font-black uppercase tracking-widest">Belum Ada Riwayat</p>
                    <p class="text-sm text-gray-400 mt-1">Ayo pesan menu Gacoan favoritmu sekarang!</p>
                </div>
            @endforelse
        </div>

        {{-- SIDEBAR --}}
        <div class="lg:sticky lg:top-32 space-y-6">
            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-gacoan-600/20 rounded-full blur-3xl group-hover:bg-gacoan-600/40 transition-all duration-700"></div>
                
                <p class="text-[11px] uppercase tracking-[0.2em] text-white/40 mb-8 font-black flex items-center gap-2">
                    <span class="w-2 h-2 bg-gacoan-600 rounded-full animate-ping"></span>
                    Loyalty Summary
                </p>
                
                <div class="space-y-6 relative z-10">
                    <div class="flex justify-between items-end">
                        <div>
                            <p class="text-5xl font-black italic tracking-tighter">{{ $orders->count() }}</p>
                            <p class="text-[10px] text-white/50 uppercase font-bold tracking-widest mt-1">Total Pesanan</p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-black text-gacoan-500">{{ $orders->count() * 5 }}</p>
                            <p class="text-[10px] text-white/50 uppercase font-bold tracking-widest">Gacoan Points</p>
                        </div>
                    </div>
                    
                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                        <div class="h-full bg-gacoan-600 w-2/3 rounded-full"></div>
                    </div>
                    
                    <button class="w-full py-4 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all">
                        Lihat Benefit Member
                    </button>
                </div>
            </div>

            <div class="bg-gacoan-50 rounded-3xl p-6 border border-gacoan-100">
                <h4 class="font-black text-gacoan-900 uppercase text-xs tracking-widest mb-3">Butuh Bantuan?</h4>
                <p class="text-xs text-gacoan-700/70 leading-relaxed mb-4">Jika ada kendala dengan pesanan Anda, silakan hubungi tim kami.</p>
                <a href="#" class="flex items-center justify-center gap-2 w-full py-3 bg-white border border-gacoan-200 rounded-xl text-xs font-black text-gacoan-900 hover:shadow-md transition-all">
                    Hubungi Support
                </a>
            </div>
        </div>
    </div>
</div>
@endsection