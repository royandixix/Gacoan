<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        gacoan: {
                            100: '#fee2e2',
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

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    {{-- HEADER --}}
    @include('admin.partials.header')

    <div class="flex flex-1 min-h-[calc(100vh-64px)]">
        {{-- SIDEBAR --}}
        @include('admin.partials.sidebar')

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-4 sm:p-6 overflow-auto">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- FOOTER --}}
    @include('admin.partials.footer')

    {{-- TOAST --}}
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

    <script>
        lucide.createIcons();

        // Sidebar toggle mobile
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }

            toggleBtn?.addEventListener('click', openSidebar);
            overlay?.addEventListener('click', closeSidebar);
        });
    </script>

    @stack('js')
</body>

</html>
