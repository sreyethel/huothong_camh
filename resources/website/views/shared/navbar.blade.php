<div class="navbar bg-white shadow-sm">
    <div class="container">
        <div class="h-24 flex items-center justify-between">
            <div class="logo -ml-8">
                <a href="#">
                    <img src="{{ asset('images/logo/logo.jpg') }}" alt="" class="h-24">
                </a>
            </div>
            <div class="menu grid gap-7 grid-flow-col">
                <div class="item">
                    <a href="{{ route('website-home') }}">@lang('website.navbar.home')</a>
                </div>
                <div class="item">
                    <a href="{{ route('website-page-about-us') }}">@lang('website.navbar.about_us')</a>
                </div>
                <div class="item">
                    <a href="#">@lang('website.navbar.product')</a>
                </div>
                <div class="item">
                    <a href="{{ route('website-page-contact-us') }}">@lang('website.navbar.contact_us')</a>
                </div>
            </div>
            <div class="icons">
                <div class="flex">
                    <div class="px-3">
                        <a href="#"><i class="h-5 w-5" data-feather="globe"></i></a>
                    </div>
                    <div class="px-3">
                        <a href="#"><i class="h-5 w-5" data-feather="search"></i></a>
                    </div>
                    <div class="px-3">
                        <a href="#"><i class="h-5 w-5" data-feather="shopping-cart"></i></a>
                    </div>
                    <div class="px-3">
                        <a href="#"><i class="h-5 w-5" data-feather="user"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
