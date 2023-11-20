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
            padding: 40px;
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

    {{-- <div class="header">
        <div>
            <img src="{{ public_path('web/assets/images/logo.png') }}" alt="logo" style="width: 80px" />
        </div>
        <div style="text-align: center;">
            <h3 style="font-family: 'Times New Roman', Times, serif">
                PT. TANAMAS INDUSTRY COMUNITAS
            </h3>
            <p>Tomang Ancak Raya 10 - 12</p>
            <p>Jakarta 11430</p>
            <p>INDONESIA</p>
        </div>
    </div> --}}

    <table>
        <thead>
            <tr>
                <td colspan="8" class="title">
                    <h3>COMMERCIAL INVOICE</h3>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="3" rowspan="2" class="align-top">
                    <p><b>Vendor (Name and Address)</b></p>
                    <p>PT. Tanamas Industry Comunitas</p>
                    <p>Jl. Tomang Ancak Raya 10 - 12</p>
                    <p>Jakarta - Indonesia</p>
                    <br />
                    <p><b>Manufacture (Name and Address)</b></p>
                    <p>PT. Tanamas Industry Comunitas</p>
                    <p>Jl. Nyi Gede Cangkring No 10, Kaliwulu</p>
                    <p>Cirebon 45154, West Java, Indonesia</p>
                </td>
                <td colspan="5" class="align-top">
                    <p><b>Consignee (Name and Address)</b></p>
                    <p>TJX UK</p>
                    <p>73 Claredon Road Watford</p>
                    <p>Herts WD17 1TX United Kingdom</p>
                    <p>Tel: +44 (0) 1923473845</p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p><b>Bill To :</b></p>
                    <p>TJX UK</p>
                    <p>PO Box 2283, 73 Clarendon Road</p>
                    <p>Watford Herts WD18 1JL</p>
                    <p>United Kingdom</p>
                </td>
            </tr>

            <tr class="">
                <td class="center align-top">
                    <p>Style No.</p>
                </td>
                <td class="center align-top">
                    <p>Units Pcs</p>
                </td>
                <td colspan="2" width="60%" class="center">
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
                    <p>TI4038</p>
                </td>
                <td class="center align-top padding-top">
                    <p>30 Pcs</p>
                </td>
                <td colspan="2" width="60%" class="padding-top">
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>29.00</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>29.00</p>
                </td>
            </tr>

            <tr class="no-border">
                <td class="center align-top padding-top">
                    <p>TI4038</p>
                </td>
                <td class="center align-top padding-top">
                    <p>30 Pcs</p>
                </td>
                <td colspan="2" width="60%" class="padding-top">
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                    <p>Nat Teak</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>29.00</p>
                </td>
                <td class="align-top padding-top left">
                    <p>USD</p>
                </td>
                <td class="align-top padding-top right">
                    <p>29.00</p>
                </td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="4">Total Invoice: $ 0.00</td>
            </tr>

            <tr>
                <td colspan="3">
                    <p>Name : Azan M Tanamas</p>
                    <p>Signature :</p>
                </td>
                <td colspan="5">
                    <p>Dated : October 19, 2023</p>
                    <p>Title : Director</p>
                </td>
            </tr>
        </tbody>
    </table>

    <br />
    <footer>
        <table style="border: none !important">
            <tr style="border: none !important">
                <td style="border: none !important">
                    <p><b>Please transfer to :</b></p>
                    <p><b>PT. BANK MANDIRI KEBONSIRIH (PERSERO)</b></p>
                    <p><b>JAKARTA KEBONSIRIH BRANCH</b></p>
                    <p>
                        <b>JL. TANAH ABANG TIMUR NO.1-2, JAKARTA PUSAT
                            INDONESIA</b>
                    </p>
                    <p><b>A/C NO : 121.008.3000.319</b></p>
                    <p><b>SWIFT CODE : BMRIIDJA</b></p>
                </td>
                <td style="border: none !important">
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
