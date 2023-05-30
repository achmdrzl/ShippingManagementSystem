<?php

namespace App\Http\Controllers\External;

use App\Http\Controllers\Controller;
use App\Models\Kuesioner;
use App\Models\Transaction;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.layouts.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
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
            'keyword' => 'required',
        ]);

        $input = $request->input('keyword');

        // Get Data Meja
        $session = session()->put('kode_tracking', $input);

        $kuesioner = Kuesioner::where('kode_tracking', $input)->first();
        
        $data = Transaction::where('kode_tracking', $input)->first();

        return view('frontend.index', compact('data', 'kuesioner'));
    }

    public function storeKuesioner(Request $request)
    {
        $this->validate($request, [
            'p1' => 'required',
            'p2' => 'required',
            'p3' => 'required',
            'p4' => 'required',
            'p5' => 'required',
            'p6' => 'required',
            'p7' => 'required',
            'p8' => 'required',
            'p9' => 'required',
            'p10' => 'required',
            'p11' => 'required',
            'p12' => 'required',
            'p13' => 'required',
            'p14' => 'required',
            'p15' => 'required',
            'p16' => 'required',
            'saran' => 'required',
        ], [
            'p1.required' => 'Pertanyaan Pertama Wajib di Isi!',
            'p2.required' => 'Pertanyaan Ke-dua Wajib di Isi!',
            'p3.required' => 'Pertanyaan Ke-tiga Wajib di Isi!',
            'p4.required' => 'Pertanyaan Ke-empat Wajib di Isi!',
            'p5.required' => 'Pertanyaan Ke-lima Wajib di Isi!',
            'p6.required' => 'Pertanyaan Ke-enam Wajib di Isi!',
            'p7.required' => 'Pertanyaan Ke-tujuh Wajib di Isi!',
            'p8.required' => 'Pertanyaan Ke-delapan Wajib di Isi!',
            'p9.required' => 'Pertanyaan Ke-sembilan Wajib di Isi!',
            'p10.required' => 'Pertanyaan Ke-sepuluh Wajib di Isi!',
            'p11.required' => 'Pertanyaan Ke-sebelas Wajib di Isi!',
            'p12.required' => 'Pertanyaan Ke-duabelas Wajib di Isi!',
            'p13.required' => 'Pertanyaan Ke-tigabelas Wajib di Isi!',
            'p14.required' => 'Pertanyaan Ke-empatbelas Wajib di Isi!',
            'p15.required' => 'Pertanyaan Ke-limabelas Wajib di Isi!',
            'p16.required' => 'Pertanyaan Ke-enambelas Wajib di Isi!',
            'saran.required' => 'Saran Wajib di Isi!',
        ]);

        $kode_tracking = request()->session()->get('kode_tracking');

        Kuesioner::where('kode_tracking', $kode_tracking)->update([
            'p1' => $request->p1,
            'p2' => $request->p2,
            'p3' => $request->p3,
            'p4' => $request->p4,
            'p5' => $request->p5,
            'p6' => $request->p6,
            'p7' => $request->p7,
            'p8' => $request->p8,
            'p9' => $request->p9,
            'p10' => $request->p10,
            'p11' => $request->p11,
            'p12' => $request->p12,
            'p13' => $request->p13,
            'p14' => $request->p14,
            'p15' => $request->p15,
            'p16' => $request->p16,
            'saran' => $request->saran,
            'ip' => $request->ip(),
        ]);

        Toastr::success('Terima kasih telah mengisi kuesioner!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-full-width",]);

        return redirect()->route('front.index')->with([
            'message' => 'Terima kasih telah mengisi kuesioner',
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
