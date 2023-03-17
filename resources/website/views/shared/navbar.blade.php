<div class="navbar bg-white shadow-sm isFixed">
    <div class="container">
        <div class="navbar-wrapper">
            <div class="logo">
                <a href="{{ route('website-home') }}">
                    <img src="{{ asset('images/logo/logo.jpg') }}" alt="" class="h-24">
                </a>
            </div>
            <div class="menu grid gap-7 grid-flow-col">
                
                <div @class(['item', 'active' => Request::is('/')])>
                    <a href="{{ route('website-home') }}">@lang('website.navbar.home')</a>
                </div>
                <div @class(['item', 'active' => Request::is('page/about-us')])>
                    <a href="{{ route('website-page-about-us') }}">@lang('website.navbar.about_us')</a>
                </div>
                <div @class(['item', 'active' => Request::is('product*')])>
                    <a href="{{ route('website-product-index') }}">@lang('website.navbar.product')</a>
                </div>
                <div @class(['item', 'active' => Request::is('page/contact-us')])>
                    <a href="{{ route('website-page-contact-us') }}">@lang('website.navbar.contact_us')</a>
                </div>
            </div>
            <div class="icons">
                <div class="flex">
                    
                    <div class="px-3 main-icon btn-search" onclick="searchEngine()">
                        <a href="#"><i class="h-5 w-5" data-feather="search"></i></a>
                    </div>
                    <div class="px-3 relative main-icon">
                        <a href="{{ route('website-user-order') }}">
                            <i class="h-5 w-5" data-feather="shopping-cart"></i>
                            <span
                                class="badge badge-primary badge-sm badge-circle absolute top-[-15px] right-0">{{ $totalCart }}</span>
                        </a>
                    </div>
                    <div class="px-3 main-icon">
                        <a href="{{ route('website-user-profile') }}"><i class="h-5 w-5" data-feather="user"></i></a>
                    </div>
                    <div class="menu-bar px-3 cursor-pointer" onclick="myFunction()">
                        <i class="h-5 w-5" data-feather="menu"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="header-fixed"></div>

<script>
    function myFunction() {

        $('body').on("click",".menu-bar",function(){
            $('.mobile-nav').css({'right':'0px'});
            
            $(".menu-responsive-cover").css({'display':'block'});

            $('body').css({'overflow-y':'hidden'});
        });

        $('body').on('click','.close-menu',function(){
            $('.mobile-nav').css({'right':'-100%'});

            $(".menu-responsive-cover").css({'display':'none'});

            $('body').css({'overflow-y':'scroll'});
        });

        $('body').on('click','.menu-responsive-cover',function(){
            $('.menu-responsive-cover').css({'display':'none'});
            $('.mobile-nav').css({'right':'-100%'});
        });
    }

    function searchEngine()
    {
        $('body').on('click','.btn-search',function(){
            $('.search-wrapper').css({'top':'0'});
            $('body').css({'overflow-y':'hidden'});
        });
        $('body').on('click','.closebtn',function(){
            $('.search-wrapper').css({'top':'-100%'});
            $('body').css({'overflow-y':'scroll'});
        });
    }
</script>
