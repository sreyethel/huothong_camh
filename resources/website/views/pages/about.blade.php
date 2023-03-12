@extends('website::shared.layout')
@include('website::components.meta')
@section('content')

    @include('website::components.banner', [
        'content' => isset($banner?->content) ? $banner?->content : null,
        'image' => isset($banner?->thumbnail_url) ? $banner?->thumbnail_url : null,
        'breadcrumbs' => [
            [
                'name' => __('website.navbar.home'),
                'active' => false,
                'url' => route('website-home'),
            ],
            [
                'name' => __('website.navbar.about_us'),
                'active' => true,
            ],
        ],
    ])

    <!-- about us section -->
    @if ($about->content)
        <div class="about-us-section">
            <div class="about-us-section-wrapper container">
                <div class="row column">
                    <div class="about-us-section-wrapper-content">
                        {!! toObject($about->content)?->content !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- our expert -->
        @if (isset($expert) && count($expert) > 0)
            <div class="block-container py-14" style="background-image: url('{{ $expert_banner->thumbnail_url }}')">
                <div class="block-content container relative">
                    <div class="absolute top-1/2 left-0 transform translate-y-5 color-white z-20">
                        <div class="text-3xl font-bold pb-5 uppercase">Our Expert</div>
                        <div class="grid gap-5">
                            @foreach ($expert as $item)
                                <div class="flex items-center">
                                    <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                                        <img class="w-full h-full object-contain rounded-full"
                                            src="{{ $item->thumbnail_url }}" alt="">
                                    </div>
                                    <div class="text-lg text-left pl-5 w-3/5">
                                        {{ $item->title }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        @component('website::components.empty', [
            'title' => 'No Information',
            'message' => 'No information found for this page. Please try again later.',
            'image' => asset('images/about-us.svg'),
            'style' => 'height: 300px; width: auto;',
        ])
        @endcomponent
    @endif

    <!-- space -->
    <div class="space"></div>
@stop
