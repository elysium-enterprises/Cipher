<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $primaryKey = 'country_code';

    public $timestamps = false;

    public $incrementing = false;
    
    protected $fillable = [
        'country_code',
        'name',
        'official_name',
        'vat_percentage',
    ];
}
