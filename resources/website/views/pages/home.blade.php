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
                                
                                <ul class="flex items-center">
                                    <div class="box-icon rounded-md shadow-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-5 text-pink-600" data-feather="home"></i>
                                            <h6 class="mt-3 text-base">Home</h6>
                                        </a>
                                    </div>
                                    <div class="box-icon rounded-md shadow-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-5 text-pink-600" data-feather="bookmark"></i>
                                            <h6 class="mt-3 text-base">Booking</h6>
                                        </a>
                                    </div>
                                    <div class="box-icon rounded-md shadow-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-5 text-pink-600" data-feather="box"></i>
                                            <h6 class="mt-3 text-base">Product</h6>
                                        </a>
                                    </div>
                                </ul>
                                {{-- <div class="grid grid-cols-3 gap-5 text-center">
                                    <div class="bg-white px-4 py-6 duration-200 shadow-md rounded-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-20 text-pink-600" data-feather="home"></i>
                                            <h1 class="mt-3 text-black text-base">Home</p>
                                        </a>
                                    </div>
                                    <div class="bg-white px-4 py-6 duration-200 shadow-md rounded-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-20 text-pink-600" data-feather="bookmark"></i>
                                            <h1 class="mt-3 text-black text-base">Booking</p>
                                        </a>
                                    </div>
                                    <div class="bg-white px-4 py-6 duration-200 shadow-md rounded-md">
                                        <a href="#">
                                            <i class="h-10 w-10 ml-20 text-pink-600" data-feather="box"></i>
                                            <h1 class="mt-3 text-black text-base">Product</p>
                                        </a>
                                    </div>
                                </div> --}}
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
            <div class="grid grid-cols-3 gap-6 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Gray Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00*</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial property and industrial property.into several categories, including residential property, commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$130.00*</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$250.00*</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-6 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/Purple Wall Paint Colour.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Purple Wall Paint Colour</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00*</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$150.00*</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$6558.00*</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
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
        <img src="{{ asset('images/banner-5.jpg') }}" alt="">

        <div class="container">
            <div class="property-section-title text-center">
                <span class="text-rose-700">Our</span>
                <h1 class="text-3xl font-semibold text-white mt-5">Featured Property</h1>
            </div>
            <div class="property-section-slide container">
                <div class="bg-rose-500 slide-1 rounded-md" style="background-image: url('{{ asset('images/7-Exterior-Paint-Colors-to-Brighten-Your-Home.jpg') }}')"> 
                </div>
                <div class="slide-2 bg-white rounded-md p-8">
                    <div class="slide-2-icon">
                        <a href="#" title="favorite"><i class="h-6 w-6 " data-feather="heart"></i></a>
                    </div>
                    <h1 class="text-2xl font-semibold mt-4">7 Exterior Paint Color Blighten Home</h1>
                    <h2 class="text-lg font-semibold mt-2 mb-2">$500.00*</h2>
                    <p class="text-base">
                        Real estate is divided into several categories, including residential property, Choosing the right color for the exterior of your home can be a daunting task, especially if you have no idea what you want or what will look best on your home. In a world where colors are literally endless, it can feel like there are so many different options and routes to go.In a world where colors are literally endless, it can feel like there are so many different options and routes to go.
                    </p>
                    <div class="flex justify-between items-center mt-5">
                        <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                        <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    {{-- Sale Section --}}
    <div class="sale-section">
        <div class="container">
            <div class="title-1">
                <span>Rent</span>
                <h2 class="text-3xl mt-5 font-semibold text-black">Latest For Rent</h2>
                <hr>
            </div>
            <div class="grid grid-cols-3 gap-6 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/blue-house-1024x512.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Blue Paint Color</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$80.00*</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/color-1200x1200.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Popular Paint Color</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$6558.00*</h2>
                        <p class="text-base">
                            This home provides wonderful entertaining spaces with a chef kitchen opening. Elegant retreat in a quiet Coral Gables setting..
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/featured-image-home.jpeg.jpg') }}" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Outdor Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$9955.00*</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Layout Section --}}
    <div class="layout-section">
        <div class="layout-section-overlay"></div>
        <img src="{{ asset('images/banner-5.jpg') }}" alt="">

        <div class="container">
            <div class="layout-section-title text-center">
                <span class="text-rose-700">Buy or Sale</span>
            </div>
            <div class="layout-section-box">
                <h1 class="text-xl text-white mt-10 font-semibold">CITY PAINT PROVIDE HOUSE PAINT</h1>
                <h2 class="text-4xl text-white  mt-5">Looking To Buy A New Property Or Sell An Existing One?<br> Real Homes Provides An Easy Solution!</h2>

                <div class="inline-button">
                    <button class="text-lg font-semibold bg-white rounded-full px-6 py-2 btn1">Submit Property</button>
                    <button class="text-lg font-semibold btn2 rounded-full px-6 py-2">Browse Property</button>
                </div>
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
