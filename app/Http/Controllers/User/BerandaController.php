<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil semua menu aktif beserta kategori
        $menus = Menu::with('category')->where('is_active', true)->get();

        // Ambil kategori beserta jumlah menu aktif
        $categories = Category::withCount(['menus' => function ($q) {
            $q->where('is_active', true);
        }])->get();

        // Menu populer: best seller atau promo aktif
        $popular_menus = Menu::with('category')
            ->where('is_active', true)
            ->where(function ($q) {
                $q->where('is_best_seller', true)
                  ->orWhereNotNull('harga_promo');
            })
            ->get();

        return view('user.page.beranda.beranda', compact('menus', 'categories', 'popular_menus'));
    }
}
