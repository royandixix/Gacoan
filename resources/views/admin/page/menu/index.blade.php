@extends('admin.layouts.app')

@section('title', 'Menu Management')

@section('content')
<div class="min-h-screen bg-[#0f172a] p-4 md:p-8">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Menu Management</h1>
            <p class="text-slate-400 text-sm mt-1 flex items-center gap-2">
                <span class="w-2 h-2 bg-gacoan-500 rounded-full animate-pulse"></span>
                Kelola dan monitor daftar menu restoran Anda
            </p>
        </div>
        
        <a href="{{ route('admin.menu.create') }}"
           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-gacoan-600 to-gacoan-500 text-white rounded-lg shadow-lg shadow-gacoan-500/20 hover:shadow-gacoan-500/40 transition-all duration-300 active:scale-95 group">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="font-semibold">Tambah Menu Baru</span>
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @php
            $stats = [
                ['label' => 'Total Menu', 'value' => $menus->total(), 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'blue'],
                ['label' => 'Menu Aktif', 'value' => $menus->where('is_active', true)->count(), 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'green'],
                ['label' => 'Promo Aktif', 'value' => $menus->filter(fn($m) => $m->isPromoAktif())->count(), 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z', 'color' => 'purple']
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-slate-800/40 backdrop-blur-md border border-slate-700/50 rounded-2xl p-5 hover:bg-slate-800/60 transition-all group">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-{{ $stat['color'] }}-500/10 rounded-xl group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-{{ $stat['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">{{ $stat['label'] }}</p>
                    <p class="text-2xl font-bold text-white">{{ $stat['value'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Table Section --}}
    <div class="bg-slate-800/30 backdrop-blur-sm border border-slate-700/50 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-900/50 border-b border-slate-700/50">
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Menu</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Kategori</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest">Harga</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-slate-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/30">
                    @forelse($menus as $menu)
                    <tr class="group hover:bg-slate-700/20 transition-colors">
                        {{-- Info Menu & Gambar --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($menu->gambar)
                                    <div class="h-14 w-14 flex-shrink-0 overflow-hidden rounded-xl ring-2 ring-slate-700 group-hover:ring-gacoan-500/50 transition-all">
                                        <img src="{{ Storage::url($menu->gambar) }}" class="h-full w-full object-cover shadow-inner" alt="{{ $menu->nama }}">
                                    </div>
                                @else
                                    <div class="h-14 w-14 flex-shrink-0 bg-slate-700 rounded-xl flex items-center justify-center text-slate-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                <div>
                                    <div class="text-white font-bold group-hover:text-gacoan-400 transition-colors">{{ $menu->nama }}</div>
                                    <div class="text-slate-500 text-xs mt-0.5">ID: #{{ str_pad($menu->id, 4, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Kategori --}}
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-700 text-slate-300 border border-slate-600">
                                {{ $menu->kategori ?? 'Umum' }}
                            </span>
                        </td>

                        {{-- Harga --}}
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="text-white font-mono font-bold">Rp{{ number_format($menu->harga_final, 0, ',', '.') }}</span>
                                @if($menu->isPromoAktif())
                                    <span class="text-[10px] text-green-400 font-bold uppercase tracking-tighter flex items-center gap-1">
                                        <span class="w-1 h-1 bg-green-400 rounded-full animate-ping"></span> Flash Sale
                                    </span>
                                @endif
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-[11px] font-bold uppercase tracking-wider
                                {{ $menu->is_active 
                                    ? 'bg-emerald-500/10 text-emerald-500 border border-emerald-500/20' 
                                    : 'bg-rose-500/10 text-rose-500 border border-rose-500/20' }}">
                                {{ $menu->is_active ? 'Available' : 'Sold Out' }}
                            </span>
                        </td>

                        {{-- Aksi --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.menu.edit', $menu) }}"
                                   class="p-2 bg-blue-500/10 text-blue-400 hover:bg-blue-500 hover:text-white rounded-lg transition-all"
                                   title="Edit Menu">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>

                                <form action="{{ route('admin.menu.destroy', $menu) }}" method="POST" class="inline delete-form">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)"
                                            class="p-2 bg-rose-500/10 text-rose-400 hover:bg-rose-500 hover:text-white rounded-lg transition-all"
                                            title="Hapus Menu">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mb-4 border border-slate-700">
                                    <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                </div>
                                <h3 class="text-white font-bold text-lg">Belum ada data</h3>
                                <p class="text-slate-500 text-sm">Klik tombol "Tambah Menu Baru" untuk memulai.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($menus->hasPages())
        <div class="px-6 py-4 bg-slate-900/30 border-t border-slate-700/50">
            {{ $menus->links() }}
        </div>
        @endif
    </div>
</div>

{{-- Script & Style --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const notyf = new Notyf({ 
        duration: 3000, 
        position: { x: 'right', y: 'top' },
        ripple: false,
        types: [{ type: 'success', background: '#10b981' }]
    });

    @if (session('success')) notyf.success('{{ session('success') }}'); @endif
    @if ($errors->any()) notyf.error('Terjadi kesalahan, periksa inputan Anda'); @endif

    function confirmDelete(button) {
        Swal.fire({
            title: 'Hapus Menu?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#334155',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            background: '#1e293b',
            color: '#fff'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        })
    }
</script>

<style>
    /* Kustomisasi pagination laravel agar masuk ke tema dark */
    .pagination { @apply flex gap-1; }
    .page-item .page-link { @apply bg-slate-800 border-slate-700 text-slate-400 rounded-lg; }
    .page-item.active .page-link { @apply bg-gacoan-600 border-gacoan-600 text-white; }
</style>
@endsection