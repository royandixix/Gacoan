<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Gacoan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Notyf -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        gacoan: { 500: '#ef4444', 600: '#dc2626', 700: '#b91c1c' }
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out forwards'
                    }
                }
            }
        }
    </script>

    <style>
        /* Scrollbar hide for mobile */
        ::-webkit-scrollbar { display: none; }
        body { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-900">

<div class="relative min-h-screen flex items-center justify-center overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <img src="{{ asset('img/gacoan/fef6d811424c5ace2b02e0b2095d9d4a.jpg') }}"
         class="absolute inset-0 w-full h-full object-cover scale-105"
         alt="Gacoan Background">

    <!-- OVERLAY GRADIENT & GLASS -->
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- FORM CONTAINER -->
    <div class="relative z-10 w-full max-w-md p-6 sm:p-10 animate-fade-in-up">
        
        <!-- Brand Header -->
        <div class="text-center mb-8">
            <h1 class="text-5xl font-extrabold text-white tracking-tight flex items-center justify-center gap-2">
                GACOAN
            </h1>
            <p class="text-white/80 mt-2 text-sm sm:text-base max-w-xs mx-auto">
                Daftar sekarang dan rasakan sensasi pedas yang bikin ketagihan! Mudah, cepat, dan aman.
            </p>
        </div>

        <!-- GLASS FORM CARD -->
        <div class="bg-white/20 backdrop-blur-3xl rounded-3xl shadow-lg p-8 space-y-5 border border-white/20">
            
            <h2 class="text-2xl font-black text-white mb-2 text-center">Buat Akun Baru</h2>
            <p class="text-sm text-white/70 text-center mb-4">Isi data di bawah ini untuk memulai pengalaman kuliner terbaik.</p>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Name -->
                <div class="relative">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <span class="absolute left-3 top-3 text-white/70">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Email -->
                <div class="relative">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <span class="absolute left-3 top-3 text-white/70">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Role -->
                <div class="relative">
                    <select name="role"
                            class="w-full pl-3 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                        <option value="">-- Pilih Role --</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="relative">
                    <input type="password" name="password" placeholder="Password"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <span class="absolute left-3 top-3 text-white/70">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Confirm Password -->
                <div class="relative">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-white/40 bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-gacoan-500 transition">
                    <span class="absolute left-3 top-3 text-white/70">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </span>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full py-3.5 rounded-xl bg-gacoan-600 text-white font-extrabold hover:bg-gacoan-700 transition transform hover:scale-[1.03] active:scale-[0.97] tracking-wide">
                    DAFTAR & MULAI PESAN
                </button>

                <p class="text-sm text-white/70 text-center mt-3">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-gacoan-500 font-bold hover:underline">Login di sini</a>
                </p>

            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        lucide.createIcons();

        const notyf = new Notyf({
            duration: 3000,
            position: { x: 'right', y: 'top' }
        });

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                notyf.error(@json($error));
            @endforeach
        @endif

        @if (session('success'))
            notyf.success(@json(session('success')));
        @endif
    });
</script>
</body>
</html>
