<div class="breadcrumb-content">
    <div class="breadcrumb-wrapper">
        @if (isset($breadcrumbs))
            @foreach ($breadcrumbs as $key => $value)
                <div @class([
                    'breadcrumb-item',
                    'none-icon' => $value['name'] == null,
                    'active' => $value['active'] == true,
                ])>
                    @if (isset($value['url']) && $value['url'] != '')
                        <a class="url" href="{{ $value['url'] }}">{!! $value['name'] !!}</a>
                    @else
                        <a>{!! $value['name'] !!}</a>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>
