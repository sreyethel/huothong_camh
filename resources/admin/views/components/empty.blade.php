<div class="data-empty-container" style="{{ isset($style) ? $style : '' }};">
    <div class="data-empty-wrapper">
        <div class="image" style="{{ isset($image_style) ? $image_style : '' }};">
            <img src="{!! $image ?? asset('images/logo/empty.svg') !!}" alt="">
        </div>
        <div class="message">
            <span class="title">{!! $name !!}</span>
            @isset($msg)
                <span class="des">{!! $msg !!}</span>
            @endisset
            @if (isset($url) &&
    isset($button) &&
    (!isset($permission) ||
        (isset($permission) &&
            auth()->user()->can($permission))))
                <button @click="$link(`{!! url($url) !!}`)">
                    <i data-feather="plus-circle"></i>
                    <span>{!! $button !!}</span>
                </button>
            @endif
        </div>
    </div>
</div>
