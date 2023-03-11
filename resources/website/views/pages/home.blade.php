@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    <div class="sale-section overlay">
        <div class="sale-section-wrapper container">
            <div class="row">
                <div class="sale-section-wrapper-title">
                    <p class="text-lg pb-2 font-light">Do You Want to Live with us?</p>
                    <h1 class="font-bold text-5xl text-gray-800">Find Better Place <br>To Live</h1>
                    <div class="grid gap-5 place-items-start place-content-start mt-20">
                        <h1 class="text-xl text-gray-900">What are you looking for?</h1>
                        <div class="grid-icon">
                            <div class="flex items-center">
                                <div class="box-icon rounded-md mr-5">
                                    <a href="#">
                                        <i class="h-10 w-10 ml-5 text-pink-600" data-feather="bookmark"></i>
                                        <h6 class="mt-3 text-base">Booking</h6>
                                    </a>
                                </div>
                                <div class="box-icon rounded-md">
                                    <a href="{{ route('website-product-index') }}">
                                        <i class="h-10 w-10 ml-5 text-pink-600" data-feather="box"></i>
                                        <h6 class="mt-3 text-base">Product</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sale-section-wrapper-image">
                    <img src="{{ asset('images/layout-9.png') }}" alt="homepage">
                </div>
            </div>
        </div>
        <div class="snow-effect"></div>
    </div>

    <!-- about us section -->
    <div class="about-us-section">
        <div class="about-us-section-wrapper container">
            <div class="row">
                <div class="about-us-section-wrapper-content">
                    <div class="grid gap-5 mb-10">
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
                    <a class="btn" href="{{ route('website-page-about-us') }}">Learn more</a>
                </div>

                <div class="about-us-section-wrapper-image">
                    <img src="https://ld-wt73.template-help.com/tf/estancy_v1/images/about-01-500x530.jpg" alt="about us">
                </div>
            </div>
        </div>
    </div>

    <!-- product section -->
    @if (isset($products) && count($products) > 0)
        <div class="sale-section">
            <div class="sale-section-wrapper container">
                <div class="sale-section-wrapper-label">
                    <h2>
                        Find Our Properties
                    </h2>
                    <a class="view-all" href="{{ route('website-product-index') }}">
                        <h3>View All</h3>
                        <i data-feather="arrow-right"></i>
                    </a>
                </div>
                <div class="grid grid-cols-3 gap-6 mt-10">
                    @foreach ($products as $item)
                        <div class="bg-white product-box shadow-lg">
                            <div class="product-box-image">
                                <img src="{{ $item->thumbnail_url }}" alt="">
                                <a class="product-box-image-icon" x-data="favorite" data-id="{{ $item?->id }}"
                                    @auth('web')
                                        @click="onAddFavorite('{{ $item?->id }}')"
                                    @else
                                        href="{{ route('website-auth-sign-in') }}"
                                    @endauth>
                                    <i x-show="adding == false" class="false" data-feather="heart"></i>
                                    <i x-show="adding == false" class="fas fa-heart true"></i>
                                    <i x-show="adding == true" class="fas fa-spinner fa-spin"></i>
                                </a>
                            </div>
                            <div class="product-box-content p-8">
                                <h1 class="text-xl font-semibold ">{{ $item?->title }}</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">${{ number_format($item?->price, 2) }}</h2>
                                <p class="text-base">
                                    {!! strip_tags($item?->content) !!}
                                </p>
                                <div class="flex justify-between items-center mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">
                                        {{ $item?->created_at->format('F d, Y') }}
                                    </h3>
                                    <a href="{{ route('website-product-detail', $item?->slug) }}"
                                        class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- our expert -->
    @if (isset($products) && count($products) > 0)
        <div class="block-container py-14" style="background-image: url('{{ $banner->thumbnail_url }}')">
            <div class="block-content container relative">
                <div class="absolute top-1/2 left-0 transform translate-y-5 color-white z-20">
                    <div class="text-3xl font-bold pb-5 uppercase">Our Expert</div>
                    <div class="grid gap-5">
                        @foreach ($expert as $item)
                            <div class="flex items-center">
                                <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                                    <img class="w-full h-full object-contain rounded-full" src="{{ $item->thumbnail_url }}"
                                        alt="">
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

    <!-- partner section -->
    @if (count($partner) > 0)
        <div class="partner-content">
            <div class="container">
                @foreach ($partner as $item)
                    <div class="inline-flex m-5 w-28 h-28">
                        <img class="object-contain" src="{{ $item->logo_url }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- space -->
    <div class="space"></div>
@stop
