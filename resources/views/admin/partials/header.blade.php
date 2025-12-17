<header class="bg-white shadow px-4 sm:px-6 py-4 flex items-center justify-between sticky top-0 z-40">

    {{-- LEFT --}}
    <div class="flex items-center gap-3">
        {{-- TOGGLE SIDEBAR (MOBILE) --}}
        <button
            id="sidebar-toggle"
            class="lg:hidden p-2 rounded-md hover:bg-gray-100 transition">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>

        <h1 class="text-lg sm:text-xl font-bold text-gray-800">
            Admin Dashboard
        </h1>
    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-4">
        <div class="text-right hidden sm:block">
            <p class="text-sm font-semibold text-gray-700">
                {{ Auth::user()->name ?? 'Admin' }}
            </p>
            <p class="text-xs text-gray-500">
                Administrator
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="text-red-600 font-medium hover:text-red-700 transition">
                Logout
            </button>
        </form>
    </div>

</header>
