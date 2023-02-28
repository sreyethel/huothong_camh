<div class="table">
    <template x-if="table?.loading">
        @include('admin::components.progress-bar', ['top' => true]);
    </template>
    <template x-if="!table.loading && !table?.empty()">
        <div class="table-wrapper">
            <div class="table-header">
                <div class="row table-row-5">
                    <span>@lang('table.field.no')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.profile')</span>
                </div>
                <div class="row table-row-15">
                    <span>@lang('table.field.name')</span>
                </div>
                <div class="row table-row-15">
                    <span>@lang('table.field.username')</span>
                </div>
                <div class="row table-row-20">
                    <span>@lang('table.field.email')</span>
                </div>
                <div class="row table-row-15">
                    <span>@lang('table.field.phone')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.status')</span>
                </div>
                <div class="row table-row-10">
                    <span>@lang('table.field.created_by')</span>
                </div>
            </div>
            <div class="table-body">
                <template x-for="item in table.data">
                    <div class="column" x-data="{ status: item.status }">
                        <div class="row table-row-5">
                            <span x-text="item.iteration"></span>
                        </div>
                        <div class="row table-row-10">
                            <div class="image">
                                <img class="border-circle" x-bind:src="item.avatar_url"
                                    onerror="(this).src='{{ asset('images/logo/profile.png') }}'" alt="">
                            </div>
                        </div>
                        <div class="row table-row-15">
                            <span x-text="item.name"></span>
                        </div>
                        <div class="row table-row-15">
                            <span x-text="item.username"></span>
                        </div>
                        <div class="row table-row-20">
                            <span x-text="item?.email ? item?.email : '-'"></span>
                        </div>
                        <div class="row table-row-15">
                            <span x-text="item?.phone ? item?.phone : '-'"></span>
                        </div>
                        <div class="row table-row-10">
                            <template x-if="status == {{ config('dummy.status.active.key') }}">
                                <span class="text-success">{{ config('dummy.status.active.text') }}</span>
                            </template>
                            <template x-if="status == {{ config('dummy.status.disabled.key') }}">
                                <span class="text-danger">{{ config('dummy.status.disabled.text') }}</span>
                            </template>
                        </div>
                        <div class="row table-row-10">
                            <span x-text="item.created_date"></span>
                        </div>
                    </div>
                </template>
            </div>
            <div class="table-footer">
                @include('admin::components.pagination')
            </div>
        </div>
    </template>
    <template x-if="table && table?.empty()">
        @component('admin::components.empty',
            [
                'name' => 'There is no data',
            ])
        @endcomponent
    </template>
</div>
