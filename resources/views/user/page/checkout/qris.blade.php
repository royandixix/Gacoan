@extends('user.layouts.app')

@section('title', 'Pembayaran QRIS')

@section('content')
<style>
    /* Animasi Masuk */
    .fade-in-up {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.7s ease-out;
    }

    .fade-in-up.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Efek Zoom pada QRIS */
    .qr-container:hover img {
        transform: scale(1.05);
    }
    
    .qr-container img {
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    /* Delay bertahap */
    .delay-1 { transition-delay: 0.2s; }
    .delay-2 { transition-delay: 0.4s; }
</style>

<div class="max-w-7xl mx-auto px-4 py-12">

    <div class="flex flex-col lg:flex-row gap-12 items-start lg:items-center">

        {{-- KIRI: Tulisan & Form --}}
        <div class="flex-1 space-y-8 fade-in-up delay-1" id="left-content">

            <div>
                <h1 class="text-4xl lg:text-5xl font-black tracking-tighter mb-4">Pembayaran QRIS</h1>
                <p class="text-gray-500 text-lg leading-relaxed">
                    Scan kode QR di samping dengan aplikasi pembayaran favorit Anda, lalu unggah bukti transfer di bawah ini.
                </p>
            </div>

            {{-- Notifikasi penting --}}
            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r-xl flex items-start gap-3">
                <span class="text-xl">⚠️</span>
                <p class="text-amber-900 text-sm">
                    <b>Penting:</b> Pesanan <b>tidak akan diproses</b> secara otomatis. Pastikan bukti pembayaran terunggah dengan jelas.
                </p>
            </div>

            {{-- Total Pembayaran (Gaya Modern) --}}
            <div class="bg-gray-900 text-white p-8 rounded-3xl shadow-xl relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-gray-400 text-xs uppercase tracking-widest font-bold mb-1">Total Tagihan</p>
                    <p class="text-4xl font-black text-yellow-400">
                        Rp {{ number_format($order->total, 0, ',', '.') }}
                    </p>
                </div>
                {{-- Ornamen --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 -mr-10 -mt-10 rounded-full group-hover:scale-150 transition-transform duration-700"></div>
            </div>

            {{-- Form Upload --}}
            <form action="{{ route('checkout.upload_transfer', $order->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="block font-bold text-gray-800 ml-1">
                        Unggah Bukti Pembayaran
                    </label>
                    <div class="relative group">
                        <input type="file"
                               name="bukti_transfer"
                               id="qris_upload"
                               accept="image/*"
                               required
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        <div id="dropzone" class="border-2 border-dashed border-gray-300 rounded-2xl p-6 text-center group-hover:border-black transition-colors bg-gray-50 flex flex-col items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 group-hover:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <span id="file-text" class="text-gray-500 font-medium text-sm">Pilih foto bukti pembayaran</span>
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-black text-white py-5 rounded-2xl font-bold text-lg hover:bg-gray-800 shadow-lg hover:shadow-black/20 transition-all active:scale-95">
                    Konfirmasi Pembayaran
                </button>
            </form>

            <p class="text-xs text-gray-400 text-center italic">
                *Verifikasi manual oleh Admin dilakukan dalam 1x24 jam.
            </p>

        </div>

        {{-- KANAN: Gambar QR --}}
        <div class="flex-1 flex flex-col items-center lg:items-end fade-in-up delay-2" id="right-content">
            <div class="qr-container bg-white p-6 rounded-[2.5rem] shadow-2xl border border-gray-100 relative group">
                <img src="{{ asset('storage/payment/qris.jpeg') }}"
                     alt="QRIS"
                     class="w-full max-w-sm rounded-2xl">
                
                {{-- Badge Overlay --}}
                <div class="absolute -top-4 -right-4 bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full rotate-12 shadow-lg">
                    SCAN DISINI
                </div>
            </div>
            
            <div class="mt-6 text-center lg:text-right hidden lg:block">
                <p class="text-sm font-bold text-gray-800">Mendukung Semua Pembayaran</p>
                <p class="text-xs text-gray-500">Gopay, OVO, Dana, ShopeePay, & Mobile Banking</p>
            </div>
        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Trigger Animasi Masuk
        const leftContent = document.getElementById('left-content');
        const rightContent = document.getElementById('right-content');
        
        setTimeout(() => leftContent.classList.add('show'), 100);
        setTimeout(() => rightContent.classList.add('show'), 300);

        // Preview File Name
        const fileInput = document.getElementById('qris_upload');
        const fileText = document.getElementById('file-text');
        const dropzone = document.getElementById('dropzone');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileText.innerText = "Siap kirim: " + this.files[0].name;
                dropzone.classList.replace('border-gray-300', 'border-green-500');
                dropzone.classList.add('bg-green-50');
                fileText.classList.replace('text-gray-500', 'text-green-600');
            }
        });
    });
</script>
@endsection