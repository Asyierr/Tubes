<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pickup_address' => 'required|string',
            'destination_address' => 'required|string',
            'item_type' => 'required|string',
            'weight' => 'nullable|integer|min:1',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'pickup_address' => $request->pickup_address,
            'destination_address' => $request->destination_address,
            'item_type' => $request->item_type,
            'weight' => $request->weight,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.index');
    }
}
