<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('backend.dataPelanggan.index', [
            'name' => 'Data Pelanggan | Page',
            'customer' => $customer
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
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'name' => 'required',
            'city' => 'required',
            'registered' => 'required',
        ]);

        $input = $request->all();

        $customer = Customer::create($input);

        Toastr::success('Pelanggan Berhasil di Tambahkan!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('customer.index')->with([
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
        $customer = Customer::find($id);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Karyawan',
            'data'    => $customer,
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
        $check = $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'name' => 'required',
            'city' => 'required',
            'registered' => 'required',
        ]);

        if ($check == true) {
            $input = $request->all();
            $customer = Customer::find($request->customer_id);
            $customer->update($input);

            Toastr::success('Pelanggan Berhasil di Perbaharui!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

            return redirect()->route('customer.index')->with([
                'message' => 'User Updated Successfully',
                'type' => 'success',
            ]);
        }

        Toastr::error('Pelanggan Gagal di Perbaharui!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('customer.index')->with([
            'message' => 'User Updated Successfully',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();

        return response()->json(['status' => 'Pelanggan Berhasil di Hapus!']);
    }
}
