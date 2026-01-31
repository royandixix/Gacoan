<header class="bg-gacoan-600 text-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-8 py-3 flex items-center justify-between relative z-10">
        {{-- LOGO --}}
        <a href="{{ route('beranda') }}" class="flex items-center gap-3 group">
            <div class="bg-white p-2 rounded-xl transform group-hover:-rotate-12 transition-all shadow-md">
                <i data-lucide="flame" class="w-6 h-6 text-gacoan-600"></i>
            </div>
            <div class="flex flex-col leading-none">
                <span class="text-xl sm:text-2xl font-black italic tracking-tighter uppercase">MIE GACOAN<span class="text-yellow-400">.</span></span>
            </div>
        </a>

        <div class="flex items-center gap-3">
            @auth
            <div class="hidden md:flex flex-col items-end leading-tight border-r border-white/20 pr-4 mr-1 text-right">
                <span class="text-[10px] font-bold text-yellow-400 uppercase tracking-wider">Akun Saya</span>
                <span class="text-sm font-extrabold truncate max-w-[120px]">{{ Auth::user()->name }}</span>
            </div>

            <div class="relative">
                <button id="profile-btn" type="button" class="flex items-center gap-2 p-1 pr-3 bg-white/10 hover:bg-white/20 rounded-full border border-white/20 transition-all active:scale-95">
                    <div class="w-9 h-9 bg-yellow-400 rounded-full flex items-center justify-center text-gacoan-700 shadow-md">
                        <i data-lucide="user" class="w-5 h-5"></i>
                    </div>
                    <i data-lucide="chevron-down" id="profile-chevron" class="w-4 h-4 text-white/70 transition-transform"></i>
                </button>

                {{-- DROPDOWN --}}
                <div id="profile-dropdown" class="absolute right-0 top-14 w-56 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50 overflow-hidden text-gray-800 menu-transition">
                    <a href="{{ route('profile') }}" class="flex items-center gap-3 px-5 py-3.5 text-sm font-bold hover:bg-gacoan-50 transition">
                        <i data-lucide="user-circle" class="w-4 h-4 text-blue-600"></i> Profil Akun
                    </a>
                    <hr class="border-gray-50 mx-2">
                    <form action="{{ route('logout') }}" method="POST" class="px-2 pt-1">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition text-left">
                            <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            {{-- HAMBURGER --}}
            <button id="hamburger-btn" class="lg:hidden w-10 h-10 flex flex-col items-center justify-center gap-1.5 active:scale-90 transition-all">
                <span id="bar-1" class="w-6 h-0.5 bg-white rounded-full transition-all"></span>
                <span id="bar-2" class="w-4 h-0.5 bg-yellow-400 rounded-full self-end transition-all"></span>
                <span id="bar-3" class="w-6 h-0.5 bg-white rounded-full transition-all"></span>
            </button>
        </div>
    </div>
</header>