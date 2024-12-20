<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="text-align: right;">
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Request Job Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Job Order</th>
                            <th>Pekerjaan</th>
                            <th>Plant</th>
                            <th>Status</th>
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

<!-- MODAL APPROVE -->
<form>
    <div class="modal fade" id="Modal_approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form JO Approve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                        <label class="col-md-2 col-form-label">Pelaksana JO</label>
                        <div class="col-md-10">
                            <select id="pelaksana" name="pelaksana" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Elektrik">Elektrik</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="Elektrik dan Mekanik">Elektrik dan Mekanik</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                        <!-- <label class="col-md-2 col-form-label">Saran JO</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="saran_dept" name="saran_dept" style="height: 100px"></textarea>
                        </div> -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_approve" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- MODAL ADD REJECT -->
<form>
    <div class="modal fade" id="Modal_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Saran JO Reject </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                        <label class="col-md-2 col-form-label">Saran JO Reject</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Saran JO Reject" id="saran_dept" name="saran_dept" style="height: 100px"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_reject" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal for Approve -->
<div class="modal fade" id="Modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Job Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tabel untuk detail -->
                <div id="detail_approve"></div>
                <!-- Input hidden untuk menyimpan ID job order -->
                <input type="hidden" id="job_order_id_approve" />
            </div>
            <div class="modal-footer">
                <!-- Tombol Approval -->
                <button class="btn btn-primary" id="btn_approve" onclick="approveDataButton()">
                    <i class="fa fa-check-square" aria-hidden="true"></i> Approve
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data

        // Get data for updating record
        $('#show_data').on('click', '.item_approve', function() {

            var id = $(this).data('id');

            $('#Modal_approve').modal('show');
            $('[name="id_edit"]').val(id);
        });

        $('#show_data').on('click', '.item_reject', function() {

            var id = $(this).data('id');

            $('#Modal_reject').modal('show');
            $('[name="id_edit"]').val(id);
        });


        $('#btn_approve').on('click', function() {
            var id = $('#id_edit').val();
            var pelaksana = $('#pelaksana').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('pelaksana', pelaksana);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('factoryhead/approveData') ?>",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response == "success") {
                        swal({
                            type: 'success',
                            title: 'Berhasil!',
                            icon: 'success',
                            text: 'Job Order diterima, dan akan diproses Dept. Head Instalasi !'
                        });

                        $('[name="saran_dept"]').val("");

                        $('#Modal_approve').modal('hide');

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
        });

        $('#btn_reject').on('click', function() {
            var id = $('#id_edit').val();
            var saran_dept = $('#saran_dept').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('saran_dept', saran_dept);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('factoryhead/rejectData') ?>",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == "success") {
                        swal({
                            type: 'success',
                            title: 'Berhasil!',
                            icon: 'success',
                            text: 'Update Data Berhasil!'
                        });

                        $('[name="saran_dept"]').val("");

                        $('#Modal_reject').modal('hide');

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
        });
    });

    function tampildata() {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('factoryhead/tampilrequest') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var html = '';
                var i;
                var no;
                for (i = 0; i < data.length; i++) {
                    var nomor = i + 1;
                    var statusBadge = '';

                    if (data[i].status == '3') {
                        statusBadge = '<span class="badge badge-warning"><i class="fas fa-info-circle"></i> Wait Approval Plant Head</span>';
                    }
                    html += '<tr>' +
                        '<td>' + nomor + '</td>' +
                        '<td>' + data[i].no_jo + '</td>' +
                        '<td>' + data[i].pekerjaan + '</td>' +
                        '<td> Plant ' + data[i].nama + '</td>' +
                        '<td>' + statusBadge + '</td>' +
                        '<td style="text-align:right;">' +
                        '<button class="btn btn-success btn-sm" onclick="showModal(' + data[i].id + ')"><i class="fa fa-eye" aria-hidden="true"></i></button>' + ' ' +
                        '<button class="btn btn-primary btn-sm" onclick="approveData(' + data[i].id + ')"><i class="fa fa-check-square" aria-hidden="true"></i></button>' + ' ' +
                        // '<a href="javascript:void(0);" class="btn btn-info btn-sm item_approve" data.-toggle="modal" data-target="#Modal_approve" data-id="' + data[i].id + '">Approve</a>' + ' ' +
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_reject" data.-toggle="modal" data-target="#Modal_reject" data-id="' + data[i].id + '"><i class="fa fa-window-close" aria-hidden="true"></i></a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);

            }
        });
    }

    function showModal(id) {
        var formData = new FormData();
        formData.append('id', id);

        $.ajax({
            type: 'post',
            url: '<?php echo site_url('factoryhead/getJobOrderDetails') ?>',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                console.log(data); // Debug data
                if (data) {
                    // Cek apakah lampiran tersedia
                    var attachmentLink = data.lampiran ?
                        '<a href="' + '<?php echo base_url("assets/lampiran/"); ?>' + data.lampiran + '" target="_blank" class="btn btn-info">Open Attachment</a>' :
                        '<span class="text-muted">No Attachment</span>';

                    // Mengisi tabel dengan data yang diterima
                    var detailHtml = '<table class="table table-bordered">' +
                        '<tr><th>No. Job Order</th><td>' + data.no_jo + '</td></tr>' +
                        '<tr><th>Pekerjaan</th><td>' + data.pekerjaan + '</td></tr>' +
                        '<tr><th>Plant</th><td>' + data.nama + '</td></tr>' +
                        '<tr><th>Status</th><td>' + (data.status == '3' ? 'Wait Approval' : 'Approved') + '</td></tr>' +
                        '<tr><th>Attachment</th><td>' + attachmentLink + '</td></tr>' +
                        '</table>';
                    $('#detail_approve').html(detailHtml);
                    $('#job_order_id_approve').val(data.id); // Menyimpan ID job order dalam input hidden
                    $('#Modal_detail').modal('show');
                } else {
                    console.error("Data tidak ditemukan");
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error); // Debug jika terjadi kesalahan
            }
        });
    }

    function approveData(id) {
        Swal.fire({
            title: "Apakah Yakin ?",
            text: "Silahkan klik YES untuk menerima job order ini.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Approve it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                formData.append('id', id);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('factoryhead/approveData') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Job Order telah diterima!'
                            });
                            // Reload or update data in your table
                            tampildata();
                            $('#Modal_detail').modal('hide'); // Menutup modal setelah approval
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
    }

    function approveDataButton() {
        // Ambil nilai ID dari input
        const jobOrderId = $('#job_order_id_approve').val();

        // Debug untuk memastikan ID diambil dengan benar
        console.log('ID yang dikirim untuk Approve:', jobOrderId);
        $('#Modal_detail').modal('hide');

        Swal.fire({
            title: "Apakah Yakin ?",
            text: "Silahkan klik YES untuk menerima job order ini.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Approve it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                formData.append('id', jobOrderId);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('factoryhead/approveData') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Job Order telah diterima!'
                            });
                            // Reload or update data in your table
                            tampildata();
                            $('#Modal_detail').modal('hide'); // Menutup modal setelah approval
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
    }
</script>