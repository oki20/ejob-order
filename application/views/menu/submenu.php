<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#newSubMenuModal"><span class="fas fa-folder-plus"></span> Add New Submenu</a>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                            <a href= "javascript:void(0)" class="btn btn-info btn-sm item_edit" onclick="editModal('<?= $sm['id'] ?>')"><i class="fas fal fa-edit"></i> Edit</a> 
                            <a href= "javascript:void(0)" class="btn btn-danger btn-sm item_delete" onclick="deleteModal   ('<?= $sm['id'] ?>')"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="subMenuEditModal" tabindex="-1" role="dialog" aria-labelledby="subMenuEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subMenuEditModalLabel">Update Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_menu" name="id_menu" placeholder="Submenu Title">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title_edit" name="title_edit" placeholder="Submenu Title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id_edit" id="menu_id_edit" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url_edit" name="url_edit" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon_edit" name="icon_edit" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active_edit" id="is_active_edit" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_edit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        
        $('#btn_edit').on('click',function(){
            id = $('#id_menu').val()
            title = $('#title_edit').val()
            menu_id =  $('#menu_id_edit').val()
            url = $('#url_edit').val()
            icon =    $('#icon_edit').val()
            is_active =  $('#is_active_edit').val()
            
            $.ajax({
                type : "POST",
                url : '<?= site_url()?>/menu/updateSubmenu/',
                data: {
                    id : id,
                    title : title,
                    menu_id : menu_id,
                    url : url,
                    icon : icon,
                    is_active : is_active
                },
                dataType: "JSON",
                success: function(res){
                    console.log(res);
                }
            })
        })
    })
    
    function editModal(id){
        $('#subMenuEditModal').modal('show')
        console.log(id);
        $.ajax({
            type : "POST",
            url : '<?= site_url()?>/menu/getsubmenu/' + id,
            data: {
                id : id
            },
            success: function(res){
                var json = JSON.parse(res);

                console.log(json);
                $('#id_menu').val(json.id)
                $('#title_edit').val(json.title)
                $('#menu_id_edit').val(json.id)
                $('#url_edit').val(json.url)
                $('#icon_edit').val(json.icon)
                $('#is_active_edit').val(json.is_active)
            }
        })
    }

    function deleteModal(id){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                formData.append('id', id);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('menu/delete') ?>",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var json = JSON.parse(response)
                        console.log(json);
                        if (json.status == "success") {
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                icon: 'success',
                                text: 'Delete Data Berhasil!'
                            });
                            // Reload or update data in your table
                            location.reload()
                        } else {
                            swal({
                                type: 'error',
                                title: 'Delete data Gagal!',
                                icon: 'warning',
                                text: 'Silahkan coba lagi!'
                            });
                        }
                    },
                    error: function(response) {
                        swal({
                            type: 'error',
                            title: 'Oops!',
                            icon: 'warning',
                            text: 'Server error!'
                        });
                    }
                });
            }
        });
    }

</script>