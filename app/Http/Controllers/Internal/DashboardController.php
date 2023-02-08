<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::with(['customer', 'kota'])->whereNot('status_del', 'arrived')->get();
        $customer = Customer::count();
        $delThisDay =
            Transaction::groupBy('tgl_transaksi')
            ->selectRaw('*, count(total) as total')
            ->orderByRaw('tgl_transaksi DESC')
            ->first();

        $delFinishDay =
            Transaction::groupBy('tgl_transaksi')
            ->selectRaw('*, count(total) as total')
            ->where('status_del', 'arrived')
            ->orderByRaw('tgl_transaksi DESC')
            ->first();

        $grandTotal = Transaction::sum('total');

        return view('backend.dashboard', [
            'name' => 'Dashboard | Page',
            'data' => $transaction,
            'customer' => $customer,
            'delThisDay' => $delThisDay,
            'delFinishDay' => $delFinishDay,
            'grandTotal' => $grandTotal
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
        //
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
        //
    }
}
