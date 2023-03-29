<?php

use App\Http\Controllers\Api\V1\CountryController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// General

Route::get('countries', [CountryController::class, 'index']);



// Product

Route::get('products', [ProductController::class, 'index']);