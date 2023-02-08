@push('script-alt')
    <script>
        //button create post event
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();
                
                swal({
                        title: "Apakah anda yakin?",
                        text: "Akan Menon-Aktfikan Data Tarif Pengiriman ini!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'rates/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        } else {
                            swal("Batal!", "Data Kamu Masih Aktif!", "error");

                        }
                    });
            });

        });
    </script>
    <script>
        //button create post event
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btnUnDelete').click(function(e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();
                
                swal({
                        title: "Apakah anda yakin?",
                        text: "Akan Meng-Aktfikan Data Tarif Pengiriman ini!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'rates/' + deleteid,
                                data: data,
                                success: function(response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        } else {
                            swal("Batal!", "Data Kamu Masih Aktif!", "error");

                        }
                    });
            });

        });
    </script>
@endpush