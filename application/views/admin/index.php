<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><?= $title; ?></h1>
    <h6 class="mb-3">Selamat datang di Aplikasi E-Job Order Departemen Instalasi</h6>

    <!-- Content Row -->
    <div class="row mt-2">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Job Order Keseluruhan Tahun <?= date('Y'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totaljo['total_jo']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Job Order Selesai Tahun <?= date('Y'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalyear['total_jo']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Order Masuk Menunggu Approve -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Job Order Belum Approve</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $receive['total_jo']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Job Order Masuk Bulan <?= date('M'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $month['total_jo']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Job Order Selesai Bulan <?= date('M'); ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $finish['total_jo']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <!--<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">30%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Pending Requests Card Example -->
        <!--<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                On Progress Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $wait['total_jo'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Job Order Dari Dept. JEM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jem['total_jo'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Job Order Tunggu Approve Instalasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Job Order</th>
                            <th>Pekerjaan</th>
                            <th>No. File</th>
                            <th>Pelaksana</th>
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
<!-- /.container-fluid -->

</div>
<form>
    <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_jo" id="id_jo">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">No. File</label>
                        <div class="col-md-10">
                            <input type="text" name="no_file" id="no_file" class="form-control" placeholder="Masukkan Nomor File">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">No. Job Order</label>
                        <div class="col-md-10">
                            <input type="text" name="no_jo" id="no_jo" class="form-control" placeholder="Masukkan Nomor Job Order" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pekerjaan</label>
                        <div class="col-md-10">
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pelaksana</label>
                        <div class="col-md-10">
                            <input class="form-control" id="pelaksana" name="pelaksana" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Plant</label>
                        <div class="col-md-10">
                            <input class="form-control" id="plant" name="plant" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End of Main Content -->


<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();
        console.log("TESTING");


        $('#btn_save').on('click', function() {
            var id = $('#id_jo').val();
            var no_file = $('#no_file').val();

            // var formData = new FormData();
            // formData.append('id', id);
            // formData.append('no_file', no_file);
            if (no_file.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor File Wajib Diisi !'
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/admin/updateJob/" + id,
                    data: {
                        no_file: no_file
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        if (response.status == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Job Order Complete!'
                            });
                        } else {
                            swal({
                                type: 'error',
                                title: 'Update data Gagal!',
                                icon: 'warning',
                                text: 'Silahkan coba lagi!'
                            });
                        }
                        $('#Modal_edit').modal('hide');
                        $('[name="no_file"]').val('')
                        tampildata();
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
    });

    function tampildata() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('leader/tampiljoadmin'); ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no;
                for (i = 0; i < data.length; i++) {
                    var nomor = i + 1;
                    var statusBadge = '';

                    var mekanikProgress = data[i].progres_mekanik;
                    var elektrikProgress = data[i].progres_elektrik;
                    var thisPelaksana = data[i].pelaksana;

                    let isDanPresent = thisPelaksana.includes('dan');
                    let isMekanikComplete = mekanikProgress == '100';
                    let isElektrikComplete = elektrikProgress == '100';
                    let isMekanikAndElektrikComplete = mekanikProgress == '100' && elektrikProgress == '100';


                    console.log(data[i].tgl_terima);
                    // if ((!isDanPresent && (isMekanikComplete || isElektrikComplete)) || (isMekanikAndElektrikComplete && isDanPresent)) {
                    let row = '<tr>' +
                        '<td>' + nomor + '</td>' +
                        '<td>' + data[i].no_jo + '</td>' +
                        '<td>' + data[i].pekerjaan + '</td>' +
                        '<td>' + data[i].no_file + '</td>' +
                        '<td>' + data[i].pelaksana + '</td>' +
                        '<td>' + data[i].plant_name + '</td>' +
                        '<td style="text-align:right;">' +
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_update" onclick="showModal(' + data[i].job_order_id + ')"> Input No.File</a>' +
                        '</td>' +
                        '</tr>';

                    html += row;
                    // }
                    $('#show_data').html(html);
                }
            }
        });
    }

    function showModal(id) {
        $('#Modal_edit').modal('show');

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url(); ?>/leader/getjobbyid/' + id,
            async: false,
            dataType: 'json',
            success: function(data) {
                var i;
                $('#id_jo').val(data.job_order_id)
                $('#no_file').val(data.no_file)
                $('#no_jo').val(data.no_jo)
                $('#pekerjaan').val(data.pekerjaan)
                $('#pelaksana').val(data.pelaksana)
                $('#plant').val(data.plant_name)
            }
        })
    }

    function selesai(id) {
        var jobId = id;

        $.ajax({
            type: "POST",
            url: '<?= site_url() ?>/admin/completejob/' + jobId,
            dataType: "JSON",
            data: {
                id: jobId
            },
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    swal({
                        type: 'success',
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Job Order Complete!'
                    });
                } else {
                    swal({
                        type: 'error',
                        title: 'Update data Gagal!',
                        icon: 'warning',
                        text: 'Silahkan coba lagi!'
                    });
                }
                tampildata();
            },
            error: function(response) {
                swal({
                    type: 'error',
                    title: 'Oops!',
                    icon: 'warning',
                    text: 'Server error!'
                });
            }
        })
    }
</script>