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
                            <th>Pelaksana</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Saran JO Approve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <input type="text" name="id_edit" id="id_edit" class="form-control">
                        <label class="col-md-2 col-form-label">Saran JO</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="saran_dept" name="saran_dept" style="height: 100px"></textarea>
                        </div>

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
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="saran_dept" name="saran_dept" style="height: 100px"></textarea>
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

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('depthead/tampilrequest') ?>',
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
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].pelaksana + '</td>' +
                            '<td> Plant ' + data[i].nama + '</td>' +
                            '<td>' + statusBadge + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_approve" data-toggle="modal" data-target="#Modal_approve" data-id="' + data[i].id + '">Approve</a>' +

                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_reject" data-toggle="modal" data-target="#Modal_reject" data-id="' + data[i].id + '">Reject</a>' +
                            '</td>' +
                            '</tr>';

                    }
                    $('#show_data').html(html);

                }
            });
        }

        // Get data for updating record
        $('#show_data').on('click', '.item_edit', function() {

            var id = $(this).data('id');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
        });

        $('#btn_approve').on('click', function() {
            var id = $('#id_edit').val();
            var saran_dept = $('#saran_dept').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('saran_dept', saran_dept);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('depthead/approveData') ?>",
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

                        $('#Modal_Approve').modal('hide');

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

            var formData = new FormData();
            formData.append('id', id);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('depthead/rejectData') ?>",
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

                        $('#Modal_Reject').modal('hide');

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
</script>