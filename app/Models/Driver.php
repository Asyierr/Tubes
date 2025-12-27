<?php

namespace App\Models;

class Driver extends User
{
    protected static function booted()
    {
        static::addGlobalScope('driver', function ($query) {
            $query->where('role', 'driver');
        });
    }
}
