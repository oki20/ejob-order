<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Job Order </h6>
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
<script>
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('leader/tampiljouser'); ?>',
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
                            '<td>' + data[i].no_file + '</td>' +
                            '<td>' + data[i].tgl_terima + '</td>' +
                            '<td>' + data[i].pelaksana + '</td>' +
                            '<td>' + data[i].progres_elektrik + '</td>' +
                            '<td>' + data[i].progres_mekanik + '</td>' +
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
    })
</script>