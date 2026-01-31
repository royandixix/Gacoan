<header class="sticky top-0 z-30 bg-[#0f172a]/80 backdrop-blur-md border-b border-slate-800 px-4 sm:px-8 py-4 flex items-center justify-between">
    <div class="flex items-center gap-4">
        {{-- Tombol Mobile --}}
        <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-400 hover:bg-slate-800 rounded-xl transition">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        
        <h2 class="text-slate-400 font-medium hidden md:block">
            Dashboard / <span class="text-white">@yield('title')</span>
        </h2>
    </div>

    <div class="flex items-center gap-6">
        <div class="text-right hidden sm:block">
            <p class="text-sm font-bold text-white tracking-wide">{{ Auth::user()->name ?? 'Administrator' }}</p>
            <p class="text-[10px] text-gacoan-500 uppercase font-extrabold tracking-widest text-right">Super Admin</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="flex items-center gap-2 px-4 py-2 bg-slate-800 hover:bg-rose-500/10 text-rose-500 border border-rose-500/20 rounded-xl transition-all font-semibold text-sm">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</header>