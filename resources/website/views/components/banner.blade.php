<div class="banner" @isset($image) style="background-image: url('{{ $image }}')" @endisset>
    <div class="banner-overlay"></div>
    <div class="banner-content container">
        <div class="banner-content-wrapper">
            <div class="grip">
                @isset($content)
                    <p>{{ $content }}</p>
                @endisset
                @isset($title)
                    <h1>{!! $title !!}</h1>
                @endisset
            </div>
        </div>
        @isset($breadcrumbs)
            <div class="banner-content-breadcrumb absolute bottom-5">
                @include('website::components.breadcrumb', ['breadcrumbs' => $breadcrumbs ?? []])
            </div>
        @endisset
    </div>
</div>
