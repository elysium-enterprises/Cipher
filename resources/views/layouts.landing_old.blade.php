@extends('layouts.app')
@section('title', __('core.cipher') . ' | ' . $section)
@section('head')
<link rel="stylesheet" href="{{ asset('css/landing_page.css') }}" />
@endsection
@section('body')
<nav class="container py-3 bg-transparent d-flex align-items-center justify-content-between position-absolute top-0 start-50 translate-middle-x">
    <div class="d-inline-block">
        <a href="{{ route('index') }}"><img src="{{ asset('images/full.svg') }}" height="30" alt="Logo" /></a>
    </div>

    <div class="d-inline-block">
        <a href="{{ route('landing.download') }}" class="btn btn-link text-decoration-none fw-bold mx-2">{{ __('landing.download') }}</a>
        <a href="{{ route('landing.hive.host') }}" class="btn btn-link text-decoration-none fw-bold mx-2">{{ __('landing.host') }}</a>
        <a href="{{ route('app.swarm.discover') }}" class="btn btn-link text-decoration-none fw-bold mx-2">{{ __('landing.discover') }}</a>
        <a href="{{ route('landing.support.index') }}" class="btn btn-link text-decoration-none fw-bold mx-2">{{ __('landing.support') }}</a>
        <a href="{{ route('blog.index') }}" class="btn btn-link text-decoration-none fw-bold mx-2">{{ __('landing.blog') }}</a>
    </div>

    <div class="d-inline-flex justify-content-end" style="width: 211px;">
        <a href="{{ route('auth.signin') }}" class="btn btn-primary">{{ __('landing.signin') }}</a>
    </div>
</nav>
<main class="w-100">
    @yield('content')
</main>
<footer class="bg-dark pb-5 pt-3">
    <div class="container border-bottom">
        <div class="row">
            <div class="col-4">
                <div class="mb-2 py-4">
                    <img src="{{ asset('images/full-red.svg') }}" height="30" alt="Logo" />
                </div>
                {{-- TODO: Language selector --}}
            </div>
            <div class="col-8 row pt-4 pb-5">
                <div class="col-3">
                    <span class="text-primary d-block">{{ __('landing.company') }}</span>
                    <a href="{{ route('landing.about') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.about') }}</a>
                    <a href="{{ route('landing.branding') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.branding') }}</a>
                </div>
                <div class="col-3">
                    <span class="text-primary d-block">{{ __('landing.resources') }}</span>
                    <a href="{{ route('landing.feedback') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.feedback') }}</a>
                    <a href="{{ route('landing.support.index') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.support') }}</a>
                    <a href="{{ route('landing.faq') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.faq') }}</a>
                </div>
                <div class="col-3">
                    <span class="text-primary d-block">{{ __('landing.legal') }}</span>
                    <a href="{{ route('landing.terms') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.terms') }}</a>
                    <a href="{{ route('landing.privacy') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.privacy') }}</a>
                    <a href="{{ route('landing.cookies') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.cookies') }}</a>
                    <a href="{{ route('landing.guidelines') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.guidelines') }}</a>
                    <a href="{{ route('landing.licenses') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.licenses') }}</a>
                    <a href="{{ route('landing.disclosure') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.disclosure') }}</a>
                </div>
                <div class="col-3">
                    <span class="text-primary d-block">{{ __('landing.developers') }}</span>
                    <a href="{{ route('status') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.uptime') }}</a>
                    <a href="{{ route('developers.index') }}" class="text-light d-block pb-1 text-underline-hover">{{ __('landing.api') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pb-5 pt-3 d-flex justify-content-between align-items-center">
            <div class="d-inline-flex align-items-center">
                <img src="{{ asset('images/elysium.svg') }}" height="15" alt="Elysium Logo" class="d-inline-block" />
                <a href="//elysium.enterprises/" class="text-light ps-2 text-underline-hover" style="font-size: 17px; font-family: 'IBM Plex Sans'">{{ __('core.elysium') }}</a>
            </div>
            <div class="d-inline-block">
                <a href="{{ route('auth.signup') }}" class="btn btn-outline-primary">{{ __('landing.signup') }}</a>
            </div>
        </div>
    </div>
</footer>
@endsection
