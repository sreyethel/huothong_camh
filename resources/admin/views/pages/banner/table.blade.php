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
                <div class="row table-row-20">
                    <span>@lang('table.field.image')</span>
                </div>
                <div class="row table-row-50">
                    <span>@lang('table.field.page')</span>
                </div>
                <div class="row table-row-30">
                    <span>@lang('table.field.status')</span>
                </div>
                <div class="row table-row-5">
                    <span></span>
                </div>
            </div>
            <div class="table-body">
                <template x-for="item in table.data">
                    <div class="column" x-data="{ status: item.status }">
                        <div class="row table-row-5">
                            <span x-text="item.iteration"></span>
                        </div>
                        <div class="row table-row-20">
                            <div class="image thumbnail" data-fancybox
                                :data-src="item?.thumbnail_url || '{{ asset('images/logo/no.jpg') }}'">
                                <img x-bind:src="item?.thumbnail_url || '{{ asset('images/logo/no.jpg') }}'"
                                    onerror="(this).src='{{ asset('images/logo/no.jpg') }}'" alt="" />
                            </div>
                        </div>
                        <div class="row table-row-50">
                            @foreach (config('dummy.banner') as $item)
                                <template x-if="item?.page == '{{ $item }}'">
                                    <span>{{ __('banner.' . $item) }}</span>
                                </template>
                            @endforeach
                        </div>
                        <div class="row table-row-30">
                            <template x-if="status == {{ config('dummy.status.active.key') }}">
                                <span class="text-green-600">{{ config('dummy.status.active.text') }}</span>
                            </template>
                            <template x-if="status == {{ config('dummy.status.disabled.key') }}">
                                <span class="text-rose-600">{{ config('dummy.status.disabled.text') }}</span>
                            </template>
                        </div>
                        <div class="row table-row-5">
                            <div x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }
                            
                                    this.$refs.button.focus()
                            
                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (!this.open) return
                            
                                    this.open = false
                            
                                    focusAfter && focusAfter.focus()
                                }
                            }" x-on:keydown.escape.prevent.stop="close($refs.button)"
                                x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                x-id="['dropdown-button']" class="relative dropdown">
                                <div x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                    :aria-controls="$id('dropdown-button')" type="button" class="action-btn">
                                    <i data-feather="more-vertical"></i>
                                </div>
                                <ul x-ref="panel" x-show="open" x-transition.origin.top.right
                                    x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                    style="display: none;" class="absolute right-0 dropdown-menu">
                                    @can('banner-update')
                                        <template x-if="item.status == active">
                                            <li>
                                                <a class="dropdown-item" @click="openStoreDialog(item)">
                                                    <i data-feather="edit" class="text-violet-600"></i>
                                                    <span>@lang('table.option.edit')</span>
                                                </a>
                                            </li>
                                        </template>
                                        <template
                                            x-if="!item.deleted_at && item.status == {{ config('dummy.status.disabled.key') }}">
                                            <li>
                                                <a class="dropdown-item" @click="onUpdateStatus(item, 1)">
                                                    <i data-feather="rotate-ccw" class="text-green-600"></i>
                                                    <span>@lang('table.option.enable')</span>
                                                </a>
                                            </li>
                                        </template>
                                        <template
                                            x-if="!item.deleted_at && item.status == {{ config('dummy.status.active.key') }}">
                                            <li>
                                                <a class="dropdown-item" @click="onUpdateStatus(item, 2)">
                                                    <i data-feather="x" class="text-orange-500"></i>
                                                    <span>@lang('table.option.disable')</span>
                                                </a>
                                            </li>
                                        </template>
                                    @endcan
                                </ul>
                            </div>
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
        @component('admin::components.empty', [
            'name' => __('table.empty.title', ['name' => __('app.banner')]),
            'msg' => __('table.empty.message', ['name' => __('app.banner')]),
        ])
        @endcomponent
    </template>
</div>
