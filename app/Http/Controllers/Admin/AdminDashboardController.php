<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $pending = Order::where('status', 'pending')->count();
        $inProgress = Order::where('status', 'in_progress')->count();
        $completed = Order::where('status', 'completed')->count();

        $orders = Order::with('user')->latest()->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pending',
            'inProgress',
            'completed',
            'orders'
        ));
    }
}
