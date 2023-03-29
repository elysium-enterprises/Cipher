@extends('layouts.standard')
@section('title', __('Cipher | The Future of Private Messaging'))
@section('description', __('Tired of being bombarded with ads and tracked by big tech companies? Switch to Cipher and enjoy a chat platform that puts your privacy first. Our end-to-end encryption and commitment to security make us the ideal choice for anyone looking for a safer, more private social experience.'))
@section('content')
<div class="w-full py-5 px-10 max-md:px-5 flex flex-col justify-center items-center">
    <div class="w-full bg-black text-white rounded-xl md:pb-[300px] max-w-6xl max-md:p-5">
        <div class="py-16 max-w-3xl mx-auto text-center mb-5">
            <h1 class="text-6xl max-md:text-4xl font-black">{{ __('Cipher your messages, secure your future.') }}</h1>
            <h2 class="mt-5 text-2xl font-semibold text-gray-400">{{ __('Join the secure communication revolution now with Cipher.') }}</h2>
        </div>
        <div class="mx-auto text-center max-md:p-5">
            <a href="{{ route('auth.signup.show') }}" class="text-white bg-brand border-2 border-brand hover:bg-white hover:border-white hover:text-black duration-300 transition-all font-bold rounded-lg text-sm px-5 py-2.5 text-center max-md:text-lg md:mr-6 tracking-tight max-md:block">{{ __('Get Started') }}</a>
            <a href="#" class="text-brand border-brand border-2 hover:bg-brand hover:text-white duration-300 transition-all font-bold rounded-lg text-sm px-5 py-2.5 text-center mr-6 tracking-tight max-md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                </svg>
                {{ __('How it works') }}
            </a>
        </div>
    </div>
</div>

<div class="w-full mb-[400px] flex justify-center max-md:hidden">
    <img class="block w-full -m-[300px] max-w-3xl lg:max-w-5xl" src="{{ mix('images/illustrations/mockup.png')}}" />
</div>

<div class="w-full flex flex-col items-center justify-center max-md:space-y-24 max-md:pb-0 space-y-36 p-10 max-md:px-5">
    <div class="grid max-md:grid-cols-1 max-md:grid-rows-2 grid-cols-2 max-md:gap-10 gap-36 xl:gap-56 max-w-6xl">
        <div class="flex flex-col items-center justify-center">
            <div>
                <h3 class="text-3xl font-bold mb-5">{{ __('Chat what you want to chat about.') }}</h3>
                <div class="text-gray-600 max-md:text-lg">
                    <p class="mb-2">{{ __('Cipher is an encrypted instant messaging platform that puts privacy first. You can chat about anything you want without worrying about your data being collected, analysed or sold. Cipher is designed to give you a safe space to connect with people, share ideas and collaborate.') }}</p>
                    <p>{{ __('Whether you are looking for a secure messaging app to communicate with your team, friends or family, Cipher is the perfect solution. With features such as end-to-end encryption, disappearing messages and group chats, you can customise your conversations to fit your needs. Plus, with the ability to create and join custom Hives, you can tailor your experience to the topics that matter to you most.') }}</p>
                </div>
            </div>
        </div>
        <div class="grid grid-rows-2 text-center gap-10 max-md:order-first">
            <div class="rounded-xl bg-black text-white p-10 flex flex-col justify-center">
                <p class="text-5xl font-black mb-5">4K</p>
                <p class="text-2xl font-medium text-gray-400">{{ __('Different communities') }}</p>
            </div>
            <div class="rounded-xl p-10 bg-gray-100 flex flex-col justify-center">
                <p class="text-5xl font-black mb-5">20K</p>
                <p class="text-2xl font-medium text-gray-600">{{ __('Messages sent each day') }}</p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 grid-rows-1 gap-10 max-w-6xl max-md:flex flex-col max-md:space-y-10">
        <div class="bg-black rounded-lg p-10">
            <h3 class="text-3xl font-bold mb-10 text-white">{{ __('Join the Swarm.') }}</h3>
            <div class="text-gray-200 max-md:text-lg">
                <p>{{ __('Join the Swarm and connect with people who share your interests and passions. With a wide range of public Hives to choose from, you can explore new topics and engage in meaningful discussions with people from all over the world. And with our commitment to free speech and privacy, you can chat without fear of censorship or surveillance. So why wait? Join a Hive and see what all the buzz is about!') }}</p>
            </div>
        </div>

        <div class="bg-gray-100 rounded-lg p-10">
            <h3 class="text-3xl font-bold mb-10">{{ __('Stay secure.') }}</h3>
            <div class="text-gray-600 max-md:text-lg">
                <p class="mb-2">{{ __('At Cipher, we take your privacy and security seriously. We don\'t collect or analyse any of your data, and we have no incentive to sell your information to third parties because we\'re a non-profit organisation. Our focus is on providing you with a safe, encrypted platform for private messaging, without any hidden agendas.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
