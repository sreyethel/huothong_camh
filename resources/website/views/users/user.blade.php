@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <div class="user-setting container min-h-[800px] py-8 ">
        <div class="flex flex-row h-auto">
            <div class="w-[30%] user-setting-sidebar p-14 bg-slate-200  rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none">
                <div class="border-b-2 border-gray-600"><h1 class="text-xl font-semibold text-gray-900">User Profile</h1></div>
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
                <div class="flex flex-col ">
                    <div class="flex flex-row items-center">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png');">
                                </div>
                            </div>
                        </div>
                        <div class="user-setting-name ml-5 flex flex-col">
                            <h1 class="text-lg font-semibold text-gray-900 my-1">Admin</h1>
                            <p class="text-base text-gray-800">User Address or Role</p>
                        </div>
                    </div>
                    <div class="user-setting-form-input flex flex-row justify-between space-x-14 mt-5">
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Name</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your name"/>
                        </div>
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">FullName</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your full name"/>
                        </div>
                    </div>
                    <div class="user-setting-form-input flex flex-row justify-between space-x-14 mt-5">
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Email Address</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your email address"/>
                        </div>
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Phone Number</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your phone number"/>
                        </div>
                    </div>
                    <div class="user-setting-form-input flex flex-row justify-between space-x-14 mt-5">
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Location</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your location"/>
                        </div>
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Postal Code</h1>
                            <input type="text" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your postal code"/>
                        </div>
                    </div>
                    <div class="text-right flex flex-row justify-end space-x-5 mt-14">
                        <div>
                            <a href="#" class="btnCancel shadow-md">Cancel</a>
                        </div>
                        <div>
                            <a href="#" class="btnSave shadow-md">Save Change</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection