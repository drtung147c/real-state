@extends('layouts.front')
@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>{{ trans('global.projects') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($eventTypes as $eventType)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('event_type', $eventType->slug) }}" class="prop-entry d-block">
                        <figure>
                            <img src="{{ $eventType->getFirstMediaUrl('photo') }}" alt="{{ $eventType->name }}" class="resize-image-350 img-fluid">
                        </figure>
                        <div class="prop-text">
                            <div class="inner">
                                <h3 class="title">{{ $eventType->name }}</h3>
                            </div>
                            <div class="prop-more-info">
                                <div class="inner d-flex">
                                    <div class="col">
                                        <span>{{ trans('global.investor') }}:</span>
                                        <strong>{{ $eventType->users->name }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            {{ $eventTypes->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection
