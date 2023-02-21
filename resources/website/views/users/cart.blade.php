@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <div class="user-setting container min-h-[800px] py-8 ">
        <div class="flex flex-row space-x-5 h-auto">
            <div class="w-[30%] user-setting-sidebar py-10 pl-2 pr-0 bg-slate-200  rounded-lg">
                <div class="user-setting-sidebar-profile flex flex-row space-x-4 items-center">
                    <div class="profile-box" style="background-image: url('{{ asset('images/logo/1234.png') }}')">
                    </div>
                    <div class="user-setting-sidebar-profile-title">
                        <h1 class="text-black text-lg">Admin</h1>
                        <p class="text-black text-sm">0974775242</p>
                    </div>
                </div>
                <div class="flex flex-col mt-5">
                    <div class="flex flex-row items-center left-nav">
                        <i class="h-8 w-8 ml-2" data-feather="user-plus"></i>
                        <a href="{{ route('website-user-user-setting') }}" class="py-4 text-gray-900 ml-2 text-lg single-line">User Info</a>
                    </div>
                    <div class="flex flex-row items-center left-nav ">
                        <i class="h-8 w-8 ml-2" data-feather="heart"></i>
                        <a href="{{ route('website-user-user-favorite') }}" class="py-4 text-gray-900 ml-2 text-lg">Favorites</a>
                    </div>
                    <div class="flex flex-row items-center left-nav">
                        <i class="h-8 w-8 ml-2" data-feather="shopping-cart"></i>
                        <a href="{{ route('website-user-user-cart') }}" class="py-4 text-gray-900 ml-2 text-lg">Carts</a>
                    </div>
                    <div class="flex flex-row items-center left-nav">
                        <i class="h-8 w-8 ml-2" data-feather="key"></i>
                        <a href="{{ route('website-user-user-password') }}" class="py-4 text-gray-900 ml-2 text-lg">Password</a>
                    </div>
                    <div class="flex flex-row items-center">
                        <i class="h-8 w-8 ml-2 text-orange-600" data-feather="log-out"></i>
                        <a href="{{ route('website-home') }}" class="py-4 text-gray-900 ml-2 text-lg log-out">Log out</a>
                    </div>
                </div>
            </div>
            <div class="w-[70%] user-setting-form bg-white rounded-lg">
                <div class="w-full flex flex-col">
                    {{-- <h4 class=" text-md text-gray-900 text-xl font-semibold ml-4 mt-3">List All Products</h4> --}}
                    <div class="user-setting-form-table ">
                        <table class="w-full ">
                            <thead class="uppercase">
                                <tr>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">ID</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Photo</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Product Name</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Price</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Qunatity</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Total</th>
                                    <th class=" text-sm font-semibold tracking-wide text-left text-gray-900">Action</th>
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
                                
                            </tbody>
                        </table>
                        <div class="text-right flex flex-row justify-end space-x-5 my-10 mr-10">
                            <div>
                                <a href="#" class="btnCancel shadow-md">Cancel</a>
                            </div>
                            <div>
                                <a href="#" class="btnSave shadow-md">Save Change</a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="text-right flex flex-row justify-end mt-14">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection