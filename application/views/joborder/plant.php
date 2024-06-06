<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?> <?= $plant['nama']; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="text-align: right;">
            <div style="display: inline-block;">
                <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Create Job Order </a>
            </div>
        </div>
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Job Order <?= $plant['nama']; ?></h6>
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
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Plant</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" value="<?= $plant['nama']; ?>">
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
                            <input type="text" name="no_file" id="no_file" class="form-control" placeholder="Masukkan Mesin Number">
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
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
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
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id_plant="' + data[i].id_plant +
                            '" data-nama="' + data[i].nama + '">Edit </a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '">Delete </a>' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_close" data-id="' + data[i].job_order_id + '">Close JO </a>' +
                            '</div>' +
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

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/joborder/simpandata",
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
                                    text: 'Simpan Data Berhasil!'
                                });

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
</script>