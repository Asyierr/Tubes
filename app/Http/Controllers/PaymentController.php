<?php

namespace App\Http\Controllers;

use App\Models\Order;

class PaymentController extends Controller
{
   public function pay(Order $order)
{
    $order->update([
        'payment_status' => 'paid',
        'status' => 'completed'
    ]);

    return back();
}

}
