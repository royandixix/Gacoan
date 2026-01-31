<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gacoan')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        gacoan: { 50: '#fef2f2', 100: '#fee2e2', 500: '#ef4444', 600: '#dc2626', 700: '#b91c1c' }
                    }
                }
            }
        }
    </script>

    <style>
        .notyf { z-index: 10000 !important; }
        [x-cloak] { display: none !important; }

        /* ANIMASI MENU */
        .menu-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0; visibility: hidden; pointer-events: none;
        }
        #profile-dropdown.menu-transition { transform: scale(0.95) translateY(-10px); transform-origin: top right; }
        #mobile-menu.menu-transition { transform: translateY(-10px); transform-origin: top; }
        
        /* CLASS AKTIF */
        .menu-active { 
            opacity: 1 !important; 
            visibility: visible !important; 
            pointer-events: auto !important; 
            transform: scale(1) translateY(0) !important; 
        }
    </style>
</head>

<body class="bg-gray-50 font-sans text-gray-800 antialiased">

    @include('user.partials.header')
    @include('user.partials.navbar')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 py-6 min-h-screen">
        @yield('content')
    </main>

    @include('user.partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();

            // 1. NOTYF
            const notyf = new Notyf({
                duration: 4000,
                position: { x: 'right', y: 'top' },
                dismissible: true,
                types: [
                    { type: 'success', background: '#10b981' },
                    { type: 'error', background: '#ef4444' }
                ]
            });
            @if(session('success')) notyf.success(@json(session('success'))); @endif
            @if($errors->any()) @foreach($errors->all() as $error) notyf.error(@json($error)); @endforeach @endif

            // 2. ELEMENT SELECTOR
            const profileBtn = document.getElementById('profile-btn');
            const profileDropdown = document.getElementById('profile-dropdown');
            const profileChevron = document.getElementById('profile-chevron');
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const bars = [document.getElementById('bar-1'), document.getElementById('bar-2'), document.getElementById('bar-3')];

            // 3. FUNGSI CLOSE SEMUA
            const closeMenus = () => {
                profileDropdown?.classList.remove('menu-active');
                profileChevron?.classList.remove('rotate-180');
                mobileMenu?.classList.remove('menu-active');
                mobileMenu?.classList.add('max-h-0', 'opacity-0');
                
                if(bars[0]) {
                    bars[0].classList.remove('rotate-45', 'translate-y-2');
                    bars[1]?.classList.remove('opacity-0');
                    bars[2]?.classList.remove('-rotate-45', '-translate-y-2');
                }
                document.body.style.overflow = '';
            };

            // 4. EVENT PROFILE
            profileBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = profileDropdown.classList.contains('menu-active');
                closeMenus();
                if (!isOpen) {
                    profileDropdown.classList.add('menu-active');
                    profileChevron?.classList.add('rotate-180');
                }
            });

            // 5. EVENT HAMBURGER
            hamburgerBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = mobileMenu.classList.contains('menu-active');
                closeMenus();
                if (!isOpen) {
                    mobileMenu.classList.add('menu-active');
                    mobileMenu.classList.remove('max-h-0', 'opacity-0');
                    if(bars[0]) {
                        bars[0].classList.add('rotate-45', 'translate-y-2');
                        bars[1]?.classList.add('opacity-0');
                        bars[2]?.classList.add('-rotate-45', '-translate-y-2');
                    }
                }
            });

            // 6. CLICK OUTSIDE
            document.addEventListener('click', (e) => {
                if (!profileDropdown?.contains(e.target) && !profileBtn?.contains(e.target)) {
                    profileDropdown?.classList.remove('menu-active');
                    profileChevron?.classList.remove('rotate-180');
                }
                if (!mobileMenu?.contains(e.target) && !hamburgerBtn?.contains(e.target)) {
                    closeMenus();
                }
            });
        });
    </script>
    @stack('js')
</body>
</html>