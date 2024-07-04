<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fas fa-user-plus"></span> Add New Member </a>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Karyawan Instalasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:7%">#</th>
                            <th style="width:20%">Nama</th>
                            <th style="width:10%">NIK</th>
                            <th style="width:15%">Nomor Handphone</th>
                            <th style="width:10%">Bagian</th>
                            <th style="width:10%">Jabatan</th>
                            <th style="width:10%">Plant</th>
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

<!-- MODAL ADD -->
<form id="addMemberForm">
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Data Karyawan Instalasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIK Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select id="bagian" name="bagian" class="form-control custom-select">
                                <option selected disabled>Pilih Bagian Tugas Karyawan</option>
                                <option value="Elektrik">Elektrik</option>
                                <option value="Mekanik">Mekanik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select id="jabatan" name="jabatan" class="form-control custom-select">
                                <option selected disabled>Pilih Jabatan Fungsi</option>
                                <option value="ADH">Asst. Dept. Head</option>
                                <option value="SH">Section Head</option>
                                <option value="L">Leader</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <select id="plant" name="plant[]" multiple="multiple" class="form-control" required>
                            <?php if (isset($plant)) {
                                foreach ($plant as $plt) : ?>
                                    <option value="<?= $plt['id_plant']; ?>">Plant <?= $plt['nama']; ?></option>
                            <?php endforeach;
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form id="editMemberForm">
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Karyawan Instalasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_edit">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="name" id="name_edit" class="form-control" placeholder="Masukkan Nama Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="nim" id="nim_edit" class="form-control" placeholder="Masukkan NIK Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" name="no_hp" id="no_hp_edit" class="form-control" placeholder="Masukkan No HP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select id="bagian_edit" name="bagian" class="form-control custom-select">
                                <option selected disabled>Pilih Bagian Tugas Karyawan</option>
                                <option value="Elektrik">Elektrik</option>
                                <option value="Mekanik">Mekanik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select id="jabatan_edit" name="jabatan" class="form-control custom-select">
                                <option selected disabled>Pilih Jabatan Fungsi</option>
                                <option value="ADH">Asst. Dept. Head</option>
                                <option value="SH">Section Head</option>
                                <option value="L">Leader</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <select id="plant_edit" name="plant[]" multiple="multiple" class="form-control" required>
                            <?php if (isset($plant)) {
                                foreach ($plant as $plt) : ?>
                                    <option value="<?= $plt['id_plant']; ?>">Plant <?= $plt['nama']; ?></option>
                            <?php endforeach;
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
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

        $('#plant').select2({
            theme: 'bootstrap4',
            placeholder: "Select plants",
            allowClear: true
        });
    });

    // Function to show data
    function tampildata() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('master/tampilmember') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no;
                for (i = 0; i < data.length; i++) {
                    var nomor = i + 1;
                    if (data[i].jabatan == 'ADH') {
                        jabatan = 'Asst. Dept. Head';
                    } else if (data[i].jabatan == 'SH') {
                        jabatan = 'Section Head';
                    } else if (data[i].jabatan == 'L') {
                        jabatan = 'Leader';
                    }
                    html += '<tr>' +
                        '<td>' + nomor + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].nim + '</td>' +
                        '<td>' + data[i].no_hp + '</td>' +
                        '<td>' + data[i].bagian + '</td>' +
                        '<td>' + jabatan + '</td>' +
                        '<td>' + data[i].name_plant + '</td>' +
                        '<td style="text-align:right;">' +
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id + '" ><i class="fas fal fa-edit"></i> Edit</a>' + ' ' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteModal(' + data[i].id + ')"><i class="fas fal fa-trash"></i> Delete</button>' + ' ' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
            }
        });
    }

    $('#btn_save').click(function(event) {
        event.preventDefault();
        var name = $('#name').val();
        var nim = $('#nim').val();
        var password = $('#password').val();
        var bagian = $('#bagian').val();
        var jabatan = $('#jabatan').val();
        var plant = $('#plant').val();
        var email = $('#email').val();

        if (!name) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Nama Wajib Diisi !'
            });
        } else if (!nim) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'NIK Wajib Diisi !'
            });
        } else if (!password) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Password Wajib Diisi !'
            });
        } else if (!bagian) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Bagian Wajib Diisi !'
            });
        } else if (!jabatan) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Jabatan Wajib Diisi !'
            });
        } else if (!plant) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Plant Wajib Diisi !'
            });
        } else if (!email) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Email Wajib Diisi !'
            });
        } else {
            var formData = new FormData();
            formData.append('name', name);
            formData.append('nim', nim);
            formData.append('password', password);
            formData.append('bagian', bagian);
            formData.append('jabatan', jabatan);
            formData.append('plant', plant);
            formData.append('email', email);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('master/tambahmember') ?>",
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

                            $('#name').val("");
                            $('#nim').val("");
                            $('#password').val("");
                            $('#bagian').val("");
                            $('#jabatan').val("");
                            $('#plant').val("");
                            $('#email').val("");
                            $('#Modal_Add').modal('hide');

                            // Refresh the data
                            tampildata();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Simpan data Gagal!',
                                text: 'Silahkan coba lagi!'
                            });
                        }
                    } catch (e) {
                        console.error('Error parsing server response:', e);
                        console.log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oppss!',
                            text: 'Error parsing server response!!'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps!',
                        text: 'Terjadi kesalahan pada server!'
                    });
                }
            });
        }
    });

    function deleteModal(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                formData.append('id', id);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('master/deletemember') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var json = JSON.parse(response)
                        console.log(json);
                        if (json.status == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Delete Data Berhasil!'
                            });
                            // Reload or update data in your table
                            tampildata();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Delete data Gagal!',
                                icon: 'warning',
                                text: 'Silahkan coba lagi!'
                            });
                        }
                    },
                    error: function(response) {
                        swal({
                            type: 'error',
                            title: 'Oops!',
                            icon: 'warning',
                            text: 'Server error!'
                        });
                    }
                });
            }
        });
    }

    // When edit button is clicked
    $('#show_data').on('click', '.item_edit', function() {
        var id = $(this).data('id');

        // Fetch member data by ID
        $.ajax({
            url: '<?php echo site_url('master/getMemberById') ?>',
            method: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $('#editMemberForm #id_edit').val(data.id);
                $('#editMemberForm #name_edit').val(data.name);
                $('#editMemberForm #nim_edit').val(data.nim);
                $('#editMemberForm #no_hp_edit').val(data.no_hp);
                $('#editMemberForm #bagian_edit').val(data.bagian);
                $('#editMemberForm #jabatan_edit').val(data.jabatan);
                $('#editMemberForm #plant_edit').val(data.plant.split(',')); // Assuming plant is stored as a comma-separated string

                $('#Modal_Edit').modal('show');
            }
        });
    });

    $('#btn_update').on('click', function() {
        var id = $('#id_edit').val();
        var name = $('#name_edit').val();
        var nim = $('#nim_edit').val();
        var no_hp = $('#no_hp_edit').val();
        var bagian = $('#bagian_edit').val();
        var jabatan = $('#jabatan_edit').val();
        var plant = $('#plant_edit').val(); // This will be an array

        var formData = new FormData();
        formData.append('id', id);
        formData.append('name', name);
        formData.append('nim', nim);
        formData.append('no_hp', no_hp);
        formData.append('bagian', bagian);
        formData.append('jabatan', jabatan);

        // Serialize plant array
        if (Array.isArray(plant)) {
            plant.forEach(function(value, index) {
                formData.append('plant[]', value);
            });
        } else {
            formData.append('plant[]', plant);
        }

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('master/editMember') ?>",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response === "success") {
                    swal({
                        type: 'success',
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Update Data Berhasil!'
                    });

                    //$('#Modal_Edit').modal('hide');

                    // Reload or update data in your table
                    //tampildata();
                } else {
                    swal({
                        type: 'error',
                        title: 'Update data Gagal!',
                        icon: 'warning',
                        text: 'Silahkan coba lagi!'
                    });
                }
            },
            error: function(response) {
                swal({
                    type: 'error',
                    title: 'Oops!',
                    icon: 'warning',
                    text: 'Server error!'
                });
            }
        });
    });
</script>