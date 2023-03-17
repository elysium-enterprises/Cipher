<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppLandingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        dd(Auth::user());
    }
}
