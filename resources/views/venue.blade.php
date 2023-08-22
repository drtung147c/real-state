@extends('layouts.front')

@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url({{ $venue->getFirstMediaUrl('main_photo') }});"
         data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span
                        class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">{{ trans('global.house_information') }}</span>
                    <h1 class="mb-2">{{ $venue->name }}</h1>
                    <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold">{{ $venue->price }} {{ trans('global.price_format') }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="margin-top: -150px;">
                    <div class="mb-5">
                        <div class="slide-one-item home-slider owl-carousel">
                            <div><img src="{{ $venue->getFirstMediaUrl('main_photo', 'big_thumb') }}"
                                      alt="{{ $venue->name }}"
                                      class="img-fluid"></div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong
                                    class="text-success h1 mb-3">{{ $venue->price }} {{ trans('global.price_format') }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                                    <li>
                                        <span class="property-specs">{{ trans('global.room') }}</span>
                                        @if (!is_null($venue->room))
                                            <span class="property-specs-number">{{ $venue->room }}</span>
                                        @endif
                                    </li>
                                    <li>
                                        <span class="property-specs">{{ trans('global.bath_room') }}</span>
                                        @if (!is_null($venue->bath_room))
                                            <span class="property-specs-number">{{ $venue->bath_room }}</span>
                                        @endif
                                    </li>
                                    <li>
                                        <span class="property-specs">{{ trans('global.area') }}</span>
                                        @if (!is_null($venue->area))
                                            <span class="property-specs-number">{{ $venue->area }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-3 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.event_types') }}</span>
                                <strong
                                    class="d-block">{{ implode(', ', $venue->event_types->pluck('name')->toArray()) }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.location') }}</span>
                                <strong class="d-block">{{ $venue->location->name }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.is_rent') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->is_rent) }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.is_sold') }}</span>
                                <strong class="d-block">{{ $isSoldResource->getLabel($venue->is_sold) }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">{{ trans('global.information') }}</h2>
                            </div>
                            <div class="col-md-6 col-lg-6 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.floor') }}</span>
                                <strong class="d-block">{{ $venue->floor }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.direction') }}</span>
                                <strong class="d-block">{{ $venue->direction }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.house_status') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->house_status) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.book_status') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->book_status) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.book_ownership_status') }}</span>
                                <strong
                                    class="d-block">{{ $ownershipStatusResource->getLabel($venue->book_ownership_status) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.house_status') }}</span>
                                <strong
                                    class="d-block">{{ $houseStatusResource->getLabel($venue->house_status) }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-6 text-left border-bottom border-top py-3">
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.school_facility') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->school_facility) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.hospital_facility') }}</span>
                                <strong
                                    class="d-block">{{ $yesNoResource->getLabel($venue->hospital_facility) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.market_facility') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->market_facility) }}</strong>
                                <span
                                    class="d-inline-block text-black mb-0 caption-text">{{ trans('global.park_facility') }}</span>
                                <strong class="d-block">{{ $yesNoResource->getLabel($venue->park_facility) }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">{{ trans('global.description') }}</h2>
                        {!! $venue->description !!}

                        <div class="row mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">{{ trans('global.gallery') }}</h2>
                            </div>
                            @foreach ($venue->getMedia('gallery') as $galleryItem)
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                    <a href="{{ $galleryItem->getFullUrl() }}" class="image-popup gal-item">
                                        <img src="{{ $galleryItem->getFullUrl() }}"
                                             alt="{{ $venue->name }} {{ $loop->iteration }}" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div style="width: 100%; height: 400px" id="address-map"></div>

                                <script>
                                    var map;
                                    var default_center_latitude = {{ $venue->latitude }};
                                    var default_center_longitude = {{ $venue->longitude }};
                                    var default_zoom = 10;

                                    function initMap() {
                                        var center = new google.maps.LatLng(
                                            default_center_latitude,
                                            default_center_longitude);
                                        var mapOptions = {
                                            zoom: default_zoom,
                                            center: center
                                        };
                                        map = new google.maps.Map(document.getElementById('address-map'), mapOptions);

                                        var marker = {
                                            "latitude": {{ $venue->latitude }},
                                            "longitude": {{ $venue->longitude }} };

                                        var markerLatLng = new google.maps.LatLng(
                                            parseFloat(marker.latitude),
                                            parseFloat(marker.longitude));

                                        var icon = 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
                                        mark = new google.maps.Marker({
                                            map: map,
                                            position: markerLatLng,
                                            icon: icon
                                        });

                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pl-md-5">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">{{ trans('global.contact') }}</h3>
                        <form action="{{ route('contact') }}" method="POST" role="form" class="form-contact-agent">
                            @csrf
                            <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                            <div class="form-group">
                                <label for="contact_name">{{ trans('global.contact_name') }}*</label>
                                <input type="text" id="contact_name" name="contact_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_phone">{{ trans('global.contact_phone') }}*</label>
                                <input type="text" id="contact_phone" name="contact_phone" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact_address">{{ trans('global.contact_address') }}</label>
                                <input type="text" id="contact_address" name="contact_address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contact_description">{{ trans('global.contact_description') }}</label>
                                <textarea id="contact_description" name="contact_description" class="form-control"
                                          style="height: auto"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="submit" class="btn btn-primary"
                                       value="{{ trans('global.contact_submit') }}">
                            </div>
                        </form>
                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">{{ trans('global.features') }}</h3>
                        <p>{{ $venue->features }}</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>{{ trans('global.related_properties') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @foreach ($relatedVenues as $venue)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{ route('venues.show', [$venue->slug, $venue->id]) }}" class="prop-entry d-block">
                            <figure>
                                <img src="{{ $venue->getFirstMediaUrl('main_photo', 'big_thumb') }}"
                                     alt="{{ $venue->name }}" class="resize-image-350 img-fluid">
                            </figure>
                            <div class="prop-text">
                                <div class="inner">
                                    <span
                                        class="price rounded">{{ $venue->price }} {{ trans('global.price_format') }}</span>
                                    <h3 class="title">{{ $venue->name }}</h3>
                                    <p class="location">{{ $venue->address }}</p>
                                </div>
                                <div class="prop-more-info">
                                    <div class="inner d-flex">
                                        <div class="col">
                                            <span>{{ trans('global.event_types') }}:</span>
                                            <strong>{{ implode(', ', $venue->event_types->pluck('name')->toArray()) }}</strong>
                                        </div>
                                        <div class="col">
                                            <span>{{ trans('global.area') }}:</span>
                                            <strong>{{ $venue->area }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap"
        async defer></script>
@endsection
