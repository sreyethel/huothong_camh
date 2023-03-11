@extends('website::shared.layout')
@section('content')
    <div class="user-content container">
        <div class="user-wrapper section-aside">
            @include('website::pages.user.sidebar')
            <section>
                @if (isset($carts) && $carts->count() > 0)

                    <div class="w-full flex flex-col" x-data="cart">
                        <div class="user-table-content">
                            <table class="w-full ">
                                <thead class="uppercase">
                                    <tr>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">ID</th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Image</th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Product
                                            Name
                                        </th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Price
                                        </th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Qunatity
                                        </th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Status
                                        </th>
                                        <th class=" text-sm font-semibold tracking-wide text-center text-gray-900">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $index => $item)
                                        <tr>
                                            <td class="p-3 text-gray-900 text-sm text-center">
                                                {!! $carts->currentPage() * $carts->perPage() - $carts->perPage() + ($index + 1) !!}
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm photo text-center">
                                                <img src="{{ optional($item->product)->thumbnail_url }}" alt="">
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm text-center">
                                                {{ optional($item->product)->title ?? '--' }}
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm text-center">
                                                ${{ number_format(optional($item->product)->price ?? '00') }}
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm text-center">
                                                {{ $item->quantity ?? '--' }}
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm text-center">
                                                @if ($item->status == config('dummy.status.active.key'))
                                                    <span
                                                        class="text-green-600 capitalize">{{ config('dummy.status.active.text') }}</span>
                                                @else
                                                    <span
                                                        class="text-rose-600 capitalize">{{ config('dummy.status.disabled.text') }}</span>
                                                @endif
                                            </td>
                                            <td class="p-3 text-gray-900 text-sm">
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
                                                }"
                                                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                                    x-id="['dropdown-button']" class="relative dropdown">
                                                    <div x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                                        :aria-controls="$id('dropdown-button')" type="button"
                                                        class="action-btn">
                                                        <i data-feather="more-vertical"></i>
                                                    </div>
                                                    <ul x-ref="panel" x-show="open" x-transition.origin.top.right
                                                        x-on:click.outside="close($refs.button)"
                                                        :id="$id('dropdown-button')" style="display: none;"
                                                        class="absolute right-0 dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                @click="onRemove('{{ $item?->id }}')">
                                                                <i data-feather="trash-2" class="text-rose-600"></i>
                                                                <span>Remove</span>
                                                            </a>
                                                        </li>
                                                        @if ($item->status == config('dummy.status.active.key'))
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    @click="onUpdateStatus('{{ $item?->id }}', disabled)">
                                                                    <i data-feather="alert-triangle"
                                                                        class="text-rose-600"></i>
                                                                    <span>Disable</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a class="dropdown-item"
                                                                    @click="onUpdateStatus('{{ $item?->id }}', active)">
                                                                    <i data-feather="eye" class="text-green-700"></i>
                                                                    <span>Show</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-footer">
                                <div class="pagination">
                                    <div class="pagination-left">
                                        <span>Showing {!! $carts->firstItem() !!} - {!! $carts->lastItem() !!}
                                            of
                                            {!! number_format($carts->total(), 0) !!}</span>
                                    </div>
                                    <div class="pagination-right">
                                        <div class="pagination-wrapper">
                                            <a class="pagination-item left {!! $carts->currentPage() == 1 ? 'disabled' : '' !!}"
                                                href="{!! CustomUrl($carts->previousPageUrl(), request()->all()) !!}">
                                                <i data-feather="chevron-left"></i>
                                            </a>

                                            @if ($carts->lastPage() > 10)

                                                @if ($carts->currentPage() >= 4)
                                                    <a class="pagination-item {!! $carts->currentPage() == 1 ? 'active' : '' !!}"
                                                        href="{!! CustomUrl($carts->currentPage() != 1 ? url()->current() . '?page=1' : null, request()->all()) !!}">
                                                        <span>1</span>
                                                    </a>
                                                    <i data-feather="more-horizontal"></i>
                                                @else
                                                    @for ($i = 1; $i <= ($carts->total() > 4 ? 4 : $carts->lastPage()); $i++)
                                                        <a class="pagination-item {!! $carts->currentPage() == $i ? 'active' : '' !!}"
                                                            href="{!! CustomUrl($carts->currentPage() != $i ? url()->current() . '?page=' . $i : null, request()->all()) !!}">
                                                            <span>{!! $i !!}</span>
                                                        </a>
                                                    @endfor
                                                @endif

                                                @if ($carts->currentPage() >= 4 && $carts->currentPage() < $carts->lastPage() - 2)
                                                    @for ($i = $carts->currentPage() - 1; $i <= $carts->currentPage() + 1; $i++)
                                                        <a class="pagination-item {!! $carts->currentPage() == $i ? 'active' : '' !!}"
                                                            href="{!! CustomUrl($carts->currentPage() != $i ? url()->current() . '?page=' . $i : null, request()->all()) !!}">
                                                            <span>{!! $i !!}</span>
                                                        </a>
                                                    @endfor
                                                @endif

                                                @if ($carts->currentPage() < $carts->lastPage() - 2)
                                                    <div class="pagination-item disabled">
                                                        <i data-feather="more-horizontal"></i>
                                                    </div>
                                                    <a class="pagination-item {!! $carts->currentPage() == $carts->lastPage() ? 'active' : '' !!}"
                                                        href="{!! CustomUrl(
                                                            $carts->currentPage() != $carts->lastPage() ? url()->current() . '?page=' . $carts->lastPage() : null,
                                                            request()->all(),
                                                        ) !!}">
                                                        <span>{!! $carts->lastPage() !!}</span>
                                                    </a>
                                                @else
                                                    @for ($i = $carts->lastPage() - 3; $i <= $carts->lastPage(); $i++)
                                                        <a class="pagination-item {!! $carts->currentPage() == $i ? 'active' : '' !!}"
                                                            href="{!! CustomUrl($carts->currentPage() != $i ? url()->current() . '?page=' . $i : null, request()->all()) !!}">
                                                            <span>{!! $i !!}</span>
                                                        </a>
                                                    @endfor
                                                @endif
                                            @else
                                                @for ($i = 1; $i <= $carts->lastPage(); $i++)
                                                    <a class="pagination-item {!! $carts->currentPage() == $i ? 'active' : '' !!}"
                                                        href="{!! CustomUrl($carts->currentPage() != $i ? url()->current() . '?page=' . $i : null, request()->all()) !!}">
                                                        <span>{!! $i !!}</span>
                                                    </a>
                                                @endfor
                                            @endif

                                            <a class="pagination-item right {!! $carts->currentPage() == $carts->lastPage() ? 'disabled' : '' !!}"
                                                href="{!! CustomUrl($carts->nextPageUrl(), request()->all()) !!}">
                                                <i data-feather="chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script type="module">
                            Alpine.data('cart', () => ({
                                active : @json(config('dummy.status.active.key')),
                                disabled : @json(config('dummy.status.disabled.key')),

                                onRemove(id) {
                                    Swal.fire({
                                        title: 'Message',
                                        text: 'You want to remove this item from cart?',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        cancelButtonText: 'Cancel',
                                        showLoaderOnConfirm: true,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Axios.post(`{{ route('website-user-order-remove') }}`, {
                                                id: id,
                                            }).then((response) => {
                                                let data = response.data;
                                                if (data.error == false) {
                                                    Toast({
                                                        message: data.message,
                                                        status: data.status,
                                                        size: 'small',
                                                    });

                                                    setTimeout(() => {
                                                        window.location.reload();
                                                    }, 1000);
                                                }
                                            }).catch((error) => {
                                                Toast({
                                                    message: error.message,
                                                    status: 'error',
                                                    size: 'small',
                                                });
                                            });
                                        }
                                    })
                                },

                                onUpdateStatus(id, status) {
                                    Swal.fire({
                                        title: 'Message',
                                        text: status == this.active ? 'You want to show this item?' : 'You want to disable this item?',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        cancelButtonText: 'Cancel',
                                        showLoaderOnConfirm: true,
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Axios.post(`{{ route('website-user-order-status') }}`, {
                                                id: id,
                                                status: status,
                                            }).then((response) => {
                                                let data = response.data;
                                                if (data.error == false) {
                                                    Toast({
                                                        message: data.message,
                                                        status: data.status,
                                                        size: 'small',
                                                    });

                                                    setTimeout(() => {
                                                        window.location.reload();
                                                    }, 1000);
                                                }
                                            }).catch((error) => {
                                                Toast({
                                                    message: error.message,
                                                    status: 'error',
                                                    size: 'small',
                                                });
                                            });
                                        }
                                    })
                                },
                            }));
                        </script>
                    </div>
                @else
                    @component('website::components.empty', [
                        'title' => 'No Cart',
                        'message' => 'There are no products in your cart yet.',
                        'image' => asset('images/product.svg'),
                        'style' => 'width: auto;height:200px;',
                    ])
                    @endcomponent
                @endif
            </section>
        </div>
    </div>
@stop
