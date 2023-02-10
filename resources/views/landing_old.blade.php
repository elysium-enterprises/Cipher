@extends('layouts.landing')
@section('content')
<div class="container-fluid p-0 d-flex row p-5 pb-0 bg-reset bg-100 vh-100 m-0" style="background-image: url({{ asset('images/hero.png') }})">
    <div class="d-flex col-5 text-end flex-column align-items-center justify-content-center">
        <div>
        <p class="open-sans display-1 w-100">{{ __('landing.powered_by') }}</p>
        <p class="unbounded display-1 w-100">{{ __('core.cipher') }}&trade;</p>
        <p></p>
        </div>

    </div>
    
    <div class="d-flex col-7 flex-column align-items-center justify-content-center text-white">
        <form method="POST" action="{{ route('auth.signup') }}" class="bg-dark rounded p-5 d-flex flex-column align-items-center justify-content-center">
            <div class="input-group mb-4 w-50">
                <input type="text" id="username" class="form-control" placeholder="{{ __('landing.enter_username') }}">
                <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-right"></i></button>
            </div>
            <div class="form-check">
                <input class="form-check-input" role="button" type="checkbox" id="readLegal" required>
                <label class="form-check-label" role="button" for="readLegal">{!! __('landing.have_read_legal', ['terms' => '<a class="text-underline-hover" href="'.  route('landing.terms') . '">'. __('landing.terms') . '</a>', 'privacypolicy' => '<a class="text-underline-hover" href="'.  route('landing.privacy') . '">'. __('landing.privacy_policy') . '</a>', 'guidelines' => '<a class="text-underline-hover" href="'.  route('landing.guidelines') . '">'. __('landing.guidelines') . '</a>']) !!}</label>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid  p-0 d-flex row p-5 pb-0">
    <div class="d-flex flex-column col-5 p-5">
        <h2 class="h1 text-start unbounded pb-3"><sup class="text-muted monospace">[01]</sup>Enjoy privacy from the palm of your hand</h2>
        <div class="h4">
            Cipher allows you to enjoy encrypted communication on all devices with no fear of a third-party snooping in on your conversations.
        </div>
    </div>
    <div class="d-flex flex-column col-7 bg-reset" style="background-image: url('https://via.placeholder.com/500');"></div>
</div>

<div class="container-fluid   p-0 d-flex row p-5 pb-0">
    <div class="d-flex flex-column col-7 bg-reset" style="background-image: url('https://via.placeholder.com/500');"></div>
    <div class="d-flex flex-column col-5 p-5">
        <h2 class="h1 text-end unbounded pb-3"><sup class="text-muted monospace">[02]</sup>Say goodbye to communication barriers</h2>
        <div class="h4">
            Cipher provides a simple way to keep in touch through text, voice and video with private and group messages.
        </div>
    </div>
</div>

<div class="container-fluid  p-0 d-flex row p-5 pb-0">
    <div class="d-flex flex-column col-5 p-5">
        <h2 class="h1 text-start unbounded pb-3"><sup class="text-muted monospace">[03]</sup>Total control over your communication</h2>
        <div class="h4">
            You can take total control of your very own Hive and choose who you want to share it with.
        </div>
    </div>
    <div class="d-flex flex-column col-7 bg-reset" style="background-image: url('https://via.placeholder.com/500');"></div>
</div>

<div class="container-fluid  p-0 d-flex row p-5 pb-0">
    <div class="d-flex flex-column col-7 bg-reset" style="background-image: url('https://via.placeholder.com/500');"></div>
    <div class="d-flex flex-column col-5 p-5">
        <h2 class="h1 text-end unbounded pb-3"><sup class="text-muted monospace">[04]</sup>Join the swarm</h2>
        <div class="h4">
            Share your Hive with the rest of the world on the Swarm and discover other Hives to join in on the conversation.
        </div>
    </div>
</div>

<div class="container-fluid  p-0 d-flex row p-5 pb-0">
    <div class="d-flex flex-column col-5 p-5">
        <h2 class="h1 text-start unbounded pb-3"><sup class="text-muted monospace">[05]</sup>Keep your data safe and secure</h2>
        <div class="h4">
            Nobody but you can access your data. Even in the event of a data breach, your data is safe and sound in our digital vault.
        </div>
    </div>
    <div class="d-flex flex-column col-7 bg-reset" style="background-image: url('https://via.placeholder.com/500');"></div>
</div>


<div class="w-100 p-0 bg-secondary mt-5">
    <div class="container-fluid p-0 d-flex flex-column justify-content-center align-items-center p-5">
        <h2 class="h1 unbounded pb-3">Gather your closest friends</h2>
        <div class="text-center">
            <h3>And feel confident in knowing that your group chats are free from any types of surveillance or tracking.</h3>
            <h3>The secure architecture of Cipher provides a worry-free environment for having deep conversations without the risk of data or conversations being compromised.</h3>
        </div>
    </div>

    <div class="container d-flex flex-column justify-content-center align-items-center p-4 pb-5">
        <h2 class="unbounded mb-3">Ready to join the swarm?</h2>
        <div class="pb-3">
            <a href="{{ route('landing.download') }}" class="btn btn-outline-dark d-block"><i class="bi bi-download pe-3"></i>{{ __('landing.download') }}</a>
        </div>
    </div>
</div>

@endsection