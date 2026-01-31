<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Gacoan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind & Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Notyf -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { gacoan: { 500: '#ef4444', 600: '#dc2626', 700: '#b91c1c' } },
                    keyframes: {
                        fadeInUp: { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } }
                    },
                    animation: { 'fade-in-up': 'fadeInUp 0.6s ease-out forwards' }
                }
            }
        }
    </script>

    <style>
        body { overscroll-behavior: none; }
    </style>
</head>

<body class="font-sans bg-gray-900">

<div class="relative min-h-screen flex items-center justify-center overflow-hidden">

    <!-- Background Image -->
    <img src="{{ asset('img/gacoan/fef6d811424c5ace2b02e0b2095d9d4a.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="Gacoan Background">

    <!-- Overlay Blur & Gradient -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Login Form Card -->
    <div class="relative z-10 w-full max-w-md p-8 animate-fade-in-up">

        <!-- Brand Header -->
        <div class="text-center mb-8">
            <h1 class="text-5xl font-extrabold text-white tracking-tight flex items-center justify-center gap-2">
                Gacoan
            </h1>
            <p class="text-white/80 mt-2 text-sm sm:text-base max-w-xs mx-auto">
                Masuk untuk memulai pengalaman kuliner pedas terbaik di Indonesia.
            </p>
        </div>

        <!-- Glassmorphism Form -->
        <div class="bg-white/20 backdrop-blur-3xl rounded-3xl shadow-lg p-8 space-y-5 border border-white/20">

            <h2 class="text-2xl font-black text-white text-center mb-2">Login Akun</h2>
            <p class="text-sm text-white/70 text-center mb-4">Silakan masukkan username dan password Anda.</p>

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Username -->
                <div class="relative">
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <span class="absolute left-3 top-3 text-white/70">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Password -->
                <div class="relative">
                    <input type="password" name="password" id="password" placeholder="••••••••"
                           class="w-full pl-10 pr-10 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-3.5 text-white/70 hover:text-gacoan-500">
                        <i id="eye-icon" data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3.5 rounded-xl bg-gacoan-600 text-white font-extrabold hover:bg-gacoan-700 transition transform hover:scale-[1.03] active:scale-[0.97] tracking-wide">
                    MASUK SEKARANG
                </button>

                <p class="text-sm text-white/70 text-center mt-3">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-gacoan-500 font-bold hover:underline">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();

    const notyf = new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } });

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            notyf.error(@json($error));
        @endforeach
    @endif

    @if (session('success'))
        notyf.success(@json(session('success')));
    @endif

    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('data-lucide', 'eye-off');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('data-lucide', 'eye');
        }
        lucide.createIcons();
    }
</script>

</body>
</html>
