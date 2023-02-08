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

<form method="POST" action="{{ route('rates.store') }}">
    @csrf
    <div class="card-header">
        <h4>Tambah Data Tarif Pengiriman</h4>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Kota</label>
                <input type="text" class="form-control" name="kota" id="inputCity" placeholder="Masukkan Kota" 
                value="{{ old('kota') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Berat</label>
                <input type="number" class="form-control" name="berat" id="inputBerat"
                    placeholder="Masukkan Berat dalam Satuan gram" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Harga</label>
            <input type="number" class="form-control" id="inputHarga" name="harga" placeholder="Masukkan Harga"
            value="{{ old('harga') }}">
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>
