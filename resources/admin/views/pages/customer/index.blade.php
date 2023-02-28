@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper" x-data="page">
        @include('admin::shared.header', [
            'title' => __('form.title.customer'),
            'header_name' => __('form.name.customer'),
        ])
        <div class="content-body">
            <div class="content-tab">
                <div class="content-tab-wrapper">
                    <span class="title">
                        @lang('app.total', ['name' => __('app.customer')]) <span x-text="table?.paginate?.totalItems"></span>
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
                    <button @click="onReset()">
                        <i data-feather="refresh-ccw"></i>
                    </button>
                </div>
            </div>
            @include('admin::pages.customer.table')
        </div>
    </div>
    @include('admin::pages.admin.permission')
@stop
@section('script')
    <script type="module">
        Alpine.data('page', () => ({
            table: new Table("{{ route('admin-customer-data') }}"),
            
            init() {
                this.table.init();
                this.formFilter.search = '{{ request('search') ?? null }}';
            },
            formFilter: new FormGroup({
                search: [null, []],
            }),
            onFilter() {
                this.table.init(this.formFilter.value());
            },
            onReset() {
                this.formFilter.reset();
                this.table.reset();
            },
        }));
    </script>
@stop
