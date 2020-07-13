<?php $this->load->view("pub/header"); ?>

    <!-- Script -->
    <script type="text/javascript">
        // var table = null;

        $(document).ready(function() {
            /* data table */
            var table = $('#tableData').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [[ 0, 'asc' ]],
                'searching': false,
                "ajax": {
                    "url": "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/pagination"); ?>",
                    "data": function(data) {
                        // Read values
                        var txtSrcTanggalLembur = $('#txtSrcTanggalLembur').val();
                        var txtSrcIdPegawai = $('#txtSrcIdPegawai').val();
                        // Append to data
                        data.txtSrcTanggalLembur = txtSrcTanggalLembur;
                        data.txtSrcIdPegawai = txtSrcIdPegawai;
                    },
                    "type": "POST"
                    // ,"complete": function(xhr, responseText) {
                    //     alert(JSON.stringify(xhr));
                    //     // alert(JSON.stringify(responseText));
                    // }
                },
                "deferRender": true,
                "aLengthMenu": [[10, 25, 50],[10, 25, 50]],
                "columns": [
                    { "data": "nama_pegawai" }
                    ,{ "data": "divisi" }
                    ,{ "data": "unit" }
                    ,{ "data": "waktu_input" }
                    ,{ "render": function ( data, type, row) {
                            var html  = "<a class='btn btn-warning btn-sm item_view' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id + "' rel = '" + row.id + "'><span class='fas fa-edit'></span></a> "
                            return html;
                        }
                    }
                ],
            });

            $('#txtSrcTanggalLembur').change(function() {
                table.draw();
            });

            /* get data for update record */
            $('#showData').on('click','.item_view',function() {
                var id = $(this).attr("id");
                $.ajax({
                    url : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/select/"); ?>" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('#frmUpdate')[0].reset(); // reset form on modals
                        $('#ModalUpdate #frmUpdate .form-group').removeClass('has-error'); // clear error class
                        $('#ModalUpdate #frmUpdate .help-block').empty(); // clear error string
                        $('[name="txtIdUpdate"]').val(data.result.id);
                        $('[name="txtNamaPegawai"]').val(data.result.nama_pegawai);
                        $('[name="txtTanggalOvertime"]').val(data.result.waktu_input);
                        $('[name="txtTanggalOvertimeInput"]').val(data.result.tanggal_trx_input);
                        $('[name="txtJamMulai"]').val(data.result.jam_mulai);
                        $('[name="txtJamSelesai"]').val(data.result.jam_selesai);
                        $('[name="txtAlasan"]').val(data.result.alasan_trx_lembur);
                        $('#ModalUpdate').modal('show');
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            });
        });
    </script>

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="dropdown no-arrow"></div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Custom Filter -->
            <form role="form">
                <!-- <div class="modal-header"></div> -->
                <div class="modal-body">
                    <input type="hidden" name="txtSrcIdPegawai" id="txtSrcIdPegawai" class="form-control" autocomplete="off" placeholder="Id Pegawai" value="<?= $data["user_login"]["id"]; ?>">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Lembur</label>
                        <div class="col-md-9">
                            <input type='text' id='txtSrcTanggalLembur' class="form-control" autocomplete="off" placeholder="Tanggal Lembur">
                        </div>
                        <script>
                            $('#txtSrcTanggalLembur').datepicker({
                                uiLibrary: 'bootstrap4'
                                ,format: 'yyyy-mm-dd'
                            });
                        </script>
                    </div>
                </div>
                <!-- <div class="modal-footer"></div> -->
            </form>

            <!-- Table -->
            <table class="table table-striped" id="tableData">
                <thead>
                    <tr>
                        <?= $data["header_datatable"]; ?>
                    </tr>
                </thead>
                <tbody id="showData"></tbody>
            </table>

            <!-- MODAL UPDATE -->
            <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form role="form" id="frmUpdate">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Data <?= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="" name="txtIdUpdate"/>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Nama Pegawai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtNamaPegawai" id="txtNamaPegawai" class="form-control" autocomplete="off" placeholder="Nama Pegawai" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Tanggal Overtime</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtTanggalOvertime" id="txtTanggalOvertime" class="form-control" autocomplete="off" placeholder="Tanggal Overtime" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Waktu Input</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtTanggalOvertimeInput" id="txtTanggalOvertimeInput" class="form-control" autocomplete="off" placeholder="Tanggal Overtime" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Jam Mulai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtJamMulai" id="txtJamMulai" class="form-control" autocomplete="off" placeholder="Jam Mulai" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Jam Selesai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtJamSelesai" id="txtJamSelesai" class="form-control" autocomplete="off" placeholder="Jam Selesai" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Alasan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtAlasan" id="txtAlasan" class="form-control" autocomplete="off" placeholder="Alasan" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <!-- <button type="submit" class="btn btn-primary" id="btnUpdate">Save</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL UPDATE-->
        </div>
    </div>


<?php $this->load->view("pub/footer"); ?>