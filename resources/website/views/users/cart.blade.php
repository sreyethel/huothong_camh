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
            <div class="w-[70%] user-setting-form bg-white p-14 rounded-lg rounded-tr-lg rounded-tl-none rounded-bl-none">
                <div class="w-full flex flex-col">
                    <h4 class=" text-md text-gray-900 text-xl font-semibold">List All Products</h4>
                    <div class="user-setting-form-table mt-5">
                        <table class="w-full ">
                            <thead class="uppercase">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">ID</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Photo</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Product Name</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Price</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Qunatity</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Total</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left text-gray-900">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">1</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint3.jpeg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">2</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">3</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">4</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Pink-paint-color</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">1</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint3.jpeg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">2</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">3</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-900 text-sm">4</td>
                                    <td class="p-3 text-gray-900 text-sm photo">
                                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-900 text-sm">Pink-paint-color</td>
                                    <td class="p-3 text-gray-900 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-900 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-900 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right flex flex-row justify-end space-x-5 my-10">
                            <div>
                                <a href="#" class="btnCancel shadow-md">Cancel</a>
                            </div>
                            <div>
                                <a href="#" class="btnSave shadow-md">Save Change</a>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="text-right flex flex-row justify-end mt-14">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection