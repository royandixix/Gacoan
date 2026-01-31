@extends('admin.layouts.app')

@section('title', 'Edit Menu: ' . $menu->nama)

@section('content')
<div class="min-h-screen bg-[#0f172a] p-4 md:p-10">

    {{-- Header --}}
    <div class="max-w-4xl mx-auto mb-10">
        <div class="flex items-center gap-6">
            <a href="{{ route('admin.menu.index') }}"
               class="group p-3 bg-slate-800/50 hover:bg-gacoan-600 rounded-2xl transition-all duration-300 text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Menu</h1>
                <p class="text-slate-400 mt-1">Memperbarui informasi untuk <span class="text-gacoan-400 font-semibold">{{ $menu->nama }}</span></p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.menu.update', $menu->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="max-w-4xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">
            
            {{-- Bagian Kiri: Identitas & Gambar --}}
            <div class="space-y-6">
                {{-- GAMBAR PREVIEW --}}
                <div class="group relative">
                    <label class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2 block">Foto Menu</label>
                    <div id="image-preview-container" class="relative aspect-video rounded-3xl bg-slate-800/30 border-2 border-dashed border-slate-700 flex flex-col items-center justify-center overflow-hidden hover:border-gacoan-500 transition-all cursor-pointer">
                        {{-- Tampilkan gambar lama jika ada --}}
                        <img id="image-preview" 
                             src="{{ $menu->gambar ? asset('storage/'.$menu->gambar) : '#' }}" 
                             alt="Preview" 
                             class="{{ $menu->gambar ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover">
                        
                        <div id="placeholder-content" class="{{ $menu->gambar ? 'hidden' : '' }} text-center p-6">
                            <div class="inline-flex p-4 bg-slate-700/50 rounded-2xl mb-3 text-slate-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-slate-400">Klik untuk ganti foto</p>
                        </div>
                        <input type="file" name="gambar" id="gambar-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                    </div>
                </div>

                {{-- NAMA MENU (Select & Manual) --}}
                <div class="space-y-2">
                    <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Nama Menu</label>
                    <select name="nama" id="nama-menu-select" 
                            class="w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 appearance-none">
                        <option value="" class="bg-slate-900">-- Pilih Nama Menu --</option>
                        @foreach($namamenus as $nm)
                            <option value="{{ $nm }}" {{ old('nama', $menu->nama) == $nm ? 'selected' : '' }} class="bg-slate-900">{{ $nm }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="nama_manual" id="nama-manual" placeholder="Atau isi manual jika tidak ada di list..."
                           class="w-full mt-2 bg-slate-800/20 border border-slate-700/50 focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-3 text-sm italic transition-all">
                </div>

                {{-- KATEGORI --}}
                <div class="space-y-2">
                    <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Kategori</label>
                    <select name="category_id" 
                            class="w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 appearance-none">
                        <option value="" class="bg-slate-900">-- Pilih Kategori --</option>
                        @foreach($kategoris as $id => $nama)
                            <option value="{{ $id }}" {{ old('category_id', $menu->category_id) == $id ? 'selected' : '' }} class="bg-slate-900">{{ $nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Bagian Kanan: Harga & Detail --}}
            <div class="space-y-6">
                {{-- HARGA & PROMO --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Harga (Rp)</label>
                        <input type="text" name="harga" value="{{ old('harga', $menu->harga) }}" required
                               class="rupiah w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 font-mono font-bold">
                    </div>
                    <div class="space-y-2">
                        <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Harga Promo</label>
                        <input type="text" name="harga_promo" value="{{ old('harga_promo', $menu->harga_promo) }}"
                               class="rupiah w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-emerald-500 text-emerald-400 rounded-2xl px-5 py-4 font-mono font-bold">
                    </div>
                </div>

                {{-- TANGGAL PROMO --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Mulai Promo</label>
                        <input type="date" name="promo_mulai" value="{{ old('promo_mulai', $menu->promo_mulai?->format('Y-m-d')) }}"
                               class="w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 text-sm">
                    </div>
                    <div class="space-y-2">
                        <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Berakhir Promo</label>
                        <input type="date" name="promo_selesai" value="{{ old('promo_selesai', $menu->promo_selesai?->format('Y-m-d')) }}"
                               class="w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 text-sm">
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="space-y-2">
                    <label class="text-slate-400 text-xs font-bold uppercase tracking-widest block ml-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" 
                              class="w-full bg-slate-800/40 border-none focus:ring-2 focus:ring-gacoan-500 text-white rounded-2xl px-5 py-4 transition-all">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                </div>

                {{-- TOGGLE STATUS --}}
                <div class="flex items-center justify-between p-4 bg-slate-800/20 rounded-2xl border border-slate-700/50">
                    <span class="text-slate-300 font-medium">Status Menu Aktif</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" {{ old('is_active', $menu->is_active) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                    </label>
                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="flex items-center gap-4 mt-12 pt-8 border-t border-slate-800">
            <button type="submit"
                    class="flex-1 md:flex-none px-12 py-4 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-2xl shadow-xl shadow-blue-500/20 hover:shadow-blue-500/40 transition-all hover:-translate-y-1 active:scale-95">
                Update Menu
            </button>
            <a href="{{ route('admin.menu.index') }}"
               class="px-10 py-4 bg-slate-800 text-slate-300 font-bold rounded-2xl hover:bg-slate-700 transition-all">
                Batal
            </a>
        </div>
    </form>
</div>

{{-- JS --}}
<script>
    /* Rupiah Formatting */
    document.querySelectorAll('.rupiah').forEach(el => {
        el.addEventListener('input', function () {
            let val = this.value.replace(/\D/g,'');
            this.value = val.replace(/\B(?=(\d{3})+(?!\d))/g,'.');
        });
    });

    /* Live Image Preview */
    const gambarInput = document.getElementById('gambar-input');
    const imagePreview = document.getElementById('image-preview');
    const placeholderContent = document.getElementById('placeholder-content');

    gambarInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                placeholderContent.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    /* Nama Manual Logic */
    document.getElementById('nama-menu-select').addEventListener('change', function(e) {
        if(e.target.value) {
            document.getElementById('nama-manual').value = '';
            document.getElementById('nama-manual').style.opacity = "0.5";
        } else {
            document.getElementById('nama-manual').style.opacity = "1";
        }
    });
</script>
@endsection