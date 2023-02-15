@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    
    <div class="container">
        <div class="home-section"></div>
        <div class="homepage">
            <img src="{{ asset('images/layout-9.png') }}" alt="" class="image-box">
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
