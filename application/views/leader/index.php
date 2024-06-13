<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><?= $title; ?></h1>
    <h6 class="mb-3">Hai <?= $user['name']; ?>, Selamat datang di Aplikasi E-Job Order Departemen Instalasi</h6>

    <?php if (!$this->session->userdata('no_hp')) : ?>
        <!-- Modal -->
        <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="phoneModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="phoneModalLabel">Please enter your phone number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="handphone">Phone number</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Format phone 628966345.....">
                            </div>
                            <button type="button" id="btn_phone" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($plants as $plant) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Job Order Plant</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $plant['total_jo']; ?></div>
                            </div>
                            <div class="col-auto">
                                <h1><?= $plant['name']; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fas fa-user-plus"></span>  Add New Member </a>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Anggota Tim</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama</th>
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

<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">NIP</label>
                        <input type="text" name="nim_member" id="nim_member" class="form-control" placeholder="Masukkan NIP Anggota Baru">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama Anggota</label>
                        <input type="text" name="nama_member" id="nama_member" class="form-control" placeholder="Masukkan Nama Anggota Baru">
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

<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('leader/tampilanggota'); ?>',
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
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].nim_member + '</td>' +
                            '<td>' + data[i].nama_member + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id +
                            '" data-no_jo="' + data[i].nim_member + '" data-pekerjaan="' + data[i].nama_member + '"><i class="fas fal fa-edit"></i> Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '"><i class="fas fa-trash-alt"></i> Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#btn_phone').click(function() {
            var no_hp = $('#no_hp').val();

            if (!no_hp) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Handphone Wajib Diisi !'
                });
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('no_hp', no_hp);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('leader/editphone') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Terimakasih, Anda akan keluar, kemudian login kembali!',
                            });
                            setTimeout(function() {
                                window.location.href = "<?php echo base_url('auth/logout'); ?>";
                            }, 2000);


                            $('[name="no_hp"]').val("");

                            $('#phoneModal').modal('hide');

                            // Reload or update data in your table
                            tampildata();
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
            }
        });

        $('#btn_save').click(function() {
            var nama_member = $('#nama_member').val();
            var nim_member = $('#nim_member').val();

            if (!nama_member) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Anggota Wajib Diisi !'
                });
            } else if (!nim_member) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'NIP Anggota Wajib Diisi !'
                });
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('nama_member', nama_member);
                formData.append('nim_member', nim_member);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('leader/tambahanggota') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var jsonResponse = JSON.parse(response);
                            if (jsonResponse.status === "success") {
                                swal({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    icon: 'success',
                                    text: 'Simpan Data Berhasil!'
                                });

                                $('[name="nama_member"]').val("");
                                $('[name="nim_member"]').val("");
                                $('#Modal_Add').modal('hide');

                                tampildata();
                            } else {

                                swal({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    icon: 'warning',
                                    text: 'silahkan coba lagi!'
                                });

                            }
                        } catch (e) {
                            console.error('Error parsing server response:', e);
                            swal({
                                icon: 'error',
                                title: 'Oppss!',
                                icon: 'warning',
                                text: 'Error parsing server response!!'
                            });
                        }

                        console.log(response);
                    },
                    error: function(response) {
                        swal({
                            icon: 'error',
                            title: 'Opps!',
                            icon: 'warning',
                            text: 'server error!'
                        });
                    }
                });
            }
        });
    });
</script>

<?php if (!$this->session->userdata('no_hp')) : ?>
    <script>
        $(document).ready(function() {
            $('#phoneModal').modal('show');
        });
    </script>
<?php endif; ?>