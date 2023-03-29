<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $table = 'products.stock';

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function bookedBy()
    {
        return $this->belongsTo(Member::class, 'booked_by');
    }

    public function isSold()
    {
        return $this->hasOne(ProductSale::class, 'stock_id');
    }
}
