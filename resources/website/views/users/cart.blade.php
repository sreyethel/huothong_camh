@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <div class="user-setting container min-h-[800px] py-8 ">
        <div class="flex flex-row h-auto">
            <div class="w-[20%] user-setting-sidebar bg-white p-14 rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none">
                <h1 class="text-xl font-semibold text-gray-900">User Profile</h1>
                <div class="flex flex-col mt-5">
                    <div class="flex flex-row items-center single-line">
                        <i class="h-8 w-8" data-feather="user-plus"></i>
                        <a href="{{ route('website-user-user-setting') }}" class="py-4 text-gray-900 ml-2 text-lg">User Info</a>
                        {{-- <span></span> --}}
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="heart"></i>
                        <a href="{{ route('website-user-user-favorite') }}" class="py-4 text-gray-900 ml-2 text-lg">Favorites</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="shopping-cart"></i>
                        <a href="{{ route('website-user-user-cart') }}" class="py-4 text-gray-900 ml-2 text-lg">Carts</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="settings"></i>
                        <a href="{{ route('website-user-user-password') }}" class="py-4 text-gray-900 ml-2 text-lg">Password</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8" data-feather="log-out"></i>
                        <a href="#" class="py-4 text-gray-900 ml-2 text-lg">Log out</a>
                    </div>
                    
                </div>
            </div>
            <div class="w-[80%] user-setting-form bg-white p-14 rounded-lg rounded-tr-lg rounded-tl-none rounded-br-none">
                <div class="flex flex-col px-10">
                    <h1 class=" text-md text-gray-900 text-xl font-semibold">List All Products</h1>
                    <div class="user-setting-form-table mt-5">
                        <table class="w-full ">
                            <thead class="">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">ID</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Photo</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Products Name</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Price</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Qunatity</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Total</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">1</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint3.jpeg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">2</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">3</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">4</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Pink-paint-color</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">1</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint3.jpeg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">2</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">3</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Yello Light color paint</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3 text-gray-700 text-sm">4</td>
                                    <td class="p-3 text-gray-700 text-sm photo">
                                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">Pink-paint-color</td>
                                    <td class="p-3 text-gray-700 text-sm">80.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">2pcs</td>
                                    <td class="p-3 text-gray-700 text-sm">160.00$</td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        <a href="#" class="btnRemove">Remove</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right flex flex-row justify-end space-x-5 mt-14">
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