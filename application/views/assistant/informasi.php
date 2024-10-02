<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fas fa-user-plus"></span> Create Information JO </a>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pekerjaan Informasi Di luar Job Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Informasi</th>
                            <th>Pekerjaan</th>
                            <th>Plant</th>
                            <th>Pelaksana</th>
                            <th>Tanggal</th>
                            <th>Progres</th>
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
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pekerjaan Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Nomor Informasi</label>
                        <input type="text" name="no_info" id="no_info" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pekerjaan</label>
                        <textarea class="form-control" placeholder="Deskripsi Pekerjaan" id="pekerjaan" name="pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Plant</label>
                        <select class="form-control" id="plant" name="plant" aria-label="Default select example" style="font-size: 13px;">
                            <option selected>Select Your Plant</option>
                            <?php foreach ($plants as $plant) : ?>
                                <option value="<?php echo $plant['id_plant']; ?>"><?php echo $plant['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('plant', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pelaksana</label>
                        <select id="pelaksana" name="pelaksana" class="form-control custom-select" value="">
                            <option selected disabled>Select one</option>
                            <option value="Elektrik">Elektrik</option>
                            <option value="Mekanik">Mekanik</option>
                            <option value="Elektrik dan Mekanik">Elektrik dan Mekanik</option>
                            <option value="Support">Support</option>
                        </select>
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
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pekerjaan Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_edit" id="id_edit">
                    <div class="form-group">
                        <label class="col-form-label">Nomor Informasi</label>
                        <input type="text" name="no_info_edit" id="no_info_edit" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pekerjaan</label>
                        <textarea class="form-control" placeholder="Deskripsi Pekerjaan" id="pekerjaan_edit" name="pekerjaan_edit"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Plant</label>
                        <select class="form-control" id="plant_edit" name="plant_edit" aria-label="Default select example">
                            <option selected>Select Your Plant</option>
                            <?php foreach ($plants as $plant) : ?>
                                <option value="<?php echo $plant['id_plant']; ?>"><?php echo $plant['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('plant', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Pelaksana</label>
                        <select id="pelaksana_edit" name="pelaksana_edit" class="form-control custom-select" value="">
                            <option selected disabled>Select one</option>
                            <option value="Elektrik">Elektrik</option>
                            <option value="Mekanik">Mekanik</option>
                            <option value="Elektrik dan Mekanik">Elektrik dan Mekanik</option>
                            <option value="Support">Support</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL EDIT-->

<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('assistant/tampilinformasi'); ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        var statusBadge = '';

                        html += '<tr>' +
                            '<td class="table-cell">' + nomor + '</td>' +
                            '<td class="table-cell">' + data[i].no_info + '</td>' +
                            '<td class="table-cell">' + data[i].pekerjaan + '</td>' +
                            '<td class="table-cell">' + data[i].nama + '</td>' +
                            '<td class="table-cell">' + data[i].pelaksana + '</td>' +
                            '<td class="table-cell">' + data[i].tgl_create + '</td>' +
                            '<td class="table-cell">' + (data[i].progres ? data[i].progres : 0) + '</td>' +
                            '<td class="table-cell">' +
                            '<button class="btn btn-warning btn_edit" data-id="' + data[i].id + '" data-no_info="' + data[i].no_info + '" data-pekerjaan="' + data[i].pekerjaan + '" data-id_plant="' + data[i].id_plant + '" data-pelaksana="' + data[i].pelaksana + '">Edit</button>' +
                            ' ' +
                            '<button class="btn btn-danger btn_delete" data-id="' + data[i].id + '">Delete</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#btn_save').on('click', function() {
            var formData = {
                no_info: $('#no_info').val(),
                pekerjaan: $('#pekerjaan').val(),
                plant: $('#plant').val(),
                pelaksana: $('#pelaksana').val()
            };

            //validatio check for empty fields
            var isValid = true;
            for (var key in formData) {
                if (formData[key] === '') {
                    isValid = false;
                    break;
                }
            }

            if (!isValid) {
                swal({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Semua field harus diisi!'
                });
                return;
            }

            $.ajax({
                type: 'POST',
                url: '<?= site_url('assistant/simpanInformasi') ?>',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        swal({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Pekerjaan Informasi berhasil disimpan!'
                        });
                        $('#Modal_Add').modal('hide');
                        tampildata();

                    } else {
                        swal({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Silahkan coba lagi!'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    swal({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Server error!'
                    });

                }
            })
        });

        // Edit data
        $('#show_data').on('click', '.btn_edit', function() {
            var id = $(this).data('id');
            var no_info = $(this).data('no_info');
            var pekerjaan = $(this).data('pekerjaan');
            var plant = $(this).data('id_plant');
            var pelaksana = $(this).data('pelaksana');

            $('#id_edit').val(id);
            $('#no_info_edit').val(no_info);
            $('#pekerjaan_edit').val(pekerjaan);
            $('#plant_edit').val(plant);
            $('#pelaksana_edit').val(pelaksana);

            $('#Modal_Edit').modal('show');
        });

        $('#btn_update').on('click', function() {
            var formData = {
                id: $('#id_edit').val(),
                no_info: $('#no_info_edit').val(),
                pekerjaan: $('#pekerjaan_edit').val(),
                plant: $('#plant_edit').val(),
                pelaksana: $('#pelaksana_edit').val()
            };

            // Validation check for empty fields
            var isValid = true;
            var emptyFields = [];

            for (var key in formData) {
                if (formData[key] === '') {
                    isValid = false;
                    emptyFields.push(key);
                }
            }

            if (!isValid) {
                console.log('Fields kosong:', emptyFields);
                swal({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Semua field harus diisi!'
                });
                return;
            }

            $.ajax({
                type: 'POST',
                url: '<?= site_url('assistant/update_data') ?>',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    if (response.status === 'success') {
                        swal({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil diupdate!'
                        });
                        $('#Modal_Edit').modal('hide');
                        tampildata();
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Silahkan coba lagi!'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    swal({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Server error!'
                    });
                }
            });
        });

        // Delete data
        $('#show_data').on('click', '.btn_delete', function() {
            var id = $(this).data('id');

            swal({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url('assistant/delete_data') ?>',
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    swal({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Data berhasil dihapus!'
                                    });
                                    tampildata();
                                } else {
                                    swal({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: 'Silahkan coba lagi!'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr.responseText);
                                swal({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Server error!'
                                });
                            }
                        });
                    }
                });
        });

        function incrementId(lastId) {
            if (!lastId) return generateNewId(1); // Return the first ID if there are no entries yet

            const parts = lastId.split('/');
            const number = parseInt(parts[3], 10) + 1;
            return `${parts[0]}/${parts[1]}/${parts[2]}/${number.toString().padStart(3, '0')}`;
        }

        function generateNewId(sequence) {
            const now = new Date();
            const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Get month and pad with zero if needed
            const year = now.getFullYear();
            return `INS/${month}/${year}/${sequence.toString().padStart(3, '0')}`;
        }

        $('#Modal_Add').on('show.bs.modal', function() {
            $.ajax({
                url: '<?= site_url('assistant/getLastId') ?>', // Adjust the URL to your endpoint
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const newId = incrementId(data);
                    $('#no_info').val(newId);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching the last ID:', error);
                    $('#no_info').val(generateNewId(1)); // Fallback if there's an error
                }
            });
        });
    });
</script>