<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShippingAddress extends Model
{
    use HasFactory;
    
    protected $table = 'products.shipping_address';

    protected $fillable = [
        'address_1',
        'address_2',
        'city',
        'state',
        'country_code',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_code', 'country_code');
    }

    public function sales()
    {
        return $this->hasMany(ProductSale::class);
    }
}
