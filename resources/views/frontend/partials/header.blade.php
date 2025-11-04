
    {{-- Styles inline yg ada di file asli --}}
    <style>
        @media (max-width: 767px){ #logoatas { max-width:200px; } }
        @media (min-width: 768px){ #logoatas { max-width:250px; } }

        header.main-header.header-style-ten .main-menu .navigation>li.current>a { color:#38c0ff; }
        .btn-1 { background-image: linear-gradient(90deg,#0099e0 0%,#38c0ff 100%) !important; }
        header.main-header.header-style-ten .main-menu .navigation>li.current>a:before { background-color:#38c0ff !important; color:#38c0ff !important; }
        .sub-title:before { background-color:#38c0ff }
        .sub-title { color:#38c0ff }
        .text-center .sub-title:after { background-color:#38c0ff }
        .contact-widget-1-text a:hover { color:#38c0ff }
        .scroll-to-top .scroll-bar:before { background-color:#38c0ff; }
        ul.contactus-1-info-list i { color:#38c0ff; }
        .theme-bg,.cta-1 { background-color:#0099e0 }
        ul.about-5-list i { color:#38c0ff; }
        .mobile-menu-visible .mobile-menu .menu-backdrop{ --theme-color:#38c0ff; }
        .mobile-menu-visible .mobile-menu{ --theme-color:#38c0ff !important; }
    </style>

    <header class="main-header header-style-ten">
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <div class="logo-box">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/frontend/assets/logo-optigard.png') }}" alt="LOGO" id="logoatas">
                                </a>
                            </div>
                        </div>

                        <div class="nav-outer">
                            <div class="mobile-nav-toggler">
                                <img src="{{ asset('assets/Vector.png') }}" alt="Menu">
                            </div>

                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                    <li class="{{ request()->routeIs('home.index') ? 'current' : '' }}">
                                        <a href="{{ route('home.index') }}" title="Home">Home</a>
                                    </li>

                                    <li class="{{ request()->routeIs('spesification.*') ? 'current' : '' }}">
                                        <a href="{{ route('spesification.index') }}" title="Specification">Specification</a>
                                    </li>

                                    {{-- contoh item lain kalau nanti ada --}}
                                    @if (Route::has('gallery.index'))
                                        <li class="{{ request()->routeIs('gallery.*') ? 'current' : '' }}">
                                            <a href="{{ route('gallery.index') }}" title="Gallery">Gallery</a>
                                        </li>
                                    @endif

                                    @if (Route::has('contact.index'))
                                        <li class="{{ request()->routeIs('contact.*') ? 'current' : '' }}">
                                            <a href="{{ route('contact.index') }}" title="Contact Us">Contact Us</a>
                                        </li>
                                    @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        {{-- <div class="search-btn"><button type="button" class="theme-btn search-toggler"><span class="fal fa-search"></span></button></div> --}}
                    </div>

                    <div class="right-column">
                        <div class="header-upper-link-btn">
                            <a href="{{ route('warranty.index') }}" class="btn-1">
                                WARRANTY CLAIM <span style="top:186.5px;left:85.25px;"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sticky --}}
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="left-column">
                            <div class="logo-box">
                                <div class="logo">
                                    <a href="{{ url('/') }}" title="Logo">
                                        <img src="{{ asset('assets/frontend/assets/logo-optigard.png') }}" alt="LOGO" style="max-width:220px;">
                                    </a>
                                </div>
                            </div>
                            <div class="nav-outer">
                                <div class="mobile-nav-toggler">
                                    <img src="{{ asset('assets/frontend/assets/menu.png') }}" alt="Menu">
                                </div>
                                <nav class="main-menu navbar-expand-md navbar-light"></nav>
                            </div>
                        </div>
                        <div class="right-column">
                            <div class="header-upper-link-btn">
                                <a href="{{ route('warranty.index') }}" class="btn-1">WARRANTY CLAIM<span style="top:186.5px;left:85.25px;"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>

            <nav class="menu-box">
                <div class="nav-logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/assets/logo.png') }}" alt="" title=""></a>
                </div>
                <div class="menu-outer">
                    <ul class="navigation">
                        <li class="{{ request()->routeIs('home.index') ? 'current' : '' }}">
                            <a href="{{ route('home.index') }}">Home</a>
                        </li>

                        <li class="{{ request()->routeIs('spesification.*') ? 'current' : '' }}">
                            <a href="{{ route('spesification.index') }}">Specification</a>
                        </li>

                        @if (Route::has('gallery.index'))
                            <li class="{{ request()->routeIs('gallery.*') ? 'current' : '' }}">
                            <a href="{{ route('gallery.index') }}">Gallery</a>
                            </li>
                        @endif

                        @if (Route::has('contact.index'))
                            <li class="{{ request()->routeIs('contact.*') ? 'current' : '' }}">
                            <a href="{{ route('contact.index') }}">Contact Us</a>
                            </li>
                        @endif
                    </ul>


                    <div class="social-links">
                        <ul class="clearfix">
                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>

    {{-- Search popup (opsional) --}}
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="#">
                    @csrf
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required>
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>
                <br>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Idea</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Growth</a></li>
                    <li><a href="#">Plan</a></li>
                </ul>
            </div>
        </div>
    </div>
