<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Auth\SignupController;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('guest');
    }
    
    public function index(Request $request)
    {
        $vars = [
        ];

        if(Auth::check()) {
            $vars['greeting'] = SigninController::greeting($request, '<span class="text-brand">' . Auth::user()->display_name . '</span>');
            
        }

        return view('landing', $vars);
    }
}
