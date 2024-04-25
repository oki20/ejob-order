<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Menu</a>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                    <!--<?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>-->
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<form>
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL EDIT -->
<form>
    <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_edit" id="id_edit" class="form-control">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Nama Menu</label>
                        <div class="col-md-10">
                            <input type="text" name="menu_edit" id="menu_edit" class="form-control" placeholder="Nomor Transaksi">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_edit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL EDIT-->

<!-- Script CRUD -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('menu/tampilmenu') ?>',
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
                            '<td>' + data[i].menu + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-sm item_edit" data-id="' + data[i].id +
                            '" data-menu="' + data[i].menu + '">Edit</a>' + ' ' +
                            '<a href="<?= base_url('admin/roleaccess/') ?>' + data[i].id + '" class="btn btn-danger btn-sm item_edit">Delete</a>' +
                            '</td>' +
                            '</tr>';

                    }
                    $('#show_data').html(html);
                }
            });
        }

        $('#btn_save').click(function() {
            var menu = $('#menu').val();

            if (menu.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Menu Wajib Diisi !'
                });
            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('menu', menu);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('menu/simpandata') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var jsonResponse = JSON.parse(response);
                            if (jsonResponse.status === "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: 'Simpan Data Berhasil!'
                                });

                                $('[name="menu"]').val("");
                                $('#Modal_Add').modal('hide');

                                tampildata();
                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Simpan data Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }
                        } catch (e) {
                            console.error('Error parsing server response:', e);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Error parsing server response!!'
                            });
                        }

                        console.log(response);
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }
                });
            }
        });

        // Get data for updating record
        $('#show_data').on('click', '.item_edit', function() {
            // Base URL for images obtained from CodeIgniter base_url() function
            var baseUrl = '<?php echo base_url(); ?>';
            var id = $(this).data('id');
            var menu = $(this).data('menu');

            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="menu_edit"]').val(menu);
        });

        //btn_edit Menu
        $('#btn_edit').on('click', function() {
            var id = $('#id_edit').val();
            var menu = $('#menu_edit').val();

            var formData = new FormData();
            formData.append('id', id);
            formData.append('menu', menu);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('menu/editdata') ?>",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response == "success") {
                        Swal.fire({
                            type: 'success',
                            title: 'Berhasil!',
                            text: 'Update Data Berhasil!'
                        });

                        $('[name="menu"]').val("");

                        $('#Modal_Edit').modal('hide');

                        // Reload or update data in your table
                        tampildata();
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Update data Gagal!',
                            text: 'Silahkan coba lagi!'
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops!',
                        text: 'Server error!'
                    });
                }
            });
        });

    });
</script>