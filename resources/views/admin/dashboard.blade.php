@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Dashboard Admin
</h1>

{{-- STAT CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-lg shadow">
        <p class="text-gray-500">Total Pesanan</p>
        <h2 class="text-3xl font-bold mt-2">120</h2>
        <p class="text-sm text-green-600 mt-1">+12 hari ini</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <p class="text-gray-500">Menu Aktif</p>
        <h2 class="text-3xl font-bold mt-2">25</h2>
        <p class="text-sm text-gray-400 mt-1">Siap dijual</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <p class="text-gray-500">User</p>
        <h2 class="text-3xl font-bold mt-2">8</h2>
        <p class="text-sm text-gray-400 mt-1">Terdaftar</p>
    </div>

</div>

{{-- PESANAN TERBARU --}}
<div class="bg-white rounded-lg shadow mb-8">
    <div class="flex items-center justify-between px-6 py-4 border-b">
        <h2 class="font-semibold text-lg">Pesanan Terbaru</h2>
        {{-- Ganti route menjadi admin.pesanan.index --}}
        <a href="{{ route('admin.pesanan.index') }}"
           class="text-sm text-gacoan-600 hover:underline">
            Lihat semua
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Nama</th>
                    <th class="px-6 py-3 text-left">Menu</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <tr>
                    <td class="px-6 py-3">1</td>
                    <td class="px-6 py-3">Gabriel</td>
                    <td class="px-6 py-3">Mie Gacoan Lv 3</td>
                    <td class="px-6 py-3 font-semibold">Rp 15.000</td>
                    <td class="px-6 py-3">
                        <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                            Diproses
                        </span>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-3">2</td>
                    <td class="px-6 py-3">Andi</td>
                    <td class="px-6 py-3">Mie Hompimpa</td>
                    <td class="px-6 py-3 font-semibold">Rp 13.000</td>
                    <td class="px-6 py-3">
                        <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                            Selesai
                        </span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

{{-- AKSI CEPAT --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Ganti route menjadi admin.pesanan.index --}}
    <a href="{{ route('admin.pesanan.index') }}"
       class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="font-semibold text-lg mb-1">Kelola Pesanan</h3>
        <p class="text-sm text-gray-500">
            Proses dan update status pesanan
        </p>
    </a>

    {{-- Ganti route menjadi admin.menu.index --}}
    <a href="{{ route('admin.menu.index') }}"
       class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h3 class="font-semibold text-lg mb-1">Kelola Menu</h3>
        <p class="text-sm text-gray-500">
            Tambah, edit, atau nonaktifkan menu
        </p>
    </a>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="font-semibold text-lg mb-1">Statistik</h3>
        <p class="text-sm text-gray-500">
            Laporan penjualan & menu terlaris
        </p>
    </div>

</div>

@endsection
