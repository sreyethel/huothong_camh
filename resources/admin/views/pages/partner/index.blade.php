@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => 'Parnter Management',
            'header_name' => 'Parnter Management',
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        Total Partner : <span x-text="table?.paginate?.totalItems"></span>
                    </span>
                </div>
                <div class="content-action-button">
                    <template x-if="partnerIds.length <= 0">
                        <div class="filter">
                            <div class="form-row search-inline">
                                <input type="text" x-model="formFilter.search" name="search"
                                    placeholder="@lang('admin.filter.search')" value="{!! request('search') !!}">
                                <button @click="onFilter()"><i data-feather="search"></i></button>
                            </div>
                        </div>
                    </template>
                    {{-- @can('blog-create') --}}
                        <template x-if="partnerIds.length <= 0">
                            <button class="btn-create" @click="openStoreDialog()">
                                <i data-feather="plus"></i>
                                <span>Add Partner</span>
                            </button>
                        </template>
                    {{-- @endcan --}}
                    <template x-if="partnerIds.length <= 0">
                        <button class="!text-rose-500" @click="viewTrash()">
                            <i data-feather="alert-triangle"></i>
                            <span>Hidden</span>
                        </button>
                    </template>
                    <template x-if="partnerIds.length > 0 && status == false">
                        <button class="!bg-rose-500 !text-white" type="button"
                            @click="bulkHideShow('{{ config('dummy.status.disabled.key') }}')">
                            <i data-feather="alert-triangle"></i>
                            <span>Bulk Hidden</span>
                        </button>
                    </template>
                    <template x-if="partnerIds.length > 0 && status == true">
                        <button class="!bg-green-600 !text-white" type="button"
                            @click="bulkHideShow('{{ config('dummy.status.active.key') }}')">
                            <i data-feather="eye"></i>
                            <span>Bulk Show</span>
                        </button>
                    </template>
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.partner.table')
        </div>
        @include('admin::pages.partner.store')
    </div>
@stop
@section('script')
    <script src="{{ asset('plugin/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-partner-data') }}"),
            partnerIds: [],
            status: false,
            active: @json(config('dummy.status.active.key')),
            disabled: @json(config('dummy.status.disabled.key')),
            
            async init() {
                this.table.init();
                this.formFilter.search = '{{ request('search') ?? null }}';
                this.$watch('partnerIds', () => feather.replace());
            },
            formFilter: new FormGroup({
                search: [null, []],
            }),
            onFilter() {
                this.table.init(this.formFilter.value());
            },
            viewTrash() {
                this.table.init({
                    status: true
                });
                this.status = true;
            },
            onReset() {
                this.formFilter.reset();
                this.table.reset();
                this.status = false;
                this.partnerIds = [];
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
            onUpdateOption(id, option){
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: option == this.active ? `Are you sure to show this partner?` : `Are you sure to hide this partner?`,
                        btnSave: option == this.active ? 'Show' : 'Hide',
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: `{{ route('admin-partner-saveSingleOption') }}`,
                                method: 'POST',
                                data: {
                                    id: id,
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
                        this.partnerIds.push(val.id);
                    });
                    checkbox.prop('checked', true);
                } else {
                    this.partnerIds = [];
                    checkbox.prop('checked', false);
                }
            },
            selectProduct(el, id) {
                if (el.checked == true) {
                    this.partnerIds.push(id);
                } else if (el.checked == false) {
                    if (this.partnerIds.length > 0) {
                        this.partnerIds = this.partnerIds.filter(val => val !== id);
                    }
                }
            },
            bulkHideShow(option) {
                this.$store.confirmDialog.open({
                    data: {
                        title: "@lang('dialog.title')",
                        message: option == this.active ? `Are you sure to show partner?` : `Are you sure to hide partner?`,
                        btnClose: "@lang('dialog.button.close')",
                        btnSave: option == this.active ? "Show" : "Hide",
                    },
                    afterClosed: (result) => {
                        if (result) {
                            Axios({
                                url: "{{ route('admin-partner-bulk-hide-show') }}",
                                method: 'DELETE',
                                data: {partnerIds: this.partnerIds, option: option}
                            }).then((res) => {
                                if (res.data.error == false) { 
                                    Toast({
                                        message: res.data.message,
                                        status: res.data.status,
                                        size: 'small',
                                    });
                                    this.partnerIds = [];
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
