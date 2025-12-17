@extends('user.layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<!-- Page Header -->
<div class="mb-8">
    <div class="flex items-center gap-3 mb-2">
        <div class="bg-gacoan-600 p-3 rounded-lg">
            <i class="fas fa-shopping-bag text-2xl text-white"></i>
        </div>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Pesanan Saya</h1>
            <p class="text-gray-600">Kelola pesanan dan lacak pengiriman</p>
        </div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="bg-white rounded-xl shadow-md p-2 mb-6">
    <div class="flex flex-wrap gap-2">
        <button class="px-6 py-3 rounded-lg font-semibold bg-gacoan-600 text-white transition">
            <i class="fas fa-list mr-2"></i>
            Semua (5)
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600 hover:bg-gray-100 transition">
            <i class="fas fa-clock mr-2"></i>
            Diproses (2)
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600 hover:bg-gray-100 transition">
            <i class="fas fa-truck mr-2"></i>
            Dikirim (1)
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600 hover:bg-gray-100 transition">
            <i class="fas fa-check-circle mr-2"></i>
            Selesai (2)
        </button>
        <button class="px-6 py-3 rounded-lg font-semibold text-gray-600 hover:bg-gray-100 transition">
            <i class="fas fa-times-circle mr-2"></i>
            Dibatalkan (0)
        </button>
    </div>
</div>

<!-- Order Cards -->
<div class="space-y-6">
    <!-- Order 1 - Sedang Dikirim -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <!-- Order Header -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4 text-white">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white/20 p-2 rounded-lg">
                        <i class="fas fa-truck text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Order #GCN-2024-001</p>
                        <p class="font-bold text-lg">Sedang Dikirim</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-90">Estimasi Tiba</p>
                    <p class="font-bold text-lg">15 Menit Lagi</p>
                </div>
            </div>
        </div>

        <!-- Order Content -->
        <div class="p-6">
            <!-- Items -->
            <div class="space-y-3 mb-4">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bowl-food text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">Mie Gacoan Level 5</h4>
                        <p class="text-sm text-gray-500">2x • Rp 18.000</p>
                    </div>
                    <p class="font-bold text-gacoan-600">Rp 36.000</p>
                </div>

                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-mug-hot text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">Es Teh Jumbo</h4>
                        <p class="text-sm text-gray-500">1x • Rp 8.000</p>
                    </div>
                    <p class="font-bold text-gacoan-600">Rp 8.000</p>
                </div>
            </div>

            <!-- Delivery Info -->
            <div class="border-t pt-4 mb-4">
                <div class="flex items-start gap-3 mb-3">
                    <i class="fas fa-map-marker-alt text-gacoan-600 mt-1"></i>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 mb-1">Alamat Pengiriman</p>
                        <p class="text-sm text-gray-600">Jl. Makmur Sejahtera No. 123, Jakarta Selatan, DKI Jakarta 12345</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <i class="fas fa-motorcycle text-gacoan-600 mt-1"></i>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800 mb-1">Kurir</p>
                        <p class="text-sm text-gray-600">Andi Pratama • 0812-3456-7890</p>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="border-t pt-4 space-y-2 mb-4">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-semibold">Rp 44.000</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Ongkir</span>
                    <span class="font-semibold">Rp 10.000</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2">
                    <span>Total</span>
                    <span class="text-gacoan-600">Rp 54.000</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-3">
                <button class="flex-1 bg-gacoan-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gacoan-700 transition flex items-center justify-center gap-2">
                    <i class="fas fa-phone"></i>
                    Hubungi Kurir
                </button>
                <button class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition flex items-center justify-center gap-2">
                    <i class="fas fa-info-circle"></i>
                    Detail Pesanan
                </button>
            </div>
        </div>
    </div>

    <!-- Order 2 - Diproses -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <!-- Order Header -->
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4 text-white">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white/20 p-2 rounded-lg">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Order #GCN-2024-002</p>
                        <p class="font-bold text-lg">Sedang Diproses</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-90">Waktu Pemesanan</p>
                    <p class="font-bold text-lg">10 Menit yang lalu</p>
                </div>
            </div>
        </div>

        <!-- Order Content -->
        <div class="p-6">
            <!-- Items -->
            <div class="space-y-3 mb-4">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-pizza-slice text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">Dimsum Spesial</h4>
                        <p class="text-sm text-gray-500">3x • Rp 15.000</p>
                    </div>
                    <p class="font-bold text-gacoan-600">Rp 45.000</p>
                </div>
            </div>

            <!-- Progress Steps -->
            <div class="border-t pt-4 mb-4">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Pesanan Diterima</p>
                            <p class="text-xs text-gray-500">15 Des 2024, 10:30</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 ml-4">
                        <div class="w-0.5 h-8 bg-gray-300"></div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center flex-shrink-0 animate-pulse">
                            <i class="fas fa-fire text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Sedang Dimasak</p>
                            <p class="text-xs text-gray-500">Proses...</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 ml-4">
                        <div class="w-0.5 h-8 bg-gray-300"></div>
                    </div>

                    <div class="flex items-center gap-3 opacity-50">
                        <div class="w-8 h-8 bg-gray-300 text-white rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-box text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Dikemas</p>
                            <p class="text-xs text-gray-500">Menunggu...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="border-t pt-4 space-y-2 mb-4">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-semibold">Rp 45.000</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Ongkir</span>
                    <span class="font-semibold">Rp 12.000</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2">
                    <span>Total</span>
                    <span class="text-gacoan-600">Rp 57.000</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-3">
                <button class="flex-1 bg-red-100 text-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-red-200 transition flex items-center justify-center gap-2">
                    <i class="fas fa-times"></i>
                    Batalkan Pesanan
                </button>
                <button class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition flex items-center justify-center gap-2">
                    <i class="fas fa-info-circle"></i>
                    Detail Pesanan
                </button>
            </div>
        </div>
    </div>

    <!-- Order 3 - Selesai -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <!-- Order Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4 text-white">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white/20 p-2 rounded-lg">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm opacity-90">Order #GCN-2024-003</p>
                        <p class="font-bold text-lg">Pesanan Selesai</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm opacity-90">Selesai pada</p>
                    <p class="font-bold text-lg">14 Des 2024</p>
                </div>
            </div>
        </div>

        <!-- Order Content -->
        <div class="p-6">
            <!-- Items -->
            <div class="space-y-3 mb-4">
                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bowl-food text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">Mie Gacoan Level 3</h4>
                        <p class="text-sm text-gray-500">1x • Rp 16.000</p>
                    </div>
                    <p class="font-bold text-gacoan-600">Rp 16.000</p>
                </div>

                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-mug-hot text-2xl text-gray-400"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-gray-800">Es Jeruk</h4>
                        <p class="text-sm text-gray-500">2x • Rp 10.000</p>
                    </div>
                    <p class="font-bold text-gacoan-600">Rp 20.000</p>
                </div>
            </div>

            <!-- Rating Section -->
            <div class="border-t pt-4 mb-4">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-3">
                        <p class="font-semibold text-gray-800">Berikan Rating</p>
                        <div class="flex gap-1">
                            <i class="fas fa-star text-2xl text-yellow-400 cursor-pointer hover:scale-110 transition"></i>
                            <i class="fas fa-star text-2xl text-yellow-400 cursor-pointer hover:scale-110 transition"></i>
                            <i class="fas fa-star text-2xl text-yellow-400 cursor-pointer hover:scale-110 transition"></i>
                            <i class="fas fa-star text-2xl text-yellow-400 cursor-pointer hover:scale-110 transition"></i>
                            <i class="fas fa-star text-2xl text-gray-300 cursor-pointer hover:scale-110 transition"></i>
                        </div>
                    </div>
                    <textarea class="w-full p-3 border border-gray-300 rounded-lg text-sm" rows="2" placeholder="Tulis review Anda..."></textarea>
                </div>
            </div>

            <!-- Total -->
            <div class="border-t pt-4 space-y-2 mb-4">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Subtotal</span>
                    <span class="font-semibold">Rp 36.000</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Ongkir</span>
                    <span class="font-semibold">Rp 8.000</span>
                </div>
                <div class="flex justify-between text-sm text-green-600">
                    <span>Diskon (GACOAN30)</span>
                    <span class="font-semibold">- Rp 10.800</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2">
                    <span>Total</span>
                    <span class="text-gacoan-600">Rp 33.200</span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-3">
                <button class="flex-1 bg-gacoan-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gacoan-700 transition flex items-center justify-center gap-2">
                    <i class="fas fa-redo"></i>
                    Pesan Lagi
                </button>
                <button class="flex-1 bg-gray-100 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition flex items-center justify-center gap-2">
                    <i class="fas fa-download"></i>
                    Unduh Invoice
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Empty State (Hidden by default, show when no orders) -->
<div class="bg-white rounded-xl shadow-md p-12 text-center hidden">
    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="fas fa-shopping-bag text-4xl text-gray-400"></i>
    </div>
    <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Pesanan</h3>
    <p class="text-gray-600 mb-6">Yuk mulai pesan menu favorit kamu!</p>
    <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 bg-gacoan-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gacoan-700 transition">
        <i class="fas fa-utensils"></i>
        Lihat Menu
    </a>
</div>

@endsection