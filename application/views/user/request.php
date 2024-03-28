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
                            <input type="text" name="dwg_no" id="dwg_no" class="form-control" placeholder="Masukkan CC Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Mesin Number</label>
                        <div class="col-md-10">
                            <input type="text" name="mesin_no" id="mesin_no" class="form-control" placeholder="Masukkan CC Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">File PDF</label>
                        <div class="col-md-10">
                            <input type="file" name="fpdf" id="fpdf" class="form-control-file">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="col">
                            <div id="pdfObject" style="max-width: 100%; max-height: 300px; overflow: auto;">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('master/tampilrequest') ?>',
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
    });
</script>

<script>
    // Function to handle PDF file selection
    function choosePDF() {
        document.getElementById('fpdf').click();
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
    $('#fpdf').change(function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            displayPDF(e.target.result);
        };

        reader.readAsDataURL(file);
    });
</script>