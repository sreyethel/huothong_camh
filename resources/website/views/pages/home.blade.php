@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    
    {{-- <div class="container">
        <div class="home-section"></div>
        <div class="homepage">
            <img src="{{ asset('images/layout-9.png') }}" alt="">
        </div>
    </div> --}}
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
                                {{-- <div class="grid grid-flow-col mt-4">
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="#">Home</a>
                                    </span>
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="#">Booking</a>
                                    </span>
                                    <span class="box-icon rounded-md shadow-md">
                                        <a href="#">Product</a>
                                    </span>
                                </div> --}}
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
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
                            <button class="px-6 py-2 bg-white rounded-full border-dotted border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <img src="{{ asset('images/layout-9.png') }}" alt="">
        <div class="container">
            <h1 class="text-xl text-gray-900">Do You Want to Work with us?</h1>
            <h1 class="font-bold text-5xl text-gray-800">Find Better Place to Work</h1>
            <button class="px-6 py-2 rounded-full text-white">Submit Property</button>
            <div class="grid-icon">
                <h1 class="text-xl text-gray-900 mt-4">What are you looking for?</h1>
                <div class="grid grid-flow-col gap-0.5 mt-4">
                    <span class="box-icon rounded-md shadow-md">
                        <a href="#">Home</a>
                    </span>
                    <span class="box-icon rounded-md shadow-md">
                        <a href="#">Booking</a>
                    </span>
                    <span class="box-icon rounded-md shadow-md">
                        <a href="#">Product</a>
                    </span>
                </div>
                
            </div> --}}
        </div>
    </div>

    {{-- Sale section --}}
    <div class="container sale-section">
        {{-- <h1 class="p-3 bg-white font-semibold">Sale</h1> --}}
        {{-- <div class="title-1">
            <span>Sale</span>
            <h2 class="text-3xl mt-5 font-semibold text-black">Latest For Sale</h2>
            <hr>
        </div>
        <div class="grid grid-cols-3 gap-8 mt-5">
            <div class="bg-green-500 product-box">
                <div class="image-box">

                </div>
            </div>
            <div class="bg-green-500 product-box">111</div>
            <div class="bg-green-500 product-box">111</div>
        </div> --}}
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
