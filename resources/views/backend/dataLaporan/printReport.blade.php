<!DOCTYPE html>
<html>

<head>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 12px;
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
        <table style="width: 100%;">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>CV. DEN LOGISTICS</strong><br>
                                Ko Ruko Pengampon Square Blok E No.28<br>
                                Bongkaran, Pabean Cantikan <br>
                                Surabaya City, East Java 60161
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
                                <strong>Rincian Transaksi Pengiriman</strong><br>
                                <strong>Periode Waktu</strong><br>
                                {{ date('d F Y', strtotime($start)) }} s/d {{ date('d F Y', strtotime($end)) }} <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Tanggal Transaksi</td>
                <td>No Pesanan</td>
                <td>Nama Pengirim</td>
                <td>Kota Tujuan</td>
                <td>Berat Barang</td>
                <td>Tgl Terkirim</td>
                <td>Tgl Sampai</td>
                <td width="115px">Total</td>
            </tr>
            @foreach ($data as $row)
                <tr class="item">
                    <td>
                        <strong>{{ $row->tgl_transaksi }}</strong>
                    </td>
                    <td>{{ strtoupper($row->kode_tracking) }}</td>
                    <td>{{ ucfirst($row->customer->name) }}</td>
                    <td>{{ $row->kota->kota }}</td>
                    <td>{{ $row->berat }} kg</td>
                    <td>{{ $sKirim == 'packaging' ? 'Belum di Kirim' : $row->tgl_terkirim }}</td>
                    <td>{{ $sKirim == 'leave' || $sKirim == 'packaging' ? 'Belum Sampai' : $row->tgl_sampai }}</td>
                    <td>Rp. {{ number_format($row->total) }}</td>
                </tr>
            @endforeach

            <tr class="heading">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Rp. {{ number_format($totalAll) }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
