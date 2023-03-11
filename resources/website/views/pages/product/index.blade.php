@extends('website::shared.layout')
@include('website::components.meta', [
    'title' => 'Product',
])
@section('content')

    <!-- banner -->
    @include('website::components.banner', [
        'title' => isset($banner?->content) ? $banner?->content : 'Find Our Properties',
        'image' => isset($banner?->thumbnail_url) ? $banner?->thumbnail_url : '',
        'breadcrumbs' => [
            [
                'name' => __('website.navbar.home'),
                'active' => false,
                'url' => route('website-home'),
            ],
            [
                'name' => __('website.navbar.product'),
                'active' => true,
            ],
        ],
    ])

    <!-- product section -->
    @if (isset($products) && count($products) > 0)
        <div class="sale-section">
            <div class="sale-section-wrapper container">
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($products as $item)
                        <div class="bg-white product-box shadow-lg">
                            <div class="product-box-image">
                                <img src="{{ $item?->thumbnail_url }}" alt="">
                                <div class="product-box-image-icon" x-data="favorite" data-id="{{ $item?->id }}"
                                    @auth('web')
                                        @click="onAddFavorite('{{ $item?->id }}')"
                                    @else
                                        href="{{ route('website-auth-sign-in') }}"
                                    @endauth>
                                    <i x-show="adding == false" class="false" data-feather="heart"></i>
                                    <i x-show="adding == false" class="fas fa-heart true"></i>
                                    <i x-show="adding == true" class="fas fa-spinner fa-spin"></i>
                                </div>
                            </div>
                            <div class="product-box-content p-8">
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
                @component('website::components.pagination', [
                    'paginate' => $products,
                    'class' => '!mt-20',
                ])
                @endcomponent
            </div>
        </div>
    @else
        @component('website::components.empty', [
            'image' => asset('images/product-empty.svg'),
            'style' => 'width: 100%; height: 400px;',
            'title' => __('website.empty.no_data'),
            'message' => __('website.empty.there_is_no_data', ['name' => __('website.navbar.product')]),
        ])
        @endcomponent
    @endif

    <!-- space -->
    <div class="space"></div>
@stop
