<?php $this->load->view("pub/header"); ?>

    <!-- Script -->
    <script type="text/javascript">

        function loadTimepicker() {
            $('#txtJamSelesai').timepicker({
                uiLibrary: 'bootstrap4'
            });
        }

        $(document).ready(function() {
            loadTimepicker();

            $('#txtTanggalLembur').datepicker({
                uiLibrary: 'bootstrap4'
                ,format: 'yyyy-mm-dd'
            });

            /* add data */
            $('#frmAdd').submit(function(e) {
                $('#btnAdd').text('Saving...'); //change button text
                $('#btnAdd').attr('disabled', true); //set button disable 
                $.ajax({
                    url : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/insert"); ?>",
                    type : "POST",
                    data : new FormData(this),
                    processData : false,
                    contentType : false,
                    cache : false,
                    async : false,
                    success : function(data) {
                        if(data.error_status) {
                            $('.form-group').removeClass('has-error'); // clear error class
                            $('.help-block').empty(); // clear error string
                            for (var i = 0; i < data.error_input.length; i++) {	
                                //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.error_input[i]+'"]').parent().parent().addClass('has-error');
                                //select span help-block class set text error string
                                $('[name="'+data.error_input[i]+'"]').next().text(data.error_string[i]);
                            }
                        } else {
                            $('[name="txtIdPegawai"]').val("");
                            $('[name="txtNamaPegawai"]').val("");
                            txtJamMulai
                            txtJamSelesai
                            $('#ModalAdd').modal('hide');
                            window.location = data.uri;
                        }
                        $('#btnAdd').text('Save'); //change button text
                        $('#btnAdd').attr('disabled', false); //set button enable 
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error save data');
                        $('#btnAdd').text('Save'); //change button text
                        $('#btnAdd').attr('disabled', false); //set button enable 
                    }
                });
                e.preventDefault(); 
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
            <form role="form" id="frmAdd">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New <?//= $data["title"]; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <div class="modal-body">
                    <input type="hidden" name="txtIdPegawai" id="txtIdPegawai" class="form-control" autocomplete="off" placeholder="Id Pegawai" value="<?= $data["user_login"]["id"]; ?>">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pegawai</label>
                        <div class="col-md-9">
                            <input type="text" name="txtNamaPegawai" id="txtNamaPegawai" class="form-control" autocomplete="off" placeholder="Nama Pegawai" value="<?= $data["user_login"]["nama_pegawai"]; ?>" readonly />
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Lembur</label>
                        <div class="col-md-9">
                            <input type='text' id='txtTanggalLembur' name="txtTanggalLembur" class="form-control" autocomplete="off" placeholder="Tanggal Lembur" value="<?= date('Y-m-d'); ?>" />
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jam Mulai</label>
                        <div class="col-md-9">
                            <input type="text" name="txtJamMulai" id="txtJamMulai" class="form-control" autocomplete="off" placeholder="Jam Mulai" value="<?= $data["config_web"]["jam_mulai"]; ?>" readonly />
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Jam Selesai</label>
                        <div class="col-md-9">
                            <input type="text" name="txtJamSelesai" id="txtJamSelesai" class="form-control" autocomplete="off" placeholder="Jam Selesai" value="<?= $data["config_web"]["jam_mulai"]; ?>" />
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Alasan Lembur</label>
                        <div class="col-md-9">
                            <input type="text" name="txtAlasanLembur" id="txtAlasanLembur" class="form-control" autocomplete="off" placeholder="Alasan Lembur" />
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                    <button type="submit" class="btn btn-primary" id="btnAdd">Save</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view("pub/footer"); ?>