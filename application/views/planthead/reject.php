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
            <h6 class="m-0 font-weight-bold text-primary">Data Reject Job Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Job Order</th>
                            <th>Pekerjaan</th>
                            <th>Saran</th>
                            <th>Plant</th>
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

<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('planthead/tampilreject') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        var statusBadge = '';

                        if (data[i].status == '7') {
                            statusBadge = '<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Reject by Plant.Head</span>';
                            html += '<tr>' +
                                '<td>' + nomor + '</td>' +
                                '<td>' + data[i].no_jo + '</td>' +
                                '<td>' + data[i].pekerjaan + '</td>' +
                                '<td>' + data[i].saran_dept + '</td>' +
                                '<td> Plant ' + data[i].nama + '</td>' +
                                '<td>' + statusBadge + '</td>' +
                                '</tr>';
                        }
                    }
                    $('#show_data').html(html);
                }
            });
        }

        // Get data for updating record
        $('#show_data').on('click', '.item_approve', function() {
            var id = $(this).data('id');
            $('#Modal_approve').modal('show');
            $('[name="id_edit"]').val(id);
        });

        $('#show_data').on('click', '.item_reject', function() {
            var id = $(this).data('id');
            $('#Modal_reject').modal('show');
            $('[name="id_edit"]').val(id);
        });
    });
</script>