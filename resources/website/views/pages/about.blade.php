@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <!-- about us section -->
    <div class="about-us-section">
        <div class="about-us-section-wrapper container">
            @isset($about)
                <div class="row column">
                    <div class="col-md-6 about-us-section-wrapper-content">
                        <h1>{{ $about?->title }}</h1>
                        <p>{!! json_decode($about?->content)?->content ?? '' !!}</p>
                    </div>
                </div>
            @else
                @component('website::components.empty', [
                    'title' => 'No Information',
                    'message' => 'No information found for this page. Please try again later.',
                    'image' => asset('images/about-us.svg'),
                    'style' => 'height: 300px; width: auto;',
                ])
                @endcomponent
            @endisset
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
