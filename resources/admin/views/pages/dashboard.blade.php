@extends('admin::shared.layout')
@section('layout')
    <div class="content-wrapper">
        @include('admin::shared.header', [
            'title' => __('dashboard.dashboard'),
            'header_name' => __('dashboard.dashboard'),
        ])

        <div class="dashboard-admin">
            <div class="dashboard-wrapper">
                <div class="dashboard-body">
                    <div class="dashboard-list">
                        <div class="dashboard-row">
                            @foreach ($dashboard as $item)
                                <div class="item {{ $item?->custom_class }}">
                                    <div class="item-body">
                                        <div class="left">
                                            <span>{{ $item->name }}</span>
                                            <h3>{{ $item->value }}</h3>
                                        </div>
                                        <div class="right">
                                            <i data-feather="{{ $item?->icon }}"></i>
                                        </div>
                                    </div>
                                    <div class="item-footer" @click="$link(`{!! url($item->link) !!}`)">
                                        <span>View Detail</span>
                                        <i data-feather="arrow-right"></i>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item !bg-cyan-900">
                                <div class="item-body">
                                    <div class="left">
                                        <span>Total Orders</span>
                                        <h3>38</h3>
                                    </div>
                                    <div class="right">
                                        <i data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="item-footer">
                                    <span>View Detail</span>
                                    <i data-feather="arrow-right"></i>
                                </div>
                            </div>
                            <div class="item !bg-orange-500">
                                <div class="item-body">
                                    <div class="left">
                                        <span>Pending Orders</span>
                                        <h3>38</h3>
                                    </div>
                                    <div class="right">
                                        <i data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="item-footer">
                                    <span>View Detail</span>
                                    <i data-feather="arrow-right"></i>
                                </div>
                            </div>
                            <div class="item !bg-green-600">
                                <div class="item-body">
                                    <div class="left">
                                        <span>Completed Orders</span>
                                        <h3>38</h3>
                                    </div>
                                    <div class="right">
                                        <i data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="item-footer">
                                    <span>View Detail</span>
                                    <i data-feather="arrow-right"></i>
                                </div>
                            </div>
                            <div class="item !bg-red-500">
                                <div class="item-body">
                                    <div class="left">
                                        <span>Cancelled Orders</span>
                                        <h3>38</h3>
                                    </div>
                                    <div class="right">
                                        <i data-feather="shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="item-footer">
                                    <span>View Detail</span>
                                    <i data-feather="arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-footer"></div>
                </div>
            </div>
        </div>
    </div>
@stop
