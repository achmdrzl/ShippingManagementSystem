<!-- Modal -->
<div class="modal fade" id="editRates" aria-labelledby="editRatesLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRatesLabel">Edit Data</h5>
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
                <form action="{{ route('rates.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="rates_id" id="id_rates">
                    <div class="card-header">
                        <h4>Edit Data Tarif Pengiriman</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <select class="form-control" name="province_id" id="kota">
                                <option value="">-- Select Provinsi --</option>
                                @foreach ($province as $item)
                                    {{-- <option value="{{ $item->province->id }}" {{ $item->province->id == $item->province_id ? 'selected' : '' }}>{{ ucfirst($item->province->name) }}</option> --}}
                                    <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                @endforeach
                            </select>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Berat</label>
                                <input type="number" name="berat" class="form-control" id="inputBerat"
                                    placeholder="Masukkan Berat dalam Satuan gram" value="{{ old('berat') }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Harga</label>
                                <input type="number" name="harga" class="form-control" id="inputHarga"
                                    placeholder="Masukkan Harga" value="{{ old('harga') }}">
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
        $('.editRatesBtn').click(function(e) {
            e.preventDefault();

            var id_rates = $(this).val();
            $('#id_rates').val(id_rates);

            $.ajax({
                url: `/rates/${id_rates}/edit`,
                type: "GET",
                cache: false,
                success: function(response) {
                    //fill data to form
                    $('#inputId').val(response.data.id);
                    // $('#kota').val(response.data.province.name);
                    // $("#select_id").val().change();
                    $('#inputHarga').val(response.data.harga);
                    $('#inputBerat').val(response.data.berat);
                }
            });
        });
    </script>
@endpush
