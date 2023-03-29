<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKeyFeatures extends Model
{
    use HasFactory;

    protected $table = 'products.key_features';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products.product_key_feature');
    }
}
