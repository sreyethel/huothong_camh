@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => 'Category Management',
            'header_name' => 'Category Management',
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        Total Categories : <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    <div class="filter">
                        <div class="form-row search-inline">
                            <input type="text" x-model="formFilter.search" name="search" placeholder="@lang('admin.filter.search')"
                                value="{!! request('search') !!}">
                            <button @click="onFilter()">
                                <i data-feather="search"></i>
                            </button>
                        </div>
                    </div>
                    @can('category-create')
                        <button class="btn-create" @click="openStoreCategoryDialog(parentId,'')">
                            <i data-feather="plus"></i>
                            <span>Create New</span>
                        </button>
                    @endcan
                    <button @click="viewTrash()" class="!text-rose-500">
                        <i data-feather="trash-2"></i>
                        <span>Trash</span>
                    </button>
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.category.table')
        </div>
        @include('admin::pages.category.store')
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-category-data') }}"),
            parentId: @json(request('parent_id') ?? null),

            init() {
                this.table.init();
                this.formFilter.search = '{{ request('search') ?? null }}';
            },
            formFilter: new FormGroup({
                search: [null, []],
                parentId: [null, []],
            }),
            viewTrash() {
                this.table.init({
                    trash: true
                });
            },
            onFilter() {
                this.table.init(this.formFilter.value());
            },
            onReset() {
                this.formFilter.reset();
                this.table.reset();
            },
            openStoreCategoryDialog(parentId = null, data) {
                this.$store.storeCategoryDialog.open({
                    data: {
                        parentId: parentId,
                        data: data
                    },
                    afterClosed: (res) => {
                        if (res) {
                            this.table.reload();
                        }
                    }
                });
            },
            onUpdateStatus(data, status) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: (status == 1 ? `@lang('dialog.msg.enable')` : `@lang('dialog.msg.disable')`) + data
                            .name + '?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: status == 1 ? "@lang('dialog.button.enable')" : "@lang('dialog.button.disable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-category-status') }}`,
                                method: 'POST',
                                data: {
                                    id: data.id,
                                    status: status
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
            onDelete(data) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: `@lang('dialog.msg.delete') ${data.name}?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.delete')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-category-delete') }}`,
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
                        message: `@lang('dialog.msg.restore') ${data.name}?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: "@lang('dialog.button.restore')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-category-restore') }}`,
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
            }
        }));
    </script>
@stop
