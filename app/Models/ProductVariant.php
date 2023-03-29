<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'products.variants';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'price_no_vat',
        'weight_grams',
        'ean'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stock()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function sales()
    {
        return $this->hasMany(ProductSales::class);
    }
}
