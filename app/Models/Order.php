<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'note',
        'total',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
