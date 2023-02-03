<!-- Modal -->
<div class="modal fade" id="editCustomer" aria-labelledby="editCustomerLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCustomerLabel">Edit Data</h5>
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
                Fill the input by the right answer!
                <form action="{{ route('customer.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="customer_id" id="id_customer">
                    <div class="card-header">
                        <h4>Edit Data Pelanggan</h4>
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
                                <input type="number" name="contact" class="form-control" id="inputContact"
                                    placeholder="Input Contact" value="{{ old('contact') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputAddress4">Address</label>
                                <textarea class="form-control" name="address" id="inputAddress" cols="" rows=""
                                    placeholder="Input Address" value="{{ old('address') }}"></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress4">City</label>
                                <input type="text" name="city" class="form-control" id="inputCity"
                                    placeholder="Input City" value="{{ old('city') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Registration Date</label>
                                <input type="date" name="registered" class="form-control" id="inputDateRegister"
                                    placeholder="Input Registration Date" value="{{ old('registered') }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script-alt')
    <script>
        $('.editCustomerBtn').click(function(e) {
            e.preventDefault();

            var id_customer = $(this).val();
            $('#id_customer').val(id_customer);

            $.ajax({
                url: `/customer/${id_customer}/edit`,
                type: "GET",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#inputId').val(response.data.id);
                    $('#inputName').val(response.data.name);
                    $('#inputContact').val(response.data.contact);
                    $('#inputAddress').val(response.data.address);
                    $('#inputDateRegister').val(response.data.registered);
                    $('#inputCity').val(response.data.city);
                }
            });
        });
    </script>
@endpush
