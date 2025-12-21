<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'pickup_address',
        'destination_address',
        'item_type',
        'weight',
        'status'
    ];
    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
