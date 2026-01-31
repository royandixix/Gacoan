@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-6">

        {{-- HEADER WITH ANIMATION --}}
        <div class="mb-8 animate-fade-in-down">
            <h1
                class="text-4xl font-bold text-white mb-2 bg-gradient-to-r from-white via-blue-100 to-white bg-clip-text text-transparent">
                Dashboard Admin
            </h1>
            <p class="text-slate-400">Selamat datang kembali! Berikut ringkasan hari ini.</p>
        </div>

        {{-- STAT CARDS WITH STAGGER ANIMATION --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            {{-- Card 1: Total Pesanan --}}
            <div class="stat-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-blue-500/20 relative overflow-hidden"
                style="animation-delay: 0ms">

                {{-- Glow Effect --}}
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-purple-500/0 group-hover:from-blue-500/10 group-hover:to-purple-500/10 transition-all duration-500">
                </div>

                {{-- Icon --}}
                <div class="relative flex items-start justify-between mb-4">
                    <div
                        class="p-3 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="shopping-bag" class="w-8 h-8 text-blue-400"></i>
                    </div>
                    <div class="px-3 py-1 bg-green-500/20 rounded-full">
                        <span class="text-green-400 text-xs font-semibold">+{{ $pesananHariIni }} hari ini</span>
                    </div>
                </div>

                {{-- Content --}}
                <div class="relative">
                    <p class="text-slate-400 text-sm mb-2">Total Pesanan</p>
                    <h2 class="text-5xl font-bold text-white mb-1 counter" data-target="{{ $totalPesanan }}">0</h2>
                    <div
                        class="h-1 w-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full group-hover:w-full transition-all duration-700 shadow-lg shadow-blue-500/50">
                    </div>
                </div>

                {{-- Shine Effect --}}
                <div
                    class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                </div>
            </div>

            {{-- Card 2: Menu Aktif --}}
            <div class="stat-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-green-500/50 transition-all duration-500 hover:scale-105 hover:shadow-green-500/20 relative overflow-hidden"
                style="animation-delay: 100ms">

                <div
                    class="absolute inset-0 bg-gradient-to-br from-green-500/0 to-emerald-500/0 group-hover:from-green-500/10 group-hover:to-emerald-500/10 transition-all duration-500">
                </div>

                <div class="relative flex items-start justify-between mb-4">
                    <div
                        class="p-3 bg-gradient-to-br from-green-500/20 to-green-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="utensils" class="w-8 h-8 text-green-400"></i>
                    </div>
                    <div class="px-3 py-1 bg-slate-700/50 rounded-full">
                        <span class="text-slate-400 text-xs font-semibold">Siap dijual</span>
                    </div>
                </div>

                <div class="relative">
                    <p class="text-slate-400 text-sm mb-2">Menu Aktif</p>
                    <h2 class="text-5xl font-bold text-white mb-1 counter" data-target="{{ $menuAktif }}">0</h2>
                    <div
                        class="h-1 w-0 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full group-hover:w-full transition-all duration-700 shadow-lg shadow-green-500/50">
                    </div>
                </div>

                <div
                    class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                </div>
            </div>

            {{-- Card 3: Users --}}
            <div class="stat-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-purple-500/50 transition-all duration-500 hover:scale-105 hover:shadow-purple-500/20 relative overflow-hidden"
                style="animation-delay: 200ms">

                <div
                    class="absolute inset-0 bg-gradient-to-br from-purple-500/0 to-pink-500/0 group-hover:from-purple-500/10 group-hover:to-pink-500/10 transition-all duration-500">
                </div>

                <div class="relative flex items-start justify-between mb-4">
                    <div
                        class="p-3 bg-gradient-to-br from-purple-500/20 to-purple-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="users" class="w-8 h-8 text-purple-400"></i>
                    </div>
                    <div class="px-3 py-1 bg-slate-700/50 rounded-full">
                        <span class="text-slate-400 text-xs font-semibold">Terdaftar</span>
                    </div>
                </div>

                <div class="relative">
                    <p class="text-slate-400 text-sm mb-2">Total User</p>
                    <h2 class="text-5xl font-bold text-white mb-1 counter" data-target="{{ $totalUser }}">0</h2>
                    <div
                        class="h-1 w-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full group-hover:w-full transition-all duration-700 shadow-lg shadow-purple-500/50">
                    </div>
                </div>

                <div
                    class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                </div>
            </div>

        </div>

        {{-- PESANAN TERBARU --}}
        <div
            class="bg-slate-800/50 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-700 mb-8 overflow-hidden table-container">

            {{-- Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-700 bg-slate-900/50">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-lg">
                        <i data-lucide="clock" class="w-6 h-6 text-orange-400"></i>
                    </div>
                    <h2 class="font-bold text-xl text-white">Pesanan Terbaru</h2>
                </div>
                <a href="{{ route('admin.pesanan.index') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-gacoan-600/20 to-gacoan-500/20 text-gacoan-400 rounded-xl hover:from-gacoan-600 hover:to-gacoan-500 hover:text-white transition-all duration-300 text-sm font-semibold">
                    <span>Lihat semua</span>
                    <i data-lucide="arrow-right"
                        class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px]">
                    <thead class="bg-slate-900/80">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="hash" class="w-4 h-4"></i>
                                    Kode
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                    Nama
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                                    Menu
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="dollar-sign" class="w-4 h-4"></i>
                                    Total
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-300 uppercase tracking-wider">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="activity" class="w-4 h-4"></i>
                                    Status
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse ($pesananTerbaru as $index => $order)
                            <tr class="table-row group hover:bg-slate-700/30 transition-all duration-300"
                                style="animation-delay: {{ $index * 50 }}ms">
                                <td class="px-6 py-4 text-slate-300 font-medium">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-8 h-8 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-lg flex items-center justify-center text-blue-400 font-bold text-xs">
                                            {{ $index + 1 }}
                                        </div>
                                        <span class="text-xs text-slate-400">{{ $order->kode_order }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @php
                                            $initial = strtoupper(substr($order->user->name, 0, 1));
                                            $colors = [
                                                'from-purple-500 to-pink-500',
                                                'from-blue-500 to-cyan-500',
                                                'from-green-500 to-emerald-500',
                                                'from-orange-500 to-red-500',
                                                'from-indigo-500 to-purple-500',
                                            ];
                                            $colorIndex = ord($initial) % count($colors);
                                        @endphp
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br {{ $colors[$colorIndex] }} rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                            {{ $initial }}
                                        </div>
                                        <span class="text-white font-semibold">{{ $order->user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-300">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="utensils" class="w-4 h-4 text-orange-400"></i>
                                        <span
                                            class="truncate max-w-[200px]">{{ $order->items->first()->menu->nama ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-white font-bold text-lg">Rp
                                        {{ number_format($order->total, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold {{ $order->statusColor() }}">
                                        @if (str_contains(strtolower($order->status_label), 'proses'))
                                            <i data-lucide="loader" class="w-3 h-3 animate-spin"></i>
                                        @elseif(str_contains(strtolower($order->status_label), 'selesai'))
                                            <i data-lucide="check-circle" class="w-3 h-3"></i>
                                        @else
                                            <i data-lucide="clock" class="w-3 h-3"></i>
                                        @endif
                                        {{ $order->status_label }}
                                    </span>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="p-4 bg-slate-700/50 rounded-full">
                                            <i data-lucide="inbox" class="w-12 h-12 text-slate-500"></i>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-slate-400 text-lg font-medium">Belum ada pesanan</p>
                                            <p class="text-slate-500 text-sm mt-1">Pesanan akan muncul di sini</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- AKSI CEPAT --}}
        <div>
            <h2 class="text-2xl font-bold text-white mb-6">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Card 1 --}}
                <a href="{{ route('admin.pesanan.index') }}"
                    class="action-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-orange-500/50 transition-all duration-500 hover:scale-105 hover:shadow-orange-500/20 relative overflow-hidden"
                    style="animation-delay: 0ms">

                    <div
                        class="absolute inset-0 bg-gradient-to-br from-orange-500/0 to-red-500/0 group-hover:from-orange-500/10 group-hover:to-red-500/10 transition-all duration-500">
                    </div>

                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="p-4 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i data-lucide="clipboard-list" class="w-8 h-8 text-orange-400"></i>
                            </div>
                            <i data-lucide="arrow-right"
                                class="w-6 h-6 text-slate-600 group-hover:text-orange-400 group-hover:translate-x-2 transition-all duration-300"></i>
                        </div>
                        <h3 class="font-bold text-xl text-white mb-2">Kelola Pesanan</h3>
                        <p class="text-slate-400 text-sm">
                            Proses dan update status pesanan pelanggan
                        </p>
                    </div>

                    <div
                        class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                    </div>
                </a>

                {{-- Card 2 --}}
                <a href="{{ route('admin.menu.index') }}"
                    class="action-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-green-500/50 transition-all duration-500 hover:scale-105 hover:shadow-green-500/20 relative overflow-hidden"
                    style="animation-delay: 100ms">

                    <div
                        class="absolute inset-0 bg-gradient-to-br from-green-500/0 to-emerald-500/0 group-hover:from-green-500/10 group-hover:to-emerald-500/10 transition-all duration-500">
                    </div>

                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="p-4 bg-gradient-to-br from-green-500/20 to-green-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i data-lucide="book-open" class="w-8 h-8 text-green-400"></i>
                            </div>
                            <i data-lucide="arrow-right"
                                class="w-6 h-6 text-slate-600 group-hover:text-green-400 group-hover:translate-x-2 transition-all duration-300"></i>
                        </div>
                        <h3 class="font-bold text-xl text-white mb-2">Kelola Menu</h3>
                        <p class="text-slate-400 text-sm">
                            Tambah, edit, atau nonaktifkan menu restoran
                        </p>
                    </div>

                    <div
                        class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                    </div>
                </a>

                {{-- Card 3 --}}
                <div class="action-card group bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-slate-700 hover:border-blue-500/50 transition-all duration-500 hover:scale-105 hover:shadow-blue-500/20 relative overflow-hidden cursor-pointer"
                    style="animation-delay: 200ms">

                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-purple-500/0 group-hover:from-blue-500/10 group-hover:to-purple-500/10 transition-all duration-500">
                    </div>

                    <div class="relative">
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="p-4 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-xl group-hover:scale-110 transition-transform duration-300">
                                <i data-lucide="bar-chart-3" class="w-8 h-8 text-blue-400"></i>
                            </div>
                            <i data-lucide="arrow-right"
                                class="w-6 h-6 text-slate-600 group-hover:text-blue-400 group-hover:translate-x-2 transition-all duration-300"></i>
                        </div>
                        <h3 class="font-bold text-xl text-white mb-2">Statistik</h3>
                        <p class="text-slate-400 text-sm">
                            Laporan penjualan & menu terlaris
                        </p>
                    </div>

                    <div
                        class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/5 to-transparent">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <style>
        /* Fade In Down Animation */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fadeInDown 0.6s ease-out;
        }

        /* Stat Card Stagger Animation */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .stat-card {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        /* Table Row Animation */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .table-container {
            animation: slideInUp 0.6s ease-out 0.3s forwards;
            opacity: 0;
        }

        .table-row {
            animation: fadeInLeft 0.4s ease-out forwards;
            opacity: 0;
        }

        /* Action Card Animation */
        .action-card {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
        }
    </style>

    {{-- Lucide Icons CDN --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');

            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        });
    </script>

@endsection
