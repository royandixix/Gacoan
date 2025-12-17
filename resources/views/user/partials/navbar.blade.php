{{-- NAVBAR --}}
<nav class="bg-white shadow-md sticky top-[88px] z-40">
    <div class="container mx-auto px-4 sm:px-6">

        {{-- DESKTOP MENU --}}
        <ul class="hidden lg:flex items-center py-1">

            {{-- MENU TENGAH --}}
            <div class="flex flex-1 justify-center gap-1">

                <li>
                    <a href="{{ route('beranda') }}"
                       class="flex items-center gap-2 px-4 py-3 rounded-lg
                              {{ request()->routeIs('beranda') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="home" class="w-4 h-4"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pesanan') }}"
                       class="flex items-center gap-2 px-4 py-3 rounded-lg
                              {{ request()->routeIs('pesanan') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                        <span>Pesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat') }}"
                       class="flex items-center gap-2 px-4 py-3 rounded-lg
                              {{ request()->routeIs('riwayat') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                        <span>Riwayat</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}"
                       class="flex items-center gap-2 px-4 py-3 rounded-lg
                              {{ request()->routeIs('profile') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="user-circle" class="w-4 h-4"></i>
                        <span>Profile</span>
                    </a>
                </li>

            </div>

            

        </ul>

        {{-- MOBILE MENU --}}
        <div id="mobile-menu" class="lg:hidden hidden py-4">
            
            {{-- USER INFO MOBILE --}}
            <div class="flex items-center gap-3 px-4 py-3 mb-4 bg-gacoan-50 rounded-lg">
                <div class="w-12 h-12 bg-gacoan-200 rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-6 h-6 text-gacoan-700"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Welcome</p>
                    <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                </div>
            </div>

            <ul class="flex flex-col gap-2">

                <li>
                    <a href="{{ route('beranda') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg
                              {{ request()->routeIs('beranda') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="home" class="w-5 h-5"></i>
                        <span>Beranda</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('pesanan') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg
                              {{ request()->routeIs('pesanan') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                        <span>Pesanan</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('riwayat') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg
                              {{ request()->routeIs('riwayat') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                        <span>Riwayat</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg
                              {{ request()->routeIs('profile') ? 'bg-gacoan-100 text-gacoan-700' : '' }}
                              hover:bg-gacoan-50 hover:text-gacoan-600
                              transition font-medium">
                        <i data-lucide="user-circle" class="w-5 h-5"></i>
                        <span>Profile</span>
                    </a>
                </li>

                {{-- LOGOUT MOBILE --}}
                <li class="border-t pt-2 mt-2">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="flex items-center gap-3 px-4 py-3
                                       text-red-600 font-semibold
                                       hover:bg-red-50 rounded-lg transition w-full">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>

    </div>
</nav>

{{-- JAVASCRIPT FOR MOBILE MENU --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburgerBtn && mobileMenu) {
        hamburgerBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');

            const icon = this.querySelector('i');
            icon.setAttribute(
                'data-lucide',
                mobileMenu.classList.contains('hidden') ? 'menu' : 'x'
            );

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    }

    document.addEventListener('click', function(event) {
        const isClickInsideMenu = mobileMenu?.contains(event.target);
        const isClickOnHamburger = hamburgerBtn?.contains(event.target);

        if (!isClickInsideMenu && !isClickOnHamburger && !mobileMenu?.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            hamburgerBtn.querySelector('i').setAttribute('data-lucide', 'menu');
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    });
});
</script>
