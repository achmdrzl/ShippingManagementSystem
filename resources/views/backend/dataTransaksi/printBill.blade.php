<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice #{{ strtoupper($data->kode_tracking) }}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 25px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box table tr.totals td:nth-child(2) {
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            @php
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            @endphp
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {!! $generator->getBarcode($data->kode_tracking, $generator::TYPE_CODE_128) !!}
                                {!! $generator->getBarcode($data->kode_tracking, $generator::TYPE_CODE_128) !!}
                                <div>
                                    No Pesanan : <strong>#{{ strtoupper($data->kode_tracking) }}</strong><br>
                                    {{ $data->tgl_transaksi }}<br>
                                </div>
                            </td>
                            <td>
                                <div style="margin-left:-20px">
                                    <img src="https://ik.imagekit.io/dxofqajmq/Tugas_Akhir/Group_355__1__P4PycX26V.png?ik-sdk-version=javascript-1.4.3&updatedAt=1675716069096"
                                        width="80px" style="margin-left: -20px">
                                </div>
                                <div style="font-size: 15px; font-weight:bold">CV. Den Logistic<br>Surabaya</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>PENERIMA</strong><br>
                                {{ ucfirst($data->namePenerima) }}<br>
                                {{ $data->contactPenerima }}<br>
                                {{ $data->alamatPenerima }}
                            </td>

                            <td>
                                <strong>PENGIRIM</strong><br>
                                {{ ucfirst($data->customer->name) }}<br>
                                0{{ $data->customer->contact }}<br>
                                {{ $data->customer->address }}<br>
                                {{ ucfirst($data->customer->city) }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Berat Barang</td>
                <td>Total Harga</td>
            </tr>

            <tr class="item">
                <td>
                    <strong>{{ $data->berat }} kg</strong>
                </td>
                <td>Rp. {{ number_format($data->total) }}</td>
            </tr>

            <tr class="total">
                <td></td>
                <td>
                </td>
            </tr>
            <tr>
                <td><strong>Detail Pembayaran</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>Metode Pembayaran : <strong>{{ strtoupper($data->status_pay) }}</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Transaksi: {{ $data->tgl_transaksi }}</td>
                <td></td>
            </tr>
        </table>

    </div>
</body>

</html>
