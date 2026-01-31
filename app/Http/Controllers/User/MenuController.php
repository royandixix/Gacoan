<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_active', true)->latest()->get();

        $categories = Category::withCount([
            'menus' => fn ($q) => $q->where('is_active', true)
        ])->get();

        $popular_menus = Menu::where('is_active', true)
            ->orderBy('terjual', 'desc')
            ->limit(6)
            ->get();

        // 🛒 Order pending (keranjang aktif)
        $order = Order::with(['items.menu'])
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        // ✅ ARAHKAN KE VIEW YANG BENAR (KERANJANG)
        return view('user.page.keranjang.index', compact(
            'menus',
            'categories',
            'popular_menus',
            'order'
        ));
    }

    public function show(Menu $menu)
    {
        if (!$menu->is_active) {
            abort(404);
        }

        $categories = Category::withCount([
            'menus' => fn ($q) => $q->where('is_active', true)
        ])->get();

        $popular_menus = Menu::where('is_active', true)
            ->orderBy('terjual', 'desc')
            ->limit(6)
            ->get();

        // 🛒 Order pending tetap tersedia
        $order = Order::with(['items.menu'])
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        return view('user.page.menu.show', compact(
            'menu',
            'categories',
            'popular_menus',
            'order'
        ));
    }
}
