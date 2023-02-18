@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    <div class="sale-section overlay mt-20 py-10">
        <div class="sale-section-wrapper container">
            <div class="row">
                <div class="sale-section-wrapper-title">
                    <p class="text-lg pb-2 font-light">Do You Want to Work with us?</p>
                    <h1 class="font-bold text-5xl text-gray-800">Find Better Place <br>To Work</h1>
                    <div class="grid gap-5 place-items-start place-content-start">
                        <button class="px-6 py-2 rounded-full text-white">Submit Property</button>
                        <h1 class="text-xl text-gray-900">What are you looking for?</h1>
                        <div class="grid-icon">
                            <div class="flex items-center">
                                <div class="box-icon rounded-md shadow-md">
                                    <a href="#">
                                        <i class="h-10 w-10 ml-5 text-pink-600" data-feather="home"></i>
                                        <h6 class="mt-3 text-base">Home</h6>
                                    </a>
                                </div>
                                <div class="box-icon rounded-md shadow-md mx-5">
                                    <a href="#">
                                        <i class="h-10 w-10 ml-5 text-pink-600" data-feather="bookmark"></i>
                                        <h6 class="mt-3 text-base">Booking</h6>
                                    </a>
                                </div>
                                <div class="box-icon rounded-md shadow-md">
                                    <a href="#">
                                        <i class="h-10 w-10 ml-5 text-pink-600" data-feather="box"></i>
                                        <h6 class="mt-3 text-base">Product</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sale-section-wrapper-image">
                    <img src="{{ asset('images/layout-9.png') }}" alt="homepage">
                </div>
            </div>
        </div>
    </div>

    <!-- about us section -->
    <div class="about-us-section">
        <div class="about-us-section-wrapper container">
            <div class="row">
                <div class="about-us-section-wrapper-content">
                    <div class="grid gap-5 mb-10">
                        <div class="text-base uppercase">@lang('website.navbar.about_us')</div>
                        <h2 class="text-lg font-bold">Providing Best Properties Since 2023</h2>
                        <p>
                            Dignissim justo, quis porta dignissim est sit. Nibh imperdiet aliquam tellus massa blandit
                            pharetra
                            arcu. In lectus laoreet tempor sit laoreet amet vel vitae sed. Quis pretium fames vitae aliquet
                            nec
                            eu nibh. Sed donec facilisi tempus in libero, tellus turpis metus, et. Lectus urna, justo
                            molestie
                            at cursus purus. Molestie commodo aliquet pretium neque ut gravida. Pellentesque consectetur
                            odio
                            morbi eget odio tortor porttitor tortor, tellus. Ut placerat ipsum hendrerit.
                        </p>
                    </div>
                    <a class="btn" href="{{ route('website-page-about-us') }}">Learn more</a>
                </div>

                <div class="about-us-section-wrapper-image">
                    <img src="https://ld-wt73.template-help.com/tf/estancy_v1/images/about-01-500x530.jpg" alt="about us">
                </div>
            </div>
        </div>
    </div>

    <div class="sale-section">
        <div class="sale-section-wrapper container">
            <div class="sale-section-wrapper-label">
                <h2>
                    Find Our Properties
                    <div class="title-bdr">
                        <div class="left-bdr"></div>
                        <div class="right-bdr"></div>
                    </div>
                </h2>
                <a class="view-all" href="http://">
                    <h3>View All</h3>
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
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$120.00*</h2>
                        <p class="text-base">
                            Real estate is divided into several categories, including residential property, commercial
                            property and industrial property.
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$150.00*</h2>
                        <p class="text-base">
                            Elegant retreat in a quiet Coral Gables setting. This home provides wonderful entertaining
                            spaces with a chef kitchen opening…
                        </p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
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
                        <h2 class="text-lg font-semibold mt-2 mb-2">$6558.00*</h2>
                        <p class="text-base">Real estate is divided into several categories, including residential
                            property, commercial property and industrial property.</p>
                        <div class="flex justify-between items-center mt-5">
                            <h3 class="text-gray-500 font-semibold text-sm">August 4, 2022</h3>
                            <button
                                class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- our expert -->
    <div class="block-container py-14" style="background-image: url('{{ asset('images/expert.jpg') }}')">
        <div class="block-content container relative">
            <div class="absolute top-1/2 left-0 transform translate-y-5 color-white z-20">
                <div class="text-3xl font-bold pb-5 uppercase">Our Expert</div>
                <div class="grid gap-5">
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain rounded-full"
                                src="{{ asset('images/building.png') }}" alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            DESIGN + BUILD
                            <br>
                            CONSTRUCTION BUILDING
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain rounded-full" src="{{ asset('images/light.jpg') }}"
                                alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            CONSTRUCTION SERVICE
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                            <img class="w-full h-full object-contain rounded-full"
                                src="{{ asset('images/team-work.png') }}" alt="">
                        </div>
                        <div class="text-lg text-left pl-5 w-3/5">
                            SKILLED TEAM AND IN
                            HOUSE DESIGNED + BUILT |
                            DIRECTED MENPOWER
                            THRU OUR MANAGEMENT
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="partner-content">
        <div class="container">
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="data:image/png;base64,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"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://uploads-ssl.webflow.com/5fdc39a84acdaa3006a5fdfe/5fdc4d3fe1fbb034f579fba3_WBSV%20logo.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://www.acledabank.com.kh/kh/assets/download_material/download-logo-blue.jpg" alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://png.pngtree.com/template/20220505/ourmid/pngtree-special-day-12-campaign-event-poster-image_1447303.jpg"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://upload.wikimedia.org/wikipedia/fr/thumb/e/ed/Tenchu_classic_logo.webp/200px-Tenchu_classic_logo.webp.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://shopbabyworld.com/wp-content/uploads/2020/01/BabyWorld-English-Logo.png" alt="">

            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://www.pngfind.com/pngs/m/481-4816715_costa-coffee-logo-costa-coffee-logo-png-transparent.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain" src="https://i.pinimg.com/736x/da/af/34/daaf34cbc92ee3dec312d7758355def1.jpg"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="data:image/png;base64,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"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://www.pngfind.com/pngs/m/370-3704054_pizza-company-logo-png-pizza-company-logo-vector.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain" src="https://www.carlogos.org/logo/Lotus-logo-2019-1800x1800.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain" src="https://www.pngkey.com/png/detail/270-2703524_bbq-logo-illustration.png"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="http://static1.squarespace.com/static/5b7edf5036099bcb6fd1e12e/t/5b7f5686562fa72efd105a6a/1535071883259/CFD8C5FA-C751-4D78-B203-AA60F6E671D3.png?format=1500w"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://www.pngkit.com/png/detail/28-289709_logo-cafe-amazon-cafe-amazon.png" alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="data:image/png;base64,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"
                    alt="">
            </div>
            <div class="inline-flex m-5 w-28 h-28">
                <img class="object-contain"
                    src="https://fastly.4sqi.net/img/general/600x600/71889127_LULosvvDF7O_KJw60hImUazghn-swQc5v8GPHsythbI.jpg"
                    alt="">
            </div>
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
