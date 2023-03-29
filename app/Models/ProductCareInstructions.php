<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCareInstructions extends Model
{
    use HasFactory;

    protected $table = 'products.care_instructions';

    public $timestamps = false;

    protected $fillable = [
        'wash',
        'dry_cleaning',
        'water_temperature',
        'bleach',
        'tumble_drying',
        'ironing'
    ];

    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
