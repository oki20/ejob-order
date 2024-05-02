<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <?php foreach ($plant as $plt) : ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="<?= base_url('joborder/plant'); ?>" class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Job Order Plant</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">253</div>
                            </div>
                            <div class="col-auto">
                                <h1><?= $plt['nama']; ?></h1>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->