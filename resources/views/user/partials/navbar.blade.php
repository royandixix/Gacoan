<nav class="bg-white/90 backdrop-blur-xl border-b border-gray-100 sticky top-[64px] sm:top-[72px] z-40">
    <div class="container mx-auto px-4 sm:px-8 relative">
        {{-- DESKTOP --}}
        <ul class="hidden lg:flex items-center justify-center py-3 gap-3">
            @php
                $navItems = [
                    ['route' => 'beranda', 'icon' => 'home', 'label' => 'Beranda'],
                    ['route' => 'pesanan', 'icon' => 'shopping-bag', 'label' => 'Pesanan'],
                    ['route' => 'keranjang.index', 'icon' => 'shopping-cart', 'label' => 'Keranjang'],
                    ['route' => 'riwayat', 'icon' => 'clock', 'label' => 'Riwayat']
                ];
            @endphp
            @foreach($navItems as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <li>
                    <a href="{{ route($item['route']) }}" class="flex items-center gap-2 px-6 py-2.5 rounded-xl font-bold text-sm transition-all 
                        {{ $isActive ? 'bg-gacoan-600 text-white shadow-lg' : 'text-gray-500 hover:bg-gacoan-50' }}">
                        <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i> {{ $item['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- MOBILE DROPDOWN --}}
        <div id="mobile-menu" class="lg:hidden absolute top-full left-0 right-0 bg-white shadow-2xl border-t border-gray-100 overflow-hidden menu-transition max-h-0 opacity-0">
            <div class="p-5 space-y-3">
                @foreach($navItems as $item)
                    @php $isActive = request()->routeIs($item['route']); @endphp
                    <a href="{{ route($item['route']) }}" class="flex items-center justify-between p-4 rounded-2xl border 
                        {{ $isActive ? 'bg-gacoan-50 border-gacoan-200 text-gacoan-700' : 'bg-gray-50 border-transparent text-gray-600' }}">
                        <div class="flex items-center gap-4 font-bold">
                            <i data-lucide="{{ $item['icon'] }}"></i> {{ $item['label'] }}
                        </div>
                        <i data-lucide="chevron-right" class="opacity-20"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>