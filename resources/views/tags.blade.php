@extends('layouts.front')
@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>{{ $tags->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($news as $new)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="{{ route('news.show', [$new->slug, $new->id]) }}">
                            <img src="{{ $new->getFirstMediaUrl('photo') }}" alt="{{ $new->title }}" class="img-fluid">
                        </a>
                        <div class="p-4 bg-white">
                            <span class="d-block text-secondary small text-uppercase">
                                {{ date("d/m/Y H:i", strtotime($new->publish_date)) }}
                            </span>
                            <h2 class="h5 text-black mb-3">
                                <a href="{{ route('new', $new->slug) }}">{{ $new->title }}</a>
                            </h2>
                            <p>{{ $new->short_description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $news->links() }}
        </div>
    </div>
@endsection
