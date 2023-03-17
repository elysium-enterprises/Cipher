@extends('layouts.generic')
@section('body')
<div class="min-h-screen flex flex-col">
    @isset($notification)
    <div class="w-100 p-2 bg-yellow-900 border-b-2 border-yellow-600 text-yellow-500 md:text-center font-display flex flex-col items-center justify-center text-center">
        <span>{{ $notification }}</span>
    </div>
    @endisset
<nav class="px-2 sm:px-4 py-2.5 w-full z-20 top-0 left-0 border-b border-gray-200 font-display">
    <div class="container flex flex-wrap items-center mx-auto">
        <a href="{{ route('index') }}" class="flex items-center md:mr-5">
            <img src="{{ asset('images/logo.svg') }}" class="h-10 mr-3 filter" alt="{{ __('Logo') }}">
            <span class="self-center text-xl font-bold whitespace-nowrap hidden md:inline">Cipher Foundation</span>
        </a>
        <div class="flex md:order-2 ml-auto">
            <a href="#" class="text-brand border-brand border-2 hover:text-black hover:border-black duration-300 transition-colors font-bold rounded-lg text-sm px-5 py-2.5 text-center mr-6 tracking-tight hidden md:inline-block">{{ __('Donate') }}</a>
            @auth
            <a href="{{ route('app.channels.me') }}" class="text-white bg-brand hover:bg-brand/80 transition-colors duration-300 focus:ring-4 focus:outline-none focus:ring-brand/50 font-bold rounded-full text-sm px-5 py-2.5 text-center mr-3 md:mr-0 tracking-tight hidden md:inline-block">{{ __('Open App') }}</a>
            @else
            <a href="{{ route('auth.signin.show') }}" class="text-white bg-brand hover:bg-brand/80 transition-colors duration-300 focus:ring-4 focus:outline-none focus:ring-brand/50 font-bold rounded-full text-sm px-5 py-2.5 text-center mr-3 md:mr-0 tracking-tight hidden md:inline-block">{{ __('Sign In') }}</a>
            @endauth
            <button data-collapse-toggle="navbar-items" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-items" aria-expanded="false">
                <span class="sr-only">{{ __('Open main menu') }}</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-items">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent">
                <li>
                    <a href="{{ route('index') }}" class="block py-2 pl-3 pr-4 md:font-semibold {{ Route::current()->getName() == 'index' ? 'text-brand' : 'text-white md:light:text-black' }} md:bg-transparent md:p-0">{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 transition-colors duration-300 md:font-semibold {{ Route::current()->getName() == 'host.index' ? 'text-brand' : 'md:light:text-black' }} md:bg-transparent md:p-0">{{ __('Host') }}</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 transition-colors duration-300 md:font-semibold {{ Route::current()->getName() == 'blog.index' ? 'text-brand' : 'md:light:text-black' }} md:bg-transparent md:p-0">{{ __('Blog') }}</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 transition-colors duration-300 md:font-semibold {{ Route::current()->getName() == 'store.index' ? 'text-brand' : 'md:light:text-black' }} md:bg-transparent md:p-0">{{ __('Store') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="flex-1 flex flex-col items-center justify-center">
    @yield('hero')
</div>
</div>
<main>
    @yield('content')

</main>
<footer class="mt-auto w-full flex flex-col p-10 bg-gray-100 font-display">
    <div class="flex flex-col-reverse md:flex-col w-full md:grid md:grid-cols-5 md:gap-5">

        <div class="mt-5 md:mt-0 flex flex-col md:col-span-2">
            <div class="font-bold text-[20px]">
                <img src="{{ asset('images/logo.svg') }}" class="w-[25px] h-[25px] inline align-middle filter" alt="{{ __('Logo') }}">
                <span class="align-middle">{{ __('Cipher Foundation') }}</span>
            </div>

            <div class="mt-auto text-xs text-gray-500">
                <div class="pr-4">
                    <div>
                        &copy; {{ date('Y') }} {{ __('Cipher Foundation, a CIC non-profit organisation.') }}
                    </div>
                    <div>
                        {{ __('"Cipher" and Cipher Foundation\'s logo are registered trademarks in the UK and other countries.') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-3">
            <div class="md:grid-cols-3 md:grid md:gap-5 md:flex-col md:grid-rows-1 md:w-full">
                <div>
                    <a class="block font-bold text-brand">{{ __('Resources') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Feedback') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Support') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Blog') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('FAQ') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Merchandise') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Donate') }}</a>
                    <a href="//status.cipher.foundation" class="block hover:decoration-brand hover:underline">{{ __('Status') }}</a>
                </div>

                <div>
                    <a class="block font-bold pt-3 md:pt-0 text-brand">{{ __('Legal') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Terms') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Guidelines') }}</a>
                    <a href="{{ route('landing.privacy') }}" class="block hover:decoration-brand hover:underline">{{ __('Privacy') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Licenses') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Disclosure') }}</a>
                </div>

                <div>
                    <a class="block font-bold pt-3 md:pt-0 text-brand">{{ __('Company') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('About') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Newsroom') }}</a>
                    <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Branding') }}</a>
                </div>
            </div>

        </div>

    </div>
</footer>
@endsection
