@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Home',
])
@section('content')
    <div class="sale-section overlay">
        <div class="sale-section-wrapper container">
            <div class="row">
                <div class="sale-section-wrapper-title">
                    @isset(toObject($home)->content)
                        {!! toObject($home)->content !!}
                    @endisset
                    <div class="grid gap-5 place-items-start place-content-start group-item">
                        <h1 class="text-xl text-gray-900">What are you looking for?</h1>
                        <div class="grid-icon">
                            <div class="flex items-center">
                                <div class="box-icon rounded-md mr-5">
                                    <a href="{{ route('website-user-order') }}">
                                        <i class="h-10 w-10 ml-5 text-pink-600 icon" data-feather="bookmark"></i>
                                        <h6 class="mt-3 text-base">Booking</h6>
                                    </a>
                                </div>
                                <div class="box-icon rounded-md">
                                    <a href="{{ route('website-product-index') }}">
                                        <i class="h-10 w-10 ml-5 text-pink-600 icon" data-feather="box"></i>
                                        <h6 class="mt-3 text-base">Product</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sale-section-wrapper-image">
                    <img src="{{ $home?->thumbnail_url }}" alt="homepage">
                </div>
            </div>
        </div>
        <div class="snow-effect"></div>
    </div>

    <!-- about us section -->
    @isset($about?->content?->content)
        <div class="about-us-section">
            <div class="about-us-section-wrapper container">
                <div class="row">
                    <div class="about-us-section-wrapper-content">
                        <div class="content-detail pb-7">
                            {!! toObject($about->content)?->content !!}
                        </div>

                        <a class="btn" href="{{ route('website-page-about-us') }}">Learn more</a>
                    </div>

                    <div class="about-us-section-wrapper-image">
                        <img src="{{ asset('file_manager/' . toObject($about->content)?->thumbnail) }}" alt="about us">
                    </div>
                </div>
            </div>
        </div>
    @endisset

    <!-- product section -->
    @if (isset($products) && count($products) > 0)
        <div class="sale-section">
            <div class="sale-section-wrapper container">
                <div class="sale-section-wrapper-label">
                    <h2>
                        Find Our Properties
                    </h2>
                    <a class="view-all" href="{{ route('website-product-index') }}">
                        <h3>View All</h3>
                        <i data-feather="arrow-right"></i>
                    </a>
                </div>
                <div class="sale-section-wrapper-box mt-10">
                    @foreach ($products as $item)
                        <div class="bg-white product-box shadow-lg">
                            <div class="product-box-image">
                                <img src="{{ $item->thumbnail_url }}" alt="">
                                <a class="product-box-image-icon" x-data="favorite" data-id="{{ $item?->id }}"
                                    @auth('web')
                                        @click="onAddFavorite('{{ $item?->id }}')"
                                    @else
                                        href="{{ route('website-auth-sign-in') }}"
                                    @endauth>
                                    <i x-show="adding == false" class="false" data-feather="heart"></i>
                                    <i x-show="adding == false" class="fas fa-heart true"></i>
                                    <i x-show="adding == true" class="fas fa-spinner fa-spin"></i>
                                </a>
                            </div>
                            <div class="product-box-content ">
                                <h1 class="text-xl font-semibold ">{{ $item?->title }}</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">${{ number_format($item?->price, 2) }}</h2>
                                <p class="text-base">
                                    {!! strip_tags($item?->content) !!}
                                </p>
                                <div class="flex justify-between items-center mt-5">
                                    <h3 class="text-gray-500 font-semibold text-sm">
                                        {{ $item?->created_at->format('F d, Y') }}
                                    </h3>
                                    <a href="{{ route('website-product-detail', $item?->slug) }}"
                                        class="px-6 py-2 bg-white rounded-full border-solid border-2 border-gray-300">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- our expert -->
    @if (isset($expert) && count($expert) > 0)
        <div class="block-container py-14" style="background-image: url('{{ $banner->thumbnail_url }}')">
            <div class="block-content container relative">
                <div class="absolute top-1/2 left-0 transform translate-y-5 color-white z-20">
                    <div class="text-3xl font-bold pb-5 uppercase">
                        <h2>Our Expert</h2>
                    </div>
                    <div class="grid gap-5">
                        @foreach ($expert as $item)
                            <div class="flex items-center">
                                <div class="bg-white rounded-xl p-3 w-20 h-20 shadow-border">
                                    <img class="w-full h-full object-contain rounded-full" src="{{ $item->thumbnail_url }}"
                                        alt="">
                                </div>
                                <div class="expert-text text-left pl-5 w-3/5">
                                    {{ $item->title }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- partner section -->
    @if (count($partner) > 0)
        <div class="partner-content">
            <div class="container partner-section">
                @foreach ($partner as $item)
                    <div class="inline-flex m-5 w-28 h-28 partner-item">
                        <img class="object-contain" src="{{ $item->logo_url }}" alt="">
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- space -->
    <div class="space"></div>
@stop
@section('script')
    <script type="module">
        const limitText = (text, limit) => {
            const newText = [];
            if (text.length > limit) {
                text.split(' ').reduce((acc, cur) => {
                    if (acc + cur.length <= limit) {
                        newText.push(cur);
                    }
                    return acc + cur.length;
                }, 0);
                return `${newText.join(' ')} ...`;
            }
            return text;
        };

        // limit text content
        let el = document.querySelectorAll('.content-detail');
        el.forEach((item) => {
            item.innerHTML = limitText(item.innerHTML, 500);
        });
    </script>
@stop
