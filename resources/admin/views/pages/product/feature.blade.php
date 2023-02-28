@component('admin::components.dialog', ['dialog' => 'storeDialogFeature'])
    <div x-data="storeDialogFeature" class="form-admin">
        <form class="form-wrapper scroll-form">
            <div class="form-header">
                <h3>@lang('app.product_feature')</h3>
                <span @click="$store.storeDialogFeature.close()"><i data-feather="x"></i></span>
            </div>
            @csrf
            <div class="form-body">
                <div class="flex items-center">
                    <input class="form-check-input cursor-pointer w-5 h-5" type="checkbox" value=""
                        @change="checkAll($event.target, features)" id="checkbox-all" x-bind:checked="Ids.length == features.length">
                    <label class="ml-2 text-lg cursor-pointer" for="checkbox-all">
                        Check All
                    </label>
                </div>

                <div class="mt-10">
                    <div class=" grid grid-cols-3 gap-5">
                        <template x-for="item in features" :key="item?.id">
                            <div class="row-item flex items-center">
                                <input class="form-check-input cursor-pointer row-checkbox w-5 h-5" type="checkbox"
                                    @change="selectCheckBox($event.target, item.id)" x-bind:id="'checkbox-' + item?.id"
                                    :checked="Ids.includes(item.id)">
                                <input type="hidden" x-model="form.feature" autocomplete="off" role="presentation">
                                <label class="cursor-pointer !text-zinc-900 ml-2" x-text="item?.title"
                                    x-bind:for="'checkbox-' + item?.id">
                                </label>
                            </div>
                        </template>
                    </div>
                </div>
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
        Alpine.data('storeDialogFeature', () => ({
            form: new FormGroup({
                feature: [null, []],
            }),

            dialogData: null,
            validate: null,
            loading: false,
            features: [],
            Ids: [],

            init() {
                this.dialogData = this.$store.storeDialogFeature?.data;
                this.onQueryFeature();

                if (this.dialogData?.feature) {
                    this.Ids = JSON.parse(this.dialogData?.feature);
                    this.form.feature = this.Ids;
                }
            },

            onQueryFeature() {
                Axios({
                    url: `{{ route('admin-product-feature-data') }}`,
                    method: 'GET',
                }).then((res) => {
                    this.features = res?.data?.data;
                });
            },

            checkAll(el, data) {
                let checkbox = $('.row-checkbox');
                if (el.checked == true) {
                    let ids = data.map((item) => {
                        return item.id;
                    });
                    this.form.feature = ids;
                    checkbox.prop('checked', true);
                } else {
                    this.form.feature = [];
                    checkbox.prop('checked', false);
                }

                this.Ids = this.form.feature;
            },

            selectCheckBox(el, id) {
                if (el.checked == true) {
                    this.Ids.push(id);
                } else if (el.checked == false) {
                    if (this.Ids.length > 0) {
                        this.Ids = this.Ids.filter(val => val !== id);
                    }
                }
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
                            this.form.feature = this.Ids;
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-product-feature') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeDialogFeature.close(true);
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
