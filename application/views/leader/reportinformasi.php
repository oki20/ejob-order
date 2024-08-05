<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Job Order</th>
                            <th>Pekerjaan</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Progress</th>
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

                    <input type="hidden" name="id_report" id="id_report" class="form-control">
                    <input type="hidden" name="id_laporan" id="id_laporan" class="form-control">
                    <div class="mb-3">
                        <label class="col-form-label">Nomor Job Order</label>
                        <input type="text" name="no_jo_laporan" id="no_jo_laporan" class="form-control" placeholder="Nomor Transaksi" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Keterangan Pekerjaan</label>
                        <input type="text" name="pekerjaan_laporan" id="pekerjaan_laporan" class="form-control" placeholder="Nomor Transaksi" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tanggal Laporan Harian JO</label>
                        <input type="date" name="tgl_pengerjaan" id="tgl_pengerjaan" class="form-control" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Progress Pengerjaan JO</label>
                        <input type="text" name="progres" id="progres" class="form-control" onInput="return check(event,value)" min="0" max="100" step="0" placeholder="Progres">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Tim Pelaksana</label>
                        <select id="tim_pekerja" name="tim_pekerja[]" multiple="multiple" class="form-control" required>
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

    var method = '';

    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('leader/tampilreportinformasi'); ?>',
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
                            '<td class="table-cell">' + data[i].no_info + '</td>' +
                            '<td class="table-cell">' + data[i].pekerjaan + '</td>' +
                            '<td class="table-cell">' + data[i].tgl_pengerjaan + '</td>' +
                            '<td class="table-cell">' + data[i].progres + '</td>' +
                            '<td style="text-align:right;">' +
                            '<div class="button-container">' +
                            '<a href="javascript:void(0);" class="btn btn-sm btn-info" onclick="edit(' + data[i].id + ')"><i class="fas fal fa-edit"></i> Edit</a>' +
                            '<a href="javascript:void(0);" class=" btn btn-success btn-sm item_whatsapp" data-id_jo="' + data[i].id_jo +
                            '" data-no_jo="' + data[i].no_jo + '" data-pekerjaan="' + data[i].pekerjaan +
                            '" data-tgl_pengerjaan="' + data[i].tgl_pengerjaan + '" data-item_pekerjaan="' + data[i].item_pekerjaan +
                            '"><i class="fab fa-whatsapp"></i> Whatsapp</a>' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_laporan" data-id_info="' + data[i].id_info +
                            '" data-no_jo="' + data[i].no_info + '" data-pekerjaan="' + data[i].pekerjaan + '"><i class="fas fa-percentage"></i> Buat Laporan</a>' +
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

            method = "add";

            $('#exampleModalLabel').html("Report Form");
            $('#Modal_Laporan').modal('show');
            $('[name="id_laporan"]').val(id_jo);
            $('[name="no_jo_laporan"]').val(no_jo);
            $('[name="pekerjaan_laporan"]').val(pekerjaan);
        });
    });
</script>