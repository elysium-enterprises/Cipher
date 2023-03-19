@extends('layouts.generic')
@section('title', __('Cipher | Sign In'))
@section('description', __('Protect your conversations from prying eyes with Cipher. Sign up now and experience secure messaging like never before.'))
@section('body')
<main class="bg-gray-50">
    <div class="flex flex-col md:items-center md:justify-center px-6 pt-8 mx-auto min-h-screen pt:mt-0">
        <a href="{{ route('index') }}" class="flex items-center justify-center mb-8 text-2xl 
                md:text-3xl font-display tracking-tight font-bold lg:mb-10 sm:px-8 px-6">
            <img src="{{ mix('images/logo.svg') }}" class="mr-4 h-8 md:h-11" alt="{{ __('Logo') }}">
            <span>Cipher Foundation</span>
        </a>

        <div class="w-full max-w-xl md:bg-white
                flex-auto md:flex-shrink-0 md:flex-grow-0 pb-8
                md:block flex flex-col justify-center items-center
                transition transition-300 md:rounded md:border md:hover:border-transparent
                md:border-gray-300 md:shadow md:hover:shadow-lg font-display">
            <div class="p-6 sm:p-8 px-0 pb-5 sm:pb-5 flex flex-col md:block flex-grow items-center justify-center">
                <div>
                    <h2 class="text-2xl font-bold text-black">
                        {{ __('Welcome to Cipher!') }}
                    </h2>
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
                </div>

                <form class="mt-5 space-y-6 w-full" method="POST" action="{{ route('auth.signup.store') }}">
                    @csrf
                    <div>
                        <input type="hidden" name="display_name_default" value="{{ old('display_name') ?? session('index_random_display_name') }}">
                        <label for="display_name" class="block mb-2 text-base md:text-sm font-medium">
                            {{ __('Your display name') }}
                            @if($errors->has('display_name'))
                            &bull; <span class="text-red-600 font-semibold">{{ $errors->first('display_name') }}</span>
                            @endif
                        </label>
                        <div class="flex bg-gray-50 border border-gray-300 sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
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
                            {{ __('Your Cipher ID') }}
                            @if($errors->has('cid'))
                            &bull; <span class="text-red-600 font-semibold">{{ $errors->first('cid') }}</span>
                            @endif
                        </label>
                        <div class="flex bg-gray-50 border border-gray-300 sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
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
                            {{ __('Your password') }}
                            @if($errors->has('password'))
                            &bull; <span class="text-red-600 font-semibold">{{ $errors->first('password') }}</span>
                            @endif
                        </label>
                        <div class="flex bg-gray-50 border border-gray-300 sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
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
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border accent-brand border-gray-300 rounded bg-gray-50 focus:ring-3" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light">{{ __('I accept the') }} <a class="font-medium text-brand hover:underline" href="#">{{ __('Terms and Conditions') }}</a></label>
                        </div>
                        <a href="{{ route('auth.signin.show') }}" class="text-sm ml-auto font-medium text-brand hover:underline">{{ __('Sign in instead') }}</a>
                    </div>
            </div>

            <div class="flex justify-center w-full">
                <button type="submit" class="text-white inline-block w-full md:w-1/2 bg-black focus:outline-none
                            hover:bg-brand focus:ring-4 focus:ring-brand/50 font-bold rounded-full
                            transition-color duration-300 text-center mt-auto
                            px-5 py-2.5">
                    {{ __('Sign Up') }}
                </button>
            </div>


            </form>
        </div>
    </div>

</main>
@endsection
