<div class="search-content {{ isset($dialog) ? $dialog : '' }}" id="{{ isset($dialog) ? $dialog : '' }}">
    @isset($dialog)
        <div class="search-dialog-close" id="searchToggleClose">
            <i data-feather="x"></i>
        </div>
    @endisset
    <form action="{!! route('website-product-index') !!}" method="GET">
        <input type="text" placeholder="Search..." value="{{ request('search') }}" name="search"
            autocomplete="off">
    </form>
</div>
