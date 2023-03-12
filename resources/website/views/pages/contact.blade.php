@extends('website::shared.layout')
@include('website::components.meta')
@section('content')
    @include('website::components.banner', [
        'content' => isset($banner?->content) ? $banner?->content : null,
        'image' => isset($banner?->thumbnail_url) ? $banner?->thumbnail_url : null,
        'breadcrumbs' => [
            [
                'name' => __('website.navbar.home'),
                'active' => false,
                'url' => route('website-home'),
            ],
            [
                'name' => __('website.navbar.contact_us'),
                'active' => true,
            ],
        ],
    ])

    <div class="contact-us-section pt-10">
        <div class="contact-us-section-wrapper container">
            @isset($contact->content)
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
                                    <p>{{ toObject($contact->content)?->address ?? 'No address' }}</p>
                                </div>
                            </div>
                            <div class="flex-content-item">
                                <div class="flex-content-item-icon">
                                    <i data-feather="phone-call"></i>
                                </div>
                                <div class="flex-content-item-text">
                                    <h5>Phone</h5>
                                    <p>{{ toObject($contact->content)?->phone ?? 'No phone' }}</p>
                                </div>
                            </div>
                            <div class="flex-content-item">
                                <div class="flex-content-item-icon">
                                    <i data-feather="mail"></i>
                                </div>
                                <div class="flex-content-item-text">
                                    <h5>Email</h5>
                                    <p>{{ toObject($contact->content)?->email ?? 'No e-mail' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="map">
                            <iframe src="{{ toObject($contact->content)?->embed_map }}" width="600" height="450"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            @else
                @component('website::components.empty', [
                    'title' => 'No Information',
                    'message' => 'No information found for this page. Please try again later.',
                    'image' => asset('images/contact-us.svg'),
                    'style' => 'height: 300px; width: auto;',
                ])
                @endcomponent
            @endisset
        </div>
    </div>

    <!-- space -->
    <div class="space"></div>
@stop
