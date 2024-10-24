<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>


    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add" id="create_job_order"><span class="fa fa-plus"></span> Create Data </a>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Dept. Head</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Plant</th>
                            <!-- <th>Pelaksana</th> -->
                            <th>NIP</th>
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

<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRequestLabel">Form Data Plant Head</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_jo" id="id_jo">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Plant Head</label>
                        <div class="col-md-10">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Plant Head" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">NIP</label>
                        <div class="col-md-10">
                            <input type="text" name="nim" id="nim" class="form-control" placeholder="Masukkan NIP" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Email GT-Tires</label>
                        <div class="col-md-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Gt-Tires" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nomor WhatsApp</label>
                        <div class="col-md-10">
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Masukkan Nomor Whatsapp" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pilih Plant</label>
                        <div class="col-md-10">
                            <select class="form-control custom-select" id="plant" name="plant">
                                <option selected>Select Your Plant</option>
                                <?php foreach ($plants as $plant) : ?>
                                    <option value="<?php echo $plant['id_plant']; ?>"><?php echo $plant['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
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

<!-- Script CRUD -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('user/tampildataph') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        var statusBadge = '';

                        if (data[i].status == '1') {
                            statusBadge = '<span class="badge badge-warning"><i class="fas fa-info-circle"></i> Wait Approval</span>';
                        }
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].nim + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#create_job_order').on('click', function() {
            //clearField();
            method = 'add';
            $('#modalRequestLabel').html('Form Data Plant Head')
        })

        // Save product
        $('#btn_save').on('click', function() {
            var name = $('#name').val();
            var nim = $('#nim').val();
            var email = $('#email').val();
            var whatsapp = $('#whatsapp').val();
            var id_plant = $('#plant').val();

            // Validasi untuk memastikan nama tidak kosong
            if (name === '') {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama harus diisi dengan benar!'
                });
                return false;
            }

            // Validasi untuk memastikan NIM tidak kosong
            else if (nim === '') {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'NIP harus diisi dengan benar!'
                });
                return false;
            }

            // Validasi untuk memastikan id_plant tidak kosong
            else if (id_plant === '') {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Plant harus dipilih!'
                });
                return false;
            }

            // Validasi untuk WhatsApp harus dimulai dengan '628'
            else if (!whatsapp.startsWith('628')) {
                //alert('Nomor WhatsApp harus dimulai dengan 628');
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Whatsapp harus diisi dengan benar (628)!'
                });
                return false;
            }

            // Validasi untuk email harus berakhir dengan '@gt-tires.com'
            else if (!email.endsWith('@gt-tires.com')) {
                //alert('Email harus berakhiran dengan @gt-tires.com');
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Hanya email Gt-Tires yang dapat di daftarkan!'
                });
                return false;
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('name', name);
                formData.append('nim', nim);
                formData.append('id_plant', id_plant);
                formData.append('whatsapp', whatsapp);
                formData.append('email', email);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/user/simpanPh",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var jsonResponse = JSON.parse(response);
                            if (jsonResponse.status === "success") {
                                if (method == 'add') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Simpan Data Berhasil!'
                                    });

                                } else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: 'Update Data Berhasil!'
                                    });
                                }

                                $('[name="name"]').val("");
                                $('[name="nim"]').val("");
                                $('[name="email"]').val("");
                                $('[name="departemen"]').val("");
                                $('[name="whatsapp"]').val("");
                                $('[name="id_plant"]').val("");
                                $('#Modal_Add').modal('hide');

                                tampildata();
                            } else {
                                if (method == 'add') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Simpan data Gagal!',
                                        text: jsonResponse.message
                                    });

                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Update data Gagal!',
                                        text: jsonResponse.message
                                    });
                                }
                            }
                        } catch (e) {
                            console.error('Error parsing server response:', e);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Error parsing server response!!'
                            });
                        }
                    },
                    error: function(response) {
                        console.Log(response);
                        Swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }
                });
            }
        });
    });
</script>