@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Product',
])
@section('content')

    <!-- banner -->
    @include('website::components.banner', [
        'title' => 'Find Our Properties',
        'image' => asset('images/banner.jpg'),
        'breadcrumbs' => [
            [
                'name' => __('website.navbar.home'),
                'active' => false,
                'url' => route('website-home'),
            ],
            [
                'name' => __('website.navbar.product'),
                'active' => true,
            ],
        ],
    ])

    <!-- product section -->
    <div class="sale-section">
        <div class="sale-section-wrapper container">
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Gray Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial
                            property and industrial property.into several categories, including residential property,
                            commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Blue Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$130.00</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining
                            spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint3.jpeg') }}" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Light yellow paint color</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$250.00</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential
                            property,
                            commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/Purple Wall Paint Colour.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Purple Wall Paint Colour</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial
                            property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Pink Paint Colour</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$150.00</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining
                            spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint4.jpg') }}" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">House Exterior Paint idea</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$6558.00</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential
                            property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
