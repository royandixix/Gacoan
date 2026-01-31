@extends('user.layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- ================= HEADER: USER INFO ================= --}}
    <div class="mb-10 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col md:flex-row gap-8 items-start md:items-center">
        <div class="relative shrink-0">
            <div class="w-24 h-24 md:w-40 md:h-40 rounded-2xl bg-slate-900 flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-shopping-cart text-white text-5xl md:text-7xl"></i>
            </div>
            <div class="absolute -bottom-2 -right-2 bg-green-500 text-white p-2.5 rounded-xl border-4 border-white shadow-sm">
                <i class="fa-solid fa-check text-xs"></i>
            </div>
        </div>

        <div class="flex-1">
            <div class="flex items-center gap-3 mb-2">
                <h1 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight uppercase">Keranjang Belanja</h1>
                <span class="bg-red-100 text-red-600 text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">Active</span>
            </div>
            <p class="text-slate-500 text-sm leading-relaxed max-w-2xl mb-4">
                Pesanan atas nama <b class="text-slate-900">{{ auth()->user()->name }}</b>. Review pesanan kamu sebelum melanjutkan ke pembayaran. Pastikan semua item dan jumlah sudah sesuai dengan keinginan kamu.
            </p>
            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-sm">
                <a href="{{ route('pesanan') }}" class="flex items-center gap-2 text-white font-bold bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition">
                    <i class="fa-solid fa-plus"></i> Tambah Menu
                </a>
                <span class="flex items-center gap-2 text-slate-600">
                    <i class="fa-solid fa-clock text-red-500"></i> {{ now()->format('H:i') }} WIB
                </span>
                <span class="flex items-center gap-2 text-slate-600">
                    <i class="fa-solid fa-calendar text-red-500"></i> {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>
    </div>
    {{-- ================= KERANJANG KOSONG ================= --}}
    @if(!$order || $order->items->isEmpty())
        <div class="bg-white rounded-3xl p-20 text-center border border-dashed border-slate-300">
            <i class="fa-solid fa-basket-shopping text-6xl text-slate-300 mb-6"></i>
            <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Keranjang Masih Kosong</h2>
            <p class="text-slate-400 mt-2">Silakan pilih menu favorit kamu untuk memulai pesanan</p>
            <a href="{{ route('pesanan') }}"
               class="inline-block mt-6 px-8 py-4 bg-slate-900 text-white rounded-xl font-black hover:bg-red-600 transition-all shadow-lg uppercase tracking-widest text-sm">
                Mulai Belanja Sekarang
            </a>
        </div>
    @else

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="flex flex-col lg:flex-row gap-10">
        
        {{-- LEFT SIDE: CART ITEMS LIST --}}
        <div class="flex-1">
            <div class="mb-8">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-2 h-8 bg-red-600 rounded-full"></div>
                    <h2 class="text-xl font-black text-slate-900 uppercase tracking-widest">
                        Item Pesanan
                    </h2>
                    <div class="h-[1px] flex-1 bg-slate-200/60"></div>
                    <span class="text-xs font-black text-slate-400 uppercase">{{ $order->items->count() }} Items</span>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    @foreach($order->items as $item)
                        @if(!$item->menu) @continue @endif

                        <div class="group flex flex-row gap-5 items-start bg-white border border-slate-100 rounded-3xl p-4 sm:p-6 hover:border-red-300 hover:shadow-2xl hover:shadow-red-900/5 transition-all duration-500">

                            {{-- Image: High Visibility --}}
                            <div class="relative shrink-0">
                                @if($item->menu->gambar)
                                    <img src="{{ asset('storage/'.$item->menu->gambar) }}"
                                         class="w-32 h-32 sm:w-44 sm:h-44 rounded-2xl object-cover shadow-md group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="w-32 h-32 sm:w-44 sm:h-44 bg-slate-50 rounded-2xl flex items-center justify-center border border-dashed border-slate-200 text-slate-300">
                                        <i class="fa-solid fa-bowl-hot text-4xl"></i>
                                    </div>
                                @endif
                                <div class="absolute top-2 left-2 bg-white/90 backdrop-blur px-2 py-1 rounded-lg shadow-sm">
                                    <span class="text-[10px] font-black text-red-600 uppercase">In Cart</span>
                                </div>
                            </div>

                            {{-- Info & Deep Description --}}
                            <div class="flex-1 min-w-0 flex flex-col justify-between min-h-[128px] sm:min-h-[176px]">
                                <div>
                                    <h3 class="font-black text-lg sm:text-2xl text-slate-900 group-hover:text-red-600 transition-colors uppercase leading-tight">
                                        {{ $item->menu->nama }}
                                    </h3>
                                    <p class="text-xs sm:text-sm text-slate-500 mt-2 leading-relaxed line-clamp-2">
                                        {{ $item->menu->deskripsi ?? 'Nikmati kelezatan harmoni bumbu pilihan yang meresap sempurna. Dibuat dengan bahan-bahan kualitas terbaik dan resep tradisional yang telah disempurnakan untuk memberikan pengalaman rasa yang tak terlupakan di setiap gigitan.' }}
                                    </p>
                                </div>
                                
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] text-slate-400 uppercase font-bold">Harga Satuan</span>
                                        <p class="font-black text-red-600 text-xl sm:text-2xl">
                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    
                                    {{-- QTY CONTROLS --}}
                                    <div class="flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100">
                                        <form method="POST" action="{{ route('keranjang.update', $item->id) }}" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="qty" value="{{ max(1,$item->qty-1) }}">
                                            <button class="w-10 h-10 bg-white hover:bg-red-600 text-slate-900 hover:text-white rounded-xl flex items-center justify-center transition-all active:scale-95 shadow-sm border border-slate-100">
                                                <i class="fa-solid fa-minus text-sm"></i>
                                            </button>
                                        </form>

                                        <span class="font-black text-lg w-8 text-center">{{ $item->qty }}</span>

                                        <form method="POST" action="{{ route('keranjang.update', $item->id) }}" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="qty" value="{{ $item->qty+1 }}">
                                            <button class="w-10 h-10 bg-white hover:bg-red-600 text-slate-900 hover:text-white rounded-xl flex items-center justify-center transition-all active:scale-95 shadow-sm border border-slate-100">
                                                <i class="fa-solid fa-plus text-sm"></i>
                                            </button>
                                        </form>
                                    </div>

                                    {{-- DELETE BUTTON --}}
                                    <form method="POST" action="{{ route('keranjang.remove', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="w-12 h-12 sm:w-14 sm:h-14 bg-red-50 hover:bg-red-600 text-red-600 hover:text-white rounded-2xl flex items-center justify-center transition-all active:scale-95 shadow-sm border border-red-100">
                                            <i class="fa-solid fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- RIGHT SIDE: CHECKOUT PANEL --}}
        <div class="lg:w-[420px]">
            <form action="{{ route('keranjang.checkout') }}" method="POST" 
                  class="sticky top-10 bg-slate-900 text-white rounded-[2.5rem] p-8 space-y-8 shadow-2xl border border-white/5">
                @csrf
                
                <div class="flex items-center justify-between border-b border-white/10 pb-6">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-receipt text-red-500 text-2xl"></i>
                        <h2 class="text-xl font-black uppercase tracking-tight">Ringkasan</h2>
                    </div>
                    <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-bold uppercase">{{ $order->items->sum('qty') }} Items</span>
                </div>

                {{-- Order Summary --}}
                <div class="space-y-4 max-h-[200px] overflow-y-auto pr-2 custom-scrollbar">
                    @foreach($order->items as $item)
                        @if(!$item->menu) @continue @endif
                        <div class="flex justify-between items-start text-sm bg-white/5 p-4 rounded-2xl border border-white/10">
                            <div class="flex-1">
                                <span class="font-black text-xs uppercase tracking-wider">{{ $item->menu->nama }}</span>
                                <div class="text-[10px] text-slate-400 mt-1">{{ $item->qty }}x Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            </div>
                            <span class="font-black text-red-500">Rp {{ number_format($item->harga * $item->qty, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- Delivery Info --}}
                <div class="space-y-4 pt-4 border-t border-white/10">
                    <div>
                        <label class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 block mb-3">Tujuan Pengiriman</label>
                        <button type="button" id="btnAlamat"
                            class="w-full flex items-center justify-between bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-sm hover:bg-white/10 transition-all group">
                            <span id="alamatText" class="text-slate-300 truncate font-medium">Klik untuk atur lokasi...</span>
                            <i class="fa-solid fa-map-pin text-red-500 group-hover:animate-bounce"></i>
                        </button>
                        <p id="alamatDetail" class="text-[10px] text-slate-400 mt-3 hidden italic leading-relaxed bg-white/5 p-3 rounded-xl border border-white/5"></p>
                        
                        <input type="hidden" name="alamat_pengiriman" id="alamatInput">
                        <input type="hidden" name="lat" id="latInput">
                        <input type="hidden" name="lng" id="lngInput">
                    </div>

                    <div>
                        <label class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-500 block mb-3">Metode Pembayaran</label>
                        <div class="grid grid-cols-1 gap-3">
                            @foreach(['qris' => 'QRIS / E-Wallet', 'transfer' => 'Transfer Bank', 'cod' => 'Bayar di Tempat'] as $val => $label)
                            <label class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4 cursor-pointer hover:bg-white/10 transition-all has-[:checked]:bg-red-600/20 has-[:checked]:border-red-600 group">
                                <input type="radio" name="payment_method" value="{{ $val }}" required class="hidden">
                                <div class="w-5 h-5 border-2 border-white/20 rounded-full flex items-center justify-center group-has-[:checked]:border-red-600">
                                    <div class="w-2.5 h-2.5 bg-red-600 rounded-full hidden group-has-[:checked]:block"></div>
                                </div>
                                <span class="text-xs font-bold uppercase tracking-widest">{{ $label }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Final Total --}}
                <div class="pt-6 border-t border-white/10">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-slate-400 text-[10px] uppercase font-bold tracking-widest">Subtotal Pesanan</span>
                        <span class="text-sm font-bold">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs font-black uppercase tracking-widest">Total Tagihan</span>
                        <span class="text-3xl font-black text-red-500">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-red-600 text-white py-6 rounded-2xl font-black text-sm uppercase tracking-[0.2em] hover:bg-red-500 transition-all active:scale-95 shadow-xl shadow-red-600/20">
                    Checkout Sekarang
                </button>
            </form>
        </div>
    </div>
    @endif

</div>

{{-- ================= MODAL MAPS ================= --}}
<div id="modalMaps" class="fixed inset-0 bg-slate-900/95 backdrop-blur-md hidden items-center justify-center z-[100] p-4">
    <div class="bg-white rounded-[2rem] w-full max-w-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-300">
        <div class="p-8 flex justify-between items-center border-b border-slate-100">
            <div>
                <h3 class="font-black text-2xl uppercase tracking-tighter text-slate-900">Konfirmasi Lokasi</h3>
                <p class="text-xs text-slate-400">Pastikan pin berada di lokasi yang tepat</p>
            </div>
            <button id="closeModal" class="w-12 h-12 rounded-full hover:bg-slate-100 flex items-center justify-center transition text-slate-900 shadow-sm border border-slate-100">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <div class="h-[400px] relative bg-slate-100">
            <iframe id="mapsFrame" class="w-full h-full border-none"></iframe>
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="relative">
                    <i class="fa-solid fa-location-dot text-red-600 text-5xl -translate-y-6 drop-shadow-2xl"></i>
                    <div class="w-4 h-4 bg-red-600/20 rounded-full absolute -bottom-2 left-1/2 -translate-x-1/2 animate-ping"></div>
                </div>
            </div>
        </div>
        <div class="p-8 bg-white flex flex-col gap-6">
            <div class="flex items-start gap-4 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                <i class="fa-solid fa-map-marked-alt text-red-500 mt-1"></i>
                <p id="tempAlamat" class="text-sm text-slate-600 italic leading-relaxed font-medium">Sedang mengambil detail alamat...</p>
            </div>
            <button id="pakaiAlamat" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black uppercase text-sm tracking-widest hover:bg-red-600 transition-all shadow-lg active:scale-95">
                Gunakan Lokasi Ini
            </button>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
    body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(239, 68, 68, 0.3); border-radius: 10px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modalMaps');
    
    // MAPS LOGIC
    document.getElementById('btnAlamat').onclick = () => {
        if (!navigator.geolocation) return alert('GPS tidak aktif');
        document.getElementById('alamatText').textContent = 'Mendapatkan lokasi...';
        navigator.geolocation.getCurrentPosition(pos => {
            const {latitude, longitude} = pos.coords;
            document.getElementById('latInput').value = latitude;
            document.getElementById('lngInput').value = longitude;
            document.getElementById('mapsFrame').src = `https://maps.google.com/maps?q=${latitude},${longitude}&hl=id&z=16&output=embed`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            
            // Reverse Geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                .then(r => r.json())
                .then(data => {
                    document.getElementById('tempAlamat').textContent = data.display_name;
                });
        });
    };

    document.getElementById('pakaiAlamat').onclick = () => {
        const fullAlamat = document.getElementById('tempAlamat').textContent;
        document.getElementById('alamatInput').value = fullAlamat;
        document.getElementById('alamatText').textContent = '📍 Alamat Terpasang';
        document.getElementById('alamatDetail').textContent = fullAlamat;
        document.getElementById('alamatDetail').classList.remove('hidden');
        modal.classList.add('hidden');
    };

    document.getElementById('closeModal').onclick = () => {
        modal.classList.add('hidden');
        document.getElementById('alamatText').textContent = 'Klik untuk atur lokasi...';
    };
});
</script>
@endsection