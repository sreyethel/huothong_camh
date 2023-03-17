<!-- Mobile nav -->
<section>
    <div class="search-wrapper">
        <div class="search-overlay">
            <span class="closebtn" onclick="closeSearch()" title="Search engine">×</span>
        </div>
        
        <div class="search-box">
            <form action="{{ route('website-product-index') }}" method="GET">
                <input type="text" name="search"  placeholder="Search...">
                <button type="submit" class="icon-search">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        
    </div>
    <div class="mobile-nav">
        <div class="right-side">
            <div class="right-logo">
                <a href="#">
                    <img src="{{ asset('images/logo/logo.jpg') }}" alt="">
                </a>
            </div>
            <span class="close-menu">
                <i class="fas fa-times"></i>
            </span>
        </div>
        <div class="mobile-nav-item flex flex-col space-y-5 mt-5">
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
    </div>
    <div class="menu-responsive-cover"></div>
</section>