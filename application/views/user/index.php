<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="text-gray-800">Dashboard</h3>
    <h6 class="mb-3">Selamat datang di Aplikasi E-Job Order Departemen Instalasi</h6>


    <!-- Content Row -->
    <div class="row">
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Tahun <?= date('Y'); ?></h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="jobOrderPieChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Job Order Instalasi Tiap Plant</h6>
                </div>
                <!-- Card Body -->
                <!-- <div class="card-body">
                    <div class="row">
                        <?php foreach ($plant as $plt) : ?>
                            <div class="col-xl-3 col-md-4 mb-2">
                                <a href="<?= base_url('joborder/plant/' . $plt['id_plant']); ?>" class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Job Order Plant</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $plt['total_jo']; ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <h6><?= $plt['nama']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div> -->
                <div class="card-body">
                    <canvas id="jobOrderChart" width="300" height="150"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="col-lg-12">
                        <a href="<?= base_url('user/edit'); ?>" class="btn btn-sm btn-primary float-right my-2">Edit <i class="fas fa-edit"></i></a>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-circle" alt="Profile Picture">
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <h6 class="form-control"><small class="text-muted"> NAMA : <?= $user['name']; ?></h6>
                                <h6 class="form-control"><small class="text-muted"> EMAIL : <?= $user['email']; ?></h6>
                                <h6 class="form-control"><small class="text-muted"> NIP : <?= $user['nim']; ?></h6>
                                <h6 class="form-control"><small class="text-muted"> DEPARTEMEN : <?= $user['departemen']; ?></h6>
                                <i class="card-text"><small class="text-muted" style="font-size:1vw">Member since <?= date('d F Y', $user['date_created']); ?></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-sm btn-info float-left my-2">Change Password ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Heading -->
    <!-- <h3 class="h3 mb-4 text-gray-800"><?= $title; ?></h3> -->

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <!-- <div class="card mb-3 col-lg-8">
        <div class="col-lg-12">
            <a href="<?= base_url('user/edit'); ?>" class="btn btn-sm btn-primary float-right my-2">Edit <i class="fas fa-edit"></i></a>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h5 class="form-control"><small class="text-muted"> NAMA : <?= $user['name']; ?></h5>
                    <h5 class="form-control"><small class="text-muted"> EMAIL : <?= $user['email']; ?></h5>
                    <h5 class="form-control"><small class="text-muted"> NIP : <?= $user['nim']; ?></h5>
                    <h5 class="form-control"><small class="text-muted"> DEPARTEMEN : <?= $user['departemen']; ?></h5>
                    <i class="card-text"><small class="text-muted" style="font-size:1vw">Member since <?= date('d F Y', $user['date_created']); ?></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <a href="<?= base_url('user/changepassword'); ?>" class="btn btn-sm btn-info float-left my-2">Change Password ?</a>
    </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    const jobOrderData = <?= json_encode($plant); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('jobOrderChart').getContext('2d');
        const labels = jobOrderData.map(data => data.nama);
        const dataValues = jobOrderData.map(data => data.total_jo);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Job Orders',
                    data: dataValues,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('jobOrderPieChart').getContext('2d');

        // Data dari PHP
        const totalKeseluruhan = <?= $totaljo['total_jo']; ?>; // Total Keseluruhan
        const totalSelesai = <?= $totalyear['total_jo']; ?>; // Total Selesai
        const totalBerjalan = <?= $totaljoprogres['total_jo']; ?>; // Total Sedang Berjalan

        // Hitung persentase
        const selesaiPercentage = ((totalSelesai / totalKeseluruhan) * 100).toFixed(2);
        const berjalanPercentage = ((totalBerjalan / totalKeseluruhan) * 100).toFixed(2);

        // Data untuk chart
        const totalData = [totalSelesai, totalBerjalan];
        const labels = [
            `JO Selesai (${selesaiPercentage}%)`,
            `JO Sedang Berjalan (${berjalanPercentage}%)`
        ];

        // Warna untuk tiap data
        const backgroundColors = [
            'rgba(54, 162, 235, 0.2)', // Biru
            'rgba(255, 206, 86, 0.2)' // Kuning
        ];

        const borderColors = [
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
        ];

        // Buat pie chart
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: totalData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const index = context.dataIndex;
                                const value = context.raw;
                                const percentage = ((value / totalKeseluruhan) * 100).toFixed(2);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>