<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div style="text-align: right;">
        <div style="display: inline-block;">
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Export"><span class="fa fa-plus"></span> Export to Excel</a>
        </div>
    </div>

    <!-- Export Modal -->
    <div class="modal fade" id="Modal_Export" tabindex="-1" role="dialog" aria-labelledby="ModalExportLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalExportLabel">Export to Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="exportForm">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="exportButton">Export</button>
                </div>
            </div>
        </div>
    </div>


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
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Job Order</th>
                            <th>Pekerjaan</th>
                            <th>Progres</th>
                            <th>Nama Tim</th>
                            <th>Detail Pekerjaan</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Plant</th>
                            <th>No File</th>
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

<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('joborder/tampilreport'); ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;

                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].progres + '</td>' +
                            '<td>' + data[i].nama_tim_pekerja + '</td>' +
                            '<td>' + data[i].item_pekerjaan + '</td>' +
                            '<td>' + data[i].tgl_pengerjaan + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].no_file + '</td>' +

                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#exportButton').on('click', function() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            if (startDate && endDate) {
                window.location.href = '<?= site_url('joborder/exportToExcel') ?>?start_date=' + startDate + '&end_date=' + endDate;
            } else {
                alert('Please select both start and end dates.');
            }
        });
    });
</script>