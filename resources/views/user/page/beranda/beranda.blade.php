@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="bg-white rounded-2xl overflow-hidden mb-6 shadow-sm border border-gray-100 animate-fade-in">
        <div class="flex flex-col md:flex-row items-stretch">
            <div class="w-full md:w-2/5 flex-shrink-0 overflow-hidden min-h-[250px]">
                <img src="{{ asset('img/gacoan/mie-gacoan-lamongan-5.jpg') }}" alt="Food"
                    class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">

            </div>

            <div class="flex-1 px-6 py-10 md:px-10 flex flex-col justify-center animate-slide-in-right">
                <div class="text-xs font-bold mb-2 uppercase tracking-[0.15em] text-gray-400 animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    DOMPET DIGITAL
                </div>
                <h1 class="text-2xl md:text-3xl font-bold mb-4 leading-tight text-gray-900 animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    Seperti dompetmu,<br>tapi lebih canggih
                </h1>
                <p class="text-sm mb-8 text-gray-600 leading-relaxed max-w-md animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    Gacoan Wallet bikin kamu lebih mudah untuk akses semua kebutuhan transaksi dan mulai berinvestasi.
                </p>

                <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                    <a href="{{ route('pesanan') }}"
                        class="group inline-flex items-center gap-3 border-2 border-gray-900 text-gray-900 px-6 py-2.5 rounded-full font-bold hover:bg-gray-900 hover:text-white transition-all duration-300 text-sm active:scale-95">
                        Cari Tahu Selengkapnya
                        <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- About Gacoan -->
    <div class="mb-8 px-2 animate-fade-in-up" style="animation-delay: 0.5s">
        <p class="text-lg text-gray-800 leading-relaxed font-light hover:text-gray-900 transition-colors duration-300"
            style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif; letter-spacing: -0.01em; line-height: 1.8;">
            Gacoan adalah destinasi kuliner yang menghadirkan sensasi pedas khas Indonesia dengan berbagai pilihan menu mie,
            dimsum, dan minuman segar.
            Dengan konsep fast-casual dining, Gacoan memberikan pengalaman makan yang praktis namun tetap berkualitas.
            Setiap menu dirancang dengan cita rasa autentik yang menggugah selera, cocok untuk segala suasana - mulai dari
            makan santai hingga acara spesial bersama keluarga dan teman.
            Nikmati kemudahan memesan makanan favorit kamu langsung dari aplikasi, dapatkan promo menarik setiap hari, dan
            rasakan pelayanan terbaik yang membuat setiap kunjungan menjadi pengalaman tak terlupakan.
        </p>
    </div>

    <!-- Features Section -->
    <div
        class="relative overflow-hidden bg-gradient-to-br from-red-900 via-red-800 to-orange-900 py-24 sm:py-32 mb-8 animate-fade-in">
        <!-- Background Image Overlay -->
        <div class="absolute inset-0 opacity-10">
            <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=1200" alt="Background"
                class="w-full h-full object-cover animate-ken-burns">
        </div>

        <!-- Pattern Overlay -->
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE4YzAtOS45NC04LjA2LTE4LTE4LTE4UzAgOC4wNiAwIDE4czguMDYgMTggMTggMTggMTgtOC4wNiAxOC0xOHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30">
        </div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <!-- Text Content -->
                <div class="lg:pt-4 lg:pr-8 animate-slide-in-left">
                    <div class="lg:max-w-lg">
                        <h2 class="text-base/7 font-semibold text-orange-400 animate-fade-in-up">KENAPA PILIH GACOAN?</h2>
                        <p class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl animate-fade-in-up"
                            style="animation-delay: 0.1s">
                            Pengalaman Kuliner Terbaik
                        </p>
                        <p class="mt-6 text-lg leading-8 text-gray-200 animate-fade-in-up" style="animation-delay: 0.2s">
                            Kami berkomitmen memberikan pengalaman makan yang tak terlupakan dengan kualitas terbaik,
                            pelayanan ramah, dan harga yang terjangkau untuk semua kalangan.
                        </p>

                        <!-- Features List -->
                        <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-300 lg:max-w-none">
                            <!-- Feature 1 -->
                            <div class="relative pl-9 feature-item animate-fade-in-up" style="animation-delay: 0.3s">
                                <dt class="inline font-semibold text-white">
                                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                        class="absolute top-1 left-1 size-5 text-orange-400 animate-bounce-slow">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1.323l3.954 1.582 1.599-.8a1 1 0 01.894 1.79l-1.233.616 1.738 5.42a1 1 0 01-.285 1.05A3.989 3.989 0 0115 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.715-5.349L11 6.477V16h2a1 1 0 110 2H7a1 1 0 110-2h2V6.477L6.237 7.582l1.715 5.349a1 1 0 01-.285 1.05A3.989 3.989 0 015 15a3.989 3.989 0 01-2.667-1.019 1 1 0 01-.285-1.05l1.738-5.42-1.233-.617a1 1 0 01.894-1.788l1.599.799L9 4.323V3a1 1 0 011-1zm-5 8.274l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L5 10.274zm10 0l-.818 2.552c.25.112.526.174.818.174.292 0 .569-.062.818-.174L15 10.274z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Menu Berkualitas Premium
                                </dt>
                                <dd class="inline">
                                    Setiap hidangan dibuat dari bahan-bahan pilihan berkualitas tinggi dengan resep rahasia
                                    yang sudah teruji dan disukai ribuan pelanggan setia kami.
                                </dd>
                            </div>

                            <!-- Feature 2 -->
                            <div class="relative pl-9 feature-item animate-fade-in-up" style="animation-delay: 0.4s">
                                <dt class="inline font-semibold text-white">
                                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                        class="absolute top-1 left-1 size-5 text-orange-400 animate-bounce-slow">
                                        <path
                                            d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Harga Terjangkau
                                </dt>
                                <dd class="inline">
                                    Nikmati kelezatan makanan premium dengan harga yang ramah di kantong. Berbagai promo
                                    menarik setiap hari untuk pelanggan setia.
                                </dd>
                            </div>

                            <!-- Feature 3 -->
                            <div class="relative pl-9 feature-item animate-fade-in-up" style="animation-delay: 0.5s">
                                <dt class="inline font-semibold text-white">
                                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                        class="absolute top-1 left-1 size-5 text-orange-400 animate-bounce-slow">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Pelayanan Cepat & Ramah
                                </dt>
                                <dd class="inline">
                                    Tim kami siap melayani dengan cepat dan ramah. Sistem pemesanan yang mudah membuat
                                    pengalaman makan kamu semakin menyenangkan.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Image -->
                <div class="relative animate-slide-in-right">
                    <img width="2432" height="1442"
                        src="{{ asset('img/gacoan/MIE-GACOAN-Ganti-Nama-Menu-Ini-Alasannya.jpg') }}" alt="Gacoan Food"
                        class="w-full max-w-none rounded-xl shadow-2xl ring-1 ring-white/10 lg:w-[48rem] hover:scale-105 transition-transform duration-500" />

                    <!-- Badge -->
                    <div
                        class="absolute -bottom-4 -left-4 bg-orange-500 text-white px-6 py-3 rounded-lg shadow-xl animate-bounce-slow hover:scale-110 transition-transform cursor-pointer">
                        <div class="text-xs font-semibold">⭐ RATING</div>
                        <div class="text-2xl font-bold">4.9/5</div>
                        <div class="text-xs">Dari 10.000+ review</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="relative py-20 bg-gray-50">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <dl class="grid grid-cols-1 gap-8 md:grid-cols-3 text-center">

            <div class="group relative overflow-hidden rounded-2xl bg-red-600 p-8 shadow-2xl shadow-red-200 transition-all duration-300 hover:-translate-y-2">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-red-500 opacity-50 transition-transform group-hover:scale-150"></div>
                
                <div class="relative">
                    <div class="mb-6 flex justify-center">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14l-1.5 9h-11L5 8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8V6a3 3 0 016 0v2" />
                        </svg>
                    </div>
                    <dt class="text-xs font-bold uppercase tracking-widest text-red-100 mb-3">
                        Total Pesanan
                    </dt>
                    <dd class="text-5xl font-extrabold text-white counter" data-target="{{ $stats['order_count'] }}">
                        0
                    </dd>
                    <p class="mt-4 text-sm leading-relaxed text-red-50">
                        Telah memproses ribuan transaksi pelanggan setiap hari dengan sistem pemesanan yang cepat dan stabil.
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl bg-orange-500 p-8 shadow-2xl shadow-orange-200 transition-all duration-300 hover:-translate-y-2">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-orange-400 opacity-50 transition-transform group-hover:scale-150"></div>

                <div class="relative">
                    <div class="mb-6 flex justify-center">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 3h16M4 21h16M6 3v18M18 3v18" />
                        </svg>
                    </div>
                    <dt class="text-xs font-bold uppercase tracking-widest text-orange-100 mb-3">
                        Menu Aktif
                    </dt>
                    <dd class="text-5xl font-extrabold text-white counter" data-target="{{ $stats['menu_count'] }}">
                        0
                    </dd>
                    <p class="mt-4 text-sm leading-relaxed text-orange-50">
                        Menu pilihan dengan kualitas terbaik dan cita rasa khas yang selalu tersedia setiap hari.
                    </p>
                </div>
            </div>

            <div class="group relative overflow-hidden rounded-2xl bg-amber-500 p-8 shadow-2xl shadow-amber-200 transition-all duration-300 hover:-translate-y-2">
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-amber-400 opacity-50 transition-transform group-hover:scale-150"></div>

                <div class="relative">
                    <div class="mb-6 flex justify-center">
                        <svg class="h-14 w-14 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20H4v-2a4 4 0 014-4h1" />
                            <circle cx="9" cy="7" r="4" />
                            <circle cx="17" cy="7" r="4" />
                        </svg>
                    </div>
                    <dt class="text-xs font-bold uppercase tracking-widest text-amber-100 mb-3">
                        Pengguna Terdaftar
                    </dt>
                    <dd class="text-5xl font-extrabold text-white counter" data-target="{{ $stats['user_count'] }}">
                        0
                    </dd>
                    <p class="mt-4 text-sm leading-relaxed text-amber-50">
                        Komunitas pelanggan aktif yang terus berkembang dan menggunakan layanan kami setiap hari.
                    </p>
                </div>
            </div>

        </dl>
    </div>
</div>

    <!-- Counter Animation -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.counter').forEach(el => {
                const target = +el.dataset.target;
                let current = 0;
                const step = target / 60;

                const animate = () => {
                    current += step;
                    if (current < target) {
                        el.innerText = Math.floor(current);
                        requestAnimationFrame(animate);
                    } else {
                        el.innerText = target.toLocaleString();
                    }
                };
                animate();
            });
        });
    </script>


    <!-- Categories Section (UPGRADED) -->
    <div class="mb-14 animate-fade-in-up">
        <!-- Section Header -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-black text-gray-900">
                Jelajahi Menu Berdasarkan Kategori
            </h2>
            <p class="mt-2 text-sm sm:text-base text-gray-500 max-w-2xl">
                Kami menyediakan berbagai kategori menu pilihan yang dirancang khusus untuk
                memudahkan kamu menemukan makanan favorit. Dari menu pedas khas Gacoan,
                minuman segar, hingga camilan yang cocok dinikmati kapan saja — semua tersedia
                dalam satu tempat dengan kualitas terbaik.
            </p>
        </div>

        <!-- Categories List -->
        <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-hide">
            @foreach ($categories as $index => $category)
                <a href="{{ route('user.menu.index', ['category' => $category->id]) }}"
                    class="group flex-shrink-0 w-64 bg-white border border-gray-200 hover:border-gray-900 transition-all duration-300"
                    style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="p-5 flex gap-4">
                        <!-- Icon -->
                        <div
                            class="w-14 h-14 flex items-center justify-center bg-gradient-to-br {{ $category->gradient_class ?? 'from-gray-400 to-gray-500' }} shadow-md group-hover:scale-110 transition-transform">
                            <i data-lucide="{{ $category->icon ?? 'layers' }}" class="w-7 h-7 text-white"></i>
                        </div>

                        <!-- Text -->
                        <div class="flex-1">
                            <h3 class="text-base font-black text-gray-900 mb-1 group-hover:text-red-600 transition-colors">
                                {{ $category->nama }}
                            </h3>
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-3">
                                Temukan berbagai pilihan menu {{ strtolower($category->nama) }} dengan
                                cita rasa khas Gacoan yang selalu dibuat dari bahan berkualitas,
                                siap memanjakan lidah kamu kapan pun.
                            </p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="px-5 py-3 border-t border-gray-100 text-xs font-bold text-gray-600 group-hover:text-gray-900 transition">
                        Lihat semua menu →
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Promo Banner (UPGRADED & STORY) -->
    <div
        class="relative mb-16 overflow-hidden border border-purple-200 bg-gradient-to-r from-purple-600 to-pink-600 animate-fade-in-up">
        <div class="relative z-10 px-8 py-10 sm:py-14 text-white grid grid-cols-1 sm:grid-cols-2 gap-8 items-center">
            <!-- Left Content -->
            <div>
                <span class="inline-block mb-3 text-xs font-black tracking-widest bg-white/20 px-3 py-1">
                    PROMO TERBATAS
                </span>

                <h3 class="text-2xl sm:text-3xl font-black leading-tight mb-4">
                    Nikmati Pengalaman Makan Lebih Hemat & Menyenangkan
                </h3>

                <p class="text-sm sm:text-base text-white/90 leading-relaxed max-w-xl">
                    Dapatkan potongan harga spesial hingga <span class="font-black">30%</span> untuk
                    berbagai menu favorit pilihan pelanggan. Promo ini dirancang untuk memberikan
                    pengalaman kuliner terbaik tanpa perlu khawatir soal harga.
                    Gunakan kode promo <span class="font-black">GACOAN30</span> sebelum periode
                    berakhir dan rasakan sensasi makan enak dengan harga lebih bersahabat.
                </p>
            </div>

            <!-- Right Action -->
            <div class="flex sm:justify-end">
                <a href="{{ route('pesanan') }}"
                    class="inline-flex items-center gap-3 bg-white text-purple-700 px-8 py-4 text-sm font-black hover:bg-gray-100 transition-all hover:scale-105">
                    Gunakan Promo Sekarang
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>

        <!-- Decorative Blur -->
        <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/20 blur-3xl"></div>
    </div>


    <!-- Menu Section -->
    <div class="mb-10 animate-fade-in-up">
        <div class="">
            <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="animate-slide-in-left">
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black tracking-tight text-gray-900">
                            Menu Populer
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">
                            Pilihan favorit pelanggan kami
                        </p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                        <a href="{{ route('pesanan') }}"
                            class="group/btn inline-flex items-center gap-3 border-2 border-gray-900 text-gray-900 px-6 py-2.5 rounded-full font-bold hover:bg-gray-900 hover:text-white transition-all duration-300 text-sm active:scale-95 shadow-sm">
                            Lihat Menu Lain nyh
                            <i data-lucide="arrow-right"
                                class="w-4 h-4 transition-transform group-hover/btn:translate-x-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Menu Grid (EXTRA WIDE HORIZONTAL) -->
                <div class="grid grid-cols-1 gap-8">
                    @foreach ($popular_menus as $index => $menu)
                        <div class="group animate-scale-in flex flex-col md:flex-row w-full overflow-hidden border border-slate-200 hover:border-slate-900 transition-all duration-300"
                            style="animation-delay: {{ $index * 0.1 }}s">

                            <!-- CONTENT (KIRI - KECIL) -->
                            <div class="w-full md:w-[28%] p-6 flex flex-col justify-between bg-white">
                                <div>
                                    <h3
                                        class="text-2xl font-black text-slate-900 mb-3 group-hover:text-red-600 transition-colors line-clamp-2">
                                        {{ $menu->nama }}
                                    </h3>

                                    <p class="text-sm text-slate-500 mb-4 line-clamp-3">
                                        {{ $menu->deskripsi ?? 'Menu favorit dengan cita rasa khas Gacoan' }}
                                    </p>

                                    @if ($menu->category)
                                        <span
                                            class="inline-flex items-center gap-1 px-3 py-1 bg-slate-100 text-xs text-slate-600 mb-4">
                                            <i data-lucide="tag" class="w-3 h-3"></i>
                                            {{ $menu->category->nama }}
                                        </span>
                                    @endif
                                </div>

                                <!-- PRICE -->
                                <div class="mt-4">
                                    @if (isset($menu->harga_promo) && $menu->harga_promo > 0 && $menu->harga_promo < $menu->harga)
                                        <span class="block text-xs text-slate-400 line-through">
                                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                        </span>
                                        <span class="text-3xl font-black text-red-600">
                                            Rp {{ number_format($menu->harga_promo, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span class="text-3xl font-black text-slate-900">
                                            Rp {{ number_format($menu->harga_final, 0, ',', '.') }}
                                        </span>
                                    @endif
                                </div>

                                <!-- ACTION -->
                                <div class="flex gap-3 mt-5">
                                    <a href="{{ route('user.menu.show', $menu->id) }}"
                                        class="flex-1 py-3 text-center text-xs font-black bg-slate-900 text-white hover:scale-105 transition">
                                        DETAIL
                                    </a>

                                    <form action="{{ route('pesanan.add', $menu->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit"
                                            class="w-full py-3 border-2 border-slate-900 text-slate-900 font-black hover:bg-slate-900 hover:text-white transition">
                                            + KERANJANG
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- IMAGE (KANAN - DOMINAN) -->
                            <div class="relative w-full md:w-[72%] h-72 md:h-auto bg-slate-100 overflow-hidden">
                                @if ($menu->gambar)
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}"
                                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i data-lucide="utensils" class="w-20 h-20 text-slate-300"></i>
                                    </div>
                                @endif

                                <!-- PROMO -->
                                @if (isset($menu->promo_aktif) && $menu->promo_aktif)
                                    <div class="absolute top-6 left-6 px-4 py-1 bg-red-600 text-white text-xs font-black">
                                        PROMO
                                    </div>
                                @endif

                                <!-- RATING -->
                                <div
                                    class="absolute top-6 right-6 px-3 py-1 bg-white text-xs font-black flex items-center gap-1 shadow">
                                    <i data-lucide="star" class="w-3 h-3 text-yellow-500 fill-yellow-500"></i>
                                    {{ $menu->rating ?? '4.8' }}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>


                {{-- <!-- Mobile "Lihat Semua" Button -->
                <div class="mt-8 sm:hidden">
                    <a href="{{ route('user.menu.index') }}"
                        class="flex items-center justify-center gap-2 w-full bg-red-600 text-white py-3.5 rounded-xl font-black hover:bg-red-700 transition-all uppercase tracking-wider hover:scale-105 transform">
                        Lihat Semua Menu
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Team / About Section -->
    <div class="bg-white animate-fade-in">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- Image Section -->
                <div class="relative h-96 lg:h-auto overflow-hidden">
                    <img src="{{ asset('img/gacoan/gacoan-24-jam-surabaya1.webp') }}"
                        alt="Team Gacoan"
                        class="absolute inset-0 h-full w-full object-cover
                           transition-transform duration-700 hover:scale-105" />
                </div>

                <!-- Content Section -->
                <div class="px-6 py-20 sm:px-12 lg:px-16 lg:py-28">
                    <div class="mx-auto max-w-xl lg:mx-0">

                        <!-- Header -->
                        <p class="text-sm font-semibold uppercase tracking-widest text-orange-600 animate-fade-in-up">
                            Pencapaian Gacoan
                        </p>

                        <h2 class="mt-3 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900 animate-fade-in-up"
                            style="animation-delay: 0.1s">
                            Dipercaya ribuan pelanggan di seluruh Indonesia
                        </h2>

                        <p class="mt-6 text-base leading-7 text-gray-600 animate-fade-in-up"
                            style="animation-delay: 0.2s">
                            Gacoan telah menjadi pilihan utama untuk menikmati kuliner pedas berkualitas.
                            Dengan fokus pada kualitas, kecepatan layanan, dan kepuasan pelanggan,
                            kami terus berkembang dan melayani dengan sepenuh hati.
                        </p>

                        <!-- Stats Grid -->
                        <dl class="mt-12 grid grid-cols-2 gap-8">

                            <div class="flex flex-col gap-y-2 animate-fade-in-up" style="animation-delay: 0.3s">
                                <dt class="text-sm text-gray-500">Pelanggan Setia</dt>
                                <dd class="text-3xl font-bold text-gray-900">8.000+</dd>
                            </div>

                            <div class="flex flex-col gap-y-2 animate-fade-in-up" style="animation-delay: 0.4s">
                                <dt class="text-sm text-gray-500">Tingkat Kepuasan</dt>
                                <dd class="text-3xl font-bold text-gray-900">98%</dd>
                            </div>

                            <div class="flex flex-col gap-y-2 animate-fade-in-up" style="animation-delay: 0.5s">
                                <dt class="text-sm text-gray-500">Rata-rata Pengiriman</dt>
                                <dd class="text-3xl font-bold text-gray-900">25 Menit</dd>
                            </div>

                            <div class="flex flex-col gap-y-2 animate-fade-in-up" style="animation-delay: 0.6s">
                                <dt class="text-sm text-gray-500">Pesanan Terkirim</dt>
                                <dd class="text-3xl font-bold text-gray-900">100K+</dd>
                            </div>

                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();

            // Intersection Observer untuk animasi saat scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-visible');
                    }
                });
            }, observerOptions);

            // Observe semua elemen dengan class animate-
            document.querySelectorAll('[class*="animate-"]').forEach(el => {
                observer.observe(el);
            });

            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            const speed = 200;

            const animateCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText.replace(/,/g, '');
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment).toLocaleString();
                    setTimeout(() => animateCounter(counter), 1);
                } else {
                    counter.innerText = target.toLocaleString() + '+';
                }
            };

            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });

            // Hover effects untuk feature items
            document.querySelectorAll('.feature-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(10px)';
                    this.style.transition = 'transform 0.3s ease';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });

            // Hover effects untuk stat cards
            document.querySelectorAll('.stat-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                    this.style.transition = 'transform 0.3s ease';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        /* Fade In Up Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }

        /* Slide In Left Animation */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        /* Slide In Right Animation */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        /* Scale In Animation */
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-scale-in {
            animation: scaleIn 0.6s ease-out forwards;
            opacity: 0;
        }

        /* Float Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Bounce Slow Animation */
        @keyframes bounceSlow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .animate-bounce-slow {
            animation: bounceSlow 2s ease-in-out infinite;
        }

        /* Pulse Slow Animation */
        @keyframes pulseSlow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse-slow {
            animation: pulseSlow 4s ease-in-out infinite;
        }

        /* Ken Burns Effect */
        @keyframes kenBurns {
            0% {
                transform: scale(1) translate(0, 0);
            }

            100% {
                transform: scale(1.1) translate(10px, 10px);
            }
        }

        .animate-ken-burns {
            animation: kenBurns 20s ease-in-out infinite alternate;
        }

        /* Visible class untuk intersection observer */
        .animate-visible {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* Smooth transitions */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Category item hover effect */
        .category-item:hover {
            transform: translateY(-5px);
        }

        /* Menu card hover effect */
        .menu-card {
            transition: all 0.3s ease;
        }

        .menu-card:hover {
            transform: translateY(-5px);
        }
    </style>
@endpush
