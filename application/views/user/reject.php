<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Reject Job Order</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="mydata" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Job Order</th>
                                <th>Pekerjaan</th>
                                <th>Saran</th>
                                <th>Plant</th>
                                <th>Status</th>
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

<!-- Script CRUD -->
<script type="text/javascript">
    $(document).ready(function() {
        tampildata();
        $('#mydata').dataTable();

        // Function to show data
        function tampildata() {
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('user/tampilreject') ?>',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var no;
                    for (i = 0; i < data.length; i++) {
                        var nomor = i + 1;
                        var statusBadge = '';

                        rejectStatus = {
                            6: 'Dept.Head',
                            7: 'Plant.Head',
                            8: 'Factory.Head',
                            9: 'Engineering.Head',
                        }
                        statusBadge = `<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Reject by ${rejectStatus[data[i].status]}</span>`;
                        // statusBadge = `<a class="btn" onClick="rejectButton('${data[i].saran_dept}')" ><span class="badge badge-danger"><i class="fas fa-info-circle"></i> Reject by ${rejectStatus[data[i].status]}</span></a>`;
                        html += '<tr>' +
                            '<td>' + nomor + '</td>' +
                            '<td>' + data[i].no_jo + '</td>' +
                            '<td>' + data[i].pekerjaan + '</td>' +
                            '<td>' + data[i].saran_dept + '</td>' +
                            '<td> Plant ' + data[i].nama + '</td>' +
                            '<td>' + statusBadge + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        // Function to handle delete confirmation
        $('#show_data').on('click', '.item_delete', function() {
            var id = $(this).data('id');

            // SweetAlert confirmation before proceeding with deletion

            swal({
                    title: "Are you sure?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        deleteProduct(id);
                    }
                });
        });



        // $('.rejectButton').on('click', function() {
        //     Swal.fire({
        //         html: `
        //         <div>
        //             <p class="text-left">Reason :</p>
        //             <textarea rows="4" cols="50" class="form-control" disabled></textarea>
        //         </div>
        //         `
        //     });
        // })

        // Function to handle actual deletion using AJAX
        function deleteProduct(id) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/deleterequest') ?>",
                dataType: "JSON",
                data: {
                    id: id
                },
                success: function(data) {
                    // Handle success, for example, show success message
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        icon: 'success',
                        timer: 3000
                    });
                    tampildata();
                },
                error: function(xhr, status, error) {
                    // Handle error, for example, show error message
                    swal({
                        title: 'Error!',
                        text: 'Unable to delete product.',
                        icon: 'error'
                    });
                }
            });
        }
    });

    function rejectButton(reason) {
        Swal.fire({
            html: `
                <div>
                    <p class="text-left">Reason :</p>
                    <textarea rows="4" cols="50" class="form-control" disabled>${reason}</textarea>
                </div>
                `
        });
    }
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
                    console.log(id_plant);
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