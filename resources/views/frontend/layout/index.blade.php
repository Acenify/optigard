<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Optigard')</title>

    {{-- CSS --}}
    <link href="{{ asset('assets/frontend/assets/frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/frontend/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/frontend/assets/css/color.css') }}" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/assets/favicon-optigard.png') }}" sizes="180x180">
    <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/favicon-optigard.png') }}" sizes="32x32" type="image/png">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&family=Roboto:wght@400;500;700;900&family=Yantramanav:wght@400;500;700;900&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="@yield('meta_description','Optigard')">
    <meta name="author" content="Optigard">

    @stack('head')
</head>
<body>
<div class="page-wrapper">

    @include('frontend.partials.header')

    {{-- ============ CONTENT ============ --}}
    @yield('content')
    {{-- ============ /CONTENT ============ --}}

    @include('frontend.partials.footer')

</div>

{{-- Scroll to top --}}
<div class="scroll-to-top">
    <div>
        <div class="scroll-top-inner">
            <div class="scroll-bar"><div class="bar-inner"></div></div>
            <div class="scroll-bar-text">Go To Top</div>
        </div>
    </div>
</div>

{{-- JS --}}
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/image-cmpare.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/frontend/assets/js/script.js') }}"></script>

@stack('scripts')
</body>
</html>
