<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="text-align: right;">
            <div style="display: inline-block;">
                <a href="javascript:void(0);" class="btn btn-primary" onclick="activateWebcam()" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Plant </a>
            </div>
        </div>
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Plant</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Data Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Plant</label>
                        <div class="col-md-10">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama plant">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_plant_edit" id="id_plant_edit" class="form-control">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nomor Transaksi</label>
                        <div class="col-md-10">
                            <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nomor Transaksi">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_edit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL EDIT-->

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('master/tampildata') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td> Plant ' + data[i].nama + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id_plant="' + data[i].id_plant +
                            '" data-nama="' + data[i].nama + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_plant="' + data[i].id_plant + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#btn_save').click(function() {
            var nama = $('#nama').val();

            if (nama.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Plant Wajib Diisi !'
                });
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('nama', nama);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('master/simpandata') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var jsonResponse = JSON.parse(response);
                            if (jsonResponse.status === "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Simpan Data Berhasil!'
                                });

                                $('[name="nama"]').val("");
                                $('#Modal_Add').modal('hide');

                                tampildata();
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }
                        } catch (e) {
                            console.error('Error parsing server response:', e);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Error parsing server response!!'
                            });
                        }

                        console.log(response);
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }
                });
            }
        });

        // Get data for updating record
        $('#show_data').on('click', '.item_edit', function() {
            // Base URL for images obtained from CodeIgniter base_url() function
            var baseUrl = '<?php echo base_url(); ?>';
            var id_plant = $(this).data('id_plant');
            var nama = $(this).data('nama');

            $('#Modal_Edit').modal('show');
            $('[name="id_plant_edit"]').val(id_plant);
            $('[name="nama_edit"]').val(nama);
        });

        $('#btn_edit').on('click', function() {
            var id_plant = $('#id_plant_edit').val();
            var nama = $('#nama_edit').val();

            var formData = new FormData();
            formData.append('id_plant', id_plant);
            formData.append('nama', nama);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('master/editdata') ?>",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == "success") {
                        Swal.fire({
                            type: 'success',
                            title: 'Berhasil!',
                            text: 'Update Data Berhasil!'
                        });

                        $('[name="nama"]').val("");

                        $('#Modal_Edit').modal('hide');

                        // Reload or update data in your table
                        tampildata();
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Update data Gagal!',
                            text: 'Silahkan coba lagi!'
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops!',
                        text: 'Server error!'
                    });
                }
            });
        });

        // Function to handle delete confirmation
        $('#show_data').on('click', '.item_delete', function() {
            var id_plant = $(this).data('id_plant');

            // SweetAlert confirmation before proceeding with deletion
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform actual deletion after confirmation
                    deleteProduct(id_plant);
                }
            });
        });

        // Function to handle actual deletion using AJAX
        function deleteProduct(id_plant) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('master/delete') ?>",
                dataType: "JSON",
                data: {
                    id_plant: id_plant
                },
                success: function(data) {
                    // Handle success, for example, show success message
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    tampildata();
                },
                error: function(xhr, status, error) {
                    // Handle error, for example, show error message
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unable to delete product.',
                        icon: 'error'
                    });
                }
            });
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

    });
</script>