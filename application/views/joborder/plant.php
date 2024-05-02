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
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id_plant="' + data[i].id_plant +
                            '" data-nama="' + data[i].nama + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="' + data[i].id + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });
</script>