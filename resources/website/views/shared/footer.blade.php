<div class="footer bg-black">
    <div class="container">
        <div class="footer-wrapper py-10">
            <div class="logo">
                <img src="{{ asset('images/logo/logo.png') }}" alt="">
                <p class="pt-5">
                    {{ toObject($about?->content)?->short_detail_about_us ?? '' }}
                </p>
            </div>
            <div class="contact w-1/5">
                <h1 class="text-xl font-semibold text-white mb-8 ">@lang('website.navbar.contact_us')</h1>

                <div class="grid gap-5">
                    <div>{{ toObject($contact?->content)?->address ?? 'No address' }}</div>
                    <div>{{ toObject($contact?->content)?->phone ?? 'No phone' }}</div>
                    <div>{{ toObject($contact?->content)?->email ?? 'No e-mail' }}</div>
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
        <div class="h-12 footer-bottom-wrapper">
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
