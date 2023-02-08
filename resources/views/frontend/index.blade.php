   @extends('frontend.layouts.main')

   @section('content')
       <!--  Quote Request Start -->
       <div class="container my-5">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-12 py-5 py-lg-0">
                       <h6 class="text-primary text-uppercase font-weight-bold mt-3">Tracking Barang Anda</h6>
                       <h2 class="mb-4">Hasil Pencarian Anda :</h2>
                       <table class="table table-striped">
                           <tr>
                               <th>Kode Tracking </th>
                               <td>:</td>
                               <th>{{ $data->kode_tracking }}</th>
                           </tr>
                           <tr>
                               <th>Tanggal Transaksi </th>
                               <td>:</td>
                               <th>{{ date('d F Y', strtotime($data->tgl_transaksi)) }}</th>
                           </tr>
                           <tr>
                               <th>Tanggal Terkirim </th>
                               <td>:</td>
                               @if ($data->tgl_terkirim == null)
                                   <th>-</th>
                               @else
                                   <th>{{ date('d F Y H:i:s', strtotime($data->tgl_terkirim)) }} WIB</th>
                               @endif
                           </tr>
                           <tr>
                               <th>Tanggal Sampai </th>
                               <td>:</td>
                               @if ($data->tgl_sampai == null)
                                   <th>-</th>
                               @else
                                   <th>{{ date('d F Y H:i:s', strtotime($data->tgl_sampai)) }} WIB</th>
                               @endif
                           </tr>
                       </table>
                   </div>
               </div>
           </div>
       </div>
       <!-- Quote Request Start -->
   @endsection
