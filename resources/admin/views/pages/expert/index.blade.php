@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => __('form.title.expert'),
            'header_name' => __('form.name.expert'),
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        @lang('app.total', ['name' => __('app.expert')]) <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    @can('expert-create')
                        <button class="btn-create" @click="openStoreDialog()">
                            <i data-feather="plus"></i>
                            <span>@lang('form.header.button.create')</span>
                        </button>
                    @endcan
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.expert.table')
        </div>
        @include('admin::pages.expert.store')
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-expert-data') }}"),
            status: false,
            active: @json(config('dummy.status.active.key')),
            disabled: @json(config('dummy.status.disabled.key')),
            
            init() {
                this.table.init();
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
            onUpdateOption(data, option){
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: (option == this.active ? `@lang('dialog.msg.enable')` : `@lang('dialog.msg.disable')`) + '?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: option == this.active ? "@lang('dialog.button.enable')" : "@lang('dialog.button.disable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-expert-saveSingleOption') }}`,
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
        }));
    </script>
@stop
