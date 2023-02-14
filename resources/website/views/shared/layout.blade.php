@extends('website::index')
@section('index')

    <!-- navbar -->
    <section>
        @include('website::shared.navbar')
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
