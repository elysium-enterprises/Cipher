@extends('layouts.standalone')
@section('title', __('Cipher | Sign In'))
@section('description', __('Protect your conversations from prying eyes with Cipher. Sign up now and experience secure messaging like never before.'))


@section('header')
<h1 class="text-xl font-bold text-black">
    {{ __('Join the revolution now.') }}
</h1>
<a href="{{ route('auth.signin.show') }}" class="text-sm font-light underline text-gray-500 duration-300 transition-all hover:text-brand">{{ __('Already a member?') }}</a>
@if($errors->any())
@foreach($errors->getMessages() as $field => $errorList)
@if($field != 'display_name' && $field != 'password' && $field != 'cid')
<div class="text-red-500 mt-5">
    <p><span class="font-bold">{{ __('Error') }}</span> &bull; {{ $errorList[0] }}</p>
</div>
@break
@endif
@endforeach
@endif
@endsection

@section('form')
<div>
    <input type="hidden" name="display_name_default" value="{{ old('display_name') ?? session('index_random_display_name') }}">
    <label for="display_name" class="block mb-2 text-base md:text-sm font-medium">
        {{ __('Display name') }}
        @if($errors->has('display_name'))
        &bull; <span class="text-red-600 font-semibold">{{ $errors->first('display_name') }}</span>
        @endif
    </label>
    <div class="flex bg-gray-50 border {{ $errors->has('display_name') ? 'border-red-500' : 'border-gray-300' }} sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
        <input type="text" name="display_name" id="display_name" placeholder="{{ old('display_name') ?? session('index_random_display_name') }}" autofocus class="bg-transparent outline-none flex-grow">
        @if($errors->has('display_name'))
        <a class="flex items-center">
            <div class="text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
        </a>
        @endif
    </div>
</div>
<div>
    <label for="cid" class="block mb-2 text-base md:text-sm font-medium">
        {{ __('Cipher ID') }}
        @if($errors->has('cid'))
        &bull; <span class="text-red-600 font-semibold">{{ $errors->first('cid') }}</span>
        @endif
    </label>
    <div class="flex bg-gray-50 border {{ $errors->has('cid') ? 'border-red-500' : 'border-gray-300' }} sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
        <label for="cid" class="pr-2.5 text-gray-500">$</label>
        <input type="text" name="cid" id="cid" autocomplete="new-username" required class="bg-transparent outline-none flex-grow">
        @if($errors->has('cid'))
        <a class="flex items-center">
            <div class="text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
        </a>
        @endif
    </div>
</div>
<div>
    <label for="password" class="block mb-2 text-base md:text-sm font-medium">
        {{ __('Password') }}
        @if($errors->has('password'))
        &bull; <span class="text-red-600 font-semibold">{{ $errors->first('password') }}</span>
        @endif
    </label>
    <div class="flex bg-gray-50 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
        <input type="password" name="password" id="password" autocomplete="new-password" required placeholder="••••••••" class="bg-transparent outline-none flex-grow">
        @if($errors->has('password'))
        <a class="flex items-center">
            <div class="text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
        </a>
        @endif
    </div>
</div>
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4" required="">
    </div>
    <div class="ml-3 text-sm">
        <label for="terms" class="font-light">{{ __('I accept the') }} <a class="font-medium text-brand hover:underline" href="#">{{ __('Terms and Conditions') }}</a></label>
    </div>
</div>
@endsection
@section('button', __('Sign Up'))