<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', auth()->id())
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

        // Simple price calculation logic
        $basePrice = 10000;
        $weightPrice = ($request->weight ?? 1) * 2000;
        $estimatedPrice = $basePrice + $weightPrice;

        $order = Order::create([
            'customer_id' => auth()->id(),
            'pickup_address' => $request->pickup_address,
            'destination_address' => $request->destination_address,
            'item_type' => $request->item_type,
            'weight' => $request->weight,
            'status' => 'pending',
            'price' => $estimatedPrice,
        ]);

        return redirect()->route('orders.summary', $order);
    }

    public function summary(Order $order)
    {
        return view('orders.summary', compact('order'));
    }

    public function drivers(Order $order)
    {
        // Find drivers (assuming 'driver' role or similar)
        // For now, let's just get users who are not the current user
        // In a real app, we'd filter by online status, location, etc.
        $drivers = \App\Models\User::where('role', 'driver')->get();

        // Fallback if no roles setup or simple 'is_driver' field
        if ($drivers->isEmpty()) {
            // Just for demo purposes if roles aren't strictly set up yet
            $drivers = \App\Models\User::where('id', '!=', auth()->id())->take(5)->get();
        }

        return view('orders.drivers', compact('order', 'drivers'));
    }

    public function setDriver(Order $order, \App\Models\User $driver)
    {
        $order->update(['driver_id' => $driver->id]);
        return redirect()->route('orders.negotiate', $order);
    }

    public function negotiate(Order $order)
    {
        $order->load(['messages.sender', 'driver', 'customer']);
        return view('orders.chat', compact('order'));
    }

    public function confirm(Order $order)
    {
        $order->update(['status' => 'pending']); // Status stays pending/negotiated until paid?
        // Or we can say status='accepted' but payment='unpaid'. 
        // Let's keep status='accepted' as "Agreed on Price".
        $order->update(['status' => 'accepted']);

        return redirect()->route('orders.payment', $order);
    }

    public function success(Order $order)
    {
        return view('orders.success', compact('order'));
    }
}
