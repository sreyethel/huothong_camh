<script type="module">
    Alpine.data('favorite', () => ({
            loading: false,
            adding: false,

            init() {
                feather.replace();
                this.onGetFavorite();
            },

            onAddFavorite(id) {
                this.adding = true;
                Axios.post('{{ route('website-product-favorite-store') }}', {
                    id: id,
                }).then((response) => {
                    this.adding = false;
                    let data = response.data;
                    if (data.type == 'add') {
                        this.onGetFavorite();
                    } else {
                        this.onGetFavorite(id);
                    }
                    Toast({
                            message: data?.message,
                            status: data?.status,
                            size: 'small',
                        });

                }).catch((error) => {
                    this.adding = false;
                    Toast({
                            message: error?.response?.message,
                            status: 'error',
                            size: 'small',
                        });
                });
            },

            onGetFavorite(id = null) {
                Axios.get('{{ route('website-product-favorite') }}').then((response) => {
                    let data = response?.data;
                    if (data?.length > 0) {
                        Object.keys(data).forEach((key) => {
                            const el = document.querySelector(`[data-id="${data[key]}"]`);
                            if (el != null) {
                                el.classList.add('active');
                            } 
                        });
                    }
                       
                    const thisEl = document.querySelector(`[data-id="${id}"]`);
                    if (thisEl != null) {
                        thisEl.classList.remove('active');
                    }
                });
            },

        }));
</script>
