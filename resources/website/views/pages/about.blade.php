@extends('website::shared.layout')
@include('website::components.meta')
@section('content')

    @include('website::components.banner', [
        'content' => 'who we are',
        'title' => 'A Few Words About Us',
        'image' => asset('images/banner.jpg'),
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

    <div class="about-us-section">
        <div class="about-us-section-wrapper container">
            <div class="row">
                <div class="about-us-section-wrapper-content">
                    <div class="grid gap-5">
                        <div class="text-base uppercase">@lang('website.navbar.about_us')</div>

                        <h2 class="text-lg font-bold">Providing Best Properties Since 2023</h2>

                        <p>
                            Dignissim justo, quis porta dignissim est sit. Nibh imperdiet aliquam tellus massa blandit
                            pharetra
                            arcu. In lectus laoreet tempor sit laoreet amet vel vitae sed. Quis pretium fames vitae aliquet
                            nec
                            eu nibh. Sed donec facilisi tempus in libero, tellus turpis metus, et. Lectus urna, justo
                            molestie
                            at cursus purus. Molestie commodo aliquet pretium neque ut gravida. Pellentesque consectetur
                            odio
                            morbi eget odio tortor porttitor tortor, tellus. Ut placerat ipsum hendrerit.
                        </p>
                    </div>
                    {{-- <button class="btn wow animated fadeInRight" data-wow-delay="1.1s"
                        s-click-link="{{ route('website-page.index', 'about') }}">@lang('website.page.learn_more')</button> --}}
                </div>

                <div class="about-us-section-wrapper-image">
                    <img src="https://ld-wt73.template-help.com/tf/estancy_v1/images/about-01-500x530.jpg" alt="about us">
                </div>
            </div>
        </div>
    </div>

    <div class="block-container py-14" style="background-image: url('{{ asset('images/expert.jpg') }}')">
        <div class="block-content container relative">
            <div class="absolute top-1/2 left-0 transform translate-y-5 color-white z-20">
                <div class="text-3xl font-bold pb-5 uppercase">Our Expert</div>
                <div class="grid gap-5">
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain" src="{{ asset('images/building.png') }}" alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            DESIGN + BUILD
                            <br>
                            CONSTRUCTION BUILDING
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain" src="{{ asset('images/light.jpg') }}" alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            CONSTRUCTION SERVICE
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain" src="{{ asset('images/team-work.png') }}" alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            SKILLED TEAM AND IN
                            HOUSE DESIGNED + BUILT |
                            DIRECTED MENPOWER
                            THRU OUR MANAGEMENT
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-us-section">
        <div class="about-us-section-wrapper container">
            <div class="row column">
                <div class="about-us-section-wrapper-content">
                    <p>
                    <p>
                        Dignissim justo, quis porta dignissim est sit. Nibh imperdiet aliquam tellus massa blandit
                        pharetra
                        arcu. In lectus laoreet tempor sit laoreet amet vel vitae sed. Quis pretium fames vitae aliquet
                        nec
                        eu nibh. Sed donec facilisi tempus in libero, tellus turpis metus, et. Lectus urna, justo
                        molestie
                        at cursus purus. Molestie commodo aliquet pretium neque ut gravida. Pellentesque consectetur
                        odio
                        morbi eget odio tortor porttitor tortor, tellus. Ut placerat ipsum hendrerit.
                    </p>
                    <br>
                    <p>
                        Dignissim justo, quis porta dignissim est sit. Nibh imperdiet aliquam tellus massa blandit
                        pharetra
                        arcu. In lectus laoreet tempor sit laoreet amet vel vitae sed. Quis pretium fames vitae aliquet
                        nec
                        eu nibh. Sed donec facilisi tempus in libero, tellus turpis metus, et. Lectus urna, justo
                        molestie
                        at cursus purus. Molestie commodo aliquet pretium neque ut gravida. Pellentesque consectetur
                        odio
                        morbi eget odio tortor porttitor tortor, tellus. Ut placerat ipsum hendrerit.
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
