@extends('layouts.generic')
@section('title', __('Cipher Foundation | Home'))
@section('head')
<link rel="stylesheet" href="{{ asset('css/landing_page.css') }}" />
@endsection
@section('body')
{{-- <div class="flex h-full">
    <div class="flex-auto w-1/3 p-4">
      <div class="h-full w-full">
          <img class="w-full h-full rounded-lg bg-tinted" src="{{ asset('images/phone.png') }}" alt="App">
  </div>
  </div>
  <div class="flex-auto w-2/3 pl-5">
      <nav class="flex items-center justify-between pl-0 py-4 px-6 bg-gray-800">
          <img class="w-8 h-8" src="{{ asset('images/logo.svg') }}" alt="Logo">
          <div class="flex-auto text-sm">
              <a class="px-7 pl-14">Home</a>
              <a class="px-7">Download</a>
              <a class="px-7">Blog</a>
              <a class="px-7">Developers</a>
          </div>

          <div class="flex">
              <a class="text-white font-medium mr-4" href="#">Sign In</a>
              <a class="text-white font-medium" href="#">Sign Up</a>
          </div>
      </nav>
      <div class="px-6 py-16 text-center">
          <p class="text-3xl font-medium text-gray-800">Sample text sample text sample text.</p>
          <p class="text-gray-600">sample text sample text sample text</p>
          <a class="bg-indigo-500 text-white rounded-full py-2 px-8 mt-4 hover:bg-indigo-600" href="#">Download</a>
      </div>
  </div>
  </div> --}}
<div class="h-full w-full bg-primary flex flex-col">
    <div class="bg-cover flex flex-grow" style="background-image: url('{{ asset('images/hero_mobile.jpg') }}')"></div>
    <div class="flex flex-col text-white p-10 pb-5">
        <h1 class="text-2xl pb-5 tracking-tight font-semibold">{{ __('Cipher your chat, secure your future.') }}</h1>
        <h2 class="text-gray-300">{{ __('Join the secure communication revolution with Cipher.') }}</h2>
        <button type="button" class="tracking-tight mt-10 text-primary bg-white border border-gray-300 focus:outline-none
                      hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full 
                      px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 
                      dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{ __('Get Started') }}</button>
    </div>
</div>
<div class="h-full w-full bg-primary text-white">
    <div class="p-5">
        <div class="w-full flex flex-col p-6 border border-[#202020] rounded-lg shadow">
            <h3 class="mb-3 text-2xl font-semibold tracking-tight text-logo-primary">Secure conversations.</h3>
            <p class="font-normal w-full">{{ __('All messages are encrypted with end-to-end encryption. You choose who sees your messages!') }}</p>
        </div>
    </div>
</div>
<footer class="w-full flex flex-col p-10 bg-primary text-white">
    <div class="flex w-full pb-5">
        <div class="w-1/2">
            <a class="block font-bold text-logo-primary">Company</a>
            <a href="#" class="block">About</a>
            <a href="#" class="block">Branding</a>
            <a class="block font-bold pt-3 text-logo-primary">Resources</a>
            <a href="#" class="block">Feedback</a>
            <a href="#" class="block">Support</a>
            <a href="#" class="block">FAQ</a>
            <a href="#" class="block">Merchandise</a>
            <a href="#" class="block">Donate</a>
            <a class="block font-bold pt-3 text-logo-primary">Legal</a>
            <a href="#" class="block">Terms</a>
            <a href="#" class="block">Guidelines</a>
            <a href="#" class="block">Privacy</a>
            <a href="#" class="block">Licenses</a>
            <a href="#" class="block">Disclosure</a>
        </div>
        <div class="w-1/2 relative">
        
        </div>
    </div>
    <div class="w-full text-center flex flex-column justify-center">
        <img src="{{ asset('images/elysium.svg') }}" alt="Elysium" height="25" width="25" />
        <a href="#" class="text-[12px] ml-3">An <span class="text-logo-primary">Elysium</span> company.</a>
    </div>
</footer>
@endsection
