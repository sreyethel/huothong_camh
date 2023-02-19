@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Product',
])
@section('content')
    <div class="single-property">
        <div class="single-property-content">
            <div class="image">
                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/5.jpg" alt="">
            </div>
            <div class="title">
                <div class="container">
                    <div class="title-content flex items-center justify-between bg-white shadow-border p-10 rounded-md">
                        <div class="left-single">
                            <h2 class="mb-0">Orchard House </h2>
                            <div class="grid gap-5 grid-flow-col auto-cols-max pt-6">
                                <button class="btn-share shadow-border">
                                    <i class="far fa-share-square"></i>
                                    share
                                </button>
                                <button class="shadow-border">
                                    <i class="far fa-heart"></i>
                                    Save
                                </button>
                                <button class="shadow-border flex items-center">
                                    <i class="h-5 w-5 mr-3" data-feather="shopping-cart"></i>
                                    Pre-order now
                                </button>
                            </div>
                        </div>
                        <div class="right-single w-auto">
                            <h2 class="price">$20,000</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-property">
        <div class="container">
            <div class="section-aside">
                <section>
                    <div class="swiper swiper-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/4.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/4.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/2.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/2.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/3.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/3.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/4.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/4.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide" data-fancyBox="gallery"
                                data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/3.jpg">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/3.jpg"
                                    alt="" />
                                <div class="swiper-slide" data-fancyBox="gallery"
                                    data-src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/4.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/2.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/3.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/2.jpg"
                                    alt="" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/14.jpg"
                                    alt="" />
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                    </div>
                    <div class="grid gap-7 mt-5">
                        <div class="column bg-white p-5 rounded-md">
                            <h2>Property Details</h2>
                            <p>
                                Think of the body of a property description like a narrative. When done properly, it should
                                be
                                written like a love letter about the listing.
                                <br><br>

                                The Property Details section is where you tell the “story” of the property, focusing on all
                                of
                                the good aspects of the property and downplaying—but not ignoring—the property’s pitfalls.
                                <br><br>
                                For example, you might point out that this is a meticulously maintained home that has been
                                in
                                the same family for generations. It has been lovingly cared for, with lush gardens and
                                spot-free
                                interior.
                                <br><br>
                                If this seems like a great family home, you might point out multiple bedrooms for children,
                                space for entertaining, and the backyard that is perfect for summer BBQs.
                                <br><br>
                                But say the kitchen hasn’t been touched in 41 years. Do you point that out? Possibly, but do
                                so
                                subtly. Talk about the home having value-add potential: “Oversized kitchen awaits your
                                inspiration and personal touches!” is one way of saying that the kitchen needs renovation.
                                <br><br>
                                The property details should also include information about the property style (e.g.,
                                Victorian,
                                craftsman, bungalow), the neighborhood and nearby attractions, recent renovations (if any),
                                and
                                the surrounding environment.
                            </p>
                            <div class="grid grid-cols-3 gap-5 pt-10">
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Property Type :</h4>
                                    <p>House</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Property ID :</h4>
                                    <p>123456</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Price :</h4>
                                    <p>$ 12,000</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Bedrooms :</h4>
                                    <p>3</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Bathrooms :</h4>
                                    <p>2</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Area :</h4>
                                    <p>1200 Sq Ft</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Garage :</h4>
                                    <p>1</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Year Built :</h4>
                                    <p>2019</p>
                                </div>
                                <div class="item flex items-center">
                                    <h4 class="font-bold pr-3">Property Status :</h4>
                                    <p>For Sale</p>
                                </div>
                            </div>
                        </div>
                        <div class="column bg-white p-5 rounded-md">
                            <h2>Property Features</h2>
                            <div class="grid grid-cols-3 gap-5">
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Air Conditioning</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Barbeque</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Dryer</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Gym</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Microwave</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Swimming Pool</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Washer</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Wifi</h4>
                                </div>
                                <div class="item flex items-center">
                                    <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                    <h4 class="font-bold pr-3">Window Covering</h4>
                                </div>
                            </div>
                        </div>
                        <div class="column bg-white p-5 rounded-md">
                            <h2>Property Location</h2>
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.792476497554!2d77.594562314821!3d12.972442990869351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae16a0f8f5a2b5%3A0x7e2f8a2b2b3b2c5!2sPixel%20Strap!5e0!3m2!1sen!2sin!4v1607411000000!5m2!1sen!2sin"
                                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </section>
                <aside>
                    <div class="property-list">
                        <h3>Recently Added</h3>
                        <div class="grid gap-5 mt-7">
                            <div class="list">
                                <div class="image">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/1.jpg"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>Orchard House</h4>
                                    <p class="price"><i class="fa-solid fa-dollar-sign"></i> 12,000</p>
                                </div>
                            </div>
                            <div class="list">
                                <div class="image">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/9.jpg"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>Orchard House</h4>
                                    <p class="price"><i class="fa-solid fa-dollar-sign"></i> 12,000</p>
                                </div>
                            </div>
                            <div class="list">
                                <div class="image">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/10.jpg"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>Orchard House</h4>
                                    <p class="price"><i class="fa-solid fa-dollar-sign"></i> 12,000</p>
                                </div>
                            </div>
                            <div class="list">
                                <div class="image">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/11.jpg"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>Orchard House</h4>
                                    <p class="price"><i class="fa-solid fa-dollar-sign"></i> 12,000</p>
                                </div>
                            </div>
                            <div class="list">
                                <div class="image">
                                    <img src="https://themes.pixelstrap.com/sheltos/assets/images/property/16.jpg"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>Orchard House</h4>
                                    <p class="price"><i class="fa-solid fa-dollar-sign"></i> 12,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- relative property -->
    <div class="sale-section">
        <div class="sale-section-wrapper container">
            <div class="sale-section-wrapper-label">
                <h2>Related Property</h2>
                <a class="view-all" href="{{ route('website-product-index') }}">
                    <h3>Find More</h3>
                    <i data-feather="arrow-right"></i>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-6 mt-10">
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint1.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Gray Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial
                            property and industrial property.into several categories, including residential property,
                            commercial property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint2.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Blue Paint Color Home</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$130.00</h2>
                        <p>
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining
                            spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint3.jpeg') }}" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Light yellow paint color</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$250.00</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential
                            property,
                            commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/Purple Wall Paint Colour.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Purple Wall Paint Colour</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial
                            property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/Pink-paint-color.jpg') }}" alt="">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">Pink Paint Colour</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$150.00</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining
                            spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white product-box shadow-lg">
                    <div class="product-box-image">
                        <img src="{{ asset('images/paint4.jpg') }}" alt="Property-3">
                        <div class="product-box-image-icon">
                            <a href="#" title="favorite"><i class="h-5 w-5" data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-box-content p-8">
                        <h1 class="text-xl font-semibold ">House Exterior Paint idea</h1>
                        <h2 class="text-lg font-semibold mt-2 mb-2">$6558.00</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential
                            property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <a href="{{ route('website-product-detail', 'property-house-villa') }}"
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
@section('script')
    <script type="module">
        var swiperThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 8,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            speed: 1000,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            breakpoints: {
                320: {
                    slidesPerView: 3,
                },
                480: {
                    slidesPerView: 4,
                },
                640: {
                    slidesPerView: 5,
                },
                768: {
                    slidesPerView: 5,
                },
                1024: {
                    slidesPerView: 6,
                },
                1280: {
                    slidesPerView: 6,
                },
            },
        });

        new Swiper('.swiper-top', {
            spaceBetween: 10,
            effect: "fade",
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            thumbs: {
                swiper: swiperThumbs,
            },
        });
    </script>
@stop
