@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    <div class="contact-us-section pt-10">
        <div class="contact-us-section-wrapper container">
            {{-- @isset($contact) --}}
            <div class="row column">
                <div class="col-md-6 contact-us-section-wrapper-content">
                    <h1>@lang('website.navbar.contact_us')</h1>

                    <div class="flex-content">
                        <div class="flex-content-item">
                            <div class="flex-content-item-icon">
                                <i data-feather="map"></i>
                            </div>
                            <div class="flex-content-item-text">
                                <h5>Address</h5>
                                <p>A-32, Albany, Newyork.</p>
                            </div>
                        </div>
                        <div class="flex-content-item">
                            <div class="flex-content-item-icon">
                                <i data-feather="phone-call"></i>
                            </div>
                            <div class="flex-content-item-text">
                                <h5>Phone</h5>
                                <p>(+066) 518 - 457 - 5181</p>
                            </div>
                        </div>
                        <div class="flex-content-item">
                            <div class="flex-content-item-icon">
                                <i data-feather="mail"></i>
                            </div>
                            <div class="flex-content-item-text">
                                <h5>Email</h5>
                                <p>Contact@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="map">
                        <iframe
                            src="{{ 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.142368000001!2d85.3333333148155!3d27.71722298280395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18f0f0f0f0f%3A0x39eb18f0f0f0f0f!2sKathmandu%20University%20School%20of%20Engineering!5e0!3m2!1sen!2snp!4v1625580000000!5m2!1sen!2snp' }}"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            {{-- @else
                @component('website::components.empty', [
    'title' => 'No Information',
    'message' => 'No information found for this page. Please try again later.',
    'image' => asset('images/contact-us.svg'),
    'style' => 'height: 300px; width: auto;',
])
                @endcomponent
            @endisset --}}
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
