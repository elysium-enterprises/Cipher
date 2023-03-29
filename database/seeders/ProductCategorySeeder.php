<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::getQuery()->delete();
  
        $json = File::get('database/data/categories.json');
        $categories = json_decode($json);
        
        DB::unprepared('SET IDENTITY_INSERT products.categories ON');

        foreach ($categories as $key => $value) {
            ProductCategory::create([
                'id' => property_exists($value, 'id') ? $value->id : $key,
                'parent_id' => property_exists($value, 'parent_id') ? $value->parent_id : null,
                'name' => $value->name,
            ]);
        }

        DB::unprepared('SET IDENTITY_INSERT products.categories OFF');
    }
}
