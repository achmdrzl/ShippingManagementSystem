@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Rekapitulasi Harian</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-print"></i> Cetak Laporan
                    </button>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="">
                                <table class="table table-striped table-bordered" id="table-1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Hari/Tanggal</th>
                                            <th>Total Transaksi</th>
                                            <th>Total Pendapatan Harian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tgl_transaksi }}</td>
                                                <td>
                                                    <div class="badge badge-dark">{{ $item->totalPengiriman }}</div>
                                                </td>
                                                <td>Rp. {{ number_format($item->totalPendapatan) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Content Start to End Report --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Periode Waktu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    <form action="{{ route('set.time.period') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputStartDate">Tanggal Mulai</label>
                                <input type="date" name="startDate" class="form-control" id="inputStartDate"
                                    placeholder="Bayu Aries" value="{{ old('startDate') }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEndDate">Tanggal Akhir</label>
                                <input type="date" name="endDate" class="form-control" id="inputEndDate"
                                    value="{{ old('endDate') }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputCity">Kategori Status Pembayaran</label>
                                <select class="form-control" name="statusBayar" id="inputRole" value="{{ old('sBayar') }}">
                                    <option value="#" selected disabled>-- Pilih Status Pembayaran --</option>
                                    <option value="paid">Sudah Bayar</option>
                                    <option value="unpaid">Belum Bayar</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputCity">Kategori Status Pengiriman</label>
                                <select class="form-control" name="statusKirim" id="inputRole" value="{{ old('sKirim') }}">
                                    <option value="#" selected disabled>-- Pilih Status Pengiriman --</option>
                                    <option value="packaging">Masih di Kemas</option>
                                    <option value="leave">Sudah Terkirim</option>
                                    <option value="arrived">Sudah Sampai</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div>
                            <p style="font-style: italic">Note: jika ingin mencetak semua data, pilihan kategori status tidak perlu di isi. Cukup mengisikan periode waktunya saja.</p>
                        </div> --}}
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="update">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- End Modal --}}
@endsection
