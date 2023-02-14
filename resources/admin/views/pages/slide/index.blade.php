@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => 'Slide Management',
            'header_name' => 'Slide Management',
        ])     
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        Total Slides : <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    @can('slider-create')
                        <button class="btn-create" @click="openStoreSlideDialog()">
                            <i data-feather="plus"></i>
                            <span>Create New</span>
                        </button>
                    @endcan
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.slide.table')
        </div>
        @include('admin::pages.slide.store')
    </div>
@stop
@section('script')
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-slider-data') }}"),
            init() {
                this.table.init();
            },
            onReset() {
                this.table.reset();
            },
            openStoreSlideDialog(data) {
                this.$store.storeSlideDialog.open({
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
                        message: (status == 1 ? `@lang('dialog.msg.enable')` : `@lang('dialog.msg.disable')`) + 'this?',
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: status == 1 ? "@lang('dialog.button.enable')" : "@lang('dialog.button.disable')",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-slider-status') }}`,
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
