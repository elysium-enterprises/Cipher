<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SigninController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;   

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request) {
        return 'sign in';
    }

}
