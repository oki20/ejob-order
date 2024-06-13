<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Job Order Tunggu Approve Instalasi</h6>
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
                                <th>Pelaksana</th>
                                <th>Plant</th>
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




<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();
        console.log("TESTING");
    });

    function tampildata() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('leader/tampiljoadmincomplete'); ?>',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var no;
                for (i = 0; i < data.length; i++) {
                    var nomor = i + 1;
                    var statusBadge = '';

                    var mekanikProgress = data[i].progres_mekanik;
                    var elektrikProgress = data[i].progres_elektrik;
                    var thisPelaksana = data[i].pelaksana;

                    let isDanPresent = thisPelaksana.includes('dan');
                    let isMekanikComplete = mekanikProgress == '100';
                    let isElektrikComplete = elektrikProgress == '100';
                    let isMekanikAndElektrikComplete = mekanikProgress == '100' && elektrikProgress == '100';


                    console.log(data[i].tgl_terima);
                    if ((!isDanPresent && (isMekanikComplete || isElektrikComplete)) || (isMekanikAndElektrikComplete && isDanPresent)) {
                        let row = '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].no_file + '</td>' +
                            '<td>' + data[i].pelaksana + '</td>' +
                            '<td>' + data[i].plant_name + '</td>' +
                            '<td style="text-align:right;">' +
                            ((data[i].tgl_terima == '0000-00-00') ?
                                '<a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="selesai(' + data[i].job_order_id + ')">Selesai</a>' :
                                "<div class='badge badge-success'>Approved</div>") +
                            '</td>' +
                            '</tr>';

                        html += row;
                    }
                    $('#show_data').html(html);
                }
            }
        });
    }

    function selesai(id) {
        var jobId = id;

        $.ajax({
            type: "POST",
            url: '<?= site_url() ?>/admin/completejob/' + jobId,
            dataType: "JSON",
            data: {
                id: jobId
            },
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    swal({
                        type: 'success',
                        title: 'Berhasil!',
                        icon: 'success',
                        text: 'Job Order Complete!'
                    });
                } else {
                    swal({
                        type: 'error',
                        title: 'Update data Gagal!',
                        icon: 'warning',
                        text: 'Silahkan coba lagi!'
                    });
                }
                tampildata();
            },
            error: function(response) {
                swal({
                    type: 'error',
                    title: 'Oops!',
                    icon: 'warning',
                    text: 'Server error!'
                });
            }
        })
    }
</script>