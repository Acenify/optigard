@extends('frontend.layout.index')

@section('content')
<section class="banner-7-section">
    <div class="banner-7-bg" style="background-image: url('{{ asset('assets/frontend/assets/hero-background.png') }}');"></div>
    <div class="auto-container">
        <div class="banner-7-top-content">
            <h2 class="banner-7-title">
                Kaca Film Rumah Premium<br> Tolak Panas <br> Anti UV & Hemat Energi
            </h2>
            <div class="banner-7-desc" style="max-width: 40%;">
                Optigard diformulasikan untuk bangunan komersial & residensial: menolak panas matahari (TSER tinggi),
                mengurangi beban kerja AC, dan menjaga kenyamanan cahaya alami—membantu menekan biaya listrik tanpa
                mengubah estetika fasad.
            </div>
        </div>
    </div>
</section>

<div class="contactinfo-1" style="background-color: black;">
    <div class="contactinfo-1-container">
        <div class="contactinfo-1-content-box">
            <div class="contactinfo-1-icon-box">
                <div class="contactinfo-1-icon">
                    <img src="{{ asset('assets/frontend/assets/location4.png') }}" alt="IMG">
                </div>
                <div class="contactinfo-1-info-label">LOCATION</div>
                <div class="contactinfo-1-info-text">
                    <a class="fs-5">
                        Jl. KH. Hasyim Ashari, RT.007/RW.002, <br>
                        Nerogtog, Kec. Cipondoh, Kota Tangerang, Banten 15146
                    </a>
                </div>
            </div>

            <div class="contactinfo-1-icon-box mb-4" style="border: none;">
                <div class="contactinfo-1-icon"><i class="flaticon-telephone"></i></div>
                <div class="contactinfo-1-info-label">WHATSAPP</div>
                <div class="contactinfo-1-info-text">
                    <a href="https://wa.me/+6282121212589" target="_blank">+6282121212589</a>
                </div>
            </div>

            <style>
                .contactinfo-1-icon-box:nth-child(3):before { background: none !important; }
            </style>

            <div class="contactinfo-1-icon-box mb-4">
                <div class="contactinfo-1-icon"><i class="flaticon-email"></i></div>
                <div class="contactinfo-1-info-label">email address</div>
                <div class="contactinfo-1-info-text">
                    <a href="mailto:optigardofficial@gmail.com">optigardofficial@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .sub-title:before{ background-color:#38c0ff }
    .sub-title{ color:#38c0ff }
    .text-center .sub-title:after{ background-color:#38c0ff }
    .contactinfo-1-container{ background-color:#0099e0 }
    .testimonial-2-icon-box{ background-color:#0099e0 }
    .whychooseus-4-feature-image:before{ background-color:#38c0ff }
    .testimonial-2-quote{ color:#38c0ff }
    .testimonial-2-designation{ color:#38c0ff }
    .testimonial-2-section .owl-dots .owl-dot:hover,
    .testimonial-2-section .owl-dots .owl-dot.active{ background-color:#38c0ff; border-color:#38c0ff; }
    .contact-widget-1-text a:hover{ color:#38c0ff }
</style>

<section class="features-4-section">
    <div class="features-4-row">
        <div class="features-4-image" style="background-image: url('{{ asset('assets/frontend/assets/about-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; object-fit: cover;">
            <img src="{{ asset('assets/frontend/assets/about-bg.png') }}" alt="">
        </div>
        <div class="features-4-content">
            <div class="features-4-small-container">
                <div class="sec-title-area mb_30">
                    <div class="sub-title" style="color:#38c0ff">BUILDING WINDOW FILM</div>
                    <h2 class="sec-title">Efisiensi Energi Tanpa Mengorbankan Cahaya Alami</h2>
                </div>
                <h4 class="features-4-text">
                    Optigard memantulkan panas berlebih dan mereduksi silau, membuat ruangan lebih sejuk
                    dan konsumsi listrik AC turun signifikan.
                </h4>
                <div class="features-4-desc">
                    <p>
                        Dengan Total Solar Energy Rejected (TSER) tinggi dan perlindungan UV hingga 99%,
                        Optigard membantu menjaga suhu interior stabil, meningkatkan kenyamanan penghuni,
                        dan meringankan kerja sistem HVAC—berujung pada penghematan energi yang nyata.
                    </p>
                    <p>
                        Lapisan optik multilayer mempertahankan tampilan kaca tetap natural,
                        visibilitas dari dalam nyaman, serta mendukung pencahayaan alami untuk produktivitas yang lebih baik.
                    </p>
                </div>
                <div class="features-4-link-btn">
                    <a href="{{ url('contact-us') }}" class="btn-1">
                        Konsultasi Proyek Gedung<i class="flaticon-right-arrow-1"></i><span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="whychooseus-4-section">
    <div class="whychooseus-4-row">
        <div class="whychooseus-4-left-column">
            <ul class="whychooseus-4-list2" style="background-image: url('{{ asset('assets/frontend/assets/frontend/assets/images/resource/image-65.jpg') }}');">
                <li><i class="flaticon-comment"></i>Hemat Energi — kurangi beban AC & tagihan listrik</li>
                <li><i class="flaticon-comment"></i>TSER tinggi — tolak panas matahari secara efektif</li>
                <li><i class="flaticon-comment"></i>Reduksi silau — visual nyaman untuk kerja & hunian</li>
                <li><i class="flaticon-comment"></i>UV block hingga 99% — lindungi interior & kesehatan kulit</li>
                <li><i class="flaticon-comment"></i>Privasi & estetika fasad tetap elegan</li>
                <li><i class="flaticon-comment"></i>Dukungan target green building</li>
            </ul>

            <div class="whychooseus-4-feature-image" style="background-image: url('{{ asset('assets/frontend/assets/background-mobil.png') }}')">
                <img style="max-width: 30rem;" src="{{ asset('assets/frontend/assets/building-bg.png') }}" alt="">
            </div>
        </div>

        <style>.whychooseus-4-icon2{ color:#38c0ff; }</style>

        <div class="whychooseus-4-right-column" style="background-image: url('{{ asset('assets/frontend/assets/spesification-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; object-fit: cover;">
            <div class="whychooseus-4-content">
                <div class="sec-title-area">
                    <div class="sub-title">SPESIFIKASI & KEUNGGULAN</div>
                    <h2 class="sec-title light mb_30">Mengapa Optigard untuk Gedung Anda?</h2>
                    <div class="whychooseus-4-tile-desc">
                        Untuk kantor, hotel, rumah sakit, hingga hunian vertikal—Optigard menghadirkan penghematan energi,
                        kenyamanan termal yang merata, serta tampilan kaca yang tetap premium.
                    </div>
                </div>
                <ul class="whychooseus-4-list">
                    <li>
                        <div class="whychooseus-4-icon2"><i class="flaticon-mechanic"></i></div>
                        <h4 class="whychooseus-4-title">Tim Aplikasi Bersertifikat</h4>
                    </li>
                    <li>
                        <div class="whychooseus-4-icon2"><i class="flaticon-wrench-1"></i></div>
                        <h4 class="whychooseus-4-title">Pemasangan Efisien & Rapi</h4>
                    </li>
                    <li>
                        <div class="whychooseus-4-icon2"><i class="flaticon-price-tag-1"></i></div>
                        <h4 class="whychooseus-4-title">ROI Cepat dari Penghematan Energi</h4>
                    </li>
                    <li>
                        <div class="whychooseus-4-icon2"><i class="flaticon-trophy"></i></div>
                        <h4 class="whychooseus-4-title">Material Berkualitas & Garansi Resmi</h4>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="services-4-section s-three">
    <div class="services-4-sec-bg" style="background-image: url('{{ asset('assets/frontend/assets/solution-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; object-fit: cover;"></div>
    <div class="auto-container">
        <div class="sec-title-wrap">
            <div class="sec-title-area mb_50">
                <div class="sub-title">SOLUSI OPTIGARD</div>
                <h2 class="sec-title light">Layanan untuk Proyek Gedung</h2>
            </div>
            <div class="title-desc mb_30 light">
                Survey & konsultasi di lokasi, rekomendasi spesifikasi berbasis data panas/silau,
                hingga pemasangan profesional yang rapi dan bersih.
            </div>
        </div>

        <div class="services-4-outer-box">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/support-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">LAYANAN</h5>
                            <h2 class="services-4-title" style="min-height:55px;">Audit Panas & Rekomendasi Efisiensi</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/security-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">LAYANAN</h5>
                            <h2 class="services-4-title" style="min-height:55px;">Simulasi Penghematan Energi (ROI)</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/house-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">LAYANAN</h5>
                            <h2 class="services-4-title" style="min-height:55px;">Pemasangan Profesional & Rapi</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/innovation-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">LAYANAN</h5>
                            <h2 class="services-4-title" style="min-height:55px;">Dukungan After-Sales & Garansi</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/satisfaction-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">NILAI</h5>
                            <h2 class="services-4-title">Kenyamanan Termal Merata</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/technician-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">NILAI</h5>
                            <h2 class="services-4-title">Perawatan HVAC Lebih Rendah</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="services-4-block">
                        <div class="services-4-inner-box">
                            <div class="services-4-icon"><span><img src="{{ asset('assets/frontend/assets/icons/official-n.png') }}" alt=""></span></div>
                            <h5 class="services-4-category">NILAI</h5>
                            <h2 class="services-4-title">Mendukung Green Building</h2>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <img src="{{ asset('assets/frontend/assets/kaca_film.png') }}" alt="" style="width:100%;">
                </div>
            </div>
        </div>

        <div class="services-4-text">
            Investasi cerdas untuk penghematan energi jangka panjang, kenyamanan penghuni, dan performa bangunan yang lebih baik.
        </div>
    </div>
</section>

<section class="testimonial-2-section s-two">
    <div class="testimonial-2-row">
        <div class="testimonial-2-left-column" style="background-image: url('{{ asset('assets/frontend/assets/testimonial-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; object-fit: cover;">
            <div class="testimonial-2-feature-image"><img src="{{ asset('assets/frontend/assets/4.jpg') }}" alt=""></div>
            <div class="testimonial-2-icon-box">
                <div class="testimonial-2-icon-box-icon"><i class="flaticon-reliability"></i></div>
                <div class="testimonial-2-icon-box-text">Trusted by <br> ratusan proyek <br> properti</div>
            </div>
        </div>

        <div class="testimonial-2-right-column">
            <div class="testimonial-2-wrapper-box">
                <div class="sec-title-area mb_50">
                    <div class="sub-title">great Testimonials</div>
                    <h2 class="sec-title">Apa Kata Klien Gedung Kami</h2>
                </div>

                <div class="theme_carousel owl-theme owl-carousel"
                     data-options='{"loop": true, "margin": 60, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{"0":{"items":"1"},"600":{"items":"1"},"768":{"items":"1"},"992":{"items":"2"},"1200":{"items":"2"}}}'>
                    <div class="testimonial-2-block" style="min-height:450px !important;">
                        <div class="testimonial-2-image-wrapper">
                            <div class="testimonial-2-image">
                                <img src="{{ asset('assets/frontend/assets/5.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-2-quote">“</div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-text">
                                Setelah pemasangan Optigard, tagihan listrik kami turun dan area kerja terasa jauh lebih nyaman. Silau di dekat jendela berkurang drastis.
                            </div>
                            <div class="testimonial-2-author-info">
                                <h4 class="testimonial-2-name">Manajer Gedung Perkantoran</h4>
                                <div class="testimonial-2-designation">Jakarta</div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-2-block" style="min-height:450px !important;">
                        <div class="testimonial-2-image-wrapper">
                            <div class="testimonial-2-image">
                                <img src="{{ asset('assets/frontend/assets/6.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-2-quote">“</div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-text">
                                Penghuni apartemen melaporkan ruangan lebih sejuk siang hari. Investasi yang terasa manfaatnya setiap bulan lewat penghematan energi.
                            </div>
                            <div class="testimonial-2-author-info">
                                <h4 class="testimonial-2-name">Pengelola Hunian Vertikal</h4>
                                <div class="testimonial-2-designation">Tangerang</div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-2-block" style="min-height:450px !important;">
                        <div class="testimonial-2-image-wrapper">
                            <div class="testimonial-2-image">
                                <img src="{{ asset('assets/frontend/assets/7.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-2-quote">“</div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-text">
                                Fasad tetap elegan, dari dalam pandangan tetap nyaman. Optigard membantu target efisiensi energi proyek kami.
                            </div>
                            <div class="testimonial-2-author-info">
                                <h4 class="testimonial-2-name">Konsultan Energi Bangunan</h4>
                                <div class="testimonial-2-designation">BSD</div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-2-block" style="min-height:450px !important;">
                        <div class="testimonial-2-image-wrapper">
                            <div class="testimonial-2-image">
                                <img src="{{ asset('assets/frontend/assets/8.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="testimonial-2-quote">“</div>
                        <div class="testimonial-2-content">
                            <div class="testimonial-2-text">
                                Instalasi rapi dan cepat. Temperatur ruangan lebih stabil, keluhan penghuni berkurang signifikan.
                            </div>
                            <div class="testimonial-2-author-info">
                                <h4 class="testimonial-2-name">Chief Engineering</h4>
                                <div class="testimonial-2-designation">Office Tower</div>
                            </div>
                        </div>
                    </div>
                </div> {{-- /carousel --}}
            </div>
        </div>
    </div>
</section>

<section class="video-1-section s-two">
    <div class="video-1-bg" data-parallax='{"y": 60}' style="background-image: url('{{ asset('assets/frontend/assets/ask-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; object-fit: cover; min-width: 100rem !important; "></div>
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="video-1-sub-title">Efisiensi Energi Dimulai dari Kaca</div>
                <div class="video-1-title">Ingin tahu potensi penghematan energi gedung Anda?</div>
                <div class="video-1-link-btn mb_30">
                    <a href="{{ url('contact-us') }}" class="btn-1">Minta Konsultasi<i class="flaticon-right-arrow-1"></i><span></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="breadcrumb_area parallaxie pt-5 pb-2" style="background:#191919;">
    <div class="container">
        <div class="sec-title-area mb-40">
            <div class="sub-title">Get direction</div>
            <h2 class="sec-title" style="color:white;">Our Location</h2>
        </div>
        <div class="container mb-5">
            <div class="row margin-bottom-60">
                <div class="col-md-8 col-sm-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4520612098686!2d106.68581417576439!3d-6.203943660774983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed2a0d3377ef%3A0x49dc44beb8c49b02!2sAcegard%20Indonesia!5e0!3m2!1sid!2sid!4v1750740497399!5m2!1sid!2sid"
                        width="100%" height="400" frameborder="0" style="border:0; max-width: 100%;" allowfullscreen="">
                    </iframe>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2 style="font-weight: bold;color:white;">Address :</h2>
                    <h4>
                        <p class="text-white fw-normal">
                            Jl. KH. Hasyim Ashari, RT.007/RW.002, Nerogtog, Kec. Cipondoh, Kota Tangerang, Banten 15146
                        </p>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partner-1-section">
    <div class="auto-container">
        <div class="sec-title-area text-center mb-40">
            <div class="sub-title">Partners & Projects</div>
            <h2 class="sec-title">Dipercaya Berbagai Properti & Korporasi</h2>
        </div>
        <div class="theme_carousel owl-theme owl-carousel"
             data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{"0":{"items":"2"},"600":{"items":"3"},"768":{"items":"4"},"992":{"items":"6"},"1200":{"items":"8"}}}'>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/pondok-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/ciracas-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/citra-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/bsd-city-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/pik-2-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/perumnas-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/sarana-jaya-logo.png') }}" alt=""></div>
            <div class="partner-1-logo"><img src="{{ asset('assets/frontend/assets/agung-sedayu-group-logo.png') }}" alt=""></div>
        </div>
    </div>
</section>
@endsection
