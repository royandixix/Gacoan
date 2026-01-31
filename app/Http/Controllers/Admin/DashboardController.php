<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPesanan = Order::count();
        $menuAktif = Menu::where('is_active', true)->count();
        $totalUser = User::count();

        $pesananHariIni = Order::whereDate('created_at', Carbon::today())->count();

        $pesananTerbaru = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPesanan',
            'menuAktif',
            'totalUser',
            'pesananHariIni',
            'pesananTerbaru'
        ));
    }
}
