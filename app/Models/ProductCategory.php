<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'products.categories';

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')
            ->orWhereIn('category_id', $this->descendants()->pluck('id'));
    }

    public function descendants()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id')->with('descendants');
    }
}
