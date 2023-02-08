<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Rates;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DataTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rates::all();
        return view('backend.dataTarif.index', 
        [
            'name' => 'Data Tarif Pengiriman | Page',
            'rates' => $rates
        ]);
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
            'kota' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);

        $input = $request->all();

        $rates = Rates::create($input);

        Toastr::success('Data Tarif Berhasil di Tambahkan!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('rates.index')->with([
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rates = Rates::find($id);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Tarif Pengiriman',
            'data'    => $rates,
        ]);
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
        $this->validate($request, [
            'kota' => 'required',
            'berat' => 'required',
            'harga' => 'required',
        ]);

        $input = $request->all();

        $rates = Rates::find($request->rates_id);
        $rates->update($input);

        Toastr::success('Data Tarif Berhasil di Perbaharui!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('rates.index')->with([
            'message' => 'Customer Created Successfully',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rates, $id)
    {
        $rates = Rates::find($id);
        if ($rates->status == 'unactive') {
            $rates->update([
                'status' => 'active'
            ]);
            return response()->json(['status' => 'Data Tarif di Aktifkan!']);
        } else {
            $rates->update([
                'status' => 'unactive'
            ]);
            return response()->json(['status' => 'Data Tarif di Non-Aktifkan!']);
        }

    }
}
