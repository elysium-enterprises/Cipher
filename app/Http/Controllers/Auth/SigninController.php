<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(Request $request)
    {
        $this->middleware('guest');
    }


    static public function greeting($request, $to)
    {
        // Get the user's time zone
        $userTimeZone = $request->header('timezone');
        // Get the current time in the user's time zone
        $userTime = Carbon::now($userTimeZone);
        // Get the hour
        $hour = intval($userTime->format('H'));
        $day = intval($userTime->format('w'));

        $pool = [
            'Welcome back, :name.',
            'We missed you, :name.',
            'Nice to see you again, :name.'
        ];

        if ($hour >= 0 && $hour < 5) {
            array_push($pool, [
                'Burning the midnight oil, :name?',
                'Wishing you a peaceful night, :name.'
            ]);
        }
        if ($hour >= 5 && $hour < 8) {
            array_push($pool, [
                'Early bird gets the worm, :name.'
            ]);
        }
        if ($hour >= 5 && $hour < 12) {
            array_push($pool, [
                'Rise and grind, :name.',
                'Good morning, :name.',
                'Rise and shine, :name.',
                'Let\'s make today great, :name.'
            ]);

            if ($day == 1) {
                array_push($pool, [
                    'Time to start up your week, :name.'
                ]);
            }
        }
        if ($hour >= 12 && $hour < 18) {
            array_push($pool, [
                'Good afternoon, :name.',
                'Hope you\'re having a great day, :name.',
            ]);
            if ($day == 5) {
                array_push($pool, [
                    'Almost weekend, :name.'
                ]);
            }
        }
        if ($hour >= 18 && $hour < 21) {
            array_push($pool, [
                'Let\'s make tomorrow even better, :name.',
                'Good evening, :name.',
            ]);
        }
        if ($hour >= 21 && $hour >= 0 && $hour < 5) {
            array_push($pool, [
                'Sweat dreams, :name.',
                'Good night, :name!',
                'Sleep well, :name.'
            ]);
        }

        $pool = Arr::flatten($pool);

        return __(Arr::random($pool), ['name' => $to]);
    }

    public function show(Request $request)
    {

        $greeting = null;

        if (session()->has('last_logout_member_id')) {
            $lastLogout = Member::find(session('last_logout_member_id'));
            if ($lastLogout) {
                $greeting = $this->greeting($request, '<span class="text-brand">' . $lastLogout->display_name . '</span>');
            }
        }


        return view('signin', ['greeting' => $greeting]);
    }

    public function index(Request $request)
    {
        // Validate the user's login credentials
        $request->validate([
            'cid' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('cid', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            // If the authentication was successful, redirect the user to their intended destination
            // First create login history entry
            $loginHistory = Login::create([
                'member_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
            
            session()->put('login_history_id', $loginHistory->id);

            return redirect()->intended(route('app.channels.me'));
        }

        // If the authentication failed, redirect the user back to the login form with an error message
        return redirect()->back()->withErrors(['general' => __('Incorrect credentials.')]);
    }
}
