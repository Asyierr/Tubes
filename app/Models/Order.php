<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'driver_id',
        'pickup_address',
        'destination_address',
        'item_type',
        'weight',
        'status',
    ];
}
