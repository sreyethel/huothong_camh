<div class="pagination" @isset($margin) style="margin-top: {{ $margin }}px" @endisset>
    <div class="pagination-right">
        <div class="pagination-wrapper">
            <div class="pagination-item left {!! $paginate->currentPage() == 1 ? 'disabled' : '' !!}" page-link="{!! customUrl($paginate->previousPageUrl(), request()->all()) !!}">
                <i data-feather="chevrons-left"></i>
                <label>{{ __('Previous') }}</label>
            </div>

            <div class="pagination-item right {!! $paginate->currentPage() == $paginate->lastPage() ? 'disabled' : '' !!}" page-link="{!! customUrl($paginate->nextPageUrl(), request()->all()) !!}">
                <label class="next">{{ __('Next') }}</label>
                <i data-feather="chevrons-right"></i>
            </div>
        </div>
    </div>
</div>
