<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Bersihkan format harga (hapus titik) menjadi integer
     */
    private function cleanPrice($value)
    {
        return (int) str_replace('.', '', $value);
    }

    /**
     * Tampilkan daftar menu
     */
    public function index()
    {
        // Gunakan paginate agar $menus->total() bisa dipakai
        $menus = Menu::with('category')->paginate(10);

        return view('admin.page.menu.index', compact('menus'));
    }

    /**
     * Tampilkan form tambah menu
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.page.menu.create', compact('categories'));
    }

    /**
     * Simpan menu baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'required',
            'harga_promo' => 'nullable',
            'is_active' => 'nullable|boolean',
        ]);

        Menu::create([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'harga' => $this->cleanPrice($request->harga),
            'harga_promo' => $request->harga_promo ? $this->cleanPrice($request->harga_promo) : null,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit menu
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.page.menu.edit', compact('menu', 'categories'));
    }

    /**
     * Perbarui menu
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga' => 'required',
            'harga_promo' => 'nullable',
            'is_active' => 'nullable|boolean',
        ]);

        $menu->update([
            'nama' => $request->nama,
            'category_id' => $request->category_id,
            'harga' => $this->cleanPrice($request->harga),
            'harga_promo' => $request->harga_promo ? $this->cleanPrice($request->harga_promo) : null,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    /**
     * Hapus menu
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
