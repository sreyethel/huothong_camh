@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    <div class="home-section"></div>
    <div class="sale-section">
        <div class="sale-section-wrapper">
            <div class="row">
                <div class="sale-section-wrapper-title">
                    <div class="">
                        <div class="container">
                            <h1 class="text-xl text-gray-900">Do You Want to Work with us?</h1>
                            <h1 class="font-bold text-5xl text-gray-800">Find Better Place <br>To Work</h1>
                            <button class="px-6 py-2 rounded-full text-white">Submit Property</button>

                            <div class="grid-icon">
                                <h1 class="text-xl text-gray-900 mt-4">What are you looking for?</h1>
                                
                                <ul class="flex">
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="">Home</a>
                                    </span>
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="">Booking</a>
                                    </span>
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="">Product</a>
                                    </span>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="sale-section-wrapper-image">
                    <div class="">
                        <img src="{{ asset('images/layout-9.png') }}" alt="homepage">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="title-1 mt-20">
                <span>Sale</span>
                <h2 class="text-3xl mt-5 font-semibold text-black">Latest For Sale</h2>
                <hr>
            </div>
            <div class="grid grid-cols-3 gap-8 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/22.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Little Acorn Farm</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>
                            Real estate is divided into several categories, including residential property, commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/24.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Home in Merrick Way</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/25.jpg" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Little Acorn Farm</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>Real estate is divided into several categories, including residential property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-8 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/22.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Little Acorn Farm</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>
                            Real estate is divided into several categories, including residential property, commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/24.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Home in Merrick Way</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/25.jpg" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Little Acorn Farm</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>Real estate is divided into several categories, including residential property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="property-section">
        <div class="property-section-overlay"></div>
        <div class="property-section-image">
            <img src="https://themes.pixelstrap.com/sheltos/assets/images/banner-5.jpg" alt="" class="">
        </div>
        <div class="property-section-title">
            <span>Our</span>
            <h2 class="text-3xl mt-5 font-semibold text-white">Featured Property</h2>
            <hr>
        </div>
        <div class="property-section-slide container">
            <div class="bg-rose-500 slide-1 rounded-md" style="background-image: url('https://themes.pixelstrap.com/sheltos/assets/images/property/25.jpg')">
            </div>
            <div class="slide-2 bg-white rounded-md p-8">
                <div class="slide-2-icon">
                    <a href="#"><i class="h-6 w-6 " data-feather="heart"></i></a>
                </div>
                <h1 class="text-xl font-semibold mt-4">Little Acorn Farm</h1>
                <h2 class="text-lg font-semibold mt-2">$6558.00*</h2>
                <p>Real estate is divided into several categories, including residential property, commercial property and industrial property. Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero molestias ratione quos blanditiis error ducimus quae provident perspiciatis dolores cupiditate.</p>
                <div class="flex justify-between items-center mt-3">
                    <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                    <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                </div>
            </div>
        </div>
    </div>
    <div class="sale-section">
        <div class="container">
            <div class="title-1 mt-5">
                <span>Rent</span>
                <h2 class="text-3xl mt-5 font-semibold text-black">Latest For Rent</h2>
                <hr>
            </div>
            <div class="grid grid-cols-3 gap-8 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/22.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Merrick in Spring Way</h1>
                        <h2 class="text-lg font-semibold">$4513.00*</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/24.jpg" alt="">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Allen's Across Way</h1>
                        <h2 class="text-lg font-semibold">$6558.00*</h2>
                        <p>
                            This home provides wonderful entertaining spaces with a chef kitchen opening. Elegant retreat in a quiet Coral Gables setting..
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/25.jpg" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Hidden Spring Hideway</h1>
                        <h2 class="text-lg font-semibold">$9955.00*</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Buy&Sale section --}}
    <div class="buy-section">
        <div class="buy-section-overlay"></div>
        <div class="buy-section-image">
            <img src="https://themes.pixelstrap.com/sheltos/assets/images/banner-5.jpg" alt="" class="">
        </div>
        <div class="buy-section-title">
            <span>Buy Or Sell</span>
        </div>
        <div class="buy-section-slide container">
            <h1 class="font-semibold text-lg text-white">SHELTOS REAL ESTATE</h1>
            <h2 class="text-3xl text-white mt-10">Looking To Buy A New Property Or Sell An Existing One?<br> Real Homes Provides An Easy Solution!</h2>
            <div class="banner-button w-[45%] mx-auto">
                <a href="#" class="py-2 px-4 bg-primary rounded-full font-semibold text-white hover:text-white">Submit Property</a>
                <a href="#" class="py-2 px-4 bg-white rounded-full font-semibold text-primary hover:text-primary">Browse Property</a>
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
