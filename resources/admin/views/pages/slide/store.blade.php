@component('admin::components.dialog', ['dialog' => 'storeSlideDialog'])
    <div x-data="storeSlideDialog" class="form-admin" style="width: 800px">
        <form class="form-wrapper">
            <div class="form-header">
                <h3 x-show="!dialogData?.id">Create Slide</h3>
                <h3 x-show="dialogData?.id">Update Slide</h3>
                <span @click="$store.storeSlideDialog.close()"><i data-feather="x"></i></span>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row-3">
                    <div class="form-row">
                        <label>Link </label>
                        <input type="text" placeholder="Enter link" x-model="form.link" :disabled="form.disabled"
                            autocomplete="off">
                    </div>
                    <div class="form-row">
                        <label>Ordering</label>
                        <input x-mask:dynamic="'9999'" placeholder="Enter ordering" x-model="form.ordering"
                            :disabled="form.disabled" autocomplete="off">
                        <span class="error" x-show="validate?.ordering" x-text="validate?.ordering"></span>
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
                <div class="row">
                    <div class="form-row">
                        <label class="w-full flex justify-between"><strong>Image</strong>
                            <div @click="removeImage()" class="text-gray-300" x-show=form?.image>
                                <div class="material-icons hover:text-red-500 cursor-pointer">delete</div>
                            </div>
                        </label>
                        <div class="form-select-photo image" @click="selectImage(event)" style="height: 300px;">
                            <div class="select-photo" :class={active:form?.image}>
                                <div class="icon">
                                    <i data-feather="image"></i>
                                </div>
                                <div class="title">
                                    <span>Select Image</span>
                                </div>
                            </div>
                            <template x-if="form?.image">
                                <div class="image-view active">
                                    <img x-bind:src="baseImageUrl + form?.image" alt=""
                                        style="object-fit: contain;">
                                </div>
                            </template>
                            <input type="hidden" x-model="form.image" autocomplete="off" role="presentation">
                        </div>
                        <span class="error" x-show="validate?.image" x-text="validate?.image"></span>
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
        Alpine.data('storeSlideDialog', () => ({
            form: new FormGroup({
                link: [null, ['required']],
                ordering: [null, ['required']],
                status: [1, ['required']],
                image: [null, ['required']],
            }),
            dialogData: null,
            validate: null,
            loading: false,
            baseImageUrl: "{{ asset('file_manager') }}",

            init() {
                this.getOrdering();
                this.dialogData = this.$store.storeSlideDialog.data;
                this.form.patchValue(this.dialogData ?? {});
            },
            selectImage() {
                fileManager({
                    multiple: false,
                    afterClose: (data, basePath) => {
                        if (data?.length > 0) {
                            this.form.image = data[0].path;
                        }
                    }
                })
            },
            removeImage() {
                $(".image-view").removeClass("active");
                $(".image-view").find("img").attr('src', '');
                $(".select-photo").removeClass("active");
                this.form.image = null;
            },
            getOrdering() {
                Axios({
                    url: `{{ route('admin-slider-ordering') }}`,
                    method: 'GET',
                }).then((res) => {
                    this.dialogData ? this.form.ordering : this.form.ordering = res.data;
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
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-slider-store') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeSlideDialog.close(true);
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
