@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <div class="user-setting container min-h-[800px] py-8 ">
        <div class="flex flex-row h-auto">
            <div class="w-[30%] user-setting-sidebar p-14 bg-slate-200  rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none">
                <h1 class="text-xl font-semibold text-gray-900 border-b-2 border-gray-600">User Profile</h1>
                <div class="flex flex-col mt-5">
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="user-plus"></i>
                        <a href="{{ route('website-user-user-setting') }}" class="py-4 text-gray-900 ml-2 text-lg">User Info</a>
                        {{-- <span></span> --}}
                    </div>
                    <div class="flex flex-row items-center ">
                        <i class="h-8 w-8" data-feather="heart"></i>
                        <a href="{{ route('website-user-user-favorite') }}" class="py-4 text-gray-900 ml-2 text-lg">Favorites</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="shopping-cart"></i>
                        <a href="{{ route('website-user-user-cart') }}" class="py-4 text-gray-900 ml-2 text-lg">Carts</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="key"></i>
                        <a href="{{ route('website-user-user-password') }}" class="py-4 text-gray-900 ml-2 text-lg">Password</a>
                    </div>
                    <div class="flex flex-row items-center border-t-2 border-gray-600">
                        <i class="h-8 w-8" data-feather="log-out"></i>
                        <a href="{{ route('website-home') }}" class="py-4 text-gray-900 ml-2 text-lg">Log out</a>
                    </div>
                </div>
            </div>
            <div class="w-[70%] user-setting-favorite bg-white p-14 rounded-lg rounded-tr-lg rounded-tl-none rounded-bl-none">
                <h4 class=" text-md text-gray-900 text-xl font-semibold">Favorite Carts</h4>
                <div class="w-full flex flex-row user-setting-favorite-cart mt-5">
                    <div class="w-[30%]">
                        <div class="user-setting-favorite-cart-image">
                            <img src="{{ asset('images/paint1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="w-[70%] user-setting-favorite-cart-content p-4">
                        <div class="flex flex-row">
                            <div class="w-[100%] ">
                                <h1 class="text-xl font-semibold ">Gray Paint Color Home</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                                <p class="text-base">
                                    Real estate is divided into several categories, including residential property, commercial
                                    property ommercial.divided into several categories, including residential property, commercial
                                    property ommercial.
                                </p>
                                <div class="flex flex-row justify-between mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                                    <div class="cart-icon">
                                        <a href="#" title="favorite" >
                                            <i class="h-5 w-5" data-feather="heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-row user-setting-favorite-cart mt-5">
                    <div class="w-[30%]">
                        <div class="user-setting-favorite-cart-image">
                            <img src="{{ asset('images/paint2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="w-[70%] user-setting-favorite-cart-content p-4">
                        <div class="flex flex-row">
                            <div class="w-[100%] ">
                                <h1 class="text-xl font-semibold ">Blue Paint Color Home</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                                <p class="text-base">
                                    Real estate is divided into several categories, including residential property, commercial
                                    property ommercial.
                                </p>
                                <div class="flex flex-row justify-between mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                                    <div class="cart-icon">
                                        <a href="#" title="favorite" >
                                            <i class="h-5 w-5" data-feather="heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-row user-setting-favorite-cart mt-5">
                    <div class="w-[30%]">
                        <div class="user-setting-favorite-cart-image">
                            <img src="{{ asset('images/paint3.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="w-[70%] user-setting-favorite-cart-content p-4">
                        <div class="flex flex-row">
                            <div class="w-[100%] ">
                                <h1 class="text-xl font-semibold ">Light yellow paint color</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                                <p class="text-base">
                                    Real estate is divided into several categories, including residential property, commercial
                                    property ommercial.
                                </p>
                                <div class="flex flex-row justify-between mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                                    <div class="cart-icon">
                                        <a href="#" title="favorite" >
                                            <i class="h-5 w-5" data-feather="heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-row user-setting-favorite-cart mt-5">
                    <div class="w-[30%]">
                        <div class="user-setting-favorite-cart-image">
                            <img src="{{ asset('images/Purple Wall Paint Colour.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="w-[70%] user-setting-favorite-cart-content p-4">
                        <div class="flex flex-row">
                            <div class="w-[100%] ">
                                <h1 class="text-xl font-semibold ">Purple Wall Paint Colour</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                                <p class="text-base">
                                    Real estate is divided into several categories, including residential property, commercial
                                    property ommercial.several categories, including residential property, commercial
                                    property ommercial.
                                </p>
                                <div class="flex flex-row justify-between mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                                    <div class="cart-icon">
                                        <a href="#" title="favorite" >
                                            <i class="h-5 w-5" data-feather="heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection