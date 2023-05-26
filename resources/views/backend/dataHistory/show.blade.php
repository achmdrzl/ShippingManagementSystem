@extends('backend.layouts.main')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Data Transaksi Pengiriman</h4>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <tr>
                                        <th>Kode Tracking</th>
                                        <th colspan="6">{{ $data->kode_tracking }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Pengirim</th>
                                        <th colspan="6">{{ ucfirst($data->customer->name) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Kota Tujuan</th>
                                        <th colspan="6">{{ ucfirst($data->kota->province->name) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Berat Barang</th>
                                        <td colspan="6">{{ $data->berat }} kg</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td colspan="6">{{ ucfirst($data->namePenerima) }}</th>
                                    </tr>
                                    <tr>
                                        <th>Contact Penerima</th>
                                        <td colspan="6">{{ $data->contactPenerima }}</th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Transaksi</th>
                                        <td colspan="6">{{ $data->tgl_transaksi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status Pengiriman</th>
                                        <td colspan="6">
                                            @if ($data->status_del == 'packaging')
                                                <div class="badge badge-info">{{ ucfirst($data->status_del) }}</div>
                                            @elseif($data->status_del == 'leave')
                                                <div class="badge badge-warning">{{ ucfirst($data->status_del) }}
                                                </div>
                                            @else
                                                <div class="badge badge-success">{{ ucfirst($data->status_del) }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status Pembayaran</th>
                                        <td colspan="6">
                                            @if ($data->status_pay == 'unpaid')
                                                <div class="badge badge-danger">{{ ucfirst($data->status_pay) }}
                                                </div>
                                            @elseif($data->status_pay == 'waiting')
                                                <div class="badge badge-warning">{{ ucfirst($data->status_pay) }}
                                                </div>
                                            @else
                                                <div class="badge badge-success">{{ ucfirst($data->status_pay) }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Biaya</th>
                                        <td colspan="6">Rp. {{ number_format($data->total) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-secondary btn-action mr-1" href="{{ route('history.index') }}"
                            data-toggle="tooltip" title="Back"><i class="fas fa-angle-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
