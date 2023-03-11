@component('website::components.dialog', ['dialog' => 'orderDialog', 'center' => true, 'withBackdrop' => true])
    <div class="pop-up" x-data="booking">
        <div class="pop-up-wrapper">
            <div class="pop-up-close" @click="$store.orderDialog.close()">
                <i data-feather="x"></i>
            </div>
            <div class="pop-up-body">
                <div class="pop-up-body-content">
                    <div class="order-detail">
                        <div class="image">
                            <img src="{{ $data?->thumbnail_url }}" alt="">
                        </div>
                        <div class="info">
                            <div class="text-lg font-bold">{{ $data?->title }}</div>
                            <div class="quantity">Quantity : 1</div>
                            <div class="text-red-500 text-2xl font-bold mt-3">$ {{ number_format($data?->price, 2) }}</div>
                        </div>
                    </div>
                    <div class="group-button">
                        <button class="button btn-cancel" @click="$store.orderDialog.close()">
                            <i data-feather="x"></i>
                            Cancel
                        </button>
                        <template x-if="loading == false">
                            <button class="button btn-confirm" @click="onCartStore()">
                                <i data-feather="shopping-cart"></i>
                                Order Now
                            </button>
                        </template>
                        <template x-if="loading == true">
                            <button class="button btn-confirm">
                                <i data-feather="loader" class="animate-spin"></i>
                                saving...
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <script>
            Alpine.data('booking', () => ({
                productId: '{{ $data?->id }}',
                loading: false,

                onCartStore() {
                    this.loading = true;
                    Axios.post(`{{ route('website-product-order-store') }}`, {
                        product_id: this.productId,
                    }).then((response) => {
                        this.loading = false;
                        let data = response.data;
                        if (data.error == false) {
                            this.$store.orderDialog.close();
                            Toast({
                                message: data.message,
                                status: data.status,
                                size: 'small',
                            });
                        }
                    }).catch((error) => {
                        this.loading = false;
                        console.log(error);
                    });
                }
            }));
        </script>
    </div>
@endcomponent
