@component('admin::components.dialog', ['dialog' => 'storeDialogGallery'])
    <style>
        .tox-dialog-wrap .tox-dialog-wrap__backdrop {
            background: #75757547 !important;
        }

        .dialog {
            z-index: 110 !important;
        }

        .tox-dialog__header .tox-button.tox-button--icon.tox-button--naked {
            display: none;
        }
    </style>
    <div x-data="storeDialogGallery" class="form-admin">
        <form class="form-wrapper scroll-form">
            <div class="form-header">
                <h3 x-show="!dialogData?.gallery">@lang('form.header.create', ['name' => __('app.gallery')])</h3>
                <h3 x-show="dialogData?.gallery">@lang('form.header.update', ['name' => __('app.gallery')])</h3>
                <span @click="$store.storeDialogGallery.close()"><i data-feather="x"></i></span>
            </div>
            {{ csrf_field() }}
            <div class="form-body">
                <div class="row">
                    <div class="form-row">
                        <label><strong>Gallery</strong></label>
                        <div class="galleryLayoutGp">
                            <div class="galleryGp">
                                <template x-if="galleries.length > 0">
                                    <template x-for="(item,index) in galleries">
                                        <div class="imageItem">
                                            <img :src="baseImageUrl + item"
                                                onerror="(this).src='{{ asset('images/logo/default.png') }}'"
                                                alt="">
                                            <input type="hidden" x-model="form.gallery" autocomplete="off"
                                                role="presentation">
                                            <div class="delete" @click="imageDelete(index)">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </div>
                                        </div>
                                    </template>
                                </template>
                                <div class="imageItem add" @click="selectImageGallery">
                                    <i data-feather="plus"></i>
                                </div>
                            </div>
                        </div>
                        <span class="error" x-show="validate?.gallery" x-text="validate?.gallery"></span>
                    </div>
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
        Alpine.data('storeDialogGallery', () => ({
            form: new FormGroup({
                gallery: [null, []],
            }),

            dialogData: null,
            baseImageUrl: "{{ asset('file_manager') }}",
            validate: null,
            loading: false,
            galleries: [],

            init() {
                this.dialogData = this.$store.storeDialogGallery?.data;
                if (this.dialogData?.gallery) {
                    if (this.dialogData) {
                        this.galleries = JSON.parse(this.dialogData.gallery);
                        this.form.gallery = this.galleries ?? null;
                    }
                }
            },
            selectImageGallery() {
                fileManager({
                    multiple: true,
                    afterClose: (data, basePath) => {
                        if (data?.length > 0) {
                            data.map((item) => {
                                this.galleries.push(item.path);
                                this.form.gallery = this.galleries;
                            });
                        }
                    }
                })
            },
            imageDelete(index) {
                this.galleries.splice(index, 1);
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
                                url: `{{ route('admin-product-gallery') }}`,
                                method: 'POST',
                                data: {
                                    ...data,
                                    id: this.dialogData?.id,
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    this.form.reset();
                                    this.$store.storeDialogGallery.close(true);
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
