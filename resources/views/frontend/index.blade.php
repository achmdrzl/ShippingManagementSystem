   @extends('frontend.layouts.main')

   @push('style-alt')
       <style>
           .card {
               z-index: 0;
               background-color: #ECEFF1;
               padding-bottom: 20px;
               margin-top: 30px;
               margin-bottom: 90px;
               border-radius: 10px;
           }

           .top {
               padding-top: 40px;
               padding-left: 13% !important;
               padding-right: 13% !important;
           }

           p {
               font-size: 15px;
           }

           /*Icon progressbar*/
           #progressbar {
               margin-bottom: 30px;
               overflow: hidden;
               color: #b33200;
               padding-left: 0px;
               margin-top: 30px;
           }

           #progressbar li {
               list-style-type: none;
               font-size: 13px;
               width: 25%;
               float: left;
               position: relative;
               font-weight: 400;
           }

           #progressbar .step0:before {
               font-family: FontAwesome;
               content: "\f10c";
               color: #fff;
           }

           #progressbar li:before {
               width: 40px;
               height: 40px;
               line-height: 45px;
               display: block;
               font-size: 20px;
               background: #C5CAE9;
               border-radius: 50%;
               margin: auto;
               padding: 0px;
           }

           /*ProgressBar connectors*/
           #progressbar li:after {
               content: '';
               width: 100%;
               height: 12px;
               background: #C5CAE9;
               position: absolute;
               left: 0;
               top: 16px;
               z-index: -1;
           }

           #progressbar li:last-child:after {
               border-top-right-radius: 10px;
               border-bottom-right-radius: 10px;
               position: absolute;
               left: -50%;
           }

           #progressbar li:nth-child(2):after,
           #progressbar li:nth-child(3):after {
               left: -50%;
           }

           #progressbar li:first-child:after {
               border-top-left-radius: 10px;
               border-bottom-left-radius: 10px;
               position: absolute;
               left: 50%;
           }

           #progressbar li:last-child:after {
               border-top-right-radius: 10px;
               border-bottom-right-radius: 10px;
           }

           #progressbar li:first-child:after {
               border-top-left-radius: 10px;
               border-bottom-left-radius: 10px;
           }

           /*Color number of the step and the connector before it*/
           #progressbar li.active:before,
           #progressbar li.active:after {
               background: #FF4800;
           }

           #progressbar li.active:before {
               font-family: FontAwesome;
               content: "\f00c";
           }

           .icon {
               width: 60px;
               height: 60px;
               margin-right: 15px;
           }

           .icon-content {
               padding-bottom: 20px;
           }

           @media screen and (max-width: 992px) {
               .icon-content {
                   width: 50%;
               }
           }

           table {
               border-collapse: separate;
               border-spacing: 0 8px;
           }
       </style>
   @endpush

   @section('content')
       <!--  Quote Request Start -->

       <div class="container">
           <h6 class="text-primary text-uppercase font-weight-bold mt-3">Tracking Barang Anda</h6>
           <h2 class="mb-1">Hasil Pencarian Anda :</h2>
           <div class="card">
               <div class="row d-flex justify-content-between px-3 top">
                   <div class="d-flex">
                       <h5>ORDER <span class="text-primary font-weight-bold">#{{ $data->kode_tracking }}</span></h5>
                   </div>
                   <div class="d-flex flex-column text-sm-right">
                       <p class="mb-0">Tanggal Transaksi <span>{{ $data->tgl_transaksi }}</span></p>
                   </div>
               </div>
               <!-- Add class 'active' to progress -->
               <div class="row d-flex justify-content-center">
                   <div class="col-12">
                       <ul id="progressbar" class="text-center">
                           @if ($data->status_del == 'packaging')
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                               <li class="step0"></li>
                               <li class="step0"></li>
                           @elseif($data->status_del == 'leave')
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                               <li class="step0"></li>
                           @elseif($data->status_del == 'arrived')
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                               <li class="active step0"></li>
                           @endif
                       </ul>
                   </div>
               </div>
               <div class="row justify-content-between top">
                   <div class="row d-flex icon-content">
                       <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                       <div class="d-flex flex-column">
                           <p class="font-weight-bold">Order<br>Processed</p>
                       </div>
                   </div>
                   <div class="row d-flex icon-content">
                       <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                       <div class="d-flex flex-column">
                           <p class="font-weight-bold">Order<br>Shipped</p>
                       </div>
                   </div>
                   <div class="row d-flex icon-content">
                       <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                       <div class="d-flex flex-column">
                           <p class="font-weight-bold">Order<br>En Route</p>
                       </div>
                   </div>
                   <div class="row d-flex icon-content">
                       <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                       <div class="d-flex flex-column">
                           <p class="font-weight-bold">Order<br>Arrived</p>
                       </div>
                   </div>
               </div>
           </div>
           @if ($kuesioner->ip == null)
               <div class="card-body">
                   <div class="row d-flex justify-content-between">
                       <div class="d-flex">
                           <h5>Apakah anda bersedia mengisi kuesioner singkat ini, Seberapa Puas Anda dengan Kinerja Kami!!
                           </h5>
                       </div>
                   </div>

                   <!-- Add class 'active' to progress -->
                   <div class="row d-flex justify-content-center">
                       <div class="col-12 align-items-center text-center">
                           <a href="{{ route('kuesioner.view') }}">
                               <button type="button" class="btn btn-primary">Isi Kuesioner !</button>
                           </a>
                       </div>
                   </div>
               @else
           @endif
       </div>
       </div>
       {{-- <div class="container my-5">
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
       </div> --}}
       <!-- Quote Request Start -->
   @endsection
