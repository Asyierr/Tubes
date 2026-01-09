<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'content' => 'nullable|string',
            'type' => 'required|in:text,proposal',
            'proposed_price' => 'nullable|numeric',
        ]);

        $message = Message::create([
            'order_id' => $order->id,
            'sender_id' => auth()->id(),
            'content' => $request->content,
            'type' => $request->type,
            'proposed_price' => $request->proposed_price,
        ]);

        // If it's a proposal, we might want to update the order price tentatively or handle it in UI
        if ($request->type === 'proposal' && $request->proposed_price) {
            $order->update(['price' => $request->proposed_price]);
        }

        return back(); // Return to chat view
    }
}
