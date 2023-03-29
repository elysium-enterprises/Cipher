<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeGuide extends Model
{
    use HasFactory;

    protected $table = 'products.size_guide';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'sorting_order',
        'width',
        'height',
        'length',
        'name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
