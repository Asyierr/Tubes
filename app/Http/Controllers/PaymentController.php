<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PaymentController extends Controller
{
    public function show(Order $order)
    {
        return view('orders.payment', compact('order'));
    }

    public function pay(Order $order, \Illuminate\Http\Request $request)
    {
        $order->update([
            'payment_status' => 'paid',
            'payment_method' => $request->payment_method ?? 'direct',
            'status' => 'accepted' // Keep it accepted so driver can pick it up
        ]);

        return redirect()->route('orders.success', $order);
    }

}
