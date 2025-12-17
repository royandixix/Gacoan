@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Banner -->
<div class="bg-gradient-to-r from-gacoan-600 to-orange-500 rounded-2xl shadow-xl overflow-hidden mb-8">
    <div class="px-6 sm:px-12 py-12 sm:py-16 text-white">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-4">
                <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                    <i data-lucide="flame" class="w-8 h-8"></i>
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold">
                    Selamat Datang di Gacoan!
                </h1>
            </div>
            <p class="text-lg sm:text-xl text-white/90 mb-6">
                Pilih menu favoritmu dan rasakan sensasi pedasnya yang bikin nagih! 🔥
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('pesanan') }}" class="bg-white text-gacoan-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg flex items-center gap-2">
                    <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                    Pesan Sekarang
                </a>
                <a href="#" class="bg-white/10 backdrop-blur-sm text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/20 transition border border-white/30 flex items-center gap-2">
                    <i data-lucide="sparkles" class="w-5 h-5"></i>
                    Lihat Promo
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-2">
            <div class="bg-red-50 p-3 rounded-lg">
                <i data-lucide="chef-hat" class="w-6 h-6 text-gacoan-600"></i>
            </div>
            <span class="text-3xl font-bold text-gacoan-600">{{ $stats['menu_count'] ?? 0 }}+</span>
        </div>
        <h3 class="font-semibold text-gray-800">Menu Pilihan</h3>
        <p class="text-sm text-gray-500">Variasi menu pedas & tidak pedas</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-2">
            <div class="bg-orange-50 p-3 rounded-lg">
                <i data-lucide="clock" class="w-6 h-6 text-orange-600"></i>
            </div>
            <span class="text-3xl font-bold text-orange-600">30'</span>
        </div>
        <h3 class="font-semibold text-gray-800">Pengiriman Cepat</h3>
        <p class="text-sm text-gray-500">Pesanan sampai dalam 30 menit</p>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
        <div class="flex items-center justify-between mb-2">
            <div class="bg-green-50 p-3 rounded-lg">
                <i data-lucide="star" class="w-6 h-6 text-green-600"></i>
            </div>
            <span class="text-3xl font-bold text-green-600">{{ $stats['rating'] ?? 4.8 }}</span>
        </div>
        <h3 class="font-semibold text-gray-800">Rating Tinggi</h3>
        <p class="text-sm text-gray-500">Dari ribuan pelanggan setia</p>
    </div>
</div>

<!-- Menu Categories -->
<div class="mb-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Kategori Menu</h2>
            <p class="text-gray-600">Eksplorasi menu favorit kami</p>
        </div>
        <a href="{{ route('user.menu.index') }}" class="text-gacoan-600 font-semibold hover:text-gacoan-700 transition flex items-center gap-1">
            Lihat Semua
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($categories as $category)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group cursor-pointer">
            <div class="bg-gradient-to-br {{ $category->gradient_class ?? 'from-gray-300 to-gray-400' }} h-32 flex items-center justify-center">
                <i data-lucide="{{ $category->icon ?? 'layers' }}" class="w-12 h-12 text-white group-hover:scale-110 transition"></i>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-gray-800 mb-1">{{ $category->nama }}</h3>
                <p class="text-xs text-gray-500">{{ $category->menus_count ?? 0 }}+ menu</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Promo Banner -->
<div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl shadow-xl overflow-hidden mb-8">
    <div class="px-6 sm:px-12 py-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
        <div class="text-center sm:text-left">
            <div class="inline-block bg-yellow-400 text-purple-900 px-3 py-1 rounded-full text-xs font-bold mb-3">
                PROMO SPESIAL 🎉
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold mb-2">Diskon 30% untuk Pesanan Pertama!</h3>
            <p class="text-white/90">Gunakan kode: <span class="font-bold bg-white/20 px-3 py-1 rounded">GACOAN30</span></p>
        </div>
        <a href="#" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition shadow-lg whitespace-nowrap">
            Pakai Sekarang
        </a>
    </div>
</div>

<!-- Popular Items -->
<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Menu Populer</h2>
            <p class="text-gray-600">Paling sering dipesan minggu ini</p>
        </div>
        <a href="{{ route('user.menu.index') }}" class="text-gacoan-600 font-semibold hover:text-gacoan-700 transition flex items-center gap-1">
            Lihat Semua
            <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($popular_menus as $menu)
        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition group">
            <div class="relative h-48 bg-gray-200">
                @if($menu->is_best_seller)
                    <div class="absolute top-3 right-3 bg-gacoan-600 text-white px-3 py-1 rounded-full text-xs font-bold">Best Seller</div>
                @elseif($menu->isPromoAktif())
                    <div class="absolute top-3 right-3 bg-orange-500 text-white px-3 py-1 rounded-full text-xs font-bold">Promo</div>
                @elseif($menu->is_new)
                    <div class="absolute top-3 right-3 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold">New</div>
                @endif

                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" class="w-full h-full object-cover">
                @else
                    <div class="absolute inset-0 flex items-center justify-center">
                        <i data-lucide="utensils" class="w-16 h-16 text-gray-400"></i>
                    </div>
                @endif
            </div>

            <div class="p-4">
                <div class="flex items-start justify-between mb-2">
                    <h3 class="font-bold text-gray-800">{{ $menu->nama }}</h3>
                    <div class="flex items-center gap-1 text-yellow-500">
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                        <span class="text-sm font-semibold text-gray-700">{{ $menu->rating ?? '4.8' }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mb-3">{{ $menu->deskripsi }}</p>
                <p class="text-xs text-gray-400 mb-2">Kategori: {{ $menu->category?->nama ?? $menu->kategori }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xl font-bold text-gacoan-600">Rp {{ number_format($menu->harga_final,0,',','.') }}</span>
                    <a href="{{ route('pesanan') }}" class="bg-gacoan-600 text-white px-4 py-2 rounded-lg hover:bg-gacoan-700 transition flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                        Pesan
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Initialize Lucide Icons -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection
