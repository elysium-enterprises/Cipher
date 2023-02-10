<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=(?:[^A-Z]*[A-Z]){4})(?=(?:[^0-9]*[0-9]){3})(?=[A-Za-z0-9 ]*[^A-Za-z0-9 ]{2,}).{14,}$/gm'
            ],
            'display_name',
            'login_name' => 'required',
            'email' => 'email|unique:members,email',
            'phone' => 'unique:members,phone',
        ]);

        // Create a new member
        $member = Member::create([
            'password' => $validatedData['password'],
            'display_name' => $validatedData['display_name'],
            'login_name' => $validatedData['login_name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);

        // Login the new member
        auth()->login($member);

        // Redirect the user to their profile
        return redirect()->route('profile');
    }

}
