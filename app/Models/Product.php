<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products.products';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'material',
        'fit',
        'based_on',
        'ships_from',
        'category_id',
        'care_instructions_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function careInstructions()
    {
        return $this->belongsTo(CareInstructions::class);
    }

    public function keyFeatures()
    {
        return $this->belongsToMany(KeyFeature::class, 'products.product_key_feature');
    }

    public function sizeGuide()
    {
        return $this->hasMany(SizeGuide::class);
    }

    public function likedBy()
    {
        return $this->belongsToMany(Member::class, 'product_likes');
    }

    public function getLikedAmountAttribute()
    {
        return $this->likedBy()->count();
    }

    public function stock()
    {
        return $this->hasManyThrough(
            ProductStock::class,
            ProductVariant::class,
            'product_id',
            'variant_id',
            'id',
            'variant_id'
        );
    }
}
