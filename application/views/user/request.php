<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="text-align: right;">
            <div style="display: inline-block;">
                <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Create Job Order </a>
            </div>
        </div>
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Request Job Order</h6>
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

<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Request Job Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">No. Job Order</label>
                        <div class="col-md-10">
                            <input type="text" name="no_jo" id="no_jo" class="form-control" placeholder="Masukkan Nomor Job Order">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tgl. Job Order</label>
                        <div class="col-md-10">
                            <input type="date" name="tgl_jo" id="tgl_jo" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">C.C. Number</label>
                        <div class="col-md-10">
                            <input type="text" name="cc_no" id="cc_no" class="form-control" placeholder="Masukkan CC Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Detail Pekerjaan</label>
                        <div class="col-md-10">
                            <textarea class="form-control" placeholder="Masukkan Detail Pekerjaan" id="pekerjaan" name="pekerjaan" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Tujuan</label>
                        <div class="col-md-10">
                            <select id="tujuan" name="tujuan" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Produk Baru">Produk Baru</option>
                                <option value="Quality Naik">Quality Naik</option>
                                <option value="Menurunkan Scrapt">Menurunkan Scrapt</option>
                                <option value="Penggantian">Penggantian</option>
                                <option value="Produksi Naik">Produksi Naik</option>
                                <option value="Mengurangi Tenaga">Mengurangi Tenaga</option>
                                <option value="Keselamatan">Keselamatan</option>
                                <option value="Cadangan">Cadangan</option>
                                <option value="dll">Dll.</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Rencana</label>
                        <div class="col-md-10">
                            <select id="rencana" name="rencana" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Pembuatan Baru">Pembuatan Baru</option>
                                <option value="Pemasangan">Pemasangan</option>
                                <option value="Modifikasi">Modifikasi</option>
                                <option value="Pemindahan">Pemindahan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pelaksana Job Order</label>
                        <div class="col-md-10">
                            <select id="pelaksana" name="pelaksana" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="Elektrik">Elektrik</option>
                                <option value="Mekanik">Mekanik</option>
                                <option value="Elektrik dan Mekanik">Elektrik dan Mekanik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Perkiraan Budget Proyek</label>
                        <div class="col-md-10">
                            <select id="cep_no" name="cep_no" class="form-control custom-select" value="">
                                <option selected disabled>Select one</option>
                                <option value="M&R">
                                    < 100 Juta</option>
                                <option value="Capex">> 100 Juta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Drawing Number</label>
                        <div class="col-md-10">
                            <input type="text" name="dwg_no" id="dwg_no" class="form-control" placeholder="Masukkan Drawing Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Mesin Number</label>
                        <div class="col-md-10">
                            <input type="text" name="mesin_no" id="mesin_no" class="form-control" placeholder="Masukkan Mesin Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Lampiran</label>
                        <div class="col-md-10">
                            <input type="file" name="lampiran" id="lampiran" class="form-control-file">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="col">
                            <div id="pdfObject" style="max-width: 100%; max-height: 300px; overflow: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Pilih Plant</label>
                        <div class="col-md-10">
                            <select class="form-control custom-select" id="plant" name="plant">
                                <option selected>Select Your Plant</option>
                                <?php foreach ($plants as $plant) : ?>
                                    <option value="<?php echo $plant['id_plant']; ?>"><?php echo $plant['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Departemen Head</label>
                        <div class="col-md-10">
                            <select id="dept_head" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <!-- Options will be populated dynamically via JavaScript -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Plant Head</label>
                        <div class="col-md-10">
                            <select id="plant_head" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <!-- Options will be populated dynamically via JavaScript -->
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->

<!-- Script CRUD -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('user/tampilrequest') ?>',
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
                            '<td> Plant ' + data[i].no_jo + '</td>' +
                            '<td> Plant ' + data[i].pekerjaan + '</td>' +
                            '<td> Plant ' + data[i].pelaksana + '</td>' +
                            '<td> Plant ' + data[i].id_plant + '</td>' +
                            '<td> Plant ' + data[i].status + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id_plant="' + data[i].id_plant +
                            '" data-nama="' + data[i].nama + '">Edit</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_plant="' + data[i].id_plant + '">Delete</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        // Save product
        $('#btn_save').on('click', function() {
            var no_jo = $('#no_jo').val();
            var tgl_jo = $('#tgl_jo').val();
            var cc_no = $('#cc_no').val();
            var pekerjaan = $('#pekerjaan').val();
            var tujuan = $('#tujuan').val();
            var pelaksana = $('#pelaksana').val();
            var rencana = $('#rencana').val();
            var cep_no = $('#cep_no').val();
            var dwg_no = $('#dwg_no').val();
            var mesin_no = $('#mesin_no').val();
            var id_plant = $('#id_plant').val();
            var id_depthead = $('#id_depthead').val();
            var id_planthead = $('#id_planthead').val();
            var lampiran = $('#lampiran')[0].files[0];

            if (no_jo.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nomor Job Order Wajib Di Pilih !'
                });

            } else if (tgl_jo.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tanggal Job Order Wajib Diisi !'
                });

            } else if (cc_no.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Cost Centre Wajib Diisi !'
                });

            } else if (pekerjaan.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Detail Pekerjaan Wajib Diisi !'
                });

            } else if (tujuan.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Tujuan Wajib Diisi !'
                });

            } else if (pelaksana.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Pelaksana Wajib Diisi !'
                });

            } else if (cep_no.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'CEP Nomer Wajib Diisi !'
                });

            } else {
                // Form data untuk mengirimkan file
                var formData = new FormData();
                formData.append('no_jo', no_jo);
                formData.append('tgl_jo', tgl_jo);
                formData.append('cc_no', cc_no);
                formData.append('pekerjaan', pekerjaan);
                formData.append('tujuan', tujuan);
                formData.append('pelaksana', pelaksana);
                formData.append('rencana', rencana);
                formData.append('cep_no', cep_no);
                formData.append('dwg_no', dwg_no);
                formData.append('mesin_no', mesin_no);
                formData.append('id_plant', id_plant);
                formData.append('id_depthead', id_depthead);
                formData.append('id_planthead', id_planthead);
                formData.append('lampiran', lampiran);

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url() ?>/user/simpandata",
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

                                $('[name="no_jo"]').val("");
                                $('[name="tgl_jo"]').val("");
                                $('[name="cc_no"]').val("");
                                $('[name="pekerjaan"]').val("");
                                $('[name="tujuan"]').val("");
                                $('[name="pelaksana"]').val("");
                                $('[name="rencana"]').val("");
                                $('[name="cep_no"]').val("");
                                $('[name="dwg_no"]').val("");
                                $('[name="mesin_no"]').val("");
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
    });
</script>

<script>
    // Function to handle PDF file selection
    function choosePDF() {
        document.getElementById('lampiran').click();
    }

    // Function to render the PDF file
    function renderPDF(url, canvasContainer) {
        pdfjsLib.getDocument(url).promise.then(function(pdf) {
            var totalPages = pdf.numPages;

            for (var i = 1; i <= totalPages; i++) {
                pdf.getPage(i).then(function(page) {
                    var scale = 1.5;
                    var viewport = page.getViewport({
                        scale: scale
                    });
                    var canvas = document.createElement('canvas');
                    var context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    canvasContainer.appendChild(canvas);

                    page.render(renderContext);
                });
            }
        });
    }

    // Function to display the PDF file
    function displayPDF(pdfUrl) {
        console.log("PDF URL:", pdfUrl); // Log PDF URL for debugging

        var pdfObject = document.getElementById('pdfObject');
        var canvasContainer = document.createElement('div');
        canvasContainer.setAttribute('style', 'max-width: 100%; max-height: 300px; overflow: auto;');

        // Render PDF and handle errors
        try {
            renderPDF(pdfUrl, canvasContainer);
        } catch (error) {
            console.error("Error rendering PDF:", error); // Log error message
            pdfObject.innerHTML = '<p>Error rendering PDF</p>'; // Display error message in case of failure
        }

        pdfObject.innerHTML = ''; // Clear previous content
        pdfObject.appendChild(canvasContainer);
    }

    // Event listener for file input change
    $('#lampiran').change(function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            displayPDF(e.target.result);
        };

        reader.readAsDataURL(file);
    });
</script>

<!-- Script Select Bertingkat -->
<script>
    $(document).ready(function() {
        $('#plant').change(function() {
            // Mendapatkan nilai id_plant dari option yang dipilih
            var id_plant = $("#plant").val();
            // Menggunakan nilai plantId sesuai kebutuhan, misalnya, untuk menampilkan dalam konsol
            console.log("Selected Plant ID:", id_plant);
            // Lanjutkan dengan melakukan operasi yang diperlukan, misalnya, pengiriman AJAX
            $.ajax({
                url: "<?php echo base_url(); ?>/user/getdepthead",
                method: "POST",
                data: {
                    id_plant: id_plant
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                        }
                    } else {
                        html += '<option value="" disabled selected>Dept Head not available</option>';
                    }
                    $('#dept_head').html(html);
                    $.ajax({
                        url: "<?php echo base_url(); ?>/user/getplanthead",
                        method: "POST",
                        data: {
                            id_plant: id_plant
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            if (data.length > 0) {
                                for (var i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                                }
                            } else {
                                html += '<option value="" disabled selected>Plant Head not available</option>';
                            }
                            $('#plant_head').html(html);
                        }
                    });
                }
            });
        });
    });
</script>