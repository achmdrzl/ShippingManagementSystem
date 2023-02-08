<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transactions')
            ->select('*', DB::raw('COUNT(status_pay) as totalPengiriman'), DB::raw('SUM(total) AS totalPendapatan'))
            ->groupBy('tgl_transaksi')
            ->get();

        return view('backend.dataLaporan.index', [
            'name' => 'Report Pengiriman | Page',
            'data' => $data
        ]);
    }

    public function setPeriod(Request $request)
    {
        $this->validate($request, [
            'startDate' => 'required',
            'endDate' => 'required',
            'statusKirim' => 'required',
            'statusBayar' => 'required',
        ]);

        $start = $request->input('startDate');
        $end = $request->input('endDate');
        $sBayar = $request->input('statusBayar');
        $sKirim = $request->input('statusKirim');

        if ($start and $end) {

            if ($sBayar == 'unpaid' && $sKirim == 'packaging') {

                // Rincian Transaksi Pengiriman (di Kemas) & (Belum Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'unpaid')->where('status_del', 'packaging')->get();

                $totalAll = $data->sum('total');
            } elseif ($sBayar == 'unpaid' && $sKirim == 'leave') {

                // Rincian Transaksi Pengiriman (Terkirim) & (Belum Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'unpaid')->where('status_del', 'leave')->get();

                $totalAll = $data->sum('total');
            } elseif ($sBayar == 'unpaid' && $sKirim == 'arrived') {

                // Rincian Transaksi Pengiriman (Telah Sampai) & (Belum Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'unpaid')->where('status_del', 'arrived')->get();

                $totalAll = $data->sum('total');
            }

            if ($sBayar == 'paid' && $sKirim == 'packaging') {

                // Rincian Transaksi Pengiriman (di Kemas) & (Sudah Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'paid')->where('status_del', 'packaging')->get();

                $totalAll = $data->sum('total');

            } elseif ($sBayar == 'paid' && $sKirim == 'leave') {

                // Rincian Transaksi Pengiriman (Terkirim) & (Sudah Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'paid')->where('status_del', 'leave')->get();

                $totalAll = $data->sum('total');

            } elseif ($sBayar == 'paid' && $sKirim == 'arrived') {

                // Rincian Transaksi Pengiriman (Telah Sampai) & (Sudah Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->where('status_pay', 'paid')->where('status_del', 'arrived')->get();

                $totalAll = $data->sum('total');

            } elseif ($sBayar == '' && $sKirim == '') {

                // Rincian Transaksi Pengiriman (Telah Sampai) & (Sudah Bayar)
                $data = Transaction::with(['customer', 'kota'])->whereBetween('tgl_transaksi', [$start, $end])->get();

                $totalAll = $data->sum('total');
            }

        } else {

            $data = Transaction::with(['customer', 'kota'])->get();

            $totalAll = $data->sum('total');
        }

        $customPaper = array(0, 0, 600, 800);
        $pdf = FacadePdf::loadView('backend.dataLaporan.printReport', compact('data', 'totalAll', 'start', 'end', 'sKirim'))->setPaper($customPaper, 'potrait');

        return $pdf->download('REPORT -' . date("Y/m/d") . '.pdf');
    }
}
