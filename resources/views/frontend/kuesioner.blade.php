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
           @if (session()->has('message'))
               {!! Toastr::message() !!}
           @endif
           <h6 class="text-primary text-uppercase font-weight-bold mt-3">Kuesioner Singkat</h6>
           {{-- <h2 class="mb-1">Kuesioner :</h2> --}}
           <div class="card-body">
               <div class="row d-flex justify-content-between">
                   <div class="d-flex">
                       <h5>Apakah anda bersedia mengisi kuesioner singkat ini, Seberapa Puas Anda dengan Kinerja Kami!!</h5>
                   </div>
               </div>
               <!-- Add class 'active' to progress -->
               <div class="row d-flex justify-content-center">
                   <div class="col-12">
                       @if ($errors->any())
                           <div class="alert alert-danger alert-dismissible show fade">
                               <div class="alert-body">
                                   <button class="close" data-dismiss="alert">
                                       <span>&times;</span>
                                   </button>
                                   <ul>
                                       @foreach ($errors->all() as $error)
                                           <li>{{ $error }}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           </div>
                       @endif

                       <form action="{{ route('store.kuesioner') }}" method="POST">
                           @csrf
                           <table>
                               <tr>
                                   <td>1. Secara keseluruhan, saya puas dengan kemudahan penggunaan sistem ini.</td>
                               </tr>
                               <tr>
                                   <td><select name="p1" id="p1" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p1') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p1') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p1') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p1') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p1') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p1') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p1') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>2. Sistem ini sederhana untuk digunakan..</td>
                               </tr>
                               <tr>
                                   <td><select name="p2" id="p2" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p2') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p2') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p2') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p2') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p2') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p2') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p2') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>3. Saya bisa menyelesaikan tugas dan skenario dengan cepat menggunakan sistem ini..
                                   </td>
                               </tr>
                               <tr>
                                   <td><select name="p3" id="p3" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p3') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p3') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p3') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p3') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p3') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p3') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p3') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>4. Saya merasa nyaman menggunakan sistem ini..</td>
                               </tr>
                               <tr>
                                   <td><select name="p4" id="p4" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p4') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p4') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p4') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p4') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p4') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p4') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p4') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>5. Penggunaan sistem ini mudah untuk dipelajari..</td>
                               </tr>
                               <tr>
                                   <td><select name="p5" id="p5" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p5') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p5') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p5') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p5') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p5') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p5') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p5') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>6. Saya yakin saya bisa cepat produktif menggunakan sistem ini..</td>
                               </tr>
                               <tr>
                                   <td><select name="p6" id="p6" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p6') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p6') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p6') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p6') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p6') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p6') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p6') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>7. Sistem ini memberikan pesan kesalahan yang jelas yang memberitahu saya untuk
                                       memperbaiki masalah.</td>
                               </tr>
                               <tr>
                                   <td><select name="p7" id="p7" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p7') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p7') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p7') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p7') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p7') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p7') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p7') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>8. Tiap kali saya melakukan kesalahan saat menggunakan sistem, saya bisa mengatasinya
                                       dengan mudah dan cepat.</td>
                               </tr>
                               <tr>
                                   <td><select name="p8" id="p8" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p8') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p8') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p8') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p8') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p8') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p8') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p8') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>9. Informasi (seperti bantuan online, pesan dilayar, serta dokumentasi lainnya)
                                       disediakan dengan jelas oleh sistem ini.</td>
                               </tr>
                               <tr>
                                   <td><select name="p9" id="p9" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p9') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p9') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p9') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p9') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p9') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p9') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p9') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>10. Saya merasa mudah untuk menemukan informasi yang saya butuhkan.</td>
                               </tr>
                               <tr>
                                   <td><select name="p10" id="p10" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p10') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p10') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p10') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p10') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p10') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p10') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p10') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>11. Informasi yang ada efektif dalam membantu saya menyelesaikan tugas dan skenario.
                                   </td>
                               </tr>
                               <tr>
                                   <td><select name="p11" id="p11" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p11') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p11') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p11') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p11') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p11') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p11') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p11') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>12. Susunan informasi dilayar sistem terlihat dengan jelas.</td>
                               </tr>
                               <tr>
                                   <td><select name="p12" id="p12" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p12') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p12') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p12') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p12') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p12') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p12') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p12') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>13. Tampilan antarmuka dari sistem ini enak dipandang.</td>
                               </tr>
                               <tr>
                                   <td><select name="p13" id="p13" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p13') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p13') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p13') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p13') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p13') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p13') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p13') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>14. Saya suka menggunakan tampilan antarmuka dari sistem ini.</td>
                               </tr>
                               <tr>
                                   <td><select name="p14" id="p14" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p14') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p14') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p14') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p14') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p14') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p14') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p14') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>15. Sistem ini memiliki semua fungsi dan kemampuan yang saya harapkan.</td>
                               </tr>
                               <tr>
                                   <td><select name="p15" id="p15" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p15') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p15') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p15') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p15') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p15') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p15') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p15') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>16. Secara keseluruhan, saya puas dengan sistem ini.</td>
                               </tr>
                               <tr>
                                   <td><select name="p16" id="p16" class="form-control">
                                           <option value="" selected disabled>-- Silahkan Pilih Tingkat Kepuasan Anda
                                               --
                                           </option>
                                           <option value="1" @selected(old('p16') == 1)>Sangat Memuaskan</option>
                                           <option value="2" @selected(old('p16') == 2)>Memuaskan</option>
                                           <option value="3" @selected(old('p16') == 3)>Sangat Setuju</option>
                                           <option value="4" @selected(old('p16') == 4)>Setuju</option>
                                           <option value="5" @selected(old('p16') == 5)>Cukup</option>
                                           <option value="6" @selected(old('p16') == 6)>Kurang</option>
                                           <option value="7" @selected(old('p16') == 7)>Sangat Kurang</option>
                                       </select>
                                   </td>
                               </tr>
                               <tr>
                                   <td>Saran dan kritikan untuk perbaikan bagi kami.</td>
                               </tr>
                               <tr>
                                   <td>
                                       <textarea name="saran" id="saran" class="form-control"></textarea>
                                   </td>
                               </tr>
                           </table>
                           <button type="submit" class="btn btn-primary">Submit</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <!-- Quote Request Start -->
   @endsection
