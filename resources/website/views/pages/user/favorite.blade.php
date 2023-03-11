@extends('website::shared.layout')
@section('content')
    <div class="user-content container">
        <div class="user-wrapper section-aside">
            @include('website::pages.user.sidebar')
            <section>
                @if (isset($products) && count($products) > 0)
                    <div class="grid gap-5">
                        @foreach ($products as $item)
                            <div class="w-full flex flex-row user-setting-favorite-cart">
                                <div class="image">
                                    <img src="{{ optional($item->product)->thumbnail_url }}" alt="">
                                </div>
                                <div class="user-setting-favorite-cart-content p-4">
                                    <h1 class="text-xl font-semibold ">{{ optional($item->product)->title }}</h1>
                                    <h2 class="text-lg font-semibold mt-2 mb-2">${{ optional($item->product)->price }}</h2>
                                    <h3 class="text-gray-500 font-semibold text-sm">
                                        {{ optional($item->product)?->created_at->format('F d, Y') }}
                                    </h3>
                                    <div class="cart-icon cursor-pointer" x-data="favorite"
                                        @click="onAddFavorite('{{ $item?->product_id }}')">
                                        <i x-show="adding == false" class="fas fa-heart"></i>
                                        <i x-show="adding == true" class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @component('website::components.pagination', [
                        'paginate' => $products,
                    ])
                    @endcomponent
                @else
                    @component('website::components.empty', [
                        'title' => 'No Favorite',
                        'message' => 'There are no favorite product available yet.',
                        'image' => asset('images/product.svg'),
                        'style' => 'width: auto;height:200px;',
                    ])
                    @endcomponent
                @endif
            </section>
        </div>
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data('favorite', () => ({
            loading: false,
            adding: false,

            onAddFavorite(id) {
                this.adding = true;
                Axios.post('{{ route('website-product-favorite-store') }}', {
                    id: id,
                }).then((response) => {
                    this.adding = false;
                    let data = response.data;
                    Toast({
                        message: data?.message,
                        status: data?.status,
                        size: 'small',
                    });
                    
                    window.location.reload();

                }).catch((error) => {
                    this.adding = false;
                    Toast({
                        message: error?.response?.message,
                        status: 'error',
                        size: 'small',
                    });
                });
            },
        }));
    </script>
@stop
