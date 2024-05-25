<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan Harian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                        <colgroup>
                            <col style="width: 5%;">
                            <col style="width: 15%;">
                            <col style="width: 25%;">
                            <col style="width: 10%;">
                            <col style="width: 10%;">
                            <col style="width: 10%;">
                            <col style="width: 10%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Job Order</th>
                                <th>Pekerjaan</th>
                                <th>No. File</th>
                                <th>Tanggal Pengerjaan</th>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- MODAL Laporan -->
<form>
    <div class="modal fade" id="Modal_Laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_laporan" id="id_laporan" class="form-control">
                    <div class="mb-3">
                        <label class="col-form-label">Nomor Job Order</label>
                        <input type="text" name="no_jo_laporan" id="no_jo_laporan" class="form-control" placeholder="Nomor Transaksi">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Pekerjaan</label>
                        <input type="text" name="pekerjaan_laporan" id="pekerjaan_laporan" class="form-control" placeholder="Nomor Transaksi">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Laporan Harian JO</label>
                        <input type="date" name="tgl_pengerjaan" id="tgl_pengerjaan" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Progres Pengerjaan JO</label>
                        <input type="text" name="progres" id="progres" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tim Pelaksana</label>
                        <select id="tim_pekerja" name="tim_pekerja[]" multiple="multiple" class="multiselect-dropdown form-control" required>
                            <?php if (isset($anggota)) {
                                foreach ($anggota as $agt) : ?>
                                    <option value="<?= $agt['id']; ?>"><?= $agt['nama_member']; ?></option>
                            <?php endforeach;
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Detal Pengerjaan JO</label>
                        <textarea class="form-control" placeholder="Informasi terkait pekerjaan JO" id="item_pekerjaan" name="item_pekerjaan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Kendala Pengerjaan</label>
                        <textarea class="form-control" placeholder="Isi Kendala Pengerjaan" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Anggota Absen (Sakit, Izin, Alfa)</label>
                        <select id="tim_absen" name="tim_absen[]" multiple="multiple" class="multiselect-dropdown form-control" required>
                            <?php if (isset($anggota)) {
                                foreach ($anggota as $agt) : ?>
                                    <option value="<?= $agt['id']; ?>"><?= $agt['nama_member']; ?></option>
                            <?php endforeach;
                            } ?>
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
<!--END MODAL Laporan-->

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                    <div class="mb-3">
                        <label class="col-form-label">Nomor Job Order</label>
                        <input type="text" name="no_jo_edit" id="no_jo_edit" class="form-control" placeholder="Nomor Transaksi">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Pekerjaan</label>
                        <input type="text" name="pekerjaan_edit" id="pekerjaan_edit" class="form-control" placeholder="Nomor Transaksi">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Laporan Harian JO</label>
                        <input type="date" name="tgl_pengerjaan" id="tgl_pengerjaan" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Progres Pengerjaan JO</label>
                        <input type="text" name="progres" id="progres" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tim Pelaksana</label>
                        <select id="tim_pekerja" name="tim_pekerja[]" multiple="multiple" class="multiselect-dropdown form-control" required>
                            <?php if (isset($anggota)) {
                                foreach ($anggota as $agt) : ?>
                                    <option value="<?= $agt['id']; ?>"><?= $agt['nama_member']; ?></option>
                            <?php endforeach;
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Detal Pengerjaan JO</label>
                        <textarea class="form-control" placeholder="Informasi terkait pekerjaan JO" id="item_pekerjaan" name="item_pekerjaan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Kendala Pengerjaan</label>
                        <textarea class="form-control" placeholder="Isi Kendala Pengerjaan" id="keterangan" name="keterangan"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Anggota Absen (Sakit, Izin, Alfa, Cuti)</label>
                        <select id="tim_absen" name="tim_absen[]" multiple="multiple" class="multiselect-dropdown form-control" required>
                            <?php if (isset($anggota)) {
                                foreach ($anggota as $agt) : ?>
                                    <option value="<?= $agt['id']; ?>"><?= $agt['nama_member']; ?></option>
                            <?php endforeach;
                            } ?>
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
<!--END MODAL EDIT-->


<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('leader/tampilreport'); ?>',
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
                            '<td class="table-cell">' + data[i].no_jo + '</td>' +
                            '<td class="table-cell">' + data[i].pekerjaan + '</td>' +
                            '<td class="table-cell">' + data[i].no_file + '</td>' +
                            '<td class="table-cell">' + data[i].tgl_pengerjaan + '</td>' +
                            '<td class="table-cell">' + data[i].progres + '</td>' +
                            '<td style="text-align:right;">' +
                            '<div class="button-container">' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_laporan" data-id_jo="' + data[i].id_jo +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan + '">Buat Laporan</a>' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].id +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan + '">Edit</a>' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan + '">Hapus</a>' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_whatsapp" data-id_jo="' + data[i].id_jo +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan +
                            '" data-tgl_pengerjaan="' + data[i].tgl_pengerjaan + '" data-item_pekerjaan="' + data[i].item_pekerjaan +
                            '">Whatsapp</a>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
        // Get data for updating record
        $('#show_data').on('click', '.item_laporan', function() {
            var id_jo = $(this).data('id_jo');
            var no_jo = $(this).data('no_jo');
            var pekerjaan = $(this).data('pekerjaan');

            $('#Modal_Laporan').modal('show');
            $('[name="id_laporan"]').val(id_jo);
            $('[name="no_jo_laporan"]').val(no_jo);
            $('[name="pekerjaan_laporan"]').val(pekerjaan);
        });

        // Get data for updating record
        $('#show_data').on('click', '.item_whatsapp', function() {
            var id_jo = $(this).data('id_jo');
            var no_jo = $(this).data('no_jo');
            var pekerjaan = $(this).data('pekerjaan');
            var tgl = $(this).data('tgl_pengerjaan'); // Perbaikan di sini
            var item_pekerjaan = $(this).data('item_pekerjaan'); // Perbaikan di sini

            var pesan = "Laporan Harian Pekerjaan Instalasi :  \nTanggal" + tgl +
                "\n\nDeskripsi Pekerjaan : " + pekerjaan +
                "\nNomor Job Order" + no_jo + "\n\n" +
                "Item Pekerjaan: " + item_pekerjaan;

            // Ganti nomor telepon sesuai kebutuhan
            var nomorWhatsApp = "6289663456037"; // Ganti dengan nomor tujuan WhatsApp

            // Buat URL dengan format yang sesuai untuk membuka WhatsApp dan mengirim pesan
            var urlWhatsApp = "https://wa.me/" + nomorWhatsApp + "?text=" + encodeURIComponent(pesan);

            // Buka WhatsApp dengan URL yang sudah dibuat
            window.open(urlWhatsApp);
        });


        // Get data for updating record
        $('#show_data').on('click', '.item_edit', function() {
            var id = $(this).data('id');
            var no_jo = $(this).data('no_jo');
            var pekerjaan = $(this).data('pekerjaan');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="no_jo_edit"]').val(no_jo);
            $('[name="pekerjaan_edit"]').val(pekerjaan);
        });

        $('#btn_save').click(function() {
            var id_edit = $('#id_laporan').val();
            var tgl_pengerjaan = $('#tgl_pengerjaan').val();
            var progres = $('#progres').val();
            var tim_pekerja = $('#tim_pekerja').val();
            var item_pekerjaan = $('#item_pekerjaan').val();
            var keterangan = $('#keterangan').val();
            var tim_absen = $('#tim_absen').val();

            if (!tgl_pengerjaan) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Pengerjaan Wajib Diisi !'
                });
            } else if (!progres) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Progres Wajib Diisi !'
                });
            } else if (!tim_pekerja) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Anggota Tim Pelaksana Wajib Diisi !'
                });
            } else if (!item_pekerjaan) {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Item Pekerjaan Wajib Diisi !'
                });
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('id_edit', id_edit);
                formData.append('tgl_pengerjaan', tgl_pengerjaan);
                formData.append('progres', progres);
                formData.append('tim_pekerja', tim_pekerja);
                formData.append('item_pekerjaan', item_pekerjaan);
                formData.append('keterangan', keterangan);
                formData.append('tim_absen', tim_absen);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('leader/createreport') ?>",
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

                                $('[name="tgl_pengerjaan"]').val("");
                                $('[name="progres"]').val("");
                                $('[name="tim_pekerja"]').val("");
                                $('[name="item_pekerjaan"]').val("");
                                $('[name="keterangan"]').val("");
                                $('[name="tim_absen"]').val("");
                                $('#Modal_Laporan').modal('hide');

                                tampildata();
                            } else {
                                swal({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    text: jsonResponse.message
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