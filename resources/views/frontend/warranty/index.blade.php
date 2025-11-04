<!doctype html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Warranty Claim - Optigard">
    <meta name="author" content="Optigard">
    <title>Warranty Claim - Optigard</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/assets/favicon-optigard.png') }}" sizes="16x16">

    <link href="{{ asset('assets/frontend/assets/warranty/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/warranty/css/styles.css') }}" rel="stylesheet">

    {{-- Optional vendor (untuk AJAX checker) --}}
    <link href="{{ asset('assets/frontend/assets/myvendors/jquery-easy-loading/dist/jquery.loading.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/myvendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <style>
        ::placeholder, ::-webkit-input-placeholder, :-moz-placeholder, ::-moz-placeholder, :-ms-input-placeholder { text-align:center; }
        input[type=text]{ text-align:center }
        #label, button, input { font-family: 'Montserrat', sans-serif !important; }
        #page-content { background-image: url({{ asset('assets/frontend/assets/warranty-bg.jpg') }}) !important; }
        #label { text-align:right; }
        @media (max-width: 600px) { #label { text-align:center; } }
    </style>
</head>
<body>
<main id="page-content" class="d-flex nm-aic nm-vh-md-100" style="position: relative;">
    <div class="container">
        <center class="mb-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/frontend/assets/logo-optigard.png') }}" alt="LOGO" style="max-width: 400px;">
            </a>
        </center>

        <div class="row">
            <div class="col-12 col-md-4">
                <h2 class="mb-3 mt-0" id="label" style="color:#fff!important;">
                    ENTER YOUR WARRANTY <br> CARD NUMBER
                </h2>
            </div>

            <div class="col-12 col-md-4">
                {{-- PURE SERVER-SIDE SEARCH --}}
                <form method="GET" action="{{ route('warranty.index') }}">
                    <div class="form-group text-center">
                        <input
                        id="cardnumber"
                        name="card_number"     {{-- <== penting --}}
                        type="text"
                        class="form-control"
                        autocomplete="off"
                        placeholder="CARD NUMBER"
                        style="background:#fff;border-radius:.80rem;padding:1.5rem;letter-spacing:.2rem;"
                        value="{{ old('card_number', $card_number ?? '') }}"
                        >
                    </div>
                    @if(isset($customer) && $customer && $customer->invoice)
                    {{-- Ketemu invoice: ubah tombol menjadi VIEW CARD (link ke halaman kartu) --}}
                    <a href="{{ route('warranty.show', $customer->invoice->id) }}"
                        class="btn btn-success mt-2 px-4" style="font-size:26px;">
                        VIEW CARD
                    </a>

                    {{-- Opsional: tampilkan ringkas info invoice di halaman ini --}}
                    <div class="mt-3 text-start text-white-50">
                        <div><strong>Customer:</strong> {{ $customer->name }}</div>
                        <div><strong>Card #:</strong> {{ $customer->card_number }}</div>
                        <div><strong>Invoice #:</strong> {{ $customer->invoice->number ?? $customer->invoice->id }}</div>
                        <div><strong>Date:</strong> {{ optional($customer->invoice->created_at)->format('d M Y') }}</div>
                    </div>
                    @elseif(!empty($card_number))
                    {{-- Card number diisi tapi tidak ketemu --}}
                    <div class="alert alert-warning mt-2">Card number tidak ditemukan.</div>
                    <button type="submit" class="btn btn-primary mt-2 px-4" style="font-size:26px;">SUBMIT</button>
                    @else
                    {{-- Belum ada input: tombol SUBMIT biasa --}}
                    <button type="submit" class="btn btn-primary mt-2 px-4" style="font-size:26px;">SUBMIT</button>
                    @endif
                </form>


            </div>

            <div class="col-12 col-md-4"></div>
        </div>
    </div>
</main>

{{-- JS --}}
<script src="{{ asset('assets/frontend/assets/backend/vendors/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/myvendors/jquery-easy-loading/dist/jquery.loading.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/myvendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/frontend/assets/warranty/js/bootstrap.bundle.min.js') }}"></script>

<script>
    // Base URLs untuk AJAX checker (opsional)
    const claimBase = @json(url('warranty-claim'));
    const pdfBase   = @json(url('warranty-pdf'));
    const lookupUrl = @json(url('getdata/public_get/Warranty/getData')); // sesuaikan jika ada named route

    function showWarning(msgHtml) {
        Swal.fire({ title: 'WARNING!!!', html: msgHtml, icon: 'warning' });
    }

    function buildDetailLinks(code) {
        const claimLink = `${claimBase}/${code}`;
        const pdfLink   = `${pdfBase}/${code}`;
        return `<a href="${claimLink}" id="linkdetail">VIEW DETAILS</a> or <a href="${pdfLink}" id="linkdetail">DOWNLOAD</a>`;
    }

    function ajaxCheck() {
        $("#unknown").hide();
        $("#found").hide();
        $("#details").empty();

        const cardnumber = $('#cardnumber').val().trim();
        if (!cardnumber) return showWarning('ENTER YOUR WARRANTY <br>CARD NUMBER');

        $.ajax({
            url: lookupUrl,
            type: 'GET',
            dataType: 'json',
            data: { cardnumber }
        }).done(function (data) {
            if (data && data.status && data.datas) {
                $("#details").html(buildDetailLinks(data.code));
                $("#found").show();
            } else {
                $("#unknown").show();
            }
        }).fail(function () {
            $("#unknown").show().text('REQUEST FAILED. PLEASE TRY AGAIN.');
        });
    }

    $('#btn-check-ajax').on('click', ajaxCheck);
    $('#cardnumber').on('keydown', function (e) { if (e.key === 'Enter') ajaxCheck(); });
</script>
</body>
</html>
