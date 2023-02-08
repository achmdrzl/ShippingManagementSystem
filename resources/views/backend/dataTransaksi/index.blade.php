@extends('backend.layouts.main')

@section('content')
    <div class="row">
        @if (session()->has('message'))
            {!! Toastr::message() !!}
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Transaksi Pengiriman</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Tambah-tab3" data-toggle="tab" href="#Tambah3" role="tab"
                                aria-controls="Tambah" aria-selected="false">Add Data</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="">
                                <table class="table table-striped table-bordered" id="table-1" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Nama Pengirim</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Total</th>
                                            <th>Status Pengiriman</th>
                                            <th>Status Pembayaran</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td><div class="badge badge-dark">{{ $loop->iteration }}</div></td>
                                                <td>{{ $item->kode_tracking }}</td>
                                                <td>{{ ucfirst($item->customer->name) }}</td>
                                                <td>{{ $item->tgl_transaksi }}</td>
                                                <td>Rp. {{ number_format($item->total) }}</td>
                                                <td>
                                                    @if ($item->status_del == 'packaging')
                                                        <div class="badge badge-info">{{ ucfirst($item->status_del) }}</div>
                                                    @elseif($item->status_del == 'leave')
                                                        <div class="badge badge-warning">{{ ucfirst($item->status_del) }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-success">{{ ucfirst($item->status_del) }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status_pay == 'unpaid')
                                                        <div class="badge badge-danger">{{ ucfirst($item->status_pay) }}
                                                        </div>
                                                    @elseif($item->status_pay == 'waiting')
                                                        <div class="badge badge-warning">{{ ucfirst($item->status_pay) }}
                                                        </div>
                                                    @else
                                                        <div class="badge badge-success">{{ ucfirst($item->status_pay) }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-action mr-1"
                                                        href="{{ route('transaction.show', $item->id) }}"><i
                                                            class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Tambah3" role="tabpanel" aria-labelledby="Tambah-tab3">
                            @include('backend.dataTransaksi.create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
