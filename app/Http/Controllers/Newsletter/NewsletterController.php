<?php

namespace App\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    function show($request) {
        return view('newsletter.onboarding');
    }

    function showSubscribed($request) {

    }

    function showUnsubscribed($request) {

    }

    function store($request) {
        return view('newsletter.onboarding.complete');
    }

    function destroy($request) {
        return view('newsletter.onboarding.unsubscribed');
    }
}
