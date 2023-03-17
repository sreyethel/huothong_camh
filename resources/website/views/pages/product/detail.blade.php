@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => isset($detail?->title) ? $detail?->title : '',
    'image' => isset($detail?->thumbnail_url) ? $detail?->thumbnail_url : '',
    'description' =>  isset($detail?->content)? strip_tags($detail?->content): '',
])
@section('content')
    <div class="single-property" x-data="{}">
        <div class="single-property-content">
            <div class="image">
                <img src="{{ $detail->thumbnail_url }}" alt="">
            </div>
            <div class="title">
                <div class="container">
                    <div class="title-content bg-white shadow-border rounded-md">
                        <div class="left-single">
                            <div class="btns">
                                <h2 class="mb-0">{{ $detail?->title }}</h2>
                                <div class="pt-6 btn-flex">
                                    <button class="button btn-share shadow-border flex items-center" onclick="OpenModal()">
                                        <i class="far fa-share-square"></i>
                                        <span>Share</span>
                                    </button>
                                    <a class="button shadow-border flex items-center cursor-pointer favorite"
                                        x-data="favorite" data-id="{{ $detail?->id }}"
                                        @auth('web')
                                            @click="onAddFavorite('{{ $detail?->id }}')"
                                        @else
                                            href="{{ route('website-auth-sign-in') }}"
                                        @endauth>
                                        <i x-show="adding == false" class="h-5 w-5 mr-2 false" data-feather="heart"></i>
                                        <i x-show="adding == false" class=" fas fa-heart true"></i>
                                        <i x-show="adding == true" class=" fas fa-spinner fa-spin"></i>
                                        <span>Save</span>
                                    </a>
                                    <a class="button shadow-border flex items-center cursor-pointer"
                                        @auth('web')
                                            @click="$store.orderDialog.open()"
                                        @else
                                            href="{{ route('website-auth-sign-in') }}"
                                        @endauth>
                                        <i class="h-5 w-5 mr-3" data-feather="shopping-cart"></i>
                                        <span>Pre-order now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="right-single w-auto">
                            <h2 class="price">${{ number_format($detail?->price, 2) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- include order component -->
        @include('website::components.order', ['data' => $detail])
    </div>

    <div class="detail-property">
        <div class="container">
            <div class="section-aside">
                <section>
                    @if ($detail->gallery)
                        <div class="swiper swiper-top">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($detail->gallery) as $item)
                                    <div class="swiper-slide" data-fancyBox="gallery"
                                        data-src="{{ asset('file_manager' . $item) }}">
                                        <img src="{{ asset('file_manager' . $item) }}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($detail->gallery) as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('file_manager' . $item) }}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                            <div class="swiper-button-prev">
                                <i class="fa-solid fa-angle-left"></i>
                            </div>
                        </div>
                    @else
                        <img class="w-full rounded-lg" src="{{ $detail?->thumbnail_url }}" alt="" />
                    @endif

                    <div class="grid gap-7 mt-5">
                        <div class="column bg-white p-5 rounded-md">
                            <h2>Property Details</h2>
                            <p>
                                {!! $detail?->content !!}
                            </p>
                        </div>
                        @if (isset($features) && count($features) > 0)
                            <div class="column bg-white p-5 rounded-md">
                                <h2>Property Features</h2>
                                <div class="grid-feature">
                                    @foreach ($features as $item)
                                        <div class="item flex items-center">
                                            <i data-feather="check-circle" class="text-primary h-5 w-5 mr-3"></i>
                                            <h4 class="font-bold pr-3">{{ $item->title }}</h4>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if (isset(json_decode($detail->location)->latitude) && isset(json_decode($detail->location)->longitude))
                            <div class="column bg-white p-5 rounded-md">
                                <h2>Property Location</h2>
                                <div class="h-[400px]" id="map"></div>
                            </div>
                        @endif
                    </div>
                </section>
                <aside>
                    <div class="property-list">
                        <h3>Recently Added</h3>
                        <div class="grid gap-5 mt-7 recently-card">
                            @foreach ($recently_products as $item)
                                <a class="list" href="{{ route('website-product-detail', $item?->slug) }}">
                                    <div class="image">
                                        <img src="{{ $item->thumbnail_url }}" alt="" />
                                    </div>
                                    <div class="text">
                                        <h4>{{ $item?->title }}</h4>
                                        <p class="price"><i class="fa-solid fa-dollar-sign"></i>
                                            {{ number_format($item?->price, 2) }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- relative property -->
    @if (isset($related_products) && count($related_products) > 0)
        <div class="sale-section">
            <div class="sale-section-wrapper container">
                <div class="sale-section-wrapper-label">
                    <h2>Related Property</h2>
                    <a class="view-all" href="{{ route('website-product-index') }}">
                        <h3>Find More</h3>
                        <i data-feather="arrow-right"></i>
                    </a>
                </div>
                <div class="sale-section-wrapper-box mt-10">
                    @foreach ($related_products as $item)
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
                            <div class="product-box-content p-8">
                                <h1 class="text-xl font-semibold ">{{ $item?->title }}</h1>
                                <h2 class="text-lg font-semibold mt-2 mb-2">
                                    ${{ number_format($item?->price, 2) }}
                                </h2>
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

    <!-- space -->
    <div class="space"></div>
@stop
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key={!! config('app.google_map_key') !!}&callback=initMap&libraries=&v=weekly"
        async></script>

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
        
        var marker;
        var lat = "{{ json_decode($detail?->location)?->latitude }}";
        var lon = "{{ json_decode($detail?->location)?->longitude }}";

        var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lon)
                },
                zoom: 15,
                mapTypeId: 'roadmap',
            });

        marker = new google.maps.Marker({
            position: {
                lat: parseFloat(lat),
                lng: parseFloat(lon)
            },
            map: map,
            draggable: false,
        });
    </script>

    <script>
        function OpenModal(){
            $('body').on("click",".btn-share",function(){
                $('.share-dialog-content').css({'display':'block'});
                
                $(".share-dialog-overlay").css({'display':'block'});

                $('body').css({'overflow-y':'hidden'});
            });
        }

        function closeModal(){
            $('body').on("click",".close",function(){
                $('.share-dialog-content').css({'display':'none'});

                $(".share-dialog-overlay").css({'display':'none'});

                $('body').css({'overflow-y':'scroll'});
            });
            
        }

        
    </script>
@stop
