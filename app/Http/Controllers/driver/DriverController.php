<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function dashboard()
    {
        return view('driver.dashboard', [
            'availableCount' => Order::where('status', 'pending')
                ->whereNull('driver_id')
                ->count(),

            'requestCount' => Order::where('driver_id', auth()->id())
                ->where('status', 'pending') // Assigned but not yet accepted
                ->count(),

            'activeCount' => Order::where('driver_id', auth()->id())
                ->whereIn('status', ['accepted', 'in_progress'])
                ->count(),

            'completedCount' => Order::where('driver_id', auth()->id())
                ->where('status', 'completed')
                ->count(),
        ]);
    }

    // New: List incoming requests (negotiation phase)
    public function requests()
    {
        $orders = Order::where('driver_id', auth()->id())
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('driver.requests', compact('orders'));
    }

    public function available()
    {
        $orders = Order::where('status', 'pending')
            ->whereNull('driver_id')
            ->get();

        return view('driver.available', compact('orders'));
    }

    public function myOrders()
    {
        $orders = Order::where('driver_id', auth()->id())
            ->whereIn('status', ['accepted', 'in_progress', 'completed']) // Show accepted ones too
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('driver.my-orders', compact('orders'));
    }

    // New: Driver view for negotiation
    public function negotiate(Order $order)
    {
        // Ensure this driver is assigned to this order
        if ($order->driver_id !== auth()->id()) {
            abort(403);
        }

        $order->load(['messages.sender', 'driver', 'customer']);
        return view('orders.chat', compact('order')); // Reuse chat view
    }

    public function take(Order $order)
    {
        // This might be used for "Self Assign" from available list
        $order->update([
            'driver_id' => auth()->id(),
            // 'status' => 'in_progress' // Don't auto start, go to negotiation first if needed
            // If taking from public pool, maybe go to pending state assigned to me?
        ]);

        return redirect()->route('driver.orders.requests'); // Redirect to requests/negotiation
    }

    public function updateStatus(Request $request, Order $order)
    {
        // Accepted -> In Progress (Start Pickup)
        if ($order->status === 'accepted') {
            $order->update(['status' => 'in_progress']);
        }
        // In Progress -> Completed (Finish)
        elseif ($order->status === 'in_progress') {
            $order->update([
                'status' => 'completed',
                'payment_status' => 'paid' // Simplified flow
            ]);
        }

        return redirect()->route('driver.orders.my');
    }


}
