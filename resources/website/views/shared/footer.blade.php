<div class="footer bg-black">
    <div class="container">
        <div class="flex justify-between py-10">
            <div class="logo">
                <img src="{{ asset('images/logo/logo.png') }}" alt="">
                <p class="pt-5">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nisl sit amet
                    tincidunt
                    luctus, enim ipsum
                    tincidunt nisl, eu aliquet nisl lorem quis dolor. Sed euismod, nisl sit amet tincidunt
                    luctus, enim ipsum
                    tincidunt nisl, eu aliquet nisl lorem quis dolor.
                </p>
            </div>
            <div class="contact w-1/5">
                <h1 class="text-xl font-semibold text-white mb-8 ">@lang('website.navbar.contact_us')</h1>

                <div class="grid gap-5">
                    <div>A-32, Albany, Newyork.</div>
                    <div>(+066) 518 - 457 - 5181</div>
                    <div>Contact@gmail.com</div>
                </div>
            </div>
            <div class="link w-2/12">
                <h1 class="text-xl font-semibold text-white mb-[25px] ">@lang('website.footer.quick_links')</h1>
                <div class="grid gap-5">
                    <a href="{{ route('website-page-about-us') }}" class="flex items-center">
                        <i data-feather="chevron-right" class="h-5 w-5"></i>
                        @lang('website.navbar.about_us')
                    </a>
                    <a href="#" class="flex items-center">
                        <i data-feather="chevron-right" class="h-5 w-5"></i>
                        @lang('website.navbar.product')
                    </a>
                    <a href="{{ route('website-page-contact-us') }}" class="flex items-center">
                        <i data-feather="chevron-right" class="h-5 w-5"></i>
                        @lang('website.navbar.contact_us')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="h-12 flex justify-between items-center">
            <div class="grid gap-4 grid-cols-4">
                <i class="h-5 w-5" data-feather="facebook"></i>
                <i class="h-5 w-5" data-feather="twitter"></i>
                <i class="h-5 w-5" data-feather="instagram"></i>
                <i class="h-5 w-5" data-feather="linkedin"></i>
            </div>
            <h1 class="text-white text-sm">Copyright 2023 @All Right Reserved</h1>
        </div>
    </div>
</div>
