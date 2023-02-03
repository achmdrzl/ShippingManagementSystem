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
<form action="{{ route('employee.store') }}" method="POST">
    @csrf
    <div class="card-header">
        <h4>Tambah Data Karyawan</h4>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Bayu Aries"
                    value="{{ old('name') }}">
            </div>
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
                    value="{{ old('email') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" name="confirm-password" class="form-control" id="inputPassword4"
                    placeholder="Confirm Password">
            </div>
            <input type="hidden" id="mac_address" name="mac_address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City Location</label>
                <input type="text" name="city" class="form-control" id="inputCity" value="{{ old('city') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Role Employee</label>
                <select class="form-control" name="role" id="role">
                    <option value="">-- Select Role Karyawan --</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->name }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group col-md-6">
                <div> {!! htmlFormSnippet() !!} </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
</form>


@push('script-alt')
    <script>
        window.addEventListener("load", function() {
            // Get the MAC address using the network information API
            if (navigator.network.connection.type == Connection.NONE) {
                // Set the MAC address to "undefined" if there is no connection
                document.getElementById("mac_address").value = "null";
            } else {
                // Get the MAC address from the network information API
                var macAddress = navigator.network.connection.mac;
                document.getElementById("mac_address").value = macAddress;
            }
        });
    </script>
@endpush
