@extends('layouts.front')

@section('content')
    <div class="slide-one-item home-slider owl-carousel">
        @foreach ($featuredVenues as $featuredVenue)
            <div class="site-blocks-cover" style="background-image: url('{{ $featuredVenue->getFirstMediaUrl('main_photo') }}');"
                 data-aos="fade" data-stellar-background-ratio="0.5">

                <div class="text">
                    <h2>{{ $featuredVenue->name }}</h2>
                    <p class="location"><span class="property-icon icon-room"></span> {{ $featuredVenue->address }}
                    </p>
                    <p class="mb-2"><strong>{{ $featuredVenue->price }} {{ trans('global.price_format') }}</strong></p>


                    <p class="mb-0"><a href="{{ route('venues.show', [$featuredVenue->slug, $featuredVenue->id]) }}"
                                       class="text-uppercase small letter-spacing-1 font-weight-bold">{{ trans('global.more_details') }}</a>
                    </p>

                </div>
            </div>
        @endforeach
    </div>

    <div class="py-5">
        <div class="container">
            <form class="row mb-5" action="{{ route('search') }}" method="GET">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="event_type" id="event_type" class="form-control d-block rounded-0">
                            <option value="">{{ trans('global.event_types') }}</option>
                            @foreach ($eventTypes as $eventType)
                                <option value="{{ $eventType->slug }}">{{ $eventType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="is_rent" id="is_rent" class="form-control d-block rounded-0">
                            <option value="">{{ trans('global.is_rent') }}</option>
                            @foreach ($yesNoOptions as $option)
                                <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="select-wrap">
                        <span class="icon icon-arrow_drop_down"></span>
                        <select name="location" id="location" class="form-control d-block rounded-0">
                            <option value="">{{ trans('global.location') }}</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->slug }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="{{ trans('global.search') }}">
                </div>
            </form>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
                    <div class="site-section-title">
                        <h2>{{ trans('global.real_state_project') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($eventTypes as $eventType)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <a href="{{ route('event_type', $eventType->slug) }}" class="service text-center border rounded">
                            <span class="icon flaticon-house"></span>
                            <h2 class="service-heading">{{ $eventType->name }}</h2>
                            <p><span class="read-more">{{ trans('global.more_details') }}</span></p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>{{ trans('global.real_state_for_you') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($newestVenues as $venue)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('venues.show', [$venue->slug, $venue->id]) }}" class="prop-entry d-block">
                        <figure>
                            <img src="{{ $venue->getFirstMediaUrl('main_photo', 'big_thumb') }}" alt="{{ $venue->name }}" class="resize-image-350 img-fluid">
                        </figure>
                        <div class="prop-text">
                            <div class="inner">
                                <span class="price rounded">{{ $venue->price }} {{ trans('global.price_format') }}</span>
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

    <div class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7">
                    <div class="site-section-title">
                        <h2>{{ trans('global.real_state_location') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row block-13">
                <div class="nonloop-block-13 owl-carousel">
                    @foreach ($locations as $location)
                    <div class="slide-item">
                        <div class="team-member text-center">
                            <a href="{{ route('location', $location->slug) }}">
                                <img src="{{ $location->getFirstMediaUrl('photo') }}" alt="{{ $location->name }}" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
                            </a>
                            <div class="text p-3">
                                <a href="{{ route('location', $location->slug) }}">
                                    <h2 class="mb-2 font-weight-light text-black h4">{{ $location->name }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7">
                    <div class="site-section-title">
                        <h2>{{ trans('global.special_news') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($newestNews as $news)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="{{ route('new', $news->slug) }}">
                            <img src="{{ $news->getFirstMediaUrl('photo') }}" alt="{{ $news->title }}" class="resize-image-350 img-fluid">
                        </a>
                        <div class="p-4 bg-white">
                            <span class="d-block text-secondary small text-uppercase">
                                {{ date("d/m/Y H:i", strtotime($news->publish_date)) }}
                            </span>
                            <h2 class="h5 text-black mb-3 title-block"><a href="{{ route('new', $news->slug) }}">{{ $news->title }}</a></h2>
                            @if ($news->short_description)
                                <p class="description-block">{{ $news->short_description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
