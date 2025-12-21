<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // default value (biar aman)
        $totalOrders = 0;
        $activeOrders = 0;
        $completedOrders = 0;

        // cek apakah tabel orders ada
        if (Schema::hasTable('orders')) {
            $totalOrders = Order::where('user_id', $user->id)->count();

            $activeOrders = Order::where('user_id', $user->id)
                ->whereIn('status', ['pending', 'in_progress'])
                ->count();

            $completedOrders = Order::where('user_id', $user->id)
                ->where('status', 'completed')
                ->count();
        }

        return view('dashboard', compact(
            'totalOrders',
            'activeOrders',
            'completedOrders'
        ));
    }
}
