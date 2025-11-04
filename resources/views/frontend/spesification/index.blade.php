@extends('frontend.layout.index')

@section('title', 'Specification')

@section('content')
<style>
    @media only screen and (max-width: 600px) {
        #ubah{
           height: 40vh;
           padding-bottom: 0;
           padding-top: 25vh;
        }
    }
</style>

<section id="ubah" class="page-title-sectition" style="background-image:url('{{ asset('assets/frontend/assets/banner-bg.jpg') }}'); background-size: cover; background-position: bottom center;">
    <div class="auto-container">
        <h2 class="page-title">Specification</h2>
        <ul class="page-breadcrumb">
            <li><a href="{{ url('/') }}">home</a></li>
            <li>Specification</li>
        </ul>
    </div>
</section>

<section class="about-5-section">
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="about-5-content-wrap mb_30">
                    <div class="sec-title-area mb_30">
                        <div class="sub-title">PREMIUM ARCHITECTURAL FILM</div>
                        <h2 class="sec-title">ABOUT OPTIGARD</h2>
                    </div>
                    <div class="about-5-text">
                        Sebagai brand kaca film premium asal Korea Selatan, Optigard menghadirkan solusi perlindungan jendela dengan teknologi mutakhir yang menggabungkan estetika modern dan kinerja maksimal.
                    </div>
                    <div class="about-5-desc">
                        Dengan reputasi global, Optigard dikenal sebagai pelopor dalam inovasi kaca film untuk bangunan, mengedepankan keamanan, efisiensi energi, kenyamanan visual, dan perlindungan UV tingkat tinggi. Setiap produk kami dirancang untuk memenuhi tuntutan arsitektur masa kini—baik untuk hunian maupun komersial.
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="about-5-list">
                                <li><i class="flaticon-comment"></i>Made in South Korea</li>
                                <li><i class="flaticon-comment"></i>High Heat Rejection</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="about-5-list">
                                <li><i class="flaticon-comment"></i>Up to 99% UV Protection</li>
                                <li><i class="flaticon-comment"></i>Elegant Visual Clarity</li>
                            </ul>
                        </div>
                    </div>
                    <div class="about-5-link-btn">
                        <a href="{{ url('contact-us') }}" class="btn-1">CONTACT US <i class="flaticon-right-arrow-1"></i><span></span></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="about-5-image-wrap">
                    <div class="about-5-image-1" data-parallax='{"y": 20}'><img style="width: 19rem;" src="{{ asset('assets/frontend/assets/11.jpg') }}" alt=""></div>
                    <div class="about-5-image-2" data-parallax='{"y": -20}'><img style="width: 17rem;" src="{{ asset('assets/frontend/assets/our-product-image.png') }}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-2-section">
    <div class="auto-container text-center mb-5" style="max-width:100%!important;padding:0px!important; background: #ffff;">
        <img src="{{ asset('assets/frontend/assets/prime-silver.png') }}" alt="" class="img-fluid">
        <img src="{{ asset('assets/frontend/assets/hybrid-luxe.png') }}" alt="" class="img-fluid">
        <img src="{{ asset('assets/frontend/assets/ceramix.png') }}" alt="" class="img-fluid">
    </div>
</section>

<section class="video-1-section s-two">
    <div class="video-1-bg" data-parallax='{"y": 50}' style="background-image:url('{{ asset('assets/frontend/assets/15.jpg') }}')"></div>
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-8 offset-lg-4">
                <div class="video-1-sub-title">INTERNATIONAL STANDARD</div>
                <div class="video-1-title">Leading The Future of Window Film Innovation</div>
                <div class="video-1-link-btn mb_30">
                    <a href="{{ url('contact-us') }}" class="btn-1">CONTACT US <i class="flaticon-right-arrow-1"></i><span></span></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="cta-1-section theme-bg">
    <div class="auto-container">
        <div class="cta-1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cta-1-title">Schedule Your Appointment Today</div>
                    <div class="cta-1-text">Your Building Window Film Specialist</div>
                </div>
                <div class="col-lg-6">
                    <div class="cta-1-row">
                        <div class="cta-1-phone-number">
                            <a href="tel:+6282121113688">+6282121113688</a>
                        </div>
                        <div class="cta-1-link-btn">
                            <a href="https://wa.me/+6282121113688" class="btn-1 s-two text-white" target="_blank" style="border:1px solid #fff;background:#fff!important;color:#0099e0!important;">
                                WHATSAPP<i class="flaticon-right"></i><span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
