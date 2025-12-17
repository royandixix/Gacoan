@extends('admin.layouts.app')

@section('title', 'Menu Management')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-6">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-gradient-to-br from-gacoan-500 to-gacoan-600 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white">Menu Management</h1>
                <p class="text-slate-400 text-sm mt-1">Kelola menu restoran Anda</p>
            </div>
        </div>
        
        <a href="{{ route('admin.menu.create') }}"
           class="group relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-gacoan-600 to-gacoan-500 text-white rounded-xl shadow-lg hover:shadow-gacoan-500/50 transition-all duration-300 hover:scale-105">
            <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span class="font-semibold">Tambah Menu</span>
        </a>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 hover:border-blue-500/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-blue-500/20 rounded-lg">
                    <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Total Menu</p>
                    <p class="text-2xl font-bold text-white">{{ $menus->total() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 hover:border-green-500/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-green-500/20 rounded-lg">
                    <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Menu Aktif</p>
                    <p class="text-2xl font-bold text-white">{{ $menus->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl p-6 hover:border-purple-500/50 transition-all duration-300">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-purple-500/20 rounded-lg">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-slate-400 text-sm">Promo Aktif</p>
                    <p class="text-2xl font-bold text-white">{{ $menus->filter(fn($m) => $m->isPromoAktif())->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px]">
                <thead class="bg-slate-900/80">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Gambar
                            </div>
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Nama
                            </div>
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                </svg>
                                Kategori
                            </div>
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Harga
                            </div>
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status
                            </div>
                        </th>
                        <th class="p-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700/50">
                    @forelse($menus as $menu)
                    <tr class="hover:bg-slate-700/30 transition-colors duration-200">
                        <td class="p-4">
                            @if($menu->gambar)
                                <div class="relative group">
                                    <img src="{{ asset('storage/'.$menu->gambar) }}"
                                         class="w-16 h-16 object-cover rounded-lg ring-2 ring-slate-600 group-hover:ring-gacoan-500 transition-all duration-300">
                                    <div class="absolute inset-0 bg-black/50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            @else
                                <div class="w-16 h-16 bg-slate-700 rounded-lg flex items-center justify-center text-slate-500">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            <p class="font-semibold text-white">{{ $menu->nama }}</p>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-700 text-slate-300 rounded-lg text-xs font-medium">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                {{ $menu->kategori ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex flex-col gap-1">
                                <span class="text-white font-bold">Rp {{ number_format($menu->harga_final, 0, ',', '.') }}</span>
                                @if($menu->isPromoAktif())
                                    <span class="inline-flex items-center gap-1 text-xs text-green-400 font-medium">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                        </svg>
                                        Promo
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                {{ $menu->is_active 
                                    ? 'bg-green-500/20 text-green-400 ring-1 ring-green-500/50' 
                                    : 'bg-red-500/20 text-red-400 ring-1 ring-red-500/50' }}">
                                @if($menu->is_active)
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Aktif
                                @else
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Nonaktif
                                @endif
                            </span>
                        </td>
                        <td class="p-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.menu.edit', $menu) }}"
                                   class="group inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-500/20 text-blue-400 rounded-lg text-xs font-medium hover:bg-blue-500 hover:text-white transition-all duration-200">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>

                                <form action="{{ route('admin.menu.destroy', $menu) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus menu ini?')"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="group inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-500/20 text-red-400 rounded-lg text-xs font-medium hover:bg-red-500 hover:text-white transition-all duration-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <div class="p-4 bg-slate-700/50 rounded-full">
                                    <svg class="w-12 h-12 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-slate-400 text-lg font-medium">Belum ada menu</p>
                                    <p class="text-slate-500 text-sm mt-1">Mulai tambahkan menu pertama Anda</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($menus->hasPages())
        <div class="p-4 bg-slate-900/50 border-t border-slate-700">
            {{ $menus->links() }}
        </div>
        @endif
    </div>
</div>

{{-- Notyf JS --}}
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<script>
    const notyf = new Notyf({ 
        duration: 4000, 
        position: { x: 'right', y: 'top' },
        dismissible: true
    });

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            notyf.error('{{ $error }}');
        @endforeach
    @endif

    @if (session('success'))
        notyf.success('{{ session('success') }}');
    @endif
</script>
@endsection