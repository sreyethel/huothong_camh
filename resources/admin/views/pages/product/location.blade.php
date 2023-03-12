@component('admin::components.dialog', ['dialog' => 'storeDialogLocation'])
    <div x-data="storeDialogLocation" class="form-admin">
        <form class="form-wrapper scroll-form">
            <div class="form-header">
                <h3>@lang('Location')</h3>
                <span @click="$store.storeDialogLocation.close()"><i data-feather="x"></i></span>
            </div>
            @csrf
            <div class="form-body">
                <input type="hidden" class="latitude" x-model="form.latitude">
                <input type="hidden" class="longitude" x-model="form.longitude">
                <div class="h-[400px]" id="map"></div>
                <div class="row">
                    <div class="form-row">
                        <span class="error" x-show="validate?.feature" x-text="validate?.feature"></span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="form-button">
                        <button type="button" @click="onSave()" color="primary">
                            <i data-feather="save"></i>
                            <span>Save</span>
                            <div class="loader" style="display: none" x-show="loading"></div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        Alpine.data('storeDialogLocation', () => ({
            form: new FormGroup({
                latitude: ['11.5500', ['required']],
                longitude: ['104.9167', ['required']],
            }),

            dialogData: null,
            validate: null,
            loading: false,

            async init() {
                this.dialogData = this.$store.storeDialogLocation?.data;

                if (this.dialogData?.location) {
                    this.form.latitude = JSON.parse(this.dialogData?.location)?.latitude;
                    this.form.longitude = JSON.parse(this.dialogData?.location)?.longitude;
                }

                await this.onInitMap();
            },

            async onInitMap() {
                var marker;

                var latlng = await new google.maps.LatLng(this.form.latitude, this.form.longitude);

                var map = await new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var marker = await new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: 'Set location',
                    draggable: true
                });

                google.maps.event.addListener(marker, 'dragend', function (event) {
                    document.querySelector('.latitude').value = this.getPosition().lat();
                    document.querySelector('.longitude').value = this.getPosition().lng();
                });

                google.maps.event.addListener(map, 'click', function (event) {
                    marker.setPosition(event.latLng);
                    document.querySelector('.latitude').value = event.latLng.lat();
                    document.querySelector('.longitude').value = event.latLng.lng();
                });
            },

            onSave() {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: "@lang('dialog.msg.save')",
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.save')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            this.form.disable();
                            this.loading = true;
                            this.form.patchValue({
                                latitude: document.querySelector('.latitude').value,
                                longitude: document.querySelector('.longitude').value,
                            });
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-product-location') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeDialogLocation.close(true);
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                }

                                if (res.data.error != false) {
                                    Toast({
                                        message: res.data.message,
                                        status: 'danger',
                                        size: 'small',
                                    });
                                }
                            }).catch((e) => {
                                this.validate = e.response.data.errors;
                            }).finally(() => {
                                this.form.enable();
                                this.loading = false;
                            });
                        }
                    }
                });
            }
        }));
    </script>
@endcomponent
