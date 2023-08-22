@extends('layouts.front')
@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-section-title text-justify">
                        <h2>{{ $news->title }}</h2>
                    </div>
                    <div class="site-section-publish_date text-black-50">
                        <p>{{ trans('global.publish_date') }}
                            : {{ date("d/m/Y H:i", strtotime($news->publish_date)) }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-justify">
                    {!! $news->description !!}
                </div>
            </div>
            @if ($news->authors->count() > 0)
            <div class="row">
                <div class="col-12 text-right font-weight-bold">
                    @foreach($news->authors->pluck('name', 'slug') as $slug => $name)
                        <a href="{{ route('authors', $slug) }}" class="mr-2 text-black">{{ $name }}</a>
                    @endforeach
                </div>
            </div>
            @endif
            @if ($news->tags->count() > 0)
                <div class="row">
                    <div class="col-12 text-left text-black">
                        <div>
                            <span>{{ trans('global.tags') }}:</span>
                            @foreach($news->tags->pluck('name', 'slug') as $slug => $name)
                                <a href="{{ route('tags', $slug) }}" class="mr-2">{{ $name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
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
                @foreach ($newsLatest as $latest)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="{{ route('news.show', [$latest->slug, $latest->id]) }}">
                            <img src="{{ $latest->getFirstMediaUrl('photo') }}" alt="{{ $latest->title }}" class="resize-image-350 img-fluid">
                        </a>
                        <div class="p-4 bg-white">
                            <span class="d-block text-secondary small text-uppercase">
                                {{ date("d/m/Y H:i", strtotime($latest->publish_date)) }}
                            </span>
                            <h2 class="h5 text-black mb-3 title-block">
                                <a href="{{ route('new', $latest->slug) }}">{{ $latest->title }}</a>
                            </h2>
                            @if ($latest->short_description)
                                <p class="description-block">{{ $latest->short_description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
