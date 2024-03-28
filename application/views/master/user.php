<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!--<div style="text-align: right;">
            <div style="display: inline-block;">
                <a href="javascript:void(0);" class="btn btn-primary" onclick="activateWebcam()" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Tambah Plant </a>
            </div>
        </div>-->
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User E-Job Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIK</th>
                                <th>Plant</th>
                                <th>Departemen</th>
                                <th>Role Id</th>
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
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('master/tampiluser') ?>',
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
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td>' + data[i].nim + '</td>' +
                            '<td>' + data[i].plant + '</td>' +
                            '<td>' + data[i].departemen + '</td>' +
                            '<td>' + data[i].role_id + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_plant="' + data[i].id_plant + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }
    });
</script>