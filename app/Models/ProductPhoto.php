<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id',
        'photo_path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
