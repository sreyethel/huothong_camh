<div class="table">
    <template x-if="table?.loading">
        @include('admin::components.progress-bar', ['top' => true]);
    </template>
    <template x-if="!table.loading && !table?.empty()">
        <div class="table-wrapper">
            <div class="table-header">
                <div class="row table-row-5">
                    <input class="form-check-input cursor-pointer" type="checkbox" value=""
                        @change="checkAll($event.target, table.data)" />
                </div>
                <div class="row table-row-5">
                    <span>No</span>
                </div>
                <div class="row table-row-10">
                    <span>Logo</span>
                </div>
                <div class="row table-row-65">
                    <span>Name</span>
                </div>
                <div class="row table-row-20">
                    <span>Status</span>
                </div>
                <div class="row table-row-5">
                    <span></span>
                </div>
            </div>
            <div class="table-body">
                <template x-for="item in table.data">
                    <div class="column" x-data="{ status: item.status }">
                        <div class="row table-row-5">
                            <input class="form-check-input cursor-pointer product-checkbox" type="checkbox"
                                value="" @change="selectProduct($event.target, item.id)" />
                        </div>
                        <div class="row table-row-5">
                            <span x-text="item.iteration"></span>
                        </div>
                        <div class="row table-row-10">
                            <div class="image thumbnail" data-fancybox
                                :data-src="item.logo_url || '{{ asset('images/logo/no.jpg') }}'">
                                <img x-bind:src="item.logo_url || '{{ asset('images/logo/no.jpg') }}'"
                                    onerror="(this).src='{{ asset('images/logo/no.jpg') }}'" alt=""
                                    style="object-fit: contain;" />
                            </div>
                        </div>
                        <div class="row table-row-65">
                            <span x-text="item.name"></span>
                        </div>
                        <div class="row table-row-20">
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
                                    {{-- @can('blog-update') --}}
                                        <li>
                                            <a class="dropdown-item" @click="openStoreDialog(item)">
                                                <i data-feather="edit" class="text-violet-600"></i>
                                                <span>Edit</span>
                                            </a>
                                        </li>
                                        <template x-if="item.status == 1">
                                            <li>
                                                <a class="dropdown-item" @click="onUpdateOption(item.id, '{{ config('dummy.status.disabled.key') }}')">
                                                    <i data-feather="alert-triangle" class="text-rose-600"></i>
                                                    <span>Hide Partner</span>
                                                </a>
                                            </li>
                                        </template>
                                        <template x-if="item.status == '{{ config('dummy.status.disabled.key') }}'">
                                            <li>
                                                <a class="dropdown-item" @click="onUpdateOption(item.id, 1)">
                                                    <i data-feather="eye" class="text-emerald-500"></i>
                                                    <span>Show Partner</span>
                                                </a>
                                            </li>
                                        </template>
                                    {{-- @endcan --}}
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
        @component('admin::components.empty',
            [
                'name' => 'Partner is empty',
                'msg' => 'You can create a new partner by clicking the button Add Partner.',
            ])
        @endcomponent
    </template>
</div>
