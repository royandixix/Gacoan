<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gacoan')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Inter -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js untuk toast -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        gacoan: {
                            50: '#fef2f2',
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                        }
                    }
                }
            }
        }
    </script>

    @stack('css')
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    {{-- HEADER --}}
    @include('user.partials.header')

    {{-- NAVBAR --}}
    @include('user.partials.navbar')

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-6 min-h-screen">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('user.partials.footer')

    {{-- TOAST NOTIFIKASI --}}
    <div class="fixed top-5 right-5 space-y-2 z-50">
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
             class="bg-green-500 text-white px-4 py-3 rounded shadow-lg font-semibold">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
             class="bg-red-500 text-white px-4 py-3 rounded shadow-lg font-semibold">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- JS -->
    <script>
        // Aktifkan icon lucide
        lucide.createIcons();

        // Toggle menu mobile (navbar)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>

    @stack('js')
</body>
</html>
