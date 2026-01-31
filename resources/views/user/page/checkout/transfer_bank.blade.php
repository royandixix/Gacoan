@extends('user.layouts.app')

@section('title', 'Pembayaran Transfer Bank')

@section('content')
<style>
    /* Animasi Dasar */
    .fade-up-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }

    .fade-up-element.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Delay bertahap agar muncul satu per satu */
    .delay-1 { transition-delay: 0.1s; }
    .delay-2 { transition-delay: 0.3s; }
    .delay-3 { transition-delay: 0.5s; }
    .delay-4 { transition-delay: 0.7s; }
</style>

<div class="max-w-5xl mx-auto px-4 py-12">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        {{-- SISI KIRI: Form & Instruksi (8 Col) --}}
        <div class="lg:col-span-7 space-y-8">
            <div class="fade-up-element delay-1">
                <a href="/" class="text-sm text-gray-500 hover:text-black transition flex items-center gap-2 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Kembali ke Beranda
                </a>
                <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-2">Konfirmasi Pembayaran</h1>
                <p class="text-gray-500">Selesaikan pesananmu dengan mengunggah bukti transfer bank di bawah ini.</p>
            </div>

            {{-- Detail Rekening (Gaya Kartu Modern) --}}
            <div class="fade-up-element delay-2 bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <span class="text-gray-400 text-xs uppercase tracking-widest font-semibold">Bank Tujuan</span>
                    <div class="flex justify-between items-center mt-2">
                        <h2 class="text-2xl font-bold">Bank ABC</h2>
                        <span class="bg-white/20 px-3 py-1 rounded-full text-xs italic">Virtual Account</span>
                    </div>
                    
                    <div class="mt-8">
                        <p class="text-gray-400 text-xs">Nomor Rekening</p>
                        <div class="flex items-center gap-3">
                            <span id="accountNumber" class="text-2xl font-mono tracking-wider">1234 5678 90</span>
                            <button onclick="copyToClipboard('1234567890')" id="copyBtn" class="text-xs bg-white/10 hover:bg-white/20 p-2 rounded-lg transition active:scale-90">
                                Salin
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between items-end">
                        <div>
                            <p class="text-gray-400 text-xs">Atas Nama</p>
                            <p class="font-semibold uppercase">Mie Gacoan Official</p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-400 text-xs">Total Tagihan</p>
                            <p class="text-2xl font-black text-yellow-400">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/5 rounded-full"></div>
            </div>

            {{-- Form Upload --}}
            <form action="{{ route('checkout.upload_transfer', $order->id) }}" method="POST" enctype="multipart/form-data" class="fade-up-element delay-3 space-y-6">
                @csrf
                <div class="group relative border-2 border-dashed border-gray-300 rounded-2xl p-10 text-center hover:border-black transition-all bg-gray-50/50 focus-within:ring-2 focus-within:ring-black">
                    <input type="file" name="bukti_transfer" id="bukti_transfer" accept="image/*" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    <div class="space-y-2" id="dropzone-text">
                        <div class="w-12 h-12 bg-white shadow-sm border rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        </div>
                        <p class="font-bold text-gray-900">Klik atau seret file bukti transfer</p>
                        <p class="text-sm text-gray-500" id="file-name">Format: JPG, PNG, atau PDF (Maks. 2MB)</p>
                    </div>
                </div>

                <button type="submit" class="w-full bg-black text-white py-5 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition-all active:scale-95 flex items-center justify-center gap-2">
                    Kirim Konfirmasi Sekarang
                </button>
            </form>
        </div>

        {{-- SISI KANAN: Panduan (5 Col) --}}
        <div class="fade-up-element delay-4 lg:col-span-5 bg-gray-50 rounded-3xl p-8 border border-gray-100">
            <h3 class="font-bold text-lg mb-6">Cara Pembayaran</h3>
            <ul class="space-y-6">
                <li class="flex gap-4">
                    <span class="flex-shrink-0 w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
                    <p class="text-gray-600 text-sm leading-relaxed">Pilih menu <span class="font-bold text-black">Transfer</span> pada ATM atau M-Banking Anda.</p>
                </li>
                <li class="flex gap-4">
                    <span class="flex-shrink-0 w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
                    <p class="text-gray-600 text-sm leading-relaxed">Masukkan nomor rekening <span class="font-bold text-black text-md">1234567890</span> atas nama Mie Gacoan.</p>
                </li>
                <li class="flex gap-4">
                    <span class="flex-shrink-0 w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-bold text-sm">3</span>
                    <p class="text-gray-600 text-sm leading-relaxed">Pastikan nominal transfer sesuai: <span class="font-bold text-black">Rp {{ number_format($order->total, 0, ',', '.') }}</span>.</p>
                </li>
                <li class="flex gap-4">
                    <span class="flex-shrink-0 w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-bold text-sm">4</span>
                    <p class="text-gray-600 text-sm leading-relaxed">Simpan resi/bukti transfer dan upload pada form yang disediakan.</p>
                </li>
            </ul>

            <div class="mt-10 p-4 bg-yellow-50 rounded-2xl border border-yellow-100 flex gap-3">
                <span class="text-xl animate-bounce">💡</span>
                <p class="text-xs text-yellow-800 leading-normal">
                    Verifikasi dilakukan secara manual oleh tim kami dalam waktu maksimal 1x24 jam. Mohon tunggu notifikasi selanjutnya.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Trigger animasi masuk
        const elements = document.querySelectorAll('.fade-up-element');
        elements.forEach(el => el.classList.add('show'));

        // Feedback saat input file dipilih
        const fileInput = document.getElementById('bukti_transfer');
        const fileNameDisplay = document.getElementById('file-name');
        
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                fileNameDisplay.innerText = "File terpilih: " + e.target.files[0].name;
                fileNameDisplay.classList.remove('text-gray-500');
                fileNameDisplay.classList.add('text-green-600', 'font-bold');
            }
        });
    });

    // Fungsi Copy dengan Feedback
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            const btn = document.getElementById('copyBtn');
            const originalText = btn.innerText;
            btn.innerText = 'Tersalin!';
            btn.classList.replace('bg-white/10', 'bg-green-500');
            
            setTimeout(() => {
                btn.innerText = originalText;
                btn.classList.replace('bg-green-500', 'bg-white/10');
            }, 2000);
        });
    }
</script>
@endsection