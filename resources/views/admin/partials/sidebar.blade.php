{{-- OVERLAY (MOBILE) --}}
<div
    id="sidebar-overlay"
    class="fixed inset-0 bg-black/40 z-30 hidden lg:hidden">
</div>

<aside
    id="sidebar"
    class="fixed lg:static inset-y-0 left-0 z-40
           w-64 bg-white shadow-lg
           transform -translate-x-full lg:translate-x-0
           transition-transform duration-300 ease-in-out
           min-h-screen">

    {{-- BRAND --}}
    <div class="px-6 py-5 border-b">
        <h2 class="text-xl font-bold text-gacoan-700 tracking-wide">
            Admin Panel
        </h2>
        <p class="text-xs text-gray-500">
            Gacoan Management
        </p>
    </div>

    {{-- MENU --}}
  <nav class="p-4 space-y-1">

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition
       {{ request()->routeIs('admin.dashboard')
            ? 'bg-gacoan-600 text-white shadow'
            : 'text-gray-700 hover:bg-gray-100' }}">
        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.menu.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition
       {{ request()->routeIs('admin.menu.*')
            ? 'bg-gacoan-600 text-white shadow'
            : 'text-gray-700 hover:bg-gray-100' }}">
        <i data-lucide="book-open" class="w-5 h-5"></i>
        <span>Menu</span>
    </a>

    <a href="{{ route('admin.pesanan.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition
       {{ request()->routeIs('admin.pesanan.*')
            ? 'bg-gacoan-600 text-white shadow'
            : 'text-gray-700 hover:bg-gray-100' }}">
        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
        <span>Pesanan</span>
    </a>

</nav>

</aside>
