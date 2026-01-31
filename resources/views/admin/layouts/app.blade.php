<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Gacoan')</title>

    {{-- Tailwind & Fonts --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    
    {{-- Icons & JS --}}
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        gacoan: {
                            500: '#ef4444',
                            600: '#dc2626',
                            700: '#b91c1c',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    </style>
    @stack('css')
</head>
<body class="bg-[#0f172a] font-sans antialiased h-full overflow-hidden" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen">
        {{-- 1. SIDEBAR --}}
        @include('admin.partials.sidebar')

        {{-- 2. MAIN CONTENT AREA --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            {{-- HEADER --}}
            @include('admin.partials.header')

            {{-- SCROLLABLE CONTENT --}}
            <main class="flex-1 overflow-y-auto bg-[#0f172a]">
                <div class="p-4 md:p-8">
                    @yield('content')
                </div>
                
                {{-- FOOTER --}}
                @include('admin.partials.footer')
            </main>
        </div>
    </div>

    {{-- Notifikasi Toast --}}
    <div class="fixed bottom-5 right-5 z-[100] space-y-3">
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" x-transition
             class="bg-emerald-500 text-white px-6 py-3 rounded-2xl shadow-2xl flex items-center gap-3 border border-emerald-400/20">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-bold text-sm tracking-wide">{{ session('success') }}</span>
        </div>
        @endif
    </div>

    <script>
        lucide.createIcons();
    </script>
    @stack('js')
</body>
</html>