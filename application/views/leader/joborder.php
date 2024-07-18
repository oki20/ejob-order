<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Job Order</h6>
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
                            <th>Tgl Terima Jo</th>
                            <th>Pelaksana</th>
                            <th>Progress Elektrik</th>
                            <th>Progress Mekanik</th>
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
                        <input type="text" name="no_jo_edit" id="no_jo_edit" class="form-control" placeholder="Nomor Transaksi" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Pekerjaan</label>
                        <input type="text" name="pekerjaan_edit" id="pekerjaan_edit" class="form-control" placeholder="Nomor Transaksi" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Laporan Harian JO</label>
                        <input type="date" name="tgl_pengerjaan" id="tgl_pengerjaan" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Progress Pengerjaan JO</label>
                        <input type="number" name="progres" id="progres" class="form-control" onInput="return check(event,value)" min="0" max="100" step="0" placeholder="Progres">
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
                        <label class="col-form-label">Detail Pengerjaan JO</label>
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
<!--END MODAL EDIT-->

<script type="text/javascript">
    check = function(e, value) {
        if (!e.target.validity.valid) {
            e.target.value = value.substring(0, value.length - 1);
            return false;
        }
        var idx = value.indexOf('.');
        if (idx >= 0) {
            if (value.length - idx > 3) {
                e.target.value = value.substring(0, value.length - 1);
                return false;
            }
        }
        return true;
    }
    $(document).ready(function() {
        $('#tim_pekerja').select2({
            theme: 'bootstrap4'
        })
        $('#tim_absen').select2({
            theme: 'bootstrap4'
        })


        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('leader/tampiljo'); ?>',
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
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].no_file + '</td>' +
                            '<td>' + data[i].tgl_terima + '</td>' +
                            '<td>' + data[i].pelaksana + '</td>' +
                            '<td>' + data[i].progres_elektrik + '</td>' +
                            '<td>' + data[i].progres_mekanik + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="' + data[i].job_order_id +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan + '"><i class="fas fa-percentage"></i> Buat Laporan</a>' + ' ' +
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
            var no_jo = $(this).data('no_jo');
            var pekerjaan = $(this).data('pekerjaan');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="no_jo_edit"]').val(no_jo);
            $('[name="pekerjaan_edit"]').val(pekerjaan);
        });

        $('#btn_save').click(function() {
            var id_edit = $('#id_edit').val();
            var tgl_pengerjaan = $('#tgl_pengerjaan').val();
            var progres = $('#progres').val();
            var tim_pekerja = $('#tim_pekerja').val();
            var item_pekerjaan = $('#item_pekerjaan').val();
            var keterangan = $('#keterangan').val();
            var tim_absen = $('#tim_absen').val();

            if (!tgl_pengerjaan) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Pengerjaan Wajib Diisi !'
                });
            } else if (!progres) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Progres Wajib Diisi !'
                });
            } else if (!tim_pekerja) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Anggota Tim Pelaksana Wajib Diisi !'
                });
            } else if (!item_pekerjaan) {
                Swal.fire({
                    icon: 'warning',
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
                                $('#Modal_Edit').modal('hide');

                                tampildata();
                            } else {

                                swal({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    icon: 'warning',
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