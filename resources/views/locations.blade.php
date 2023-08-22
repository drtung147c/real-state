@extends('layouts.front')

@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>{{ trans('global.locations') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($locations as $location)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('location', $location->slug) }}" class="prop-entry d-block">
                        <figure style="text-align: center">
                            <img src="{{ $location->getFirstMediaUrl('photo') }}" alt="{{ $location->name }}" class="resize-image-200 img-fluid">
                        </figure>
                        <div class="prop-text">
                            <div class="inner">
                                <h3 class="title">{{ $location->name }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            {{ $locations->appends(request()->except('page'))->links() }}
        </div>
    </div>

@endsection
