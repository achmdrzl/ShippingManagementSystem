@extends('backend.layouts.main')

@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        @if (Auth::user()->HasRole('superadmin'))
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            {{ $customer }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Transaksi Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            @if ($delThisDay === null)
                                0
                            @else
                                {{ $delThisDay->total }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengiriman Sampai Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            @if ($delFinishDay === null)
                                0
                            @else
                                {{ $delFinishDay->total }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Revenue Keseluruhan</h4>
                        </div>
                        <div class="card-body">
                            Rp. {{ number_format($grandTotal) }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (Auth::user()->HasRole('admin'))
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Transaksi Pengiriman</h4>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="home3" role="tabpanel"
                                aria-labelledby="home-tab3">
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
                                                    <td>
                                                        <div class="badge badge-dark">{{ $loop->iteration }}</div>
                                                    </td>
                                                    <td>{{ $item->kode_tracking }}</td>
                                                    <td>{{ ucfirst($item->customer->name) }}</td>
                                                    <td>{{ $item->tgl_transaksi }}</td>
                                                    <td>Rp. {{ number_format($item->total) }}</td>
                                                    <td>
                                                        @if ($item->status_del == 'packaging')
                                                            <div class="badge badge-info">{{ ucfirst($item->status_del) }}
                                                            </div>
                                                        @elseif($item->status_del == 'leave')
                                                            <div class="badge badge-warning">
                                                                {{ ucfirst($item->status_del) }}
                                                            </div>
                                                        @else
                                                            <div class="badge badge-success">
                                                                {{ ucfirst($item->status_del) }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status_pay == 'unpaid')
                                                            <div class="badge badge-danger">
                                                                {{ ucfirst($item->status_pay) }}
                                                            </div>
                                                        @elseif($item->status_pay == 'waiting')
                                                            <div class="badge badge-warning">
                                                                {{ ucfirst($item->status_pay) }}
                                                            </div>
                                                        @else
                                                            <div class="badge badge-success">
                                                                {{ ucfirst($item->status_pay) }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-action mr-1"
                                                            href="{{ route('admTsk.show', $item->id) }}"><i
                                                                class="fas fa-eye"></i></a>
                                                    </td>
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
        @endif
    </div>
@endsection
