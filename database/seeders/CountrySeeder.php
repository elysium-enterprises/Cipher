<?php

namespace Database\Seeders;

use App\Models\Country;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Country::getQuery()->delete();
        
        $json = File::get('database/data/countries.json');
        $countries = json_decode($json);
  
        foreach ($countries as $key => $value) {
            Country::create([
                'country_code' => $value->country_code,
                'name' => $value->country,
                'official_name' => $value->official_name,
                'vat_percentage' => property_exists($value, 'vat_percentage') ? $value->vat_percentage : null,
            ]);
        }
    }
}
