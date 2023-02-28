@component('admin::components.dialog', ['dialog' => 'storeDialog'])
    <div x-data="storeDialog" class="form-admin" style="width: 400px">
        <form class="form-wrapper scroll-form">
            <div class="form-header">
                <h3>@lang('app.product_feature')</h3>
                <span @click="$store.storeDialog.close()"><i data-feather="x"></i></span>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row">
                    <div class="form-row">
                        <label>@lang('form.body.label.title')<span>*</span></label>
                        <textarea x-model="form.title" :disabled="form.disabled" cols="10" rows="2" placeholder="@lang('form.body.placeholder.title')"></textarea>
                        <span class="error" x-show="validate?.title" x-text="validate?.title"></span>
                    </div>
                    <div class="form-row">
                        <label>@lang('form.body.label.status')<span>*</span></label>
                        <select x-model="form.status" :disabled="form.disabled">
                            @foreach (config('dummy.status') as $key => $status)
                                <option value="{{ $status['key'] }}" x-bind:selected="form.status == {{ $status['key'] }}">
                                    {{ $status['text'] }}
                                </option>
                            @endforeach
                        </select>
                        <span class="error" x-show="validate?.status" x-text="validate?.status"></span>
                    </div>
                    <div class="form-button">
                        <button type="button" @click="onSave()" color="primary">
                            <i data-feather="save"></i>
                            <span>@lang('form.button.save')</span>
                            <div class="loader" style="display: none" x-show="loading"></div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        Alpine.data('storeDialog', () => ({
            form: new FormGroup({
                title: [null, ['required']],
                status: [@json(config('dummy.status.active.key')), ['required']],
            }),

            dialogData: null,
            baseImageUrl: @json(asset('file_manager')),
            validate: null,
            loading: false,

            async init() {
                this.dialogData = this.$store.storeDialog.data;
                if (this.dialogData?.id) {
                    this.form.patchValue(this.dialogData);
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
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-product-feature-store') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeDialog.close(true);
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                }

                                if (res.data.error != false) {
                                    this.validate = null;
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
