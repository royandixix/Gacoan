<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(10); // 10 per halaman
        return view('admin.page.menu.index', compact('menus'));
    }

    public function create()
    {
        $kategoris = $this->getKategoris();
        $namamenus = $this->getNamaMenus(); // Dropdown Mie Gacoan
        return view('admin.page.menu.create', compact('kategoris', 'namamenus'));
    }

    public function store(Request $request)
    {
        // Hapus titik dari input rupiah sebelum validasi
        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
            'harga_promo' => $request->harga_promo ? str_replace('.', '', $request->harga_promo) : null,
        ]);

        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'kategori'      => 'required|string|max:100',
            'harga'         => 'required|integer|min:0',
            'harga_promo'   => 'nullable|integer|min:0',
            'promo_mulai'   => 'nullable|date',
            'promo_selesai' => 'nullable|date|after_or_equal:promo_mulai',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Menu::create($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        $kategoris = $this->getKategoris();
        $namamenus = $this->getNamaMenus(); // Dropdown Mie Gacoan
        return view('admin.page.menu.edit', compact('menu', 'kategoris', 'namamenus'));
    }

    public function update(Request $request, Menu $menu)
    {
        // Hapus titik dari input rupiah sebelum validasi
        $request->merge([
            'harga' => str_replace('.', '', $request->harga),
            'harga_promo' => $request->harga_promo ? str_replace('.', '', $request->harga_promo) : null,
        ]);

        $data = $request->validate([
            'nama'          => 'required|string|max:255',
            'kategori'      => 'required|string|max:100',
            'harga'         => 'required|integer|min:0',
            'harga_promo'   => 'nullable|integer|min:0',
            'promo_mulai'   => 'nullable|date',
            'promo_selesai' => 'nullable|date|after_or_equal:promo_mulai',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('menu', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $menu->update($data);

        return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $menu->delete();

        return back()->with('success', 'Menu berhasil dihapus');
    }

    /**
     * Kategori umum untuk dropdown
     */
    private function getKategoris(): array
    {
        return [
            'Makanan' => ['Nasi Goreng', 'Ayam Goreng', 'Mie Goreng'],
            'Minuman' => ['Teh', 'Kopi', 'Es Jeruk'],
            'Snack'   => ['Keripik', 'Roti', 'Kue Kering'],
            'Dessert' => ['Puding', 'Es Krim', 'Brownies'],
        ];
    }

    /**
     * Nama Menu Mie Gacoan Level 1–12 untuk dropdown
     */
    private function getNamaMenus(): array
    {
        $namamenus = [];
        for ($i = 1; $i <= 12; $i++) {
            $namamenus[] = "Mie Gacoan Level $i";
        }
        return $namamenus;
    }
}
