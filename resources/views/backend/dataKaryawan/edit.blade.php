<!-- Modal -->
<div class="modal fade" id="editEmployee" aria-labelledby="editEmployeeLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeLabel">Edit Data</h5>
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
                <form action="{{ route('employee.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="employee_id" id="id_employee">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName"
                                placeholder="Bayu Aries" value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="Email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Confirm Password</label>
                            <input type="password" name="confirm-password" class="form-control" id="inputPassword"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City Location</label>
                            <input type="text" name="city" class="form-control" id="inputCity"
                                value="{{ old('city') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputCity">Role Employee</label>
                            <select class="form-control" name="role" id="inputRole">
                                <option value="">-- Select Role Karyawan --</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item->name }}">{{ ucfirst($item->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="update">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script-alt')
    <script>
        $('.editEmployeeBtn').click(function(e) {
            e.preventDefault();

            var id_employee = $(this).val();
            $('#id_employee').val(id_employee);

            $.ajax({
                url: `/employee/${id_employee}/edit`,
                type: "GET",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#inputId').val(response.data.id);
                    $('#inputName').val(response.data.name);
                    $('#inputEmail').val(response.data.email);
                    $('#inputCity').val(response.data.city);
                }
            });
        });
    </script>
@endpush
