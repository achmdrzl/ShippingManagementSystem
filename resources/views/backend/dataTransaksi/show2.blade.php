@extends('backend.layouts.main')

@section('content')
    <div class="row">
        @if (session()->has('message'))
            {!! Toastr::message() !!}
        @endif
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
                    <div class="mt-2 text-center">
                        @if ($data->status_pay == 'unpaid')
                            <button type="button" class="btn btn-danger updateTransactionBtn mt-2" data-toggle="modal"
                                data-target="#updateTransaction" title="Konfirmasi Pembayaran" value="{{ $data->id }}">
                                <i class="fas fa-dollar-sign"></i> Confirm Bayar
                            </button>
                        @else
                            @if ($data->status_del == 'packaging' || $data->status_del == 'leave')
                                <button type="button"
                                    class="btn btn-{{ $data->status_del == 'packaging' ? 'primary' : 'success' }} updateDeliveryBtn mt-2"
                                    data-toggle="modal" data-target="#updateDelivery" title="Update Status Pengiriman"
                                    value="{{ $data->id }}">
                                    <i class="fas fa-ship"></i> Pengiriman
                                    {{ $data->status_del == 'packaging' ? 'Telah Berangkat' : 'Telah Sampai' }}
                                </button>
                            @endif
                        @endif
                        <a href="{{ route('printBill', $data->id) }}" class="btn btn-warning btn-md mt-2"
                            title="Cetak Resi Pengiriman"><i class="fas fa-book"></i> Cetak Resi Pengiriman</a>
                    </div>
                    <div class="mt-2">
                        <a class="btn btn-secondary btn-action mr-1" href="{{ route('dashboard') }}" data-toggle="tooltip"
                            title="Back"><i class="fas fa-angle-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateTransaction" aria-labelledby="updateTransactionLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTransactionLabel">Konfirmasi Pembayaran?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Kamu Yakin? Pelanggan Ini Telah Melakukan Pemabayaran. Lanjutkan Konfirmasi?
                </div>
                <form action="{{ route('transaction.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateDelivery" aria-labelledby="updateDeliveryLabel" aria-hidden="true"
        data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateDeliveryLabel">Perbaharui Data Pengiriman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Kamu Yakin? Akan Memperbaharui Status Pengiriman Barang Ini. Lanjutkan Konfirmasi?
                </div>
                <form action="{{ route('transaction.updateDel', $data->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="transaction_id" id="transaction_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
    <script>
        $('.updateDeliveryBtn').click(function(e) {
            e.preventDefault();

            var transaction_id = $(this).val();
            $('#transaction_id').val(transaction_id);
        })

        $('.updateTransactionBtn').click(function(e) {
            e.preventDefault();

            var transaction_id = $(this).val();
            $('#transaction_id').val(transaction_id);
        })
    </script>
@endpush
