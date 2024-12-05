<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="text-align: right;">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahUser">
                Tambah User
            </button>
        </div>
    </div>

    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pimpinan Engineer</h6>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mylead" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Status Akun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_lead">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User E-Job Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NIP</th>
                            <th>Plant</th>
                            <th>Depart</th>
                            <th>Jabatan</th>
                            <th>Status Akun</th>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahUserLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahUser">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">No. Whatsapp</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="5">Plant Head Instalasi</option>
                            <option value="6">Dept. Head Instalasi</option>
                            <option value="7">Admin Instalasi</option>
                            <option value="8">Factory Head Instalasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Akun</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog" aria-labelledby="modalEditUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditUserLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditUser">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="form-group">
                        <label for="edit_nama">Nama</label>
                        <input type="text" class="form-control" id="edit_nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_nik">Nomor Induk Pegawai</label>
                        <input type="text" class="form-control" id="edit_nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_plant">Plant</label>
                        <input type="text" class="form-control" id="edit_plant" name="plant" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_depart">Departemen</label>
                        <input type="text" class="form-control" id="edit_depart" name="depart" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="edit_jabatan" name="jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status Akun</label>
                        <select class="form-control" id="edit_status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        tampillead();
        $('#mydata').dataTable();
        $('#mylead').dataTable();

        // Function to show data
        function tampillead() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('master/tampillead') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        // Initialize an empty variable to store the role name
                        var roleName = '';
                        // Check the value of role_id
                        if (data[i].role_id == 1) {
                            // If role_id is 1, set roleName to "admin"
                            roleName = 'Super Admin';
                        } else if (data[i].role_id == 2) {
                            roleName = 'User';
                        } else if (data[i].role_id == 3) {
                            roleName = 'Dept. Head';
                        } else if (data[i].role_id == 4) {
                            roleName = 'Plant Head';
                        } else if (data[i].role_id == 5) {
                            roleName = 'Instalasi Plant Head';
                        } else if (data[i].role_id == 6) {
                            roleName = 'Instalasi Dept. Head';
                        } else if (data[i].role_id == 7) {
                            roleName = 'User Instalasi';
                        } else if (data[i].role_id == 8) {
                            roleName = 'Instalasi Factory Head';
                        } else {
                            // If role_id is neither 1 nor 2, set roleName to the actual value of role_id
                            roleName = data[i].role_id;
                        }

                        var status = '';
                        if (data[i].is_active == 0) {
                            status = 'Tidak Aktif';
                        } else if (data[i].is_active == 1) {
                            status = 'Aktif';
                        }
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td>' + data[i].nim + '</td>' +
                            '<td>' + roleName + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_edit" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '"><i class="fas fa-trash-alt"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_lead').html(html);
                }
            });
        }

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('master/tampiluser') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        // Initialize an empty variable to store the role name
                        var roleName = '';
                        // Check the value of role_id
                        if (data[i].role_id == 1) {
                            // If role_id is 1, set roleName to "admin"
                            roleName = 'Super Admin';
                        } else if (data[i].role_id == 2) {
                            roleName = 'User';
                        } else if (data[i].role_id == 3) {
                            roleName = 'Dept. Head';
                        } else if (data[i].role_id == 4) {
                            roleName = 'Plant Head';
                        } else if (data[i].role_id == 5) {
                            roleName = 'Instalasi Plant Head';
                        } else if (data[i].role_id == 6) {
                            roleName = 'Instalasi Dept. Head';
                        } else if (data[i].role_id == 7) {
                            roleName = 'User Instalasi';
                        } else if (data[i].role_id == 8) {
                            roleName = 'Instalasi Factory Head';
                        } else {
                            // If role_id is neither 1 nor 2, set roleName to the actual value of role_id
                            roleName = data[i].role_id;
                        }

                        var status = '';
                        if (data[i].is_active == 0) {
                            status = 'Tidak Aktif';
                        } else if (data[i].is_active == 1) {
                            status = 'Aktif';
                        }
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td>' + data[i].nim + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].departemen + '</td>' +
                            '<td>' + roleName + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_edit" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '"><i class="fas fa-trash-alt"></i></a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#formTambahUser').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('master/tambahuser') ?>",
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response); // Cek response di console browser
                    $('#modalTambahUser').modal('hide');
                    Swal.fire({
                        title: 'Sukses!',
                        text: 'User berhasil ditambahkan.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    tampildata();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Cek error detail di console
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan.',
                        icon: 'error'
                    });
                }
            });
        });

        // Function to handle delete confirmation
        $('#show_lead').on('click', '.item_delete', function() {
            var id = $(this).data('id');

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
                    deleteProduct(id);
                }
            });
        });


        // Function to handle delete confirmation
        $('#show_data').on('click', '.item_delete', function() {
            var id = $(this).data('id');

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
                    deleteProduct(id);
                }
            });
        });

        // Function to handle actual deletion using AJAX
        function deleteProduct(id) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('master/deleteuser') ?>",
                dataType: "JSON",
                data: {
                    id: id
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