<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignoutController extends Controller
{

    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    private function setLastLogoutSession() {
        session()->put('last_logout_member_id', Auth::id());
    }

    private function setLogoutTime()
    {
        $loginHistoryId = session()->get('login_history_id');

        // update the logout_at field of the login history record
        $loginHistory = Login::find($loginHistoryId);
        if ($loginHistory) {
            $loginHistory->logout_at = now();
            $loginHistory->save();
        }

        // clear the login history ID from the session
        session()->forget('login_history_id');
    }

    public function index(Request $request)
    {
        $this->setLogoutTime();
        $this->setLastLogoutSession();
    
        Auth::logout();
        
        return redirect()->route('index')->with('success', 'Successfully signed out.');
    }
}
