@extends('layouts.front')

@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>{{ trans('global.search_result') }}</h2>
                    </div>
                </div>
            </div>
            @if ($venues->count() > 0)
                <div class="row mb-5">
                    @foreach ($venues as $venue)
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
                                                <span>Event Types:</span>
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
                {{ $venues->appends(request()->except('page'))->links() }}
            @endif
        </div>
    </div>

@endsection
