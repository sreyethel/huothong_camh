@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => __('form.title.banner'),
            'header_name' => __('form.name.banner'),
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        @lang('app.total', ['name' => __('app.banner')]) <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    <div class="filter">
                        <div class="form-row search-inline">
                            <input type="text" x-model="formFilter.search" name="search" placeholder="@lang('admin.filter.search')"
                                value="{!! request('search') !!}">
                            <button @click="onFilter()"><i data-feather="search"></i></button>
                        </div>
                    </div>
                    @can('banner-create')
                        <button class="btn-create" @click="openStoreDialog()">
                            <i data-feather="plus"></i>
                            <span>@lang('form.header.button.create')</span>
                        </button>
                    @endcan
                    @can('banner-update')
                        <button class="!text-rose-500" @click="viewBulk()">
                            <i data-feather="alert-triangle"></i>
                            <span>@lang('table.option.hidden')</span>
                        </button>
                    @endcan
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.banner.table')
        </div>
        @include('admin::pages.banner.store')
    </div>
@stop
@section('script')
    <script src="{{ asset('plugin/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-banner-data') }}"),
            status: false,
            active: @json(config('dummy.status.active.key')),
            disabled: @json(config('dummy.status.disabled.key')),
            
            async init() {
                this.table.init();
                this.formFilter.search = @json(request('search') ?? null);
            },
            formFilter: new FormGroup({
                search: [null, []],
            }),
            onFilter() {
                this.table.init(this.formFilter.value());
            },
            viewTrash() {
                this.table.init({
                    trash: true,
                    status: '',
                });
            },
            onReset() {
                this.formFilter.reset();
                this.table.reset();
                this.status = false;
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
            onUpdateStatus(data, status) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: (status == 1 ? `@lang('dialog.msg.enable')` : `@lang('dialog.msg.disable')`) + data
                            .page + '?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: status == 1 ? "@lang('dialog.button.enable')" : "@lang('dialog.button.disable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-banner-status') }}`,
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
        }));
    </script>
@stop
