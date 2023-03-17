@extends('layouts.landing')
@section('content')
<div class="w-full px-5 md:px-52 mt-24 mb-10 md:mt-32">
    <h1 class="font-display font-bold text-5xl w-full text-center">@yield('item-title', 'Title')</h1>
    @yield('item-content')
</div>
@endsection