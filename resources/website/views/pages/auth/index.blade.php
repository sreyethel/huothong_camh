@extends('website::index')
@section('index')
    <div class="auth">
        <div id="recaptcha-container"></div>
        <div class="bg-svg"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#6d11bb" fill-opacity="1"
                d="M0,256L60,234.7C120,213,240,171,360,170.7C480,171,600,213,720,213.3C840,213,960,171,1080,170.7C1200,171,1320,213,1380,234.7L1440,256L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>
        <a class="h-auto w-auto flex items-center btn back-home" href="{{ route('website-home') }}">
            <i class="w-5 h-5 mr-1" data-feather="corner-down-left"></i>
            @lang('website.pages.go_home')
        </a>
        @yield('auth-content')
    </div>
@stop
