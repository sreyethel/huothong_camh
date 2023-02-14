@component('admin::components.dialog', ['dialog' => 'storeDialog'])
    <div x-data="storeDialog" class="form-admin" style="width: calc(100vw - 200px);" />
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
    <form class="form-wrapper scroll-form">
        <div class="form-header">
            <h3 x-text="!dialogData?.id ? 'Create Blog' : 'Update Blog'"></h3>
            <span @click="$store.storeDialog.close()"><i data-feather="x"></i></span>
        </div>
        {{ csrf_field() }}
        <div class="form-body" style="display: grid;grid-template-columns: minmax(200px, 25%) 1fr;grid-gap: 5px;">
            <div class="form-item">
                <div class="row">
                    <div class="form-row">
                        <label>Name<span>*</span></label>
                        <input type="text" x-model="form.name" :disabled="form.disabled" placeholder="Enter name">
                        <span class="error" x-show="validate?.name" x-text="validate?.name"></span>
                    </div>
                    <div class="form-row">
                        <label>Status<span>*</span></label>
                        <select x-model="form.status" :disabled="form.disabled">
                            @foreach (config('dummy.status') as $key => $status)
                                <option value="{{ $status['key'] }}" x-bind:selected="form.status == {{ $status['key'] }}">
                                    {{ $status['text'] }}
                                </option>
                            @endforeach
                        </select>
                        <span class="error" x-show="validate?.status" x-text="validate?.status"></span>
                    </div>
                    <div class="form-row">
                        <label>Logo<span>*</span></label>
                        <div class="form-select-photo image" @click="selectLogo(event)">
                            <div class="select-photo" :class={active:form?.logo}>
                                <div class="icon">
                                    <i data-feather="image"></i>
                                </div>
                                <div class="title">
                                    <span>Choose logo</span>
                                </div>
                            </div>
                            <template x-if="form?.logo">
                                <div class="image-view active">
                                    <img x-bind:src="baseImageUrl + form?.logo" alt="">
                                </div>
                            </template>
                            <input type="hidden" x-model="form.logo" autocomplete="off" role="presentation">
                        </div>
                        <span class="error" x-show="validate?.logo" x-text="validate?.logo"></span>
                    </div>
                </div>
            </div>
            <div class="form-item">
                <div class="form-row" x-transition:enter.duration.500ms x-transition.scale.origin.top>
                    <label>Content</label>
                    <textarea id="mytextarea" rows="24" style="height: 400px" placeholder="Enter content" x-model="form.content"></textarea>
                    <span class="error" x-show="validate?.content" x-text="validate?.content"></span>
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
        function selectImage(e) {
            fileManager({
                multiple: false,
                afterClose: (data, basePath) => {
                    if (data?.length > 0) {
                        const parent = e.target.closest('.form-select-photo');
                        e.target.value = data[0].path;
                        parent
                            .querySelector('.select-photo')
                            .classList.add('active');
                        parent
                            .querySelector('.image-view')
                            .classList
                            .add('active');
                        parent
                            .querySelector('.image-view')
                            .childNodes[0]
                            .nextElementSibling
                            .setAttribute('src', basePath + data[0].path);
                    }
                }
            })
        }

        Alpine.data('storeDialog', () => ({
            form: new FormGroup({
                name: [null, ['required']],
                content: [null, []],
                logo: [null, ['required']],
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

                await this.initTinymce();
            },
            selectLogo() {
                fileManager({
                    multiple: false,
                    afterClose: (data, basePath) => {
                        if (data?.length > 0) {
                            this.form.logo = data[0].path;
                        }
                    }
                })
            },
            async initTinymce() {
                await tinymce.remove();
                await tinymce.init({
                    selector: 'textarea#mytextarea',
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'wordcount'
                    ],
                    toolbar: 'fullscreen | bold italic underline | addImage media link | numlist bullist | styles | alignleft aligncenter alignright alignjustify | outdent indent ',
                    setup: function(editor) {
                        editor.ui.registry.addButton('addImage', {
                            text: 'Image',
                            icon: 'image',
                            onAction: () => {
                                fileManager({
                                    multiple: true,
                                    afterClose: (result, basePath) => {
                                        if (result && result.length >
                                            0) {
                                            result.map((file) => {
                                                const img =
                                                    editor.dom
                                                    .createHTML(
                                                        'img', {
                                                            src: basePath +
                                                                file
                                                                .path,
                                                            style: 'width:100% !important;'
                                                        });
                                                editor
                                                    .insertContent(
                                                        img);
                                            });
                                        }
                                    }
                                })
                            }
                        });
                    },
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
                            this.form.content = tinymce.get("mytextarea").getContent();
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-partner-save') }}`,
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
