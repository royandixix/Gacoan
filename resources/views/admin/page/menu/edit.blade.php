@extends('admin.layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-6">
    {{-- Header Section --}}
    <div class="max-w-4xl mx-auto mb-8">
        <div class="flex items-center gap-4 mb-2">
            <a href="{{ route('admin.menu.index') }}" 
               class="p-2 bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-white">Edit Menu</h1>
                <p class="text-slate-400 text-sm mt-1">Perbarui informasi menu: <span class="text-gacoan-400 font-semibold">{{ $menu->nama }}</span></p>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <form action="{{ route('admin.menu.update', $menu) }}"
          method="POST"
          enctype="multipart/form-data"
          class="max-w-4xl mx-auto">
        @csrf
        @method('PUT')

        <div class="bg-slate-800/50 backdrop-blur-sm border border-slate-700 rounded-xl shadow-2xl overflow-hidden">
            <div class="p-8 space-y-6">
                
                {{-- Nama Menu Section --}}
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-gacoan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Nama Menu
                    </label>
                    
                    <select name="nama" id="nama-menu-select"
                            class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-gacoan-500 focus:border-transparent transition-all">
                        <option value="">-- Pilih Nama Menu --</option>
                        @foreach($namamenus as $nm)
                            <option value="{{ $nm }}" {{ old('nama', $menu->nama) == $nm ? 'selected' : '' }}>
                                {{ $nm }}
                            </option>
                        @endforeach
                    </select>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <input type="text" name="nama_manual"
                               placeholder="Atau ketik nama menu baru..."
                               value="{{ old('nama_manual') }}"
                               class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg pl-10 pr-4 py-3 focus:ring-2 focus:ring-gacoan-500 focus:border-transparent transition-all placeholder-slate-500">
                    </div>
                </div>

                {{-- Kategori --}}
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-gacoan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        Kategori <span class="text-red-400">*</span>
                    </label>
                    
                    <select name="kategori"
                            class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-gacoan-500 focus:border-transparent transition-all"
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat => $submenus)
                            <option value="{{ $kat }}" {{ old('kategori', $menu->kategori) == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                            <svg class="w-4 h-4 text-gacoan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Harga Normal <span class="text-red-400">*</span>
                        </label>
                        
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-medium">Rp</span>
                            </div>
                            <input type="text" name="harga"
                                   value="{{ old('harga', $menu->harga) }}"
                                   class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg pl-12 pr-4 py-3 focus:ring-2 focus:ring-gacoan-500 focus:border-transparent transition-all rupiah"
                                   placeholder="0"
                                   required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Harga Promo
                            <span class="text-xs text-slate-500 normal-case tracking-normal">(opsional)</span>
                        </label>
                        
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-medium">Rp</span>
                            </div>
                            <input type="text" name="harga_promo"
                                   value="{{ old('harga_promo', $menu->harga_promo) }}"
                                   class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg pl-12 pr-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all rupiah"
                                   placeholder="0">
                        </div>
                    </div>
                </div>

                {{-- Periode Promo --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                            <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Promo Mulai
                        </label>
                        
                        <input type="date" name="promo_mulai"
                               value="{{ old('promo_mulai', $menu->promo_mulai ? $menu->promo_mulai->format('Y-m-d') : '') }}"
                               class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                    </div>

                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                            <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Promo Selesai
                        </label>
                        
                        <input type="date" name="promo_selesai"
                               value="{{ old('promo_selesai', $menu->promo_selesai ? $menu->promo_selesai->format('Y-m-d') : '') }}"
                               class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-gacoan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                        </svg>
                        Deskripsi
                    </label>
                    
                    <textarea name="deskripsi"
                              class="w-full bg-slate-900/50 border border-slate-600 text-white rounded-lg px-4 py-3 focus:ring-2 focus:ring-gacoan-500 focus:border-transparent transition-all placeholder-slate-500 resize-none"
                              rows="4"
                              placeholder="Tulis deskripsi menu di sini...">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                </div>

                {{-- Upload Gambar --}}
                <div class="space-y-2">
                    <label class="flex items-center gap-2 text-sm font-semibold text-slate-300 uppercase tracking-wider">
                        <svg class="w-4 h-4 text-gacoan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Ganti Gambar Menu
                    </label>
                    
                    <div class="flex items-start gap-4">
                        {{-- Current Image Preview --}}
                        <div id="preview-container" class="{{ $menu->gambar ? '' : 'hidden' }}">
                            <div class="relative group">
                                @if($menu->gambar)
                                    <img id="preview-gambar" 
                                         src="{{ asset('storage/'.$menu->gambar) }}" 
                                         class="w-32 h-32 object-cover rounded-lg ring-2 ring-slate-600">
                                @else
                                    <img id="preview-gambar" 
                                         class="w-32 h-32 object-cover rounded-lg ring-2 ring-slate-600">
                                @endif
                                <div class="absolute inset-0 bg-black/50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Upload Area --}}
                        <label class="flex-1 cursor-pointer">
                            <div class="relative border-2 border-dashed border-slate-600 rounded-lg p-6 hover:border-gacoan-500 transition-all group">
                                <input type="file" name="gambar"
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                       accept="image/*">
                                
                                <div class="text-center">
                                    <svg class="mx-auto w-12 h-12 text-slate-500 group-hover:text-gacoan-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mt-2 text-sm text-slate-400">
                                        <span class="text-gacoan-500 font-semibold">Upload gambar baru</span>
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    
                    @if($menu->gambar)
                        <p class="text-xs text-slate-400 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Kosongkan jika tidak ingin mengganti gambar
                        </p>
                    @endif
                </div>

                {{-- Status Aktif --}}
                <div class="flex items-center gap-3 p-4 bg-slate-900/50 border border-slate-600 rounded-lg">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" {{ old('is_active', $menu->is_active) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gacoan-500/50 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gacoan-600"></div>
                    </label>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-white font-medium">Menu Aktif</span>
                    </div>
                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="bg-slate-900/80 px-8 py-6 border-t border-slate-700 flex flex-wrap gap-4">
                <button type="submit"
                        class="group inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl shadow-lg hover:shadow-blue-500/50 transition-all duration-300 hover:scale-105 font-semibold">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Update Menu
                </button>

                <a href="{{ route('admin.menu.index') }}"
                   class="inline-flex items-center gap-2 px-8 py-3 bg-slate-700 text-slate-300 rounded-xl shadow-lg hover:bg-slate-600 transition-all duration-300 font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>

{{-- Notyf JS --}}
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

<script>
const notyf = new Notyf({ 
    duration: 4000, 
    position: { x: 'right', y: 'top' },
    dismissible: true
});

// Error & success notifications
@if ($errors->any())
    @foreach ($errors->all() as $error)
        notyf.error('{{ $error }}');
    @endforeach
@endif

@if (session('success'))
    notyf.success('{{ session('success') }}');
@endif

// Format rupiah input
const rupiahInputs = document.querySelectorAll('.rupiah');
rupiahInputs.forEach(input => {
    input.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        this.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    });
});

// Clear manual input when dropdown is selected
const namaSelect = document.getElementById('nama-menu-select');
const namaManual = document.querySelector('input[name="nama_manual"]');
namaSelect.addEventListener('change', function() {
    if(this.value !== '') namaManual.value = '';
});

// Image preview
const gambarInput = document.querySelector('input[name="gambar"]');
const previewGambar = document.getElementById('preview-gambar');
const previewContainer = document.getElementById('preview-container');

gambarInput.addEventListener('change', function() {
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(e) {
            previewGambar.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection