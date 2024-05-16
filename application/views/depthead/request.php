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
                        <label class="col-md-2 col-form-label">Saran JO</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="pekerjaan" name="pekerjaan" style="height: 100px"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
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
                        <label class="col-md-2 col-form-label">Saran JO Reject</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="pekerjaan" name="pekerjaan" style="height: 100px"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
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

        // Save product
        $('#btn_save').on('click', function() {
            var no_jo = $('#no_jo').val();
            var tgl_jo = $('#tgl_jo').val();
            var cc_no = $('#cc_no').val();
            var pekerjaan = $('#pekerjaan').val();
            var tujuan = $('#tujuan').val();
            var pelaksana = $('#pelaksana').val();
            var rencana = $('#rencana').val();
            var cep_no = $('#cep_no').val();
            var dwg_no = $('#dwg_no').val();
            var mesin_no = $('#mesin_no').val();
            var id_plant = $('#plant').val();
            var id_depthead = $('#dept_head').val();
            var id_planthead = $('#plant_head').val();
            var lampiran = $('#lampiran')[0].files[0];

            if (no_jo.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Job Order Wajib Di Pilih !'
                });

            } else if (tgl_jo.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Job Order Wajib Diisi !'
                });

            } else if (cc_no.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Cost Centre Wajib Diisi !'
                });

            } else if (pekerjaan.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Detail Pekerjaan Wajib Diisi !'
                });

            } else if (tujuan.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tujuan Wajib Diisi !'
                });

            } else if (pelaksana.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Pelaksana Wajib Diisi !'
                });

            } else if (cep_no.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'CEP Nomer Wajib Diisi !'
                });

            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('no_jo', no_jo);
                formData.append('tgl_jo', tgl_jo);
                formData.append('cc_no', cc_no);
                formData.append('pekerjaan', pekerjaan);
                formData.append('tujuan', tujuan);
                formData.append('pelaksana', pelaksana);
                formData.append('rencana', rencana);
                formData.append('cep_no', cep_no);
                formData.append('dwg_no', dwg_no);
                formData.append('mesin_no', mesin_no);
                formData.append('plant', id_plant);
                formData.append('dept_head', id_depthead);
                formData.append('plant_head', id_planthead);
                formData.append('lampiran', lampiran);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/user/simpandata",
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

                                $('[name="no_jo"]').val("");
                                $('[name="tgl_jo"]').val("");
                                $('[name="cc_no"]').val("");
                                $('[name="pekerjaan"]').val("");
                                $('[name="tujuan"]').val("");
                                $('[name="pelaksana"]').val("");
                                $('[name="rencana"]').val("");
                                $('[name="cep_no"]').val("");
                                $('[name="dwg_no"]').val("");
                                $('[name="mesin_no"]').val("");
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

        // Function to handle delete confirmation

        $('#show_data').on('click', '.item_edit', function() {
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
                url: "<?php echo site_url('user/deleterequest') ?>",
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