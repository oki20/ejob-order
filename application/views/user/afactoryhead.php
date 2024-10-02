<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
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
                                <th>Pelaksana</th>
                                <th>Status</th>
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

<!-- Script CRUD -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('user/tampilafactoryhead') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        var statusBadge = '';

                        statusBadge = '<span class="badge badge-success"><i class="fas fa-info-circle"></i> Accept by Factory Head</span>';
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].pelaksana + '</td>' +
                            '<td>' + statusBadge + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });
</script>