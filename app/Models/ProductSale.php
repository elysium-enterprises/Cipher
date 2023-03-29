<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    use HasFactory;

    protected $table = 'products.sales';

    public $timestamps = false;

    protected $casts = [
        'is_delivered' => 'boolean',
        'sold_at' => 'datetime',
    ];

    public function stock()
    {
        return $this->belongsTo(ProductStock::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ProductShippingAddress::class, 'shipping_address_id');
    }

}
