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
            <div class="w-[70%] user-setting-form bg-white p-10 rounded-lg">
                <div class="flex flex-col ">
                    <h4 class=" text-md text-gray-900 text-xl font-semibold">Change Password</h4>
                    <div class="user-setting-form-input flex flex-col justify-between mt-7">
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