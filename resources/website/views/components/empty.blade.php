<div class="empty-data @isset($class) {{ $class }} @endisset">
    <div class="image" @isset($style) style="{{ $style }}" @endisset>
        @if (isset($image))
            <img src="{{ $image }}" alt="">
        @else
            <img src="{{ asset('website/images/photo/empty-order.png') }}" alt="">
        @endif
    </div>
    <div class="text">
        <h1>{{ isset($title) ? $title : __('global.page.empty_title') }}</h1>
        @if (isset($message))
            <p>{!! $message !!}</p>
        @endif
    </div>
</div>
