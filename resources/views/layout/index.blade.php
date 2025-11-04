<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wowdash - Bootstrap 5 Admin Dashboard HTML Template</title>
    <link rel="icon" type="image/png"  href="{{ asset('assets/frontend/assets/favicon-optigard.png') }}" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet"  href="{{ asset('assets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/dataTables.min.css') }}">
    <!-- Text Editor css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/slick.css') }}">
    <!-- prism css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/prism.css') }}">
    <!-- file upload css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/file-upload.css') }}">

    <link rel="stylesheet"  href="{{ asset('assets/css/lib/audioplayer.css') }}">
    <!-- main css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/style.css') }}">
</head>

<body>

    <!-- ..::  header area start ::.. -->
    @include('partials.sidebar')
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        @include('partials.navbar')
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">

            <!-- ..::  breadcrumb  start ::.. -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">@yield('title')</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('dashboard.index') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">@yield('subTitle')</li>
                </ul>
            </div>
            <!-- ..::  header area end ::.. -->

            @yield('content')

        </div>
        <!-- ..::  footer  start ::.. -->
        <footer class="d-footer">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <p class="mb-0">© 2024 {{ config('app.name') }}. All Rights Reserved.</p>
                </div>
                {{-- <div class="col-auto">
                    <p class="mb-0">Made by <span class="text-primary-600">pixcelsthemes</span></p>
                </div> --}}
            </div>
        </footer>
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->
        <!-- jQuery library js -->
    <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Popup js -->
    <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
    <!-- prism js -->
    <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
    <!-- file upload js -->
    <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
    <!-- audioplayer -->
    <script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('script')
    <!-- ..::  scripts  end ::.. -->

</body>

</html>
