@extends('layouts.standalone')
@section('title', __('Cipher | Sign In'))
@section('description', __('Unlock the power of private messaging with Cipher. Sign in now and keep your conversations safe.'))

@section('header')
@if(session()->has('last_logout_member_id'))
<h1 class="text-xl font-bold text-black mb-0">
    {!! __($greeting) !!}
</h1>
<p class="text-base my-0 text-gray-500">{{ __('Please prove that you\'re still you.') }}</p>
@else
<h1 class="text-xl font-bold text-black">
    {{ __('Welcome to Cipher!') }}
</h1>
@endif
<a href="{{ route('auth.signup.show') }}" class="text-sm font-light underline text-gray-500 duration-300 transition-all hover:text-brand">{{ __('Or join us instead.') }}</a>

@if($errors->any())
@foreach($errors->getMessages() as $field => $errorList)
@if($field != 'cid' && $field != 'password' && $field != 'mfa')
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
    <label for="cid" class="block mb-2 text-base md:text-sm font-medium">
        {{ __('Cipher ID') }}
        @if($errors->has('cid'))
        &bull; <span class="text-red-600 font-semibold">{{ $errors->first('cid') }}</span>
        @endif
    </label>
    <div class="flex bg-gray-50 border {{ $errors->has('cid') ? 'border-red-500' : 'border-gray-300' }}  sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
        <label for="cid" class="pr-2.5 text-gray-500">$</label>
        <input type="text" name="cid" id="cid" autocomplete="username" value="{{ old('username') }}" required class="bg-transparent outline-none flex-grow">
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
        <input type="password" name="password" id="password" autocomplete="password" value="{{ old('password') }}" required placeholder="••••••••" class="bg-transparent outline-none flex-grow">
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
@if($errors->has('mfa'))
<div>
    <OtpInput />
</div>
@endif
<div class="flex items-start">
    <div class="flex items-center h-5">
        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4" required="">
    </div>
    <div class="ml-3 text-sm">
        <label for="remember" class="font-medium">{{ __('Remember me') }}</label>
    </div>
</div>
@endsection
@section('button', __('Sign In'))
