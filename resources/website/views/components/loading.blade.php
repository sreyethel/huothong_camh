<div class="loading {!! isset($top) && $top ? 'load-top' : '' !!}"
    @if (isset($center)) style="display:grid;justify-content:center;text-align:center" @endif>
    <div class="lds-ripple" @if (isset($center)) style="margin:auto" @endif>
        <div></div>
        <div></div>
    </div>
    @isset($title)
        <span>{{ $title }}</span>
    @endisset
    @isset($loading_message)
        <p>{!! $loading_message !!}</p>
    @endisset
</div>
