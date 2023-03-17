<div class="pagination {{ isset($class) ? $class : '' }}">
    <div class="pagination-right">
        <div class="pagination-wrapper">
            <a class="pagination-item left {!! $paginate->currentPage() == 1 ? 'disabled' : '' !!}" href="{!! customUrl($paginate->previousPageUrl(), request()->all()) !!}">
                <i data-feather="chevrons-left"></i>
                <label>{{ __('Previous') }}</label>
            </a>

            <a class="pagination-item right {!! $paginate->currentPage() == $paginate->lastPage() ? 'disabled' : '' !!}" href="{!! customUrl($paginate->nextPageUrl(), request()->all()) !!}">
                <label class="next">{{ __('Next') }}</label>
                <i data-feather="chevrons-right"></i>
            </a>
        </div>
    </div>
</div>
