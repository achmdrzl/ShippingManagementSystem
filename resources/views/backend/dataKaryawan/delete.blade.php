{{-- <script>
    //button create post event
    $('body').on('click', '#btn-delete-employee', function() {

        let employee_id = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/employee/${employee_id}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success: function(response) {

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        //remove post on table
                        $(`#index_${employee_id}`).remove();
                    }
                });
            }
        })

    });
</script> --}}

<!-- Modal Arsipkan-->
<div class="modal fade" id="deleteEmployee{{ $item->status == 'active' ? '' : '1' }}" aria-labelledby="deleteEmployeeLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployeeLabel">
                    {{ $item->status == 'active' ? 'Arsipkan Data' : 'Aktifkan Data' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $item->status == 'active' ? 'Apakah kamu yakin akan mengarsipkan data ini?' : 'Apakah kamu yakin akan menampilkan data ini?' }}
            </div>
            <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="employee_id" id="employee_id{{ $item->status == 'active' ? '' : '1' }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-{{ $item->status == 'active' ? 'danger' : 'success' }}">{{ $item->status == 'active' ? 'Arsipkan Data' : 'Aktifkan Data' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script-alt')
    <script>
        $('.deleteEmployeeBtn').click(function(e) {
            e.preventDefault();

            var employee_id = $(this).val();
            $('#employee_id').val(employee_id);
        })
    </script>

    <script>
        $('.deleteEmployeeBtn1').click(function(e) {
            e.preventDefault();

            var employee_id = $(this).val();
            $('#employee_id1').val(employee_id);
        })
    </script>
@endpush
