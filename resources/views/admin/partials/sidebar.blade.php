{{-- Overlay Mobile --}}
<div x-show="sidebarOpen" 
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false" 
     class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-40 lg:hidden" x-cloak></div>

{{-- Aside --}}
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 w-72 bg-[#0f172a] border-r border-slate-800 transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 flex flex-col">
    
    <div class="h-20 flex items-center justify-between px-8 border-b border-slate-800 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gacoan-600 rounded-xl flex items-center justify-center shadow-lg shadow-gacoan-600/30">
                <i data-lucide="flame" class="text-white w-6 h-6"></i>
            </div>
            <span class="text-xl font-black text-white tracking-tighter">GACOAN <span class="text-gacoan-500 uppercase">Admin</span></span>
        </div>
        {{-- Close button mobile --}}
        <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 p-1 hover:bg-slate-800 rounded-lg">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto p-6 space-y-1.5">
        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-4">Menu Utama</p>

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all group
           {{ request()->routeIs('admin.dashboard') ? 'bg-gacoan-600 text-white shadow-xl shadow-gacoan-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="layout-grid" class="w-5 h-5"></i>
            <span class="font-semibold text-sm">Dashboard</span>
        </a>

        <a href="{{ route('admin.menu.index') }}"
           class="flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all group
           {{ request()->routeIs('admin.menu.*') ? 'bg-gacoan-600 text-white shadow-xl shadow-gacoan-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="utensils" class="w-5 h-5"></i>
            <span class="font-semibold text-sm">Manajemen Menu</span>
        </a>

        <a href="{{ route('admin.pesanan.index') }}"
           class="flex items-center gap-4 px-4 py-3.5 rounded-2xl transition-all group
           {{ request()->routeIs('admin.pesanan.*') ? 'bg-gacoan-600 text-white shadow-xl shadow-gacoan-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
            <i data-lucide="shopping-bag" class="w-5 h-5"></i>
            <span class="font-semibold text-sm">Pesanan</span>
        </a>
    </nav>
</aside>