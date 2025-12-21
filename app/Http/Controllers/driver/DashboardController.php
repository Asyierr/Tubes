<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('driver_id', Auth::id())
            ->latest()
            ->get();

        return view('driver.dashboard', compact('orders'));
    }
}
