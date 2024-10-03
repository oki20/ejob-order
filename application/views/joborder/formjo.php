        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Content Column -->
                <div class="col-lg-12 mt-4 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary text-center">JOB ORDER FORM</h3>
                            <h6 class="m-0 font-weight-bold text-primary text-center">PT Gajah Tunggal Tbk</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <!-- Section 1: Header -->
                                <div class="col-md-6">
                                    <label for="jobName" class="form-label">Nomor Job Order</label>
                                    <input type="text" class="form-control" id="jobName" value="<?= $jo['no_jo']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="jobDate" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="jobDate" value="<?= $jo['tgl_jo']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="jobDate" class="form-label">Nomor CC</label>
                                    <input type="text" class="form-control" id="jobDate" value="<?= $jo['cc_no'] ?>">
                                </div>

                                <!-- Section 3: Job Details -->
                                <div class="col-md-12">
                                    <label for="jobDetails" class="form-label">Pekerjaan</label>
                                    <textarea class="form-control" id="jobDetails" rows="3"><?= $jo['pekerjaan']; ?></textarea>
                                </div>

                                <!-- Section 4: Signatures -->
                                <div class="col-md-6">
                                    <label for="assignedTo" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" id="assignedTo" value="<?= $jo['tujuan']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="completedBy" class="form-label">Rencana</label>
                                    <input type="text" class="form-control" id="completedBy" <?= $jo['rencana']; ?>>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-2 mb-2">
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>