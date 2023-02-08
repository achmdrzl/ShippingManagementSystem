<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Rates;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


class DataTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        $rates = Rates::all();
        $transaction = Transaction::with(['customer', 'kota'])->whereNot('status_del', 'arrived')->get();

        return view(
            'backend.dataTransaksi.index',
            [
                'name' => 'Data Transaksi | Page',
                'customer' => $customer,
                'rates' => $rates,
                'data' => $transaction
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'kota_id' => 'required',
            'berat' => 'required',
            'tgl_transaksi' => 'required',
            'namePenerima' => 'required',
            'contactPenerima' => 'required',
        ]);

        // Get Kota
        $kota = Rates::find($request->kota_id);

        $input = $request->all();
        $codes = 'DENLOG';
        $input['kode_tracking'] = ($codes . strtoupper(Str::random(6)));

        // Kalkulasi Berat
        $input['total'] = ($request->berat / ($kota->berat / 1000)) * $kota->harga;

        $rates = Transaction::create($input);

        Toastr::success('Transaksi Berhasil di Tambahkan!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('transaction.index')->with([
            'message' => 'Customer Created Successfully',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with(['kota', 'customer'])->where('id', $id)->first();

        return view(
            'backend.dataTransaksi.show',
            [
                'name' => 'Detail Data Transaksi | Page',
                'data' => $transaction
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->update(['status_pay' => 'paid']);
        Toastr::success('Pembayaran Berhasil di Konfirmasi!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->back()->with([
            'message' => 'Customer Created Successfully',
            'type' => 'success',
        ]);
    }

    public function updateDelivery($id)
    {
        date_default_timezone_set("Asia/Jakarta");
        $date = date("Y-m-d H:i:s");
        $data = Transaction::find($id);
        if ($data->status_del == 'packaging') {
            $data->update([
                'status_del' => 'leave',
                'tgl_terkirim' => $date
            ]);
            Toastr::warning('Barang Telah di Kirim Dari Gudang!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);
        } else {
            $data->update([
                'status_del' => 'arrived',
                'tgl_sampai' => $date
            ]);
            Toastr::success('Barang Telah Sampai Di Kota Tujuan!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);
        }

        return redirect()->back()->with([
            'message' => 'Customer Created Successfully',
            'type' => 'success',
        ]);
    }

    public function printBill($id)
    {
        $data = Transaction::with(['kota', 'customer'])->where('id', $id)->first();

        $customPaper = array(0, 0, 720, 1440);
        $pdf = FacadePdf::loadView('backend.dataTransaksi.printBill', compact('data'))->setPaper($customPaper, 'portrait');

        return $pdf->download('INVOICE #' . strtoupper($data->kode_tracking) . '.pdf');
    }
}
