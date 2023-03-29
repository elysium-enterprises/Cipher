@extends('layouts.generic')
@section('body')
<main style="height: 100svh" class="bg-gray-100 font-display flex items-center justify-center w-full">
    <div class="flex flex-col items-center justify-center max-w-lg w-full">
        <a href="{{ route('index') }}" class="flex items-center justify-center mb-8 text-2xl md:text-3xl font-display tracking-tight font-bold lg:mb-10 sm:px-8 px-6">
            <img src="{{ mix('images/logo.svg') }}" class="mr-4 h-8 md:h-11" alt="{{ __('Logo') }}">
            <span>{{ __('Cipher Foundation') }}</span>
        </a>
        <div class="w-full bg-white rounded-lg shadow">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div>
                    @yield('header')
                </div>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('auth.signup.store') }}">
                    @csrf
                    @yield('form')
                    <div class="flex justify-center">
                        <button type="submit" class="text-white inline-block w-full md:w-1/2 bg-black focus:outline-none
                            hover:bg-brand font-bold rounded-full
                            transition-color duration-300 text-center mt-auto
                            px-5 py-2.5">
                            @yield('button')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
