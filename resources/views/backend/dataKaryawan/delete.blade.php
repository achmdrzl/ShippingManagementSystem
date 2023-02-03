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

<!-- Modal -->
<div class="modal fade" id="deleteEmployee" aria-labelledby="deleteEmployeeLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployeeLabel">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are You Sure? This action can not be undone. Do you want to continue?
            </div>
            <form action="{{ route('employee.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="employee_id" id="employee_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
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
@endpush
