<!DOCTYPE html>
<html lang="vi">
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fl-bigmug-line.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/hero_bg_1.jpg') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="position-relative">

<div class="site-loader"></div>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="border-bottom bg-white top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <p class="mb-0">
                        <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">+2 102 3923 3922</span></a>
                        <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">info@domain.com</span></a>
                    </p>
                </div>
                <div class="col-6 col-md-6 text-right">
                    <a href="#" class="mr-3"><span class="text-black icon-facebook"></span></a>
                    <a href="#" class="mr-3"><span class="text-black icon-icon-zalo"></span></a>
                    <a href="#" class="mr-0"><span class="text-black fl-bigmug-line-email64"></span></a>
                </div>
            </div>
        </div>

    </div>
    <div class="site-navbar">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-8 col-md-8 col-lg-4">
                    <h1 class=""><a href="/" class="h5 text-uppercase text-black"><strong>{{ config('app.name') }}</strong></a></h1>
                </div>
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">

                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li>
                                <a href="{{ route('locations') }}">{{ trans('global.location') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('projects') }}">{{ trans('global.event_types') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}">{{ trans('global.news') }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>
    </div>
</div>

@if(session()->has('messages'))
    <div class="messages">
        @if (isset(session()->get('messages')['success']) && !empty(session()->get('messages')['success']))
            @foreach (session()->get('messages')['success'] as $message)
                <div class="message-success">{{$message}}</div>
            @endforeach
        @endif
        @if (isset(session()->get('messages')['error']) && !empty(session()->get('messages')['error']))
            @foreach (session()->get('messages')['error'] as $message)
                <div class="message-error">{{$message}}</div>
            @endforeach
        @endif
    </div>
@endif

@yield('content')

<footer class="site-footer footer-bs">
    <div class="container">
        <div class="row pt-2 mt-2 text-center">
            <div class="col-md-12">
                <p>
                    Copyright © <script>document.write(new Date().getFullYear());</script> – Nhà Phố Hà Nội. Ghi rõ nguồn "nhaphohanoi.net" khi phát hành lại thông tin từ website này.
                </p>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/mediaelement-and-player.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>

<script src="{{ asset('js/main-front.js') }}"></script>

@yield('javascript')

</body>
</html>
