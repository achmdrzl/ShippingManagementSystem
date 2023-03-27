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

<form method="POST" action="{{ route('transaction.store') }}">
    @csrf
    <div class="card-header">
        <h4>Tambah Data Transaksi Pengiriman</h4>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCustomer_id">Pilih Pelanggan</label>
                <select class="form-control" name="customer_id" id="customer_id">
                    <option value="" disabled selected>-- Pilih Pelanggan --</option>
                    @foreach ($customer as $item)
                        <option value="{{ $item->id }}" @selected(old('customer_id') == $item->id)>
                            {{ ucfirst($item->name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputKota_id">Pilih Kota Tujuan</label>
                <select class="form-control" name="kota_id" id="kota_id">
                    <option value="" disabled selected>-- Pilih Kota Tujuan --</option>
                    @foreach ($rates as $item)
                        <option value="{{ $item->id }}" @selected(old('kota_id') == $item->id)>
                            {{ $item->kota }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Berat</label>
                <input type="number" class="form-control" name="berat" id="inputBerat"
                    placeholder="Masukkan Berat Barang" value="{{ old('berat') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Tanggal Transaksi</label>
                <input type="date" class="form-control" name="tgl_transaksi" id="inputTglTf"
                    placeholder="Masukkan Tanggal Transaksi" value="{{ old('tgl_transaksi') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Nama Penerima</label>
                <input type="text" class="form-control" name="namePenerima" id="inputNamaPenerima"
                    placeholder="Masukkan Nama Penerima" value="{{ old('namePenerima') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCPenerima">Contact Penerima</label>
                <input type="number" class="form-control" name="contactPenerima" id="inputCPenerima"
                    placeholder="Masukkan Contact Penerima" value="{{ old('contactPenerima') }}">
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
