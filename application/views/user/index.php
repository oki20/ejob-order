<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- <?= $this->session->flashdata('message'); ?> -->
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="col-lg-12">
            <a href="<?= base_url('user/edit'); ?>" class="btn btn-sm btn-primary float-right my-2">Edit <i class="fas fa-edit"></i></a>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="modal-body">
                    <div class="form-group">
                    <h5 class="form-control" ><small class="text-muted"> NAMA : <?= $user['name']; ?></h5>
                    <h5 class="form-control" ><small class="text-muted"> EMAIL : <?= $user['email']; ?></h5>
                    <h5 class="form-control" ><small class="text-muted"> NIP : <?= $user['nim']; ?></h5>
                    <h5 class="form-control" ><small class="text-muted"> DEPARTEMEN : <?= $user['departemen']; ?></h5>
                    <i class="card-text"><small class="text-muted" style="font-size:1vw">Member since <?= date('d F Y', $user['date_created']); ?></i>
                    </div>
            </div>   
        </div>
    </div>
    <div class="col-lg-12">
        <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-sm btn-info float-left my-2">Change Password ?</a>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->