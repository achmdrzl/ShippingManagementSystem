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
<form action="{{ route('customer.store') }}" method="POST">
    @csrf
    <div class="card-header">
        <h4>Tambah Data Pelanggan</h4>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName"
                    placeholder="Input Name Customer" value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Contact</label>
                <input type="number" name="contact" class="form-control" id="inputcontact4" placeholder="Input Contact"
                    value="{{ old('contact') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="inputAddress4">Address</label>
                <textarea class="form-control" name="address" id="address" cols="" rows="" placeholder="Input Address" value="{{ old('address') }}"></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress4">City</label>
                <input type="text" name="city" class="form-control" id="inputCity4" placeholder="Input City" value="{{ old('city') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Registration Date</label>
                <input type="date" name="registered" class="form-control" id="inputDateRegister"
                    placeholder="Input Registration Date" value="{{ old('registered') }}">
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
</form>
