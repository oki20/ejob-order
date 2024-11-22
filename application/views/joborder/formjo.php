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
                            <h6 class="m-0 font-weight-bold text-black text-center">PT Gajah Tunggal Tbk</h6>
                        </div>
                        <div class="card-body">
                            <form class="row g-3">
                                <!-- Section 1: Header -->
                                <input type="text" id="id" name="id" value="<?= $jo['id']; ?>" hidden>
                                <div class="col-md-6">
                                    <label for="jobName" class="form-label">Nomor Job Order</label>
                                    <input type="text" class="form-control" id="jobName" value="<?= $jo['no_jo']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="jobDate" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="jobDate" value="<?= $jo['tgl_jo']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="jobDate" class="form-label">Nomor CC</label>
                                    <input type="text" class="form-control" id="jobDate" value="<?= $jo['cc_no'] ?>" readonly>
                                </div>

                                <!-- Section 3: Job Details -->
                                <div class="col-md-12">
                                    <label for="jobDetails" class="form-label">Pekerjaan</label>
                                    <textarea class="form-control" id="jobDetails" rows="3" readonly><?= $jo['pekerjaan']; ?></textarea>
                                </div>

                                <!-- Section 4: Signatures -->
                                <div class="col-md-6">
                                    <label for="assignedTo" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" id="assignedTo" value="<?= $jo['tujuan']; ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="assignedTo" class="form-label">Rencana</label>
                                    <input type="text" class="form-control" id="assignedTo" value="<?= $jo['rencana']; ?>" readonly>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-2 mb-2">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal_Edit" id="create_reject">Reject</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add" id="create_receive">Receive</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- MODAL Konfirmasi -->
        <form>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalRequestLabel">Form Request Job Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_jo" id="id_jo" value="<?= $jo['id']; ?>">
                            <p>Silahkan isi NIP anda, kemudian klik tombol konfirmasi!</p>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nomor Induk Pegawai</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Masukkan NIP Anda" id="nip" name="nip" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_receive" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--END MODAL Konfirmasi-->

        <!-- MODAL Reject -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalRequestLabel1">Konfirmasi Tolak Job Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id_jo" id="id_jo" value="<?= $jo['id']; ?>">
                            <p>Silahkan klik tombol konfirmasi, Anda bisa memberikan alasan di form saran kenapa Job Order ini di tolak.!</p>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Nomor Induk Pegawai</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Masukkan NIP Anda" id="nip" name="nip" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Kotak Saran</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" placeholder="Masukkan Saran" id="saran" name="saran" style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" type="submit" id="btn_reject" class="btn btn-primary">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--END MODAL Konfirmasi-->

        <!-- Script CRUD -->
        <script type="text/javascript">
            var method = '';

            $(document).ready(function() {

                // Event untuk tombol receive
                $('#create_receive').on('click', function() {
                    method = 'add';
                    $('#modalRequestLabel').html('Konfirmasi Terima Job Order');
                });

                // Event untuk tombol reject
                $('#create_reject').on('click', function() {
                    method = 'reject';
                    $('#modalRequestLabel1').html('Konfirmasi Tolak Job Order');
                });

                // Proses receive data
                $('#btn_receive').on('click', function() {
                    var id_jo = $('#id_jo').val();
                    var nip = $('#nip').val();

                    // Membuat FormData untuk pengiriman data
                    var formData = new FormData();
                    formData.append('id_jo', id_jo);
                    formData.append('nip', nip);

                    // URL untuk menerima data
                    var url = "<?php echo site_url() ?>form/receivedata/" + id_jo;

                    // Mengirim data via AJAX
                    $.ajax({
                        type: "POST",
                        url: url,
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
                                        text: jsonResponse.message
                                    });
                                    $('#Modal_Add').modal('hide');
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: jsonResponse.message
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
                        },
                        error: function(response) {
                            console.error(response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Server error!'
                            });
                        }
                    });
                });

                // Proses reject data
                $('#btn_reject').on('click', function() {
                    var id_jo = $('#id_jo').val();
                    var saran = $('#saran').val();
                    var nip = $('#nip').val();

                    var formData = new FormData();
                    formData.append('id_jo', id_jo);
                    formData.append('saran', saran);
                    formData.append('nip', nip);

                    var url = "<?php echo site_url() ?>form/rejectdata/" + id_jo;

                    $.ajax({
                        type: "POST",
                        url: url,
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
                                        text: jsonResponse.message
                                    });
                                    $('#Modal_Edit').modal('hide');
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Tolak data Gagal!',
                                        text: jsonResponse.message
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
                        },
                        error: function(response) {
                            console.error(response);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oppss!',
                                text: 'Server error!'
                            });
                        }
                    });
                });
            });
        </script>