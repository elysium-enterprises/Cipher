@extends('layouts.standard')
@section('title', __('Cipher | The Future of Private Messaging'))
@section('description', __('Tired of being bombarded with ads and tracked by big tech companies? Switch to Cipher and enjoy a chat platform that puts your privacy first. Our end-to-end encryption and commitment to security make us the ideal choice for anyone looking for a safer, more private social experience.'))
@section('hero')
<div class="h-full max-w-6xl mt-16 flex-grow flex flex-col md:grid grid-cols-1 md:grid-cols-2 grid-rows-2 md:grid-rows-1 md:divide-x-2 md:items-center md:justify-center">
    <div class="flex md:justify-center items-center max-sm:p-5 mt-auto md:mt-0 flex-grow h-fit">
        <div class="w-auto flex flex-col md:block mx-auto">
            <h1 class="text-3xl md:text-4xl pb-5 font-bold tracking-tight">{{ __('Cipher your chat, secure your future.') }}</h1>
            <h2 class="text-xl text-gray-700">{{ __('Join the secure communication revolution now with Cipher.') }}</h2>
            <div class="grid grid-cols-2 text-center text-white mt-5 gap-5 font-semibold">
                <a href="{{ route('auth.signup.show') }}" class="px-6 py-2 bg-brand-pastel transition-all duration-300 rounded-lg border-2 border-brand-pastel hover:bg-white hover:text-brand-pastel">{{ __('Start chatting') }}</a>
                <a class="px-6 py-2 bg-brand-pastel rounded-lg border-2 border-brand-pastel transition-all duration-300 hover:bg-white hover:text-brand-pastel">{{ __('Donate') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="pt-10">
    <div class="text-center text-3xl tracking-tight font-bold pt-10 pb-0">{{ __('Why Cipher?') }}</div>
    <div class="md:pt-8" id="stats">
        <dl class="grid max-w-screen-xl grid-cols-2 gap-4 gap-x-0 sm:gap-8 mx-auto text-gray-900 sm:grid-cols-2 md:grid-cols-4">
            <div class="flex flex-col items-center justify-center md:border-2 md:border-brand md:py-5 md:rounded-md">
                <dt class="mb-2 text-3xl font-extrabold">2M+</dt>
                <dd class="font-light text-gray-500 text-center">{{ __('Messages') }}</dd>
            </div>
            <div class="flex flex-col items-center justify-center md:border-2 md:border-brand md:py-5 md:rounded-md">
                <dt class="mb-2 text-3xl font-extrabold">500K</dt>
                <dd class="font-light text-gray-500 text-center">{{ __('Active users') }}</dd>
            </div>
            <div class="flex flex-col items-center justify-center md:border-2 md:border-brand md:py-5 md:rounded-md">
                <dt class="mb-2 text-3xl font-extrabold">30K</dt>
                <dd class="font-light text-gray-500 text-center">{{ __('Hives') }}</dd>
            </div>
            <div class="flex flex-col items-center justify-center md:border-2 md:border-brand md:py-5 md:rounded-md">
                <dt class="mb-2 text-3xl font-extrabold">120K</dt>
                <dd class="font-light text-gray-500 text-center">{{ __('Channels')}}</dd>
            </div>
        </dl>
    </div>
</div>
<div class="w-full">

    <div class="w-full flex flex-col font-display">
        <div class="w-full md:h-96 sm:h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
            <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain p-10">
                <div class="w-full h-full bg-brand-pastel rounded-lg p-5 sm:p-10">
                    <div class="w-full h-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/disconnect.svg') }}')"></div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="p-10 md:max-w-[70%] sm:pt-10 pt-0">
                    <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Take Back Control') }}</p>
                    <p class="text-xl">{{ __('In a world where big tech companies are tracking your every move and governments are increasingly censoring free speech, Cipher is the platform that puts control back in your hands.') }}</p>
                </div>
            </div>
        </div>

        <div class="w-full md:h-96 sm:h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
            <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain p-10 md:order-last">
                <div class="w-full h-full bg-brand-pastel rounded-lg p-5 sm:p-10">
                    <div class="w-full h-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/chat.svg') }}')"></div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="p-10 md:max-w-[70%] sm:pt-10 pt-0">
                    <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Secure. Always.') }}</p>
                    <p class="text-xl">{{ __('With state-of-the-art end-to-end encryption and a commitment to privacy, you can chat, call, and share without worrying about who\'s watching.') }}</p>
                </div>
            </div>
        </div>

        <div class="w-full md:h-96 sm:h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
            <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain p-10">
                <div class="w-full h-full bg-brand-pastel rounded-lg p-5 sm:p-10">
                    <div class="w-full h-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/campfire.svg') }}')"></div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="p-10 md:max-w-[70%] sm:pt-10 pt-0">
                    <p class="text-3xl tracking-tight font-bold mb-3">{{ __('Our Mission') }}</p>
                    <p class="text-xl">{{ __('At Cipher, we\'re committed to making secure communication tools available to everyone. Joining our platform means not only protecting your own privacy but also spreading security and freedom.') }}</p>
                </div>
            </div>
        </div>

        <div class="w-full md:h-96 sm:h-screen min-h-fit grid grid-rows-2 md:grid-rows-1 grid-cols-1 md:grid-cols-2">
            <div class="flex items-center justify-center bg-no-repeat bg-center bg-contain p-10 md:order-last">
                <div class="w-full h-full bg-brand-pastel rounded-lg p-5 sm:p-10">
                    <div class="w-full h-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ mix('images/illustrations/hands.svg') }}')"></div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="p-10 md:max-w-[70%] sm:pt-10 pt-0">
                    <p class="text-3xl tracking-tight font-bold mb-3">{{ __('For the Community') }}</p>
                    <p class="text-xl">{{ __('As a non-profit Community Interest Company, Cipher is committed to providing a platform that prioritizes your security and privacy, not profits or government interests. Join Cipher now and experience a new level of privacy and security.') }}</p>
                </div>
            </div>
        </div>


        <div class="w-full px-10">
            <div>
                <div class="py-10">
                    <h2 class="text-3xl font-bold tracking-tight">{{ __('Buy our merchandise.') }}</h2>
                    <a href="#" class="text-gray-500 duration-300 transition-all underline max-sm:hidden hover:text-brand">{{ __('View all products') }}</a>
                </div>

                <div class="w-full overflow-x-auto snap-x snap-mandatory">
                    <div class="flex w-fit max-sm:space-x-5 max-sm:pr-10 sm:w-full sm:grid sm:grid-cols-4 sm:gap-5">
                        @foreach([1,2,3,4] as $i)
                        <a href="#" class="shadow snap-start rounded-lg border border-300 h-60 w-60 sm:w-full cursor-pointer m-auto bg-center bg-no-repeat bg-cover" style="background-image: url('https://colorlib.com/wp/wp-content/uploads/sites/2/27_white-t-shirt-mockup.jpg')">
                        </a>
                        @endforeach
                        <div class="snap-center font-medium sm:hidden">
                            <a class="underline" style="writing-mode: vertical-lr" href="#">{{ __('Visit the shop') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection
