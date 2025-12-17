<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Gacoan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { gacoan: { 500: '#ef4444', 600: '#dc2626' } }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-gray-100">

<section class="min-h-screen flex">
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 sm:px-16">

        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gacoan-600 flex items-center gap-2">🌶️ GACOAN</h1>
            <p class="text-gray-500 mt-1">Pedasnya bikin nagih 🔥</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="max-w-sm w-full">
            @csrf

            <h2 class="text-2xl font-semibold mb-6">Daftar Akun</h2>

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gacoan-500 focus:outline-none"
                       required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gacoan-500 focus:outline-none"
                       required>
            </div>

            <!-- Role -->
            <div class="mb-4">
                <select name="role"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gacoan-500 focus:outline-none"
                        required>
                    <option value="">-- Pilih Role --</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gacoan-500 focus:outline-none"
                       required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-gacoan-500 focus:outline-none"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-gacoan-600 text-white py-3 rounded-lg font-semibold hover:bg-gacoan-500 transition">
                DAFTAR
            </button>

            <p class="mt-4 text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-gacoan-600 font-semibold hover:underline">Login</a>
            </p>
        </form>
    </div>

    <div class="hidden lg:block lg:w-1/2">
        <img src="{{ asset('img/gacoan/fef6d811424c5ace2b02e0b2095d9d4a.jpg') }}" alt="Gacoan"
             class="w-full h-full object-cover">
    </div>
</section>

<script>
    const notyf = new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } });

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            notyf.error('{{ $error }}');
        @endforeach
    @endif

    @if (session('success'))
        notyf.success('{{ session('success') }}');
    @endif
</script>

</body>
</html>
