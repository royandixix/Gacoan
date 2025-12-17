{{-- ================= HEADER ================= --}}
<header class="bg-gradient-to-r from-gacoan-700 to-gacoan-600 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 py-4">
        <div class="flex items-center justify-between">

            {{-- LOGO --}}
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <div class="bg-white/10 backdrop-blur-sm p-2 rounded-lg">
                    <i data-lucide="flame" class="w-6 h-6"></i>
                </div>
                <div>
                    <h1 class="text-xl sm:text-2xl font-extrabold tracking-wide">
                        GACOAN
                    </h1>
                    <p class="text-xs text-white/80 hidden sm:block">
                        Pedasnya bikin nagih 🔥
                    </p>
                </div>
            </a>

            {{-- HAMBURGER (MOBILE) --}}
            <button id="hamburger-btn"
                class="lg:hidden p-2 rounded-lg hover:bg-white/10 transition">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>

            {{-- USER PROFILE (DESKTOP) --}}
            @auth
            <div class="hidden lg:relative lg:flex items-center gap-3">

                {{-- USER INFO --}}
                <div class="text-right">
                    <p class="text-sm font-semibold">
                        Halo, {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-white/80">
                        Selamat datang kembali
                    </p>
                </div>

                {{-- PROFILE BUTTON --}}
                <button id="profile-btn"
                    class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </button>

                {{-- DROPDOWN --}}
                <div id="profile-dropdown"
                    class="hidden absolute right-0 top-14 w-44 bg-white text-gray-700 rounded-lg shadow-lg overflow-hidden">

                    <a href="{{ route('profile') }}"
                       class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition">
                        <i data-lucide="user-circle" class="w-4 h-4"></i>
                        <span>Profile</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-3 px-4 py-3 w-full
                                   text-red-600 hover:bg-red-50 transition">
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>

            </div>
            @endauth

        </div>
    </div>
</header>

{{-- ================= DROPDOWN SCRIPT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const profileBtn = document.getElementById('profile-btn');
    const dropdown = document.getElementById('profile-dropdown');

    if (profileBtn && dropdown) {
        profileBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    }
});
</script>
