<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        p,
        span {
            font-size: small;
        }

        body {
            padding: 20px;
        }

        table,
        td,
        th {
            border: 2px solid #000;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 2px;
        }

        .title {
            text-align: center;
            padding: 12px 0px;
        }

        .no-border td {
            border-bottom: none !important;
            border-top: none !important;
        }

        .center {
            text-align: center;
        }

        .align-top {
            vertical-align: top;
        }

        .padding-top {
            padding-top: 24px;
        }

        .padding-bottom {
            padding-bottom: 24px;
        }

        .left {
            border-right: none;
        }

        .left p {
            text-align: left;
        }

        .right {
            border-left: none;
        }

        .right p {
            text-align: right;
        }

        footer * {
            font-size: x-small;
        }
              table.header {
            border: none !important;
        }

        table.header * {
            border: none !important;
        }

        table.header .logo {
            text-align: right;
            width: 70px;
        }

        .logo img {
            width: 70px;
        }

        table.header .spacer {
            width: 15%;
        }

        table.header .company-text {
            text-align: center;
        }

        table.header .company-text h3 {
            font-family: 'Times New Roman', Times, serif;
        }

        table.header .company-text p {
            font-size: x-small;
        }

    </style>
</head>

<body>
    <table class="header">
        <tr>
            <td class="spacer"></td>
            <td class="logo">
                <img src="{{ public_path('web/assets/images/logo.png') }}" alt="logo" />
            </td>
            <td class="company-text" style="text-align: center;">
                <h3>
                    PT. TANAMAS INDUSTRY COMUNITAS
                </h3>
                <p>Tomang Ancak Raya 10 - 12</p>
                <p>Jakarta 11430</p>
                <p>INDONESIA</p>
            </td>
            <td class="spacer">
            </td>
        </tr>
    </table>


    <table>
        <thead>
            <tr>
                <td colspan="8" class="title">
                    <h3>COMMERCIAL INVOICE</h3>
                    <p style="text-align: right; font-size: x-small; padding-right: 2px">{{ $data->code_transaction }}</p>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="3" rowspan="2" class="align-top">
                    <p><b>Vendor (Name and Address)</b></p>
                    <p>PT. Tanamas Industry Comunitas</p>
                    <p>Jl. Tomang Ancak Raya 10 - 12 </p>
                    <p>Jakarta - Indonesia</p>
                    <br>
                    <p><b>Manufacture (Name and Address)</b></p>
                    <p>PT. Tanamas Industry Comunitas</p>
                    <p>Jl. Nyi Gede Cangkring No 10, Kaliwulu</p>
                    <p>Cirebon 45154, West Java, Indonesia</p>
                </td>
                <td colspan="5" class="align-top">
                    <p><b>Consignee (Name and Address)</b></p>
                    <p>{{ $data->user->name }}</p>
                    <p>{{ $data->user->shipping_address->street_address }}, {{ $data->user->shipping_address->city }}
                    </p>
                    <p>{{ $data->user->shipping_address->province }}, {{ $data->user->shipping_address->postal_code }},
                        {{ $data->user->shipping_address->country }}</p>
                    <p>Tel: {{ $data->user->phone_number }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p><b>Bill To :</b></p>
                    <p>{{ $data->user->name }}</p>
                    <p>{{ $data->user->billing_address->street_address }}, {{ $data->user->billing_address->city }}</p>
                    <p>{{ $data->user->billing_address->province }}, {{ $data->user->billing_address->postal_code }}
                    </p>
                    <p>{{ $data->user->billing_address->country }}</p>
                </td>
            </tr>

            <tr class="">
                <td class="center align-top">
                    <p>Style No.</p>
                </td>
                <td class="center align-top">
                    <p>Units Pcs</p>
                </td>
                <td colspan="2" width="80%" class="center">
                    <p>Description</p>
                </td>
                <td colspan="2" class="align-top center">
                    <p>Unit Price</p>
                </td>
                <td colspan="2" class="align-top center">
                    <p>TOTAL</p>
                </td>
            </tr>

            <tr class="no-border">
                <td class="center align-top padding-top">
                    <p>{{ $data->product->style_number }}</p>
                </td>
                <td class="center align-top padding-top">
                    <p>{{ $data->quantity }} Pcs</p>
                </td>
                <td colspan="2" width="80%" class="padding-top" style="width: 320px">
                    <p>{{ $data->product->name_product }}</p>
                    <p>Material: {{ $data->product->type_product }}</p>
                    <p>Country of Harvest: Indonesia</p>
                    <p>{{ $data->product->color }}</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>{{ $data->amount }}</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>{{ $data->total }}</p>
                </td>
            </tr>

            <tr class="no-border">
                <td class="center align-top padding-top">
                    <p></p>
                </td>
                <td class="center align-top padding-top">
                    <p></p>
                </td>
                <td colspan="2" width="80%" class="padding-top">
                    <p></p>
                    <p></p>
                    <p></p>
                    <p></p>
                </td>
                <td class="align-top padding-top left">
                    <p></p>
                </td>
                <td class="align-top padding-top right">
                    <p></p>
                </td>
                <td class="align-top padding-top left">
                    <p></p>
                </td>
                <td class="align-top padding-top right">
                    <p></p>
                </td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="4">Total Invoice: USD {{ $data->total }}</td>
            </tr>

            <tr>
                <td colspan="3" class="align-top">
                    <p>Name : Azan M Tanamas</p>
                    <p style="vertical-align: top">Signature :
                        <img src="{{ storage_path('assets/ttd_azan.png') }}" alt="signature"  style="width: 185px; vertical-align: top"/>
                    </p>
                </td>
                <td colspan="5" class="align-top">
                    <p>Dated : {{ $data->transaction_date }}</p>
                    <p>Title : Director</p>
                </td>
            </tr>
        </tbody>
    </table>


    <br>
    <footer>
        <table style="border: none !important;">
            <tr style="border: none !important;">
                <td style="border: none !important;">
                    <p><b>Please transfer to :</b></p>
                    <p><b>PT. BANK MANDIRI KEBONSIRIH (PERSERO)</b></p>
                    <p><b>JAKARTA KEBONSIRIH BRANCH</b></p>
                    <p><b>JL. TANAH ABANG TIMUR NO.1-2, JAKARTA PUSAT INDONESIA</b></p>
                    <p><b>A/C NO : 121.008.3000.319</b></p>
                    <p><b>SWIFT CODE : BMRIIDJA</b></p>
                </td>
                <td style="border: none !important;">
                    <p><b>Beneficary name :</b></p>
                    <p><b>PT TANAMAS INDUSTRY COMUNITAS</b></p>
                    <p><b>JAKARTA KEBONSIRIH BRANCH</b></p>
                    <p><b>JL. Tomang Ancak Raya 10 - 12</b></p>
                    <p><b>Jakarta 11430 - INDONESIA</b></p>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>
