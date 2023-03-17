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

    public static $DISPLAY_NAMES = null;

    public static function generateRandomDisplayName($returnAsArray = true)
    {
        if (static::$DISPLAY_NAMES === null) {
            static::$DISPLAY_NAMES = json_decode(file_get_contents(resource_path() . '/other/display_names.json'), true);
        }
        $arr = [static::$DISPLAY_NAMES['adjectives'][array_rand(static::$DISPLAY_NAMES['adjectives'])], static::$DISPLAY_NAMES['nouns'][array_rand(static::$DISPLAY_NAMES['nouns'])]];
        return $returnAsArray ? $arr : $arr[0] . ' ' . $arr[1];
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function show()
    {
        $name = SignupController::generateRandomDisplayName(false);
        session()->flash('index_random_display_name', $name);
        return view('signup');
    }

    public function store(Request $request)
    {
        if(empty($request->input('display_name'))) {
            $request->merge(['display_name' => $this->generateRandomDisplayName(false)]);
        }


        // Validate the request data
        $validatedData = $request->validate([
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/'
            ],
            'display_name' => 'required|min:3',
            'cid' => 'required|min:3|unique:members,cid'
            // 'cid' => 'min:3|unique:members,cid',
            // 'email' => 'email|unique:members,email',
            // 'phone' => 'unique:members,phone',
        ], [
            'password.required' => 'Please provide a password.',
            'password.regex' => 'Please provide a stronger password.',
            'display_name.required' => 'Please provide a display name.',
            'display_name.regex' => 'Please provide a longer display name.',
            'cid.min' => 'Your Cipher ID has to be at least 3 characters long.',
            'display_name.min' => 'Your display name has to be at least 3 characters long.',
            'cid.unique' => 'This Cipher ID has already been taken.',
            // 'email.unique' => 'This email address is already in use.',
            // 'phone.unique' => 'This phone number is already in use.',
            // 'email.email' => 'Please provide a valid email address.'
        ]);

        // Create a new member
        $member = new Member();
        $member->password = $validatedData['password'];
        $member->display_name = $validatedData['display_name'];
        $member->cid = $validatedData['cid'];
        $member->save();

        // Login the new member
        auth()->loginUsingId($member->id);

        // Redirect the user to their profile
        return redirect()->route('app.channels.me');
    }
}
