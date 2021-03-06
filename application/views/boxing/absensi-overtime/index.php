<?php $this->load->view("boxing/header"); ?>

    <!-- Script -->
    <script type="text/javascript">
        // var table = null;

        // function add() {
        //     $('#frmAdd')[0].reset(); // reset form on modals
        //     $('.form-group').removeClass('has-error'); // clear error class
        //     $('.help-block').empty(); // clear error string
        //     $('#ModalAdd').modal('show');
        //     populateDivisi('#txtIdDivisi', null, null);
        //     loadTimepicker();
        // }

        function loadTimepicker() {
            $('#txtJamSelesai').timepicker({
                uiLibrary: 'bootstrap4'
            });
        }

        function populateDivisi(htmlInput="", id=null, conditions=null) {
            var params = {};
            // Set parameter conditions
            if(conditions != null) {
                var lenconditions = Object.keys(conditions).length;
                if(lenconditions > 0) {
                    var fk = Object.keys(conditions);
                    var i = 0;
                    for (key of fk) {
                        var valueAtIndex = conditions[key];
                        params[key] = valueAtIndex;
                    }
                }
            }
            // Reset html
            $(htmlInput).empty();
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo base_url("html/load/divisi"); ?>",
                type: "POST",
                data: params,
                dataType: "JSON",
                success: function(data) {
                    //get length of key data
                    var lenField = data.key.length;
                    // set html data
                    $('<option>').appendTo(htmlInput).attr({
                        "value" : ""
                    });
                    $.each(data.html, function(index) {	
                        if(id == null) {
                            $('<option>').text(data.html[index][data.key[1]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                            });
                        } else {
                            $('<option>').text(data.html[index][data.key[1]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                                ,"selected" : (data.html[index][data.key[0]] == id ? true : false)
                            });
                        }
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    alert(JSON.stringify(jqXHR));
                    alert('Error get data from ajax');
                }
            });
        }

        function populateUnit(htmlInput="", id=null, conditions=null) {
            var params = {};
            // Set parameter conditions
            if(conditions != null) {
                var lenconditions = Object.keys(conditions).length;
                if(lenconditions > 0) {
                    var fk = Object.keys(conditions);
                    var i = 0;
                    for (key of fk) {
                        var valueAtIndex = conditions[key];
                        params[key] = valueAtIndex;
                    }
                }
            }
            // Reset html
            $(htmlInput).empty();
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo base_url("html/load/unit"); ?>",
                type: "POST",
                data: params,
                dataType: "JSON",
                success: function(data) {
                    //get length of key data
                    var lenField = data.key.length;
                    // set html data
                    $('<option>').appendTo(htmlInput).attr({
                        "value" : ""
                    });
                    $.each(data.html, function(index) {	
                        if(id == null) {
                            $('<option>').text(data.html[index][data.key[1]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                            });
                        } else {
                            $('<option>').text(data.html[index][data.key[1]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                                ,"selected" : (data.html[index][data.key[0]] == id ? true : false)
                            });
                        }
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function populatePegawai(htmlInput="", id=null, conditions=null) {
            var params = {};
            // Set parameter conditions
            if(conditions != null) {
                var lenconditions = Object.keys(conditions).length;
                if(lenconditions > 0) {
                    var fk = Object.keys(conditions);
                    var i = 0;
                    for (key of fk) {
                        var valueAtIndex = conditions[key];
                        params[key] = valueAtIndex;
                    }
                }
            }
            // Reset html
            $(htmlInput).empty();
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo base_url("html/load/pegawai"); ?>",
                type: "POST",
                data: params,
                dataType: "JSON",
                success: function(data) {
                    //get length of key data
                    var lenField = data.key.length;
                    // set html data
                    $('<option>').appendTo(htmlInput).attr({
                        "value" : ""
                    });
                    $.each(data.html, function(index) {	
                        if(id == null) {
                            $('<option>').text(data.html[index][data.key[1]] + " : " + data.html[index][data.key[2]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                            });
                        } else {
                            $('<option>').text(data.html[index][data.key[1]] + " : " + data.html[index][data.key[2]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                                ,"selected" : (data.html[index][data.key[0]] == id ? true : false)
                            });
                        }
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

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
                        // var txtSrcNamaPegawai = $('#txtSrcNamaPegawai').val();
                        
                        // Append to data
                        data.txtSrcTanggalLembur = txtSrcTanggalLembur;
                        // data.txtSrcNamaPegawai = txtSrcNamaPegawai;
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
                            
                            var html  = "<a class='btn btn-warning btn-sm item_edit' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id + "' rel = '" + row.id + "'><span class='fas fa-edit'></span></a> "
                            // html += "<a class='btn btn-danger btn-sm item_delete' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id +"' rel = '" + row.id + "'><span class='fas fa-trash'></span></a>"
                            return html;
                        }
                    }
                ],
            });

            $('#txtSrcTanggalLembur').change(function() {
                table.draw();
            });

            $('#txtSrcNamaPegawai').change(function() {
                table.draw();
            });

            $('#txtIdDivisi').change(function() {
                var id = $(this).val();
                populateUnit("#txtIdUnit", null, {"id_divisi" : id});
            });

            $('#txtIdUnit').change(function() {
                var id = $(this).val();
                populatePegawai("#txtIdPegawai", null, {"id_unit" : id});
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
                            $('[name="txtIdDivisi"]').val("");
                            $('[name="txtUnit"]').val("");
                            $('#ModalAdd').modal('hide');
                            table.ajax.reload(null, false); //reload datatable ajax
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

            /* get data for update record */
            $('#showData').on('click','.item_edit',function() {
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
                        populateDivisi('#txtIdDivisiUpdate', data.result.id_divisi, null);
                        $('[name="txtUnitUpdate"]').val(data.result.unit);
                        $('[name="txtCurrentUnitUpdate"]').val(data.result.unit);
                        $('#ModalUpdate').modal('show');
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error get data from ajax');
                    }
                });
            });

            /* update data */
            $('#frmUpdate').submit(function(e) {
                $('#btnUpdate').text('Saving...'); //change button text
                $('#btnUpdate').attr('disabled', true); //set button disable 
                $.ajax({
                    url  : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/update/"); ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        alert(JSON.stringify(data));
                        if(data.error_status) {
                            $('.form-group').removeClass('has-error'); // clear error class
                            $('.help-block').empty(); // clear error string
                            for (var i = 0; i < data.error_input.length; i++)  {
                                //select parent twice to select div form-group class and add has-error class
                                $('[name="'+data.error_input[i]+'"]').parent().parent().addClass('has-error');
                                //select span help-block class set text error string
                                $('[name="'+data.error_input[i]+'"]').next().text(data.error_string[i]);
                            }
                        } else {
                            $('#frmUpdate')[0].reset(); // reset form on modals
                            $('#ModalUpdate #frmUpdate .form-group').removeClass('has-error'); // clear error class
                            $('#ModalUpdate #frmUpdate .help-block').empty(); // clear error string
                            $('[name="txtIdUpdate"]').val("");
                            $('[name="txtIdDivisiUpdate"]').val("");
                            $('[name="txtUnitUpdate"]').val("");
                            $('[name="txtCurrentUnitUpdate"]').val("");
                            $('#ModalUpdate').modal('hide');
                            table.ajax.reload(null, false); //reload datatable ajax
                        }
                        $('#btnUpdate').text('Save'); //change button text
                        $('#btnUpdate').attr('disabled', false); //set button enable 
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert(JSON.stringify(jqXHR));
                        alert('Error save data');
                        $('#btnUpdate').text('Save'); //change button text
                        $('#btnUpdate').attr('disabled', false); //set button enable 
                    }
                });
                e.preventDefault(); 
            });

            //get data for delete record
            $('#showData').on('click','.item_delete',function() {
                var id = $(this).attr("id");
                $('#ModalDelete').modal('show');
                $('[name="txtIdDelete"]').val(id);
            });
    
            //delete record to database
            $('#btnDelete').on('click', function() {
                var txtIdDelete = $('#txtIdDelete').val();
                $.ajax({
                    type : "POST",
                    url  : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/delete/"); ?>",
                    dataType : "JSON",
                    data : $('#frmDelete').serialize(),
                    success: function(data) {
                        if(data.error_status) {
                            alert(data.error_string);
                            $('[name="txtIdDelete"]').val("");
                            $('#ModalDelete').modal('hide');
                        } else {
                            $('[name="txtIdDelete"]').val("");
                            $('#ModalDelete').modal('hide');
                            table.ajax.reload(null, false); //reload datatable ajax
                        }
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error delete data');
                    }
                });
                return false;
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
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Lembur</label>
                        <div class="col-md-9">
                            <input type='text' id='txtSrcTanggalLembur' class="form-control" autocomplete="off" placeholder="Tanggal Lembur" value="<?= $data["last_date_trx_lembur"]; ?>">
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

            <!-- Add Button -->
            <!-- <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6">
                    <div class="text-right">
                        <button class="btn btn-sm btn-success mb-1" onclick="add()"><span class='fas fa-plus'></span></button>
                    </div>
                </div>
            </div> -->

            <!-- Table -->
            <table class="table table-striped" id="tableData">
                <thead>
                    <tr>
                        <?= $data["header_datatable"]; ?>
                    </tr>
                </thead>
                <tbody id="showData"></tbody>
            </table>

            <!-- MODAL ADD -->
            <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form role="form" id="frmAdd">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New <?= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Divisi</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="txtIdDivisi" name="txtIdDivisi" placeholder="Show"></select>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Unit</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="txtIdUnit" name="txtIdUnit" placeholder="Show"></select>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Pegawai</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="txtIdPegawai" name="txtIdPegawai" placeholder="Show"></select>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Jam Mulai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtJamMulai" id="txtJamMulai" class="form-control" autocomplete="off" placeholder="Jam Mulai" value="<?= $data["config_web"]["jam_mulai"]?>" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Jam Selesai</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtJamSelesai" id="txtJamSelesai" class="form-control" autocomplete="off" placeholder="Jam Selesai" value="<?= $data["config_web"]["jam_mulai"]?>">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Alasan Lembur</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtAlasanLembur" id="txtAlasanLembur" class="form-control" autocomplete="off" placeholder="Alasan Lembur">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="btnAdd">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL ADD-->

            <!-- MODAL UPDATE -->
            <!-- <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form role="form" id="frmUpdate">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data <?//= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="" name="txtIdUpdate"/>
                                <input type="hidden" value="" name="txtCurrentUnitUpdate"/>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Divisi</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="txtIdDivisiUpdate" name="txtIdDivisiUpdate" placeholder="Show"></select>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Unit</label>
                                    <div class="col-md-9">
                                        <input type="text" name="txtUnitUpdate" id="txtUnitUpdate" class="form-control" autocomplete="off" placeholder="Unit">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="btnUpdate">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <!--END MODAL UPDATE-->

            <!--MODAL DELETE-->
            <!-- <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="frmDelete" name="frmDelete">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Data <?//= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="" name="txtIdDelete"/>
                                <strong>Are you sure to delete this record ?</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary" id="btnDelete" >Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <!--END MODAL DELETE-->
        </div>
    </div>


<?php $this->load->view("boxing/footer"); ?>