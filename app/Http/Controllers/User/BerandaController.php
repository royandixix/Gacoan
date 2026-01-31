<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class BerandaController extends Controller
{
    public function index()
    {
        $stats = [
            'menu_count'  => Menu::where('is_active', true)->count(),
            'order_count' => Order::count(),
            'user_count'  => User::count(),
        ];

        $categories = Category::withCount([
            'menus' => function ($q) {
                $q->where('is_active', true);
            }
        ])->get();

        $popular_menus = Menu::with('category')
            ->where('is_active', true)
            ->orderByDesc('is_best_seller')
            ->latest()
            ->limit(6)
            ->get();

        return view('user.page.beranda.beranda', compact(
            'stats',
            'categories',
            'popular_menus'
        ));
    }
}
