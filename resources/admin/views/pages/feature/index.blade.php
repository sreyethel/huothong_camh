@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => __('form.title.product_feature'),
            'header_name' => __('form.name.product_feature'),
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        @lang('app.total', ['name' => __('app.product_feature')]) <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    @can('product-feature-view')
                        <template x-if="Ids.length <= 0">
                            <button class="btn-create" @click="openStoreDialog()">
                                <i data-feather="plus"></i>
                                <span>@lang('form.header.button.create')</span>
                            </button>
                        </template>
                        <template x-if="Ids.length <= 0">
                            <button class="!text-rose-500" @click="viewBulk()">
                                <i data-feather="alert-triangle"></i>
                                <span>@lang('table.option.hidden')</span>
                            </button>
                        </template>
                        <template x-if="Ids.length > 0 && status == false">
                            <button class="!bg-rose-500 !text-white" type="button" @click="bulkHideShow(disabled)">
                                <i data-feather="alert-triangle"></i>
                                <span>@lang('table.option.bulk_hidden')</span>
                            </button>
                        </template>
                        <template x-if="Ids.length > 0 && status == true">
                            <button class="!bg-green-600 !text-white" type="button" @click="bulkHideShow(active)">
                                <i data-feather="eye"></i>
                                <span>@lang('table.option.bulk_show')</span>
                            </button>
                        </template>
                        <button @click="viewTrash()" class="!text-rose-500">
                            <i data-feather="trash-2"></i>
                            <span>@lang('table.option.trash')</span>
                        </button>
                    @endcan
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.feature.table')
        </div>
        @include('admin::pages.feature.store')
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-product-feature-data') }}"),
            Ids: [],
            status: false,
            active: @json(config('dummy.status.active.key')),
            disabled: @json(config('dummy.status.disabled.key')),
            
            async init() {
                this.table.init();
                this.$watch('Ids', () => feather.replace());
            },
            viewTrash() {
                this.table.init({
                    trash: true,
                    status: '',
                });
                this.Ids = [];
            },
            viewBulk() {
                this.table.init({
                    status: true,
                    trash: '',
                });

                this.status = true;
            },
            onReset() {
                this.table.reset();
                this.status = false;
                this.Ids = [];
            },
            openStoreDialog(data) {
                this.$store.storeDialog.open({
                    data: data,
                    afterClosed: (res) => {
                        if (res) {
                            this.table.reload();
                        }
                    }
                });
            },
            onUpdateOption(data, option){
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: (option == this.active ? `@lang('dialog.msg.enable')` : `@lang('dialog.msg.disable')`)+'?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: option == this.active ? "@lang('dialog.button.enable')" : "@lang('dialog.button.disable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-product-feature-saveSingleOption') }}`,
                                method: 'POST',
                                data: {
                                    id: data.id,
                                    option: option
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.table.reload();
                                }
                            }).catch((e) => {
                                console.log(e);
                            });
                        }
                    }
                });
            },
            checkAll(el, data) {
                let checkbox = $('.product-checkbox');
                if (el.checked == true) {
                    data.map((val) => {
                        this.Ids.push(val.id);
                    });
                    checkbox.prop('checked', true);
                } else {
                    this.Ids = [];
                    checkbox.prop('checked', false);
                }
            },
            selectProduct(el, id) {
                if (el.checked == true) {
                    this.Ids.push(id);
                } else if (el.checked == false) {
                    if (this.Ids.length > 0) {
                        this.Ids = this.Ids.filter(val => val !== id);
                    }
                }
            },
            bulkHideShow(option) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: (option == this.disabled ? `@lang('dialog.msg.disable')` : `@lang('dialog.msg.enable')`)+'?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: option == this.disabled ? "@lang('dialog.button.disable')" : "@lang('dialog.button.enable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: "{{ route('admin-product-feature-bulk-hide-show') }}",
                                method: 'DELETE',
                                data: {Ids: this.Ids, option: option}
                            }).then((res) => {
                                if (res.data.error == false) { 
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.Ids = [];
                                    this.table.reload();
                                }
                            }).catch((e) => {
                                console.log(e);
                            });
                        }
                    }
                });
            },
            onDelete(data) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: `@lang('dialog.msg.move_to_trash')?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.move_to_trash')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-product-feature-delete') }}`,
                                method: 'DELETE',
                                data: {
                                    id: data.id
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.table.reload();
                                }
                            }).catch((e) => {
                                console.log(e);
                            });
                        }
                    }
                });
            },
            onRestore(data) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: `@lang('dialog.msg.restore')?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.restore')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-product-feature-restore') }}`,
                                method: 'PUT',
                                data: {
                                    id: data.id
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.table.reload();
                                }
                            }).catch((e) => {
                                console.log(e);
                            });
                        }
                    }
                });
            },
            onDestroy(data) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: `@lang('dialog.msg.delete')?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.delete')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-product-feature-destroy') }}`,
                                method: 'DELETE',
                                data: {
                                    id: data.id
                                }
                            }).then((res) => {
                                if (res.data.error == false) {
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.table.reload();
                                }
                            }).catch((e) => {
                                console.log(e);
                            });
                        }
                    }
                });
            },
        }));
    </script>
@stop
