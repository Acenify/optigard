<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $invoice->invoice_number }}</title>
    <style>
        * {
            -webkit-print-color-adjust: exact !important;
            /* Chrome, Safari 6 – 15.3, Edge */
            color-adjust: exact !important;
            /* Firefox 48 – 96 */
            print-color-adjust: exact !important;
            /* Firefox 97+, Safari 15.4+ */
        }

        @page {
            margin: 0.3cm 0.2cm;
            size: A4;
            padding: 10px;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0rem;
        }

        .card {
            border: 1px solid #ddd;
            padding: 0 ;
        }

        .card-body {
            padding: 0;
        }

        img.img-left {
            width: 15rem;
            display: block;
            margin: 0;
        }

        table, tr, td {
            page-break-inside: avoid;
        }

        tr,
        th {
            vertical-align: top;
        }

        hr {
            border-top: 2px solid black;
            margin: 0;
        }

        .section-title {
            background-color: #000000 !important;
            color: white;
            text-align: center;
            font-weight: bold;
            margin: 1rem 0;
            padding: 0.3rem;
        }

        .subtitle {
            background-color: #000000;
            color: white;
            text-align: center;
            font-weight: bold;
            margin: 1rem 0;
            padding: 0.3rem;
        }

        .payment-information{

        }

        .transaction-column {
            display: flex;
            padding: 0;
            margin: 0;
        }

        .column-left,
        .column-right {
            flex: 1;
            padding: 0px 20px;
        }

        .bordered {
            border: 1px solid #ddd;
            padding: 0.5rem 1rem;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .my-3 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .my-4 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .status {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            border-radius: 0px 0px 5px 5px;
        }

        .footer {
            margin-top: 0;
        }

        .list-inside {
            list-style-position: inside;
        }

        .list-decimal {
            list-style-type: decimal;
        }

        .text-muted {
            color: gray;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer h3 {
            font-size: 16px;
        }

        .footer ol {
            padding-left: 20px;
        }

        .type-transaction {
            font-size: 14px;
        }

        .page-break { page-break-before: always; break-before: page; }
         .avoid-break { page-break-inside: avoid; break-inside: avoid; }

    </style>
</head>

<body>
    <div style="padding: 1.5rem;">
    <table style="width: 100%;">
        <tr>
            <th style="text-align: left;">
                <img style="width: 15rem;" src="{{ public_path('assets/frontend/assets/dark-logo-optigard.png') }}" alt="Logo Light">
                <p style="font-weight: bold;">
                    Jl. KH. Hasyim Ashari, RT.007/RW.002,<br> Nerogtog, Kec. Cipondoh, Kota Tangerang, Banten 15146
                </p>
            </th>
            <th style="text-align: right;">
                <p>
                    Invoice Date: {{ $invoice->invoice_date }}<br>
                    Invoice Number: {{ $invoice->invoice_number }}<br>
                    Card Number: {{ $customer->card_number }}
                </p>
            </th>
        </tr>
    </table>

    <hr style="border: 1px solid black; margin: 0;">

    <h6 style="text-align: center; font-weight: bold; font-size: 1.25rem; background-color: black; color: white; padding: 5px 0; margin:0.5rem 0 !important;">
        ACEGARD INVOICE
    </h6>
    <h6 style="text-align: center; font-weight: bold; font-size: 1.25rem; background-color: black; color: white; padding: 5px 0; margin: 0 !important;">
        CUSTOMER PERSONAL DATA
    </h6>

    <!-- Table Customer -->
    <table style="width: 100%; border-collapse: collapse; margin-top: 1.5rem; border-spacing: 5em;">
        <tbody>
            <tr style="margin: 0.5rem;">
                <th style="width: 15rem; text-align: left;">NAME</th>
                <td>: {{ $customer->name }}</td>
            </tr>
            <tr style="margin: 0.5rem;">
                <th style="text-align: left;">EMAIL</th>
                <td>: {{ $customer->email }}</td>
            </tr style="margin: 0.5rem;">
            <tr>
                <th style="text-align: left;">PHONE NUMBER</th>
                <td>: {{ $customer->phone_number }}</td>
            </tr>
            <tr style="margin: 0.5rem;">
                <th style="text-align: left;">ADDRESS</th>
                <td>: {{ $customer->address }}</td>
            </tr>
        </tbody>
    </table>

    <h6 style="text-align: center; font-weight: bold; font-size: 1.25rem; margin: 1.5rem 0; background-color: black; color: white; padding: 5px 0;">
        PRODUCT DESCRIPTION
    </h6>

    <table style="width: 100%;">
        <tbody>
            @foreach ($customer->products as $product)
            <tr>
                <td style="width: 17rem; text-align: left; margin: 0.5rem 0;">{{ $product->category->name }}</td>
                <td style="border-style: none !important;">: {{ $product->meters }} | {{ $product->product->name }} | {{ $product->product->description }} | {{ \Carbon\Carbon::parse($product->warantee_start)->format('Y-m-d')}} s/d {{ \Carbon\Carbon::parse($product->warantee_end)->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <table style="width: 100%; table-layout: fixed; ">
        <tr>
            <td style="vertical-align: top; width: 50%; padding-right: 1rem; page-break-inside: avoid;">
                <div style="border: 1px solid #000; padding:0.5rem 1rem; margin-top:1.5rem;">
                    <p style="text-align: center; font-weight: bold; margin-bottom: 1rem;">Please transfer in IDR</p>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th style="text-align: left;">Bank Company</th>
                                <td>: Bank Central Asia (BCA)</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Account Bank Name</th>
                                <td>: Hendy Tanpratama</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Account Number</th>
                                <td>: 8900140747</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="border: 1px solid #000; padding: 1rem; margin-top: 1rem; text-align: center; font-weight: bold; text-transform:uppercase;">
                    TYPE OF TRANSACTION : {{ $invoice->type }}
                </div>
                <div style="margin-top: 1rem;">
                    <p>All Transactions are not refundable</p>
                    <p style="font-weight: bold;">THANK YOU FOR TRUSTING YOUR <br> BUILDING WITH US</p>
                </div>
            </td>
            <td style="vertical-align: top; width: 50%; padding-left: 1rem; page-break-inside: avoid;">
                    <h5 style="text-align: center; font-weight: bold; background-color: black; color: white; padding: 0.5rem; text-transform:uppercase;">Total Price</h5>
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th style="text-align: left;">Price</th>
                                <td>: Rp. {{ number_format($invoice->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Discount</th>
                                <td>: Rp. {{ number_format($invoice->discount, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Total</th>
                                <td>: Rp. {{ number_format($invoice->total_price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="border-top: 2px solid black; margin: 1rem 0;">
                    <table style="width: 100%;">
                        <tbody>
                            <tr>
                                <th style="text-align: left;">Down Payment</th>
                                <td>: Rp. {{ number_format($invoice->down_payment, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Remaining Payment</th>
                                <td>: Rp. {{ number_format($invoice->remaining_payment, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                <div style="text-align: center; font-weight: bold; background-color: black; color: white; margin-top: 1rem; padding: 0.5rem; text-transform:uppercase;">
                    STATUS : {{ $invoice->status }}
                </div>
                <div class="avoid-break" style="text-align: center; margin-top: 1rem;">
                    <p style="margin: 0;">SINCERELY,</p>
                    <img src="{{ public_path('assets/frontend/assets/dark-logo-optigard.png') }}" style="width: 15rem; transform: rotate(-5deg); margin: 1rem auto;" alt="cap Acegard">
                    <p style="margin: 0;">ACEGARD INDONESIA</p>
                </div>
            </td>
        </tr>
    </table>

    <div class="page-break"></div>
    <!-- Additional sections (transaction, warranty, etc.) will be continued below -->
    <div>
    <div class="my-1" style="page-break: avoid;">
        <h4 class="bg-gray-100 dark:bg-gray-950 text-center text-gray-800 dark:text-white font-bold py-1 my-8" style="background-color:black; color:white;">
            OPTIGARD BUILDING WINDOW FILM WARRANTY TERMS AND CONDITIONS
        </h4>
    </div>

    <h5 class="text-gray-500"><strong>WARRANTY CAN BE CLAIMED IF:</strong></h5>
    <ol class="list-inside list-decimal p-2" style="list-style: auto; list-style-position: inside;">
        <li class="text-gray-500">Window film experiences bubbling or blisters on the glass surface.</li>
        <li class="text-gray-500">The window film peels off or loses adhesion on the glass.</li>
        <li class="text-gray-500">The window film fades or changes color abnormally.</li>
        <li class="text-gray-500">The window film experiences delamination (layer separation).</li>
    </ol>

    <h5 class="text-gray-500"><strong>THE WARRANTY CANNOT BE CLAIMED IF:</strong></h5>
    <ol class="list-inside list-decimal p-0" style="list-style: auto; list-style-position: inside;">
        <li class="text-gray-500">Transferred ownership from the original building/project owner.</li>
        <li class="text-gray-500">Damage caused by improper maintenance, user negligence, physical impact, vandalism, or natural disasters.</li>
        <li class="text-gray-500">Installation is combined with other window film brands or installed in multiple layers on the same glass surface.</li>
        <li class="text-gray-500">Installation is not carried out by an OPTIGARD AUTHORIZED DEALER or certified installer.</li>
        <li class="text-gray-500">Warranty registration is incomplete or not submitted with valid project/customer data.</li>
    </ol>

    <p class="text-gray-500"><br />
        <strong>Important Notice: Building Glass Maintenance</strong><br />
        After installation, slight haze or cloudiness may appear on the glass surface. This is normal and caused by moisture trapped during the application process. The Optigard building window film will fully cure within 30 days. Do not clean or touch the glass surface during this curing period.
        <br /><br />
        Only use non-abrasive, ammonia-free cleaners and a soft microfiber cloth for routine maintenance. Avoid sharp objects, rough brushes, or chemicals that may damage the film layer.
        <br /><br />
        <strong>Disclaimer:</strong>
        All Optigard building window film users are expected to follow local building codes and glass performance requirements. Authorized Optigard dealers are not responsible for damage caused by misuse or installation outside approved guidelines.
    </p>
</div>

</div>

</body>
</html>
