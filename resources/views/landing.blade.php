@extends('layouts.landing')
@section('title', __('Cipher | The Future of Private Messaging'))
@section('description', __('Tired of being bombarded with ads and tracked by big tech companies? Switch to Cipher and enjoy a chat platform that puts your privacy first. Our end-to-end encryption and commitment to security make us the ideal choice for anyone looking for a safer, more private social experience.'))
@section('hero')
<div class="h-full w-full flex-grow flex flex-col bg-gray-100 md:divide-gray-300 font-display md:grid grid-cols-1 md:grid-cols-2 grid-rows-2 md:grid-rows-1 md:divide-x-2 md:items-center md:justify-center">

    <div class="flex md:justify-center items-center p-5 mt-auto md:mt-0 flex-grow h-fit">
        <div class="w-auto md:w-1/2 flex flex-col md:block mx-auto">
            <h1 class="text-3xl md:text-4xl pb-5 font-bold tracking-tight">{{ __('Cipher your chat, secure your future.') }}</h1>
            <h2 class="text-lg">{{ __('Join the secure communication revolution with Cipher.') }}</h2>
            <a class="text-lg block mt-4 underline w-fit text-brand hover:text-black duration-300 transition-all" href="{{ route('landing.about.app') }}">{{ __('Learn More') }}</a>
        </div>

    </div>
    <div class="w-full flex flex-col text-black p-5 justify-center items-center h-fit">
        <form class="text-lg md:text-base flex-grow h-fit md:h-auto w-full flex flex-col md:w-4/5 
                md:bg-white
                transition transition-300 md:rounded md:border md:hover:border-transparent
                md:border-gray-300 md:shadow md:hover:shadow-lg md:p-10" method="POST" action="{{ route('auth.signup.store') }}">
            <div class="flex flex-col flex-grow justify-center">
                @if($errors->any())
                @foreach($errors->getMessages() as $field => $errorList)
                @if($field != 'cid' && $field != 'password')
                <div class="bg-red-100/50 border-l-4 border-red-500 text-red-700 p-2 mb-5 md:mb-3" role="alert">
                    <p><span class="font-bold font-mono">{{ __('Error') }}</span> &bullet; <span>{{ $errorList[0] }}</span></p>
                </div>
                @break
                @endif
                @endforeach
                @endif
                @if(session()->has('success'))
                <div class="bg-green-100/50 border-l-4 border-green-500 text-green-700 p-2 mb-5 md:mb-3" role="alert">
                    <p><span class="font-bold font-mono">{{ __('Success') }}</span> &bullet; <span>{{ session('success') }}</span></p>
                </div>
                @endif
                @if(session()->has('info'))
                <div class="bg-blue-100/50 border-l-4 border-blue-500 text-blue-700 p-2 mb-5 md:mb-3" role="alert">
                    <p><span class="font-bold font-mono">{{ __('Info') }}</span> &bullet; <span>{{ session('info') }}</span></p>
                </div>
                @endif
                @csrf
                <div>
                    <label for="cipher" class="block mb-2 text-base md:text-sm font-bold">
                        {{ __('Your CID') }}
                        @if($errors->has('cid'))
                        &bull; <span class="text-red-600 font-semibold">{{ $errors->first('cid') }}</span>
                        @endif
                    </label>
                    <div class="flex border border-gray-300 sm:text-sm rounded-lg w-full p-2.5 pr-4 outline-none transition-[border] duration-300">
                        <label for="cid" class="pr-2.5 text-gray-500">$</label>
                        <input type="text" name="cid" id="cid" autocomplete="username" class="bg-transparent outline-none flex-grow">
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
                <div class="mt-4">
                    <label for="password" class="block mb-2 text-base md:text-sm font-bold">
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
                    <p class="text-sm font-light text-gray-500 mt-3">{{ __('Create a strong password with at least 8 characters, including uppercase and lowercase letters, numbers, and special characters.') }}</p>
                </div>
                <div class="flex items-start mt-4">
                    <div class="flex items-center h-5">
                        <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border accent-brand border-gray-300 rounded bg-gray-50 focus:ring-3" required>
                    </div>
                    <div class="ml-3 text-sm">
                        <label for="terms" class="font-light">{{ __('I accept the') }} <a class="font-medium text-brand hover:underline" href="#">{{ __('Terms and Conditions') }}</a></label>
                    </div>
                </div>
                <p class="text-sm font-light py-2">
                    {{ __('Are you already a member?') }} <a href="{{ route('auth.signin.show') }}" class="font-medium text-brand hover:underline">{{ __('Sign in here') }}</a>
                </p>
            </div>

            <div class="w-full flex flex-col items-center py-4 md:pb-0">
                <button type="submit" class="text-white inline-block w-full md:w-1/2 bg-black focus:outline-none
                hover:bg-brand focus:ring-4 focus:ring-brand/50 font-bold rounded-full
                transition-color duration-300 text-center text-lg
                px-5 py-2.5">
                    {{ __('Sign Up') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('content')
<div class="w-full text-center text-3xl tracking-tight font-bold font-display pt-10 pb-0">{{ __('Why Cipher?') }}</div>
<div class="w-full font-display">
        <div class="p-5 py-10 md:pt-8" id="stats">
            <dl class="grid max-w-screen-xl grid-cols-2 gap-8 px-4 mx-auto text-gray-900 sm:grid-cols-2 md:grid-cols-4">
                <div class="flex flex-col items-center justify-center md:border md:border-gray-300 md:py-5 md:rounded-md">
                    <dt class="mb-2 text-3xl font-extrabold">2M+</dt>
                    <dd class="font-light text-gray-500 text-center">{{ __('Messages') }}</dd>
                </div>
                <div class="flex flex-col items-center justify-center md:border md:border-gray-300 md:py-5 md:rounded-md">
                    <dt class="mb-2 text-3xl font-extrabold">500K</dt>
                    <dd class="font-light text-gray-500 text-center">{{ __('Active users') }}</dd>
                </div>
                <div class="flex flex-col items-center justify-center md:border md:border-gray-300 md:py-5 md:rounded-md">
                    <dt class="mb-2 text-3xl font-extrabold">30K</dt>
                    <dd class="font-light text-gray-500 text-center">{{ __('Hives') }}</dd>
                </div>
                <div class="flex flex-col items-center justify-center md:border md:border-gray-300 md:py-5 md:rounded-md">
                    <dt class="mb-2 text-3xl font-extrabold">120K</dt>
                    <dd class="font-light text-gray-500 text-center">{{ __('Channels')}}</dd>
                </div>
            </dl>
        </div>
<div class="w-full flex flex-col font-display">
    <div class="w-full md:h-96 h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/spyglass.svg') }}')">
        </div>
        <div class="flex items-center justify-center">
            <div class="p-10 md:max-w-[70%]">
                <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Take Back Control') }}</p>
                <p class="text-xl">{{ __('In a world where big tech companies are tracking your every move and governments are increasingly censoring free speech, Cipher is the platform that puts control back in your hands.') }}</p>
            </div>
        </div>
    </div>

    <div class="w-full md:h-96 h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain md:order-last" style="background-image: url('{{ mix('images/illustrations/lock.svg') }}')">
        </div>
        <div class="flex items-center justify-center">
            <div class="p-10 md:max-w-[70%]">
                <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Secure. Always.') }}</p>
                <p class="text-xl">{{ __('With state-of-the-art end-to-end encryption and a commitment to privacy, you can chat, call, and share without worrying about who\'s watching.') }}</p>
            </div>
        </div>
    </div>

    <div class="w-full md:h-96 h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/chat.svg') }}')">
        </div>
        <div class="flex items-center justify-center">
            <div class="p-10 md:max-w-[70%]">
                <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Our Mission') }}</p>
                <p class="text-xl">{{ __('At Cipher, we\'re committed to making secure communication tools available to everyone. Joining our platform means not only protecting your own privacy but also spreading security and freedom.') }}</p>
            </div>
        </div>
    </div>

    <div class="w-full md:h-96 h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
        <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain md:order-last" style="background-image: url('{{ mix('images/illustrations/hands.svg') }}')">
        </div>
        <div class="flex items-center justify-center">
            <div class="p-10 md:max-w-[70%]">
                <p class="text-3xl tracking-tight font-bold mb-3">{{ __('For the Community') }}</p>
                <p class="text-xl">{{ __('As a non-profit Community Interest Company, Cipher is committed to providing a platform that prioritizes your security and privacy, not profits or government interests. Join Cipher now and experience a new level of privacy and security.') }}</p>
            </div>
        </div>
    </div>
</div>
<div class="font-display bg-gray-100 tracking-tight text-center py-10 text-3xl font-bold">{{ __('Get Involved') }}</div>

<div class="w-full font-display bg-gray-100 md:grid md:grid-cols-3 md:gap-5 md:gap-y-0 py-0 px-5 md:pb-10">

    <div class="w-full hover:translate-y-[-5px] flex flex-col p-6 bg-white border border-gray-200 rounded-lg shadow mb-5 md:mb-0 md:hover:shadow-lg transition-all duration-300">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{ __('Our merchandise') }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 text-xl md:text-lg">{{ __('Show your commitment to privacy with Cipher merchandise. Shop our selection of high-quality products and spread the word about secure communication. Join the movement today!') }}</p>
        <div class="inline-flex md:mt-auto">
            <a href="#" class="inline-flex items-center px-3 py-2 text-lg md:text-base font-medium text-center text-white bg-brand rounded-lg hover:bg-brand/80 transition-colors duration-300 focus:ring-4 focus:outline-none">
                {{ __('Visit the store') }}
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="w-full hover:translate-y-[-5px] flex flex-col p-6 bg-white border border-gray-200 rounded-lg shadow mb-5 md:mb-0 md:hover:shadow-lg transition-all duration-300">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{ __('Donate to Cipher') }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 text-xl md:text-lg">{{ __('Support our mission to create a more private and secure world by donating to Cipher Foundation.') }}</p>
        <div class="inline-flex md:mt-auto">
            <a href="#" class="inline-flex items-center px-3 py-2 text-lg md:text-base font-medium text-center text-white bg-brand rounded-lg hover:bg-brand/80 transition-colors duration-300 focus:ring-4 focus:outline-none">
                {{ __('Donate now') }}
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="w-full hover:translate-y-[-5px] flex flex-col p-6 bg-white border border-gray-200 rounded-lg shadow mb-5 md:mb-0 md:hover:shadow-lg transition-all duration-300">
        <a href="#">
            <h5 class="text-2xl font-bold tracking-tight text-black">Blog title</h5>
            <a class="text-xs text-gray-500 mb-2">{{ __('(Our latest blog post)') }}</a>
        </a>
        <p class="mb-3 font-normal text-gray-700 text-xl md:text-lg">Blog post</p>
        <div class="inline-flex md:mt-auto">
            <a href="#" class="inline-flex items-center px-3 py-2 text-lg md:text-base font-medium text-center text-white bg-brand rounded-lg hover:bg-brand/80 transition-colors duration-300 focus:ring-4 focus:outline-none">
                {{ __('Read our blog') }}
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>

    <div class="w-full flex flex-col items-center px-5 pb-0 pt-6 md:pt-16  col-span-3">
        <a href="{{ route('auth.signup.show') }}" class="text-white inline-block sm:w-1/4 bg-black focus:outline-none
            hover:bg-brand focus:ring-4 focus:ring-brand/50 font-bold rounded-full
            transition-color duration-300 text-center
            px-5 py-2.5">
            {{ __('Sign Up') }}
        </a>
    </div>
</div>


@endsection
