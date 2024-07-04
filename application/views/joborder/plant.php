<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?> <?= $plant['nama']; ?></h1>

    <!-- Begin Page Content -->
    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add" id="create_job_order"><span class="fa fa-plus"></span> Create Job Order </a>
        </div>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Job Order Plant <?= $plant['nama']; ?></h6>
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
                            <th>No. File</th>
                            <th>Tgl Terima Jo</th>
                            <th>Progres Elektrik</th>
                            <th>Progres Mekanik</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Request Job Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_jo" name="id_jo" value="">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Plant</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="<?= $plant['nama']; ?>" disabled>
                            <input type="text" name="id_plant" id="id_plant" class="form-control" value="<?= $plant['id_plant']; ?>" hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">No. Job Order</label>
                        <div class="col-md-10">
                            <input type="text" name="no_jo" id="no_jo" class="form-control" placeholder="Masukkan Nomor Job Order">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tgl. Job Order</label>
                        <div class="col-md-10">
                            <input type="date" name="tgl_jo" id="tgl_jo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tgl. Terima Job Order</label>
                        <div class="col-md-10">
                            <input type="date" name="tgl_terima" id="tgl_terima" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">C.C. Number</label>
                        <div class="col-md-10">
                            <input type="text" name="cc_no" id="cc_no" class="form-control" placeholder="Masukkan CC Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Detail Pekerjaan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="pekerjaan" name="pekerjaan" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tujuan</label>
                        <div class="col-md-10">
                            <select id="tujuan" name="tujuan" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Produk Baru">Produk Baru</option>
                                <option value="Quality Naik">Quality Naik</option>
                                <option value="Menurunkan Scrapt">Menurunkan Scrapt</option>
                                <option value="Penggantian">Penggantian</option>
                                <option value="Produksi Naik">Produksi Naik</option>
                                <option value="Mengurangi Tenaga">Mengurangi Tenaga</option>
                                <option value="Keselamatan">Keselamatan</option>
                                <option value="Cadangan">Cadangan</option>
                                <option value="dll">Dll.</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Rencana</label>
                        <div class="col-md-10">
                            <select id="rencana" name="rencana" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Pembuatan Baru">Pembuatan Baru</option>
                                <option value="Pemasangan">Pemasangan</option>
                                <option value="Modifikasi">Modifikasi</option>
                                <option value="Pemindahan">Pemindahan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pelaksana Job Order</label>
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
                        <label class="col-md-2 col-form-label">Perkiraan Budget Proyek</label>
                        <div class="col-md-10">
                            <select id="cep_no" name="cep_no" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="M&R">
                                    < 100 Juta</option>
                                <option value="Capex">> 100 Juta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Pemesan</label>
                        <div class="col-md-10">
                            <input type="text" name="id_pemesan" id="id_pemesan" class="form-control" placeholder="Masukkan Nama Pemesan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nomor File</label>
                        <div class="col-md-10">
                            <input type="text" name="no_file" id="no_file" class="form-control" placeholder="Masukkan No.File">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Klasifikasi</label>
                        <div class="col-md-10">
                            <input type="text" name="klasifikasi" id="klasifikasi" class="form-control" placeholder="Masukkan Klasifikasi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Golongan</label>
                        <div class="col-md-10">
                            <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Masukkan Golongan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Departemen Lain</label>
                        <div class="col-md-10">
                            <select id="departemen_lain" name="departemen_lain" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Civil Work">Civil Work</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Civil Work dan Workshop">Civil Work dan Workshop</option>
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
    </div>
</form>
<!--END MODAL ADD-->

<script type="text/javascript">
    var method = "";
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Save product
        $('#btn_save').on('click', function() {
            var no_jo = $('#no_jo').val();
            var tgl_jo = $('#tgl_jo').val();
            var tgl_terima = $('#tgl_terima').val();
            var cc_no = $('#cc_no').val();
            var pekerjaan = $('#pekerjaan').val();
            var tujuan = $('#tujuan').val();
            var pelaksana = $('#pelaksana').val();
            var rencana = $('#rencana').val();
            var cep_no = $('#cep_no').val();
            var id_pemesan = $('#id_pemesan').val();
            var no_file = $('#no_file').val();
            var golongan = $('#golongan').val();
            var klasifikasi = $('#klasifikasi').val();
            var departemen_lain = $('#departemen_lain').val();
            var id_plant = $('#id_plant').val();

            if (no_jo.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Job Order Wajib Di Pilih !'
                });

            } else if (tgl_jo.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Job Order Wajib Diisi !'
                });

            } else if (tgl_terima.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Job Order Wajib Diisi !'
                });

            } else if (cc_no.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Cost Centre Wajib Diisi !'
                });

            } else if (pekerjaan.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Detail Pekerjaan Wajib Diisi !'
                });

            } else if (tujuan.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tujuan Wajib Diisi !'
                });

            } else if (rencana.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Rencana Wajib Diisi !'
                });

            } else if (pelaksana.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Pelaksana Wajib Diisi !'
                });

            } else if (cep_no.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'CEP Nomer Wajib Diisi !'
                });

            } else if (no_file.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor File Wajib Diisi !'
                });

            } else if (klasifikasi.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Klasifikasi Wajib Diisi !'
                });

            } else if (golongan.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Golongan Wajib Diisi !'
                });

            } else if (id_pemesan.length == "") {

                swal({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Pemesan Wajib Diisi !'
                });

            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('no_jo', no_jo);
                formData.append('tgl_jo', tgl_jo);
                formData.append('tgl_terima', tgl_terima);
                formData.append('cc_no', cc_no);
                formData.append('pekerjaan', pekerjaan);
                formData.append('tujuan', tujuan);
                formData.append('pelaksana', pelaksana);
                formData.append('rencana', rencana);
                formData.append('cep_no', cep_no);
                formData.append('id_plant', id_plant);
                formData.append('id_pemesan', id_pemesan);
                formData.append('no_file', no_file);
                formData.append('klasifikasi', klasifikasi);
                formData.append('golongan', golongan);
                formData.append('departemen_lain', departemen_lain);

                if (method == 'add') {
                    url = "<?php echo site_url() ?>/joborder/simpandata";
                } else {
                    var id_jo = $('#id_jo').val();
                    formData.append('id_jo', id_jo)
                    url = "<?php echo site_url() ?>/joborder/updatedata";
                }

                $.ajax({
                    type: "POST",
                    url: url,
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

                                $('[name="no_jo"]').val("");
                                $('[name="tgl_jo"]').val("");
                                $('[name="tgl_terima"]').val("");
                                $('[name="cc_no"]').val("");
                                $('[name="pekerjaan"]').val("");
                                $('[name="tujuan"]').val("");
                                $('[name="pelaksana"]').val("");
                                $('[name="rencana"]').val("");
                                $('[name="cep_no"]').val("");
                                $('[name="id_pemesan"]').val("");
                                $('[name="golongan"]').val("");
                                $('[name="no_file"]').val("");
                                $('[name="klasifikasi"]').val("");
                                $('[name="departemen_lain"]').val("");

                                $('#Modal_Add').modal('hide');

                                tampildata();
                            } else {
                                swal({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }
                        } catch (e) {
                            //console.error('Error parsing server response:', e);
                            swal({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Error parsing server response!!'
                            });
                        }
                    },
                    error: function(response) {
                        swal({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }
                });
            }
        });

        $('#create_job_order').on('click', function() {
            clearField();
            method = 'add';
            $('#exampleModalLabel').html('Form Request Job Order')

        });

        // Function to handle delete confirmation
        $('#show_data').on('click', '.item_close', function() {
            var id = $(this).data('id'); // Get the ID from the data-id attribute
            console.log("ID to be deleted:", id); // Log the ID to check if it's correct

            // Show a SweetAlert confirmation dialog
            swal({
                title: "Apakah Job Order Ini Selesai?",
                text: "Pastikan Progres Elektrik dan Mekanik sudah 100% !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // If confirmed, call the deleteProduct function
                    deleteProduct(id);
                }
            });
        });

        // Function to handle actual deletion using AJAX
        function deleteProduct(id) {
            console.log("Deleting product with ID:", id);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('joborder/closejo') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        swal({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            timer: 3000
                        });
                        tampildata();
                    } else {
                        swal({
                            title: 'Error!',
                            text: response.message,
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error deleting product:", error);
                    swal({
                        title: 'Error!',
                        text: 'Gagal Mengarsipkan Job Order.',
                        icon: 'error'
                    });
                }
            });
        }


    });

    function tampildata() {
        var id_plant = <?= json_encode($plant['id_plant']); ?>;
        var url = '<?php echo site_url('joborder/tampiljoplant/'); ?>' + id_plant; // Tambahkan id_plant ke dalam URL
        $.ajax({
            type: 'ajax',
            url: url,
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
                        '<td>' + data[i].no_jo + '</td>' +
                        '<td>' + data[i].pekerjaan + '</td>' +
                        '<td>' + data[i].pelaksana + '</td>' +
                        '<td>' + data[i].no_file + '</td>' +
                        '<td>' + data[i].tgl_terima + '</td>' +
                        '<td>' + data[i].progres_elektrik + '</td>' +
                        '<td>' + data[i].progres_mekanik + '</td>' +
                        '<td style="text-align:right;">' +
                        '<div class="button-container">' +
                        '<button class="btn btn-info btn-sm" onclick="editData(' + data[i].job_order_id + ')"><i class="fas fal fa-edit"></i> Edit</button>' + ' ' +
                        '<button class="btn btn-danger btn-sm" onclick="deleteJob(' + data[i].job_order_id + ')"><i class="fas fal fa-trash"></i> Delete</button>' + ' ' +
                        '<button class="btn btn-primary btn-sm" onclick="approveData(' + data[i].job_order_id + ')"><i class="fas fal fa-check-square"></i> Approve</button>' + ' ' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
            }
        });
    }

    function editData(id) {
        console.log(id);
        $('#exampleModalLabel').html('Edit Form Job Order')
        method = "edit";
        $.ajax({
            type: "GET",
            url: "<?php echo site_url() ?>/joborder/edit",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(res) {
                console.log(res);
                $('[name="id_jo"]').val(res.id);
                $('[name="no_jo"]').val(res.no_jo);
                $('[name="tgl_jo"]').val(res.tgl_jo);
                $('[name="tgl_terima"]').val(res.tgl_terima);
                $('[name="cc_no"]').val(res.cc_no);
                $('[name="pekerjaan"]').val(res.pekerjaan);
                $('[name="tujuan"]').val(res.tujuan);
                $('[name="pelaksana"]').val(res.pelaksana);
                $('[name="no_file"]').val(res.no_file);
                $('[name="rencana"]').val(res.rencana);
                $('[name="cep_no"]').val(res.cep_no);
                $('[name="id_pemesan"]').val(res.id_pemesan);
                $('[name="golongan"]').val(res.golongan);
                $('[name="klasifikasi"]').val(res.klasifikasi);
                $('[name="departemen_lain"]').val(res.departemen_lain);

                $('#Modal_Add').modal('show');
            }
        })
    }

    function deleteJob(id) {
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
                    url: "<?= site_url() ?>/joborder/delete",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var json = JSON.parse(response);
                        if (json.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Hapus Data Berhasil!'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Hapus data Gagal!',
                                text: 'silahkan coba lagi!'
                            });
                        }
                        // Reload or update data in your table
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
    }

    function clearField() {
        $('[name="no_jo"]').val("");
        $('[name="tgl_jo"]').val("");
        $('[name="tgl_terima"]').val("");
        $('[name="cc_no"]').val("");
        $('[name="pekerjaan"]').val("");
        $('[name="tujuan"]').val("");
        $('[name="pelaksana"]').val("");
        $('[name="no_file"]').val("");
        $('[name="rencana"]').val("");
        $('[name="cep_no"]').val("");
        $('[name="id_pemesan"]').val("");
        $('[name="golongan"]').val("");
        $('[name="klasifikasi"]').val("");
        $('[name="departemen_lain"]').val("");
    }

    function approveData(id) {
        Swal.fire({
            title: "Apakah Job Order Ini Selesai?",
            text: "Pastikan Progres Elektrik dan Mekanik sudah 100% !",
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
                    url: "<?php echo site_url('joborder/approveData') ?>",
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