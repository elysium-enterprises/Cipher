@extends('layouts.generic')
@section('body')
<div id="root" class="font-display">
    <div class="min-h-screen flex flex-col">
        @isset($notification)
        <div class="w-100 p-2 bg-brand-pastel border-b-2 border-brand text-brand font-medium md:text-center  flex flex-col items-center justify-center text-center">
            <span>{{ $notification }}</span>
        </div>
        @endisset
        <nav class="max-sm:px-2 max-sm:text-lg px-4 py-2.5 w-full z-20 top-0 sticky left-0 bg-white">
            <div class="flex flex-wrap items-center mx-auto max-w-6xl">
                <a href="{{ route('index') }}" class="flex items-center md:mr-5">
                    <img src="{{ mix('images/logo.svg') }}" class="h-10 mr-3" alt="{{ __('Logo') }}">
                    <span class="self-center text-xl font-bold whitespace-nowrap tracking-tight hidden md:inline">{{ __('Cipher Foundation') }}</span>
                </a>
                <div class="flex ml-auto items-center">
                    <button data-collapse-toggle="navbar-items" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none" aria-controls="navbar-items" aria-expanded="false">
                        <span class="sr-only">{{ __('sr.open-navbar') }}</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:ml-auto" id="navbar-items">
                    <ul class="flex max-md:flex-col p-4 md:p-2 max-md:mt-4 font-bold md:font-semibold md:space-x-8">
                        <li>
                            <a href="{{ route('index') }}" class="block py-1 px-2 {{ Route::current()->getName() == 'index' ? 'text-brand' : 'text-white md:text-black md:hover:border-b-brand' }} md:border-b-2 md:border-transparent md:bg-transparent md:p-0">{{ __('Home') }}</a>
                        </li>
                        <li>
                            <a href="#" class="block py-1 px-2 transition-colors duration-300 {{ Route::current()->getName() == 'host.index' ? 'text-brand' : 'md:text-black md:hover:border-b-brand' }} md:border-b-2 md:border-transparent md:bg-transparent md:p-0">{{ __('Host') }}</a>
                        </li>
                        <li>
                            <a href="#" class="block py-1 px-2 transition-colors duration-300 {{ Route::current()->getName() == 'blog.index' ? 'text-brand' : 'md:text-black md:hover:border-b-brand' }} md:border-b-2 md:border-transparent md:bg-transparent md:p-0">{{ __('Blog') }}</a>
                        </li>
                        <li>
                            <a href="#" class="block py-1 px-2 transition-colors duration-300 {{ Route::current()->getName() == 'store.index' ? 'text-brand' : 'md:text-black md:hover:border-b-brand' }} md:border-b-2 md:border-transparent md:bg-transparent md:p-0">{{ __('Shop') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="flex-1 flex flex-col items-center">
            @yield('content')
        </div>
    </div>
</div>
<footer class="mt-auto w-full flex flex-col p-10 max-md:text-xl font-display font-medium items-center justify-center max-md:items-start">
    <div class="flex flex-col md:flex-col md:grid md:grid-cols-5 md:gap-5 max-w-6xl">

        <div class="mt-5 md:mt-0 flex flex-col md:col-span-2">
            <div class="font-bold text-[20px]">
                <img src="{{ mix('images/logo.svg') }}" class="w-[25px] h-[25px] inline align-middle filter" alt="{{ __('Logo') }}">
                <span class="align-middle">{{ __('Cipher Foundation') }}</span>
            </div>

            <div class="mt-auto text-xs text-gray-500 max-md:hidden">
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
                <div class="flex md:justify-end">
                    <div>
                        <a class="block font-bold text-brand uppercase max-md:mt-5 mb-3 text-xs tracking-tight">{{ __('Resources') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Feedback') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Support') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Blog') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('FAQ') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Merchandise') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Donate') }}</a>
                        <a href="//status.cipher.foundation" class="block hover:decoration-brand hover:underline">{{ __('Status') }}</a>
                    </div>
                </div>

                <div class="flex md:justify-end">
                    <div>
                        <a class="block font-bold text-brand uppercase max-md:mt-5 mb-3 text-xs tracking-tight">{{ __('Legal') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Terms') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Guidelines') }}</a>
                        <a href="{{ route('landing.privacy') }}" class="block hover:decoration-brand hover:underline">{{ __('Privacy') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Licenses') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Disclosure') }}</a>
                    </div>
                </div>

                <div class="flex md:justify-end">
                    <div>
                        <a class="block font-bold text-brand uppercase max-md:mt-5 mb-3 text-xs tracking-tight">{{ __('Company') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('About') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Newsroom') }}</a>
                        <a href="#" class="block hover:decoration-brand hover:underline">{{ __('Branding') }}</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</footer>
@endsection
