<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalOrders = 0;
        $activeOrders = 0;
        $completedOrders = 0;

        if (Schema::hasTable('orders')) {
            $totalOrders = Order::where('customer_id', $user->id)->count();

            $activeOrders = Order::where('customer_id', $user->id)
                ->whereIn('status', ['pending', 'accepted', 'in_progress'])
                ->count();

            $completedOrders = Order::where('customer_id', $user->id)
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
