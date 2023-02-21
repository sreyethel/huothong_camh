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
                <div class="flex flex-col ">
                    <h4 class=" text-md text-gray-900 text-xl font-semibold">Change Password</h4>
                    <div class="user-setting-form-input flex flex-col justify-between mt-5">
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">Current Password</h1>
                            <input type="password" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your Current Password"/>
                        </div>
                        <div class="w-1/2">
                            <h1 class="my-2 text-md text-gray-900">New Password</h1>
                            <input type="password" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your New Password"/>
                        </div>
                        <div class="w-1/2 mt-3">
                            <h1 class="my-2 text-md text-gray-900">Confirm Password</h1>
                            <input type="password" class="form-control outline-none shadow-md focus:bg-slate-100" placeholder="Enter your Confirm Password"/>
                        </div>
                        <div class="w-1/2 mt-10 flex flex-row justify-between">
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