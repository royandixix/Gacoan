@extends('user.layouts.app')

@section('title', 'Pesan Menu - Gacoan')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="max-w-7xl mx-auto px-4 py-8">
    
    {{-- 
        HERO SECTION 
        Penjelasan: Menggunakan warna gelap (Slate-900) untuk memberikan kesan premium. 
        Animasi: animate__fadeInDown agar muncul dari atas saat load.
    --}}
    <div class="relative bg-slate-900 rounded-[2rem] overflow-hidden mb-12 shadow-2xl border border-slate-800 animate__animated animate__fadeInDown">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-orange-600/20 blur-[100px] rounded-full"></div>
        
        <div class="relative px-8 py-14 md:px-16 md:py-20 text-white z-10">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-orange-500 p-3 rounded-2xl animate__animated animate__bounceIn animate__delay-1s">
                    <i class="fa-solid fa-fire-flame-curved text-3xl text-white"></i>
                </div>
                <h1 class="text-4xl md:text-6xl font-black tracking-tighter italic">Yuk, Mulai Pesan!</h1>
            </div>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mb-10 leading-relaxed">
                Pilih menu favoritmu dan rasakan sensasi pedas yang melegenda. Pesan sekarang sebelum kehabisan! 🔥
            </p>
            
            {{-- Search Bar dengan Glassmorphism --}}
            <div class="max-w-2xl relative group">
                <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-orange-500 transition-colors"></i>
                <input type="text" id="searchMenu"
                       placeholder="Lagi pengen makan apa hari ini?"
                       class="w-full pl-14 pr-6 py-5 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl text-white placeholder-white/30 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:bg-white/10 transition-all shadow-inner">
            </div>
        </div>
    </div>

    {{-- 
        FILTER TABS 
        Penjelasan: Tombol kategori untuk memudahkan user mencari jenis makanan.
        Animasi: animate__fadeIn agar muncul halus.
    --}}
    <div class="mb-10 overflow-x-auto no-scrollbar animate__animated animate__fadeIn animate__delay-1s">
        <div class="flex gap-4 pb-2 min-w-max">
            <button class="filter-btn active flex items-center gap-2 px-8 py-4 bg-slate-900 text-white rounded-2xl shadow-xl shadow-slate-200 transition-all hover:scale-105" data-filter="all">
                <i class="fa-solid fa-border-all"></i> <span class="font-bold">Semua Menu</span>
            </button>
            <button class="filter-btn flex items-center gap-2 px-8 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl hover:bg-red-50 hover:border-red-200 transition-all hover:scale-105" data-filter="spicy">
                <i class="fa-solid fa-pepper-hot text-red-500"></i> <span class="font-bold">Menu Pedas</span>
            </button>
            <button class="filter-btn flex items-center gap-2 px-8 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl hover:bg-yellow-50 hover:border-yellow-200 transition-all hover:scale-105" data-filter="recommended">
                <i class="fa-solid fa-star text-yellow-500"></i> <span class="font-bold">Rekomendasi</span>
            </button>
        </div>
    </div>

    {{-- 
        MENU GRID 
        Penjelasan: Tempat kartu menu ditampilkan.
        Animasi: Setiap kartu akan memiliki delay yang berbeda agar muncul bergantian.
    --}}
    <div id="menuContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($popular_menus as $index => $menu)
        <div class="menu-card group animate__animated animate__fadeInUp" 
             style="animation-delay: {{ $index * 0.1 }}s"
             data-name="{{ strtolower($menu->nama) }}"
             data-category="{{ strtolower($menu->category?->nama ?? 'all') }}">

            {{-- Bagian Gambar dengan Hover Zoom --}}
            <div class="w-full h-72 bg-slate-100 rounded-[2rem] overflow-hidden mb-6 relative shadow-lg">
                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}"
                         alt="{{ $menu->nama }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-slate-200">
                        <i class="fa-solid fa-utensils text-5xl text-slate-400"></i>
                    </div>
                @endif

                {{-- Badge Promo --}}
                @if($menu->isPromoAktif())
                <div class="absolute top-5 left-5 px-4 py-1.5 bg-red-600 text-white text-[11px] font-black rounded-full shadow-lg animate-pulse">
                    PROMO SPESIAL
                </div>
                @endif

                {{-- Floating Rating --}}
                <div class="absolute top-5 right-5 px-3 py-1.5 bg-white/95 backdrop-blur-sm text-slate-900 text-xs font-black rounded-xl flex items-center gap-1.5 shadow-xl border border-white">
                    <i class="fa-solid fa-star text-yellow-500"></i>
                    {{ $menu->rating ?? '4.8' }}
                </div>
            </div>

            {{-- Detail Informasi Menu --}}
            <div class="px-2">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight group-hover:text-orange-600 transition-colors">
                        {{ $menu->nama }}
                    </h3>
                </div>

                <p class="text-sm text-slate-500 leading-relaxed mb-4 line-clamp-2">
                    {{ $menu->deskripsi ?? 'Nikmati perpaduan bumbu rahasia Gacoan yang bikin lidah bergoyang.' }}
                </p>

                <div class="flex flex-wrap gap-2 mb-6">
                    @if($menu->category)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 text-slate-600 text-[10px] font-bold rounded-lg uppercase tracking-wider">
                        <i class="fa-solid fa-tag"></i> {{ $menu->category->nama }}
                    </span>
                    @endif
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-orange-50 text-orange-600 text-[10px] font-bold rounded-lg uppercase tracking-wider">
                        <i class="fa-solid fa-bolt"></i> Terlaris
                    </span>
                </div>

                {{-- Harga & Tombol Aksi --}}
                <div class="flex items-center justify-between mb-6">
                    <div>
                        @if($menu->isPromoAktif() && $menu->harga_promo)
                        <div class="flex flex-col">
                            <span class="text-sm text-slate-400 line-through">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                            <span class="text-3xl font-black text-red-600 tracking-tighter">Rp {{ number_format($menu->harga_promo, 0, ',', '.') }}</span>
                        </div>
                        @else
                        <span class="text-3xl font-black text-slate-900 tracking-tighter">Rp {{ number_format($menu->harga_final, 0, ',', '.') }}</span>
                        @endif
                    </div>

                    <a href="{{ route('user.menu.show', $menu->id) }}"
                       class="w-12 h-12 flex items-center justify-center bg-slate-100 text-slate-900 rounded-2xl hover:bg-slate-900 hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>

                {{-- Add to Cart --}}
                <form action="{{ route('pesanan.add', $menu->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="group/btn relative w-full overflow-hidden py-4 bg-white border-2 border-slate-900 text-slate-900 text-sm font-black rounded-2xl transition-all duration-300 hover:text-white">
                        <span class="absolute inset-0 bg-slate-900 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></span>
                        <span class="relative flex items-center justify-center gap-3">
                            <i class="fa-solid fa-cart-plus text-lg"></i>
                            TAMBAH KE KERANJANG
                        </span>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Empty State (Jika pencarian tidak ada) --}}
    <div id="emptyState" class="hidden text-center py-32 animate__animated animate__fadeIn">
        <div class="bg-slate-50 w-32 h-32 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fa-solid fa-magnifying-glass text-5xl text-slate-200"></i>
        </div>
        <h3 class="text-2xl font-black text-slate-900 mb-2">Menu Tidak Ditemukan</h3>
        <p class="text-slate-500">Maaf, menu yang kamu cari belum tersedia. Coba kata kunci lain!</p>
    </div>
</div>

<style>
    /* Menghilangkan scrollbar tapi tetap bisa scroll */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    
    /* State tombol aktif */
    .filter-btn.active {
        background-color: #0f172a;
        color: white;
        border-color: #0f172a;
        transform: scale(1.05);
    }

    /* Efek Smooth Scroll */
    html { scroll-behavior: smooth; }

    /* Custom shadow untuk Card agar terlihat melayang */
    .menu-card:hover {
        transform: translateY(-10px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchMenu');
    const menuCards = document.querySelectorAll('.menu-card');
    const emptyState = document.getElementById('emptyState');
    const menuContainer = document.getElementById('menuContainer');
    const filterButtons = document.querySelectorAll('.filter-btn');

    // Fungsi Logika Filter & Pencarian
    function filterLogic() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
        let visibleCount = 0;

        menuCards.forEach(card => {
            const name = card.dataset.name;
            const category = card.dataset.category;
            const matchSearch = name.includes(searchTerm);
            
            // Logika Filter (Bisa disesuaikan dengan kebutuhan kategori database)
            const matchFilter = (activeFilter === 'all' || category.includes(activeFilter));

            if (matchSearch && matchFilter) {
                card.classList.remove('hidden');
                card.classList.add('animate__animated', 'animate__fadeInUp');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        // Menampilkan pesan jika menu kosong
        if(visibleCount === 0) {
            emptyState.classList.remove('hidden');
            menuContainer.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            menuContainer.classList.remove('hidden');
        }
    }

    searchInput.addEventListener('input', filterLogic);

    // Event Klik Tombol Filter
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => {
                b.classList.remove('active', 'bg-slate-900', 'text-white', 'shadow-xl');
                b.classList.add('bg-white', 'text-slate-700', 'border-slate-200');
            });
            btn.classList.add('active', 'bg-slate-900', 'text-white', 'shadow-xl');
            btn.classList.remove('bg-white', 'border-slate-200');
            filterLogic();
        });
    });
});
</script>
@endsection