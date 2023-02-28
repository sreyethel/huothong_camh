@component('admin::components.dialog', ['dialog' => 'storeDialog'])
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
    <div x-data="storeDialog" class="form-admin" style="width: calc(100vw - 200px);">
        <form class="form-wrapper scroll-form">
            <div class="form-header">
                <h3 x-show="!dialogData?.id">@lang('form.header.create', ['name' => __('app.banner')])</h3>
                <h3 x-show="dialogData?.id">@lang('form.header.update', ['name' => __('app.banner')])</h3>
                <span @click="$store.storeDialog.close()"><i data-feather="x"></i></span>
            </div>
            {{ csrf_field() }}
            <div class="form-body" style="display: grid;grid-template-columns: minmax(200px, 50%) 1fr;grid-gap: 20px;">
                <div class="form-item">
                    <div class="row-2">
                        <div class="form-row">
                            <label>@lang('form.body.label.page')<span>*</span></label>
                            <select x-model="form.page" :disabled="dialogData?.id || form.disabled">
                                <option value="">@lang('form.body.placeholder.page')</option>
                                @foreach (config('dummy.banner') as $page)
                                    <option value="{{ $page }}"
                                        x-bind:selected="form.page == '{{ $page }}'">
                                        {{ __('banner.' . $page) }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error" x-show="validate?.page" x-text="validate?.page"></span>
                        </div>
                        <div class="form-row">
                            <label>@lang('form.body.label.status')<span>*</span></label>
                            <select x-model="form.status" :disabled="form.disabled">
                                @foreach (config('dummy.status') as $key => $status)
                                    <option value="{{ $status['key'] }}"
                                        x-bind:selected="form.status == {{ $status['key'] }}">
                                        {{ $status['text'] }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error" x-show="validate?.status" x-text="validate?.status"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-row">
                            <label>@lang('form.body.label.thumbnail')<span>*</span></label>
                            <div class="form-select-photo image" @click="selectThumbnail(event)" style="height: 314px">
                                <div class="select-photo" :class={active:form?.thumbnail}>
                                    <div class="icon">
                                        <i data-feather="image"></i>
                                    </div>
                                    <div class="title">
                                        <span>@lang('form.body.placeholder.thumbnail')</span>
                                    </div>
                                </div>
                                <template x-if="form?.thumbnail">
                                    <div class="image-view active">
                                        <img x-bind:src="baseImageUrl + form?.thumbnail" alt="">
                                    </div>
                                </template>
                                <input type="hidden" x-model="form.thumbnail" autocomplete="off" role="presentation">
                            </div>
                            <span class="error" x-show="validate?.thumbnail" x-text="validate?.thumbnail"></span>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <div class="row">
                        <div class="form-row" x-transition:enter.duration.500ms x-transition.scale.origin.top>
                            <label>@lang('form.body.label.content')</label>
                            <textarea id="mytextarea" rows="24" placeholder="@lang('form.body.placeholder.content')" x-model="form.content"
                                style="height: 250px"></textarea>
                            <span class="error" x-show="validate?.content" x-text="validate?.content"></span>
                        </div>
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
                page: [null, ['required']],
                content: [null, ['required']],
                thumbnail: [null, ['required']],
                status: [@json(config('dummy.status.active.key')), ['required']],
            }),

            dialogData: null,
            baseImageUrl: "{{ asset('file_manager') }}",
            validate: null,
            loading: false,
            pageHome: @json(config('dummy.banner.home')),

            async init() {
                this.dialogData = this.$store.storeDialog.data;
                if (this.dialogData?.id) {
                    this.form.patchValue(this.dialogData);
                }

                await this.initTinymce();
            },
            selectThumbnail() {
                fileManager({
                    multiple: false,
                    afterClose: (data, basePath) => {
                        if (data?.length > 0) {
                            this.form.thumbnail = data[0].path;
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
                            this.form.content = tinymce.get('mytextarea').getContent();
                            const data = this.form.value();
                            Axios({
                                url: `{{ route('admin-banner-store') }}`,
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
