@component('admin::components.dialog', ['dialog' => 'storeCategoryDialog'])
    <div x-data="storeCategoryDialog" class="form-admin" style="width: 800px">
        <form class="form-wrapper">
            <div class="form-header">
                <h3 x-show="!dialogData?.id">Create Category</h3>
                <h3 x-show="dialogData?.id">Update Category</h3>
                <span @click="$store.storeCategoryDialog.close()"><i data-feather="x"></i></span>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-2">
                    <div class="form-row">
                        <label>Name <span>*</span> </label>
                        <input type="text" placeholder="Name" x-model="form.name" :disabled="form.disabled"
                            autocomplete="off">
                        <span class="error" x-show="validate?.name" x-text="validate?.name"></span>
                    </div>
                    <div class="form-row">
                        <label>@lang('admin.form.status.label')<span>*</span></label>
                        <select x-model="form.status" :disabled="form.disabled">
                            @foreach (config('dummy.status') as $key => $status)
                                <option value="{{ $status['key'] }}" x-bind:selected="form.status == {{ $status['key'] }}">
                                    {{ $status['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-button">
                    <button type="button" color="primary" @click="onSave()" :disabled="form.disabled || loading">
                        <i data-feather="save"></i>
                        <span>Save</span>
                        <div class="loader" style="display: none" x-show="loading"></div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        Alpine.data('storeCategoryDialog', () => ({
            form: new FormGroup({
                parent_id: [null, []],
                name: [null, ['required']],
                status: [1, ['required']],
            }),
            dialogData: null,
            validate: null,
            loading: false,
            init() {
                this.dialogData = this.$store.storeCategoryDialog.data;
                this.form.patchValue(this.dialogData?.data ?? {});
                if (this.dialogData?.parentId) {
                    this.form.parent_id = this.dialogData?.parentId;
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
                                url: `{{ route('admin-category-store') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.data?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeCategoryDialog.close(true);
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
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
