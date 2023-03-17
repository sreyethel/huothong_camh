@extends('website::index')
@section('index')

    <!-- mobile nav -->
    <section>
        @include('website::components.mobile-nav')
    </section>

    <!-- navbar -->
    <section>
        @include('website::shared.navbar')
    </section>

    <!-- share social -->
    <section>
        @include('website::components.share-dialog')
    </section>

    <!-- content -->
    <section class="gap-section">
        @yield('content')
    </section>

    <!-- button scroll top -->
    <button type="button" class="btn scroll-top" id="toTop">
        <i data-feather="chevrons-up"></i>
    </button>

    <!-- Footer -->
    <section>
        @include('website::shared.footer')
    </section>
@stop
