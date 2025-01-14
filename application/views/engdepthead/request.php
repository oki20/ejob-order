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
                            <!-- <th>Pelaksana</th> -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi Job Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Nomor Job Order</label>
                        <div class="col-md-8">
                            <input type="text" name="no_jo" id="no_jo" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Deskripsi Pekerjaan</label>
                        <div class="col-md-8">
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Plant</label>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Lampiran</label>
                        <div class="col-md-8">
                            <a href="#" id="attachment_link" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-file-alt"></i> Lihat Lampiran
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                        <label class="col-md-4 col-form-label">Pelaksana JO</label>
                        <div class="col-md-8">
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
                    <h5 class="modal-title" id="exampleModalLabel">Form JO Reject </h5>
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

<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Get data for updating record
        $('#show_data').on('click', '.item_approve', function() {
            var id = $(this).data('id');
            var no_jo = $(this).data('no_jo');
            var pekerjaan = $(this).data('pekerjaan');
            var nama = $(this).data('nama');
            var attachment = $(this).data('attachment');

            $('#Modal_approve').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="no_jo"]').val(no_jo);
            $('[name="pekerjaan"]').val(pekerjaan);
            $('[name="nama"]').val(nama);

            if (attachment) {
                // Buat URL lengkap untuk file attachment
                var attachmentUrl = "<?php echo base_url(); ?>" + "assets/lampiran/" + attachment;

                // Debugging untuk melihat URL yang terbentuk
                console.log("Attachment URL:", attachmentUrl);

                $('#attachment_link').attr('href', attachmentUrl).show();
            } else {
                $('#attachment_link').hide();
            }
        });

        $('#show_data').on('click', '.item_reject', function() {

            var id = $(this).data('id');

            $('#Modal_reject').modal('show');
            $('[name="id_edit"]').val(id);
        });


        $('#btn_approve').on('click', function() {
            var id = $('#id_edit').val();
            // var saran_dept = $('#saran_dept').val();
            var pelaksana = $('#pelaksana').val();

            var formData = new FormData();
            formData.append('id', id);
            // formData.append('saran_dept', saran_dept);
            formData.append('pelaksana', pelaksana);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('engdepthead/approveData') ?>",
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
                            text: 'Update Data Berhasil!'
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
                url: "<?php echo site_url('engdepthead/rejectData') ?>",
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

    // Function to show data
    function tampildata() {
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('engdepthead/tampilrequest') ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no;
                for (i = 0; i < data.length; i++) {
                    var nomor = i + 1;
                    var statusBadge = '';

                    if (data[i].status == '4') {
                        statusBadge = '<span class="badge badge-warning"><i class="fas fa-info-circle"></i> Wait Approval Eng Dept.Head</span>';
                    }
                    html += '<tr>' +
                        '<td>' + nomor + '</td>' +
                        '<td>' + data[i].no_jo + '</td>' +
                        '<td>' + data[i].pekerjaan + '</td>' +
                        // '<td>' + data[i].pelaksana + '</td>' +
                        '<td> Plant ' + data[i].nama + '</td>' +
                        '<td>' + statusBadge + '</td>' +
                        '<td style="text-align:right;">' +
                        // '<button class="btn btn-primary btn-sm" onclick="approveData(' + data[i].id + ')">Approve</button>' + ' ' +
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_approve" data.-toggle="modal" data-target="#Modal_approve" data-id="' + data[i].id +
                        '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan +
                        '" data-attachment="' + data[i].lampiran +
                        '" data-nama="' + data[i].nama + '">Approve</a>' + ' ' +
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_reject" data.-toggle="modal" data-target="#Modal_reject" data-id="' + data[i].id + '">Reject</a>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);

            }
        });
    }

    function approveData(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
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
                    url: "<?php echo site_url('engdepthead/approveData') ?>",
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
                                text: 'Update Data Berhasil!'
                            });
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
    }
</script>