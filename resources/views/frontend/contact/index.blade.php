@extends('frontend.layout.index')

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

<section id="ubah" class="page-title-sectition" style="background-image:url('{{ asset('assets/frontend/assets/banner-bg.png') }}'); background-size: cover; background-position: bottom center;">
    <div class="auto-container">
        <h2 class="page-title">Contact Us</h2>
        <ul class="page-breadcrumb">
            <li><a href="{{ url('/') }}">home</a></li>
            <li>Contact Us</li>
        </ul>
    </div>
</section>

<section class="contactus-1-section">
    <div class="auto-container">
        <div class="sec-title-area mb_50">
            <div class="sub-title">get in touch</div>
            <h2 class="sec-title">Drop us message</h2>
        </div>

        <div class="row clearfix">
            <div class="form-column col-lg-7">
                <div class="inner-column">
                    <div class="contact-form">
                        <div class="row clearfix">
                            <div class="form-group col-md-12">
                                <input type="text" name="form_name" placeholder="Your Name" required id="fullname" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea id="message" style="resize: none;" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button onclick="sendWA()" class="btn-1" type="button" data-loading-text="Please wait...">
                                    Submit now <i class="flaticon-right-arrow-1"></i><span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function sendWA() {
                    const name = document.getElementById('fullname').value || '';
                    const msg  = document.getElementById('message').value || '';
                    const text = encodeURIComponent(name + '\n' + msg);
                    window.open('https://wa.me/6282121212589?text=' + text, '_blank');
                }
            </script>

            <!-- Info Column -->
            <div class="col-lg-5">
                <div class="contactus-1-inner-column">
                    <h4 class="contactus-1-info-title">We Are Here To Help</h4>
                    <div class="contactus-1-info-text">Office Hour : Monday - Sunday ( 09.00 - 21.00 WIB )</div>
                    <ul class="contactus-1-info-list">
                        <li><i class="fal fa-map-marker-alt"></i><span>Address:</span> Jl. KH. Hasyim Ashari, RT.007/RW.002, <br>
                        Nerogtog, Kec. Cipondoh, Kota Tangerang, Banten 15146</li>
                        <li><i class="fal fa-envelope"></i><span>email:</span> optigardofficial@gmail.com</li>
                        <li><i class="fal fa-phone"></i><span>phone:</span> +6282121212589</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="auto-container">
    <div class="sec-divider-2"></div>
</div>

<section class="map-section">
    <div class="auto-container">
        <div class="contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6462836414416!2d106.83924700000001!3d-6.310113899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eded12abf919%3A0x1762a4ff97669da5!2sJl.%20Raya%20Tj.%20Barat%20No.2%2C%20RT.5%2FRW.1%2C%20Tj.%20Bar.%2C%20Kec.%20Jagakarsa%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012530!5e0!3m2!1sid!2sid!4v1697611727203!5m2!1sid!2sid"
                width="600" height="390" style="border:0; width: 100%" allowfullscreen="">
            </iframe>
        </div>
    </div>
</section>
@endsection
