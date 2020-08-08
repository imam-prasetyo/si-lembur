<?php $this->load->view("boxing/header"); ?>

    <!-- Script -->
    <script type="text/javascript">
    
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
                            $('<option>').text(data.html[index][data.key[1]] + " - " + data.html[index][data.key[2]]).appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                            });
                        } else {
                            $('<option>').text(data.html[index][data.key[1]] + " - " + data.html[index][data.key[2]]).appendTo(htmlInput).attr({
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

        function populateApproval(htmlInput="", id=null, conditions=null) {
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
                url : "<?php echo base_url("html/load/pegawai-absensi-approval"); ?>",
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
                            $('<option>').text(data.html[index][data.key[1]] + " : " + data.html[index][data.key[2]] + " [" + data.html[index][data.key[3]] + "]").appendTo(htmlInput).attr({
                                "value" : data.html[index][data.key[0]]
                            });
                        } else {
                            $('<option>').text(data.html[index][data.key[1]] + " : " + data.html[index][data.key[2]] + " [" + data.html[index][data.key[3]] + "]").appendTo(htmlInput).attr({
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

        $(document).ready(function() {
            /* populate divisi */
            populateDivisi('#txtIdDivisi', null, null);

            $('#txtIdDivisi').change(function() {
                var id = $(this).val();
                populateApproval("#txtIdPegawai", null, {"id_divisi" : id});
            });

            /* print data */
            $('#frmPrint').submit(function(e) {
                $('#btnPrint').text('Printing...'); //change button text
                $('#btnPrint').attr('disabled', true); //set button disable 
                $.ajax({
                    url : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/print"); ?>",
                    type : "POST",
                    data : new FormData(this),
                    processData : false,
                    contentType : false,
                    cache : false,
                    async : false,
                    success : function(data) {
                        if(data.error_status) {
                            alert('No data report');
                        }
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        alert('Error save data');
                    }
                });
                $('#btnPrint').text('Print'); //change button text
                $('#btnPrint').attr('disabled', false); //set button enable 
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
            <!-- Custom Filter -->
            <form id="frmPrint" role="form">
                <!-- <div class="modal-header"></div> -->
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
                        <label class="col-md-3 col-form-label">Approval</label>
                        <div class="col-md-9">
                            <select class="form-control" id="txtIdPegawai" name="txtIdPegawai" placeholder="Show"></select>
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Lembur</label>
                        <div class="col-md-9">
                            <input type='text' id='txtTanggalLembur' name='txtTanggalLembur' class="form-control" autocomplete="off" placeholder="Tanggal Lembur" value="<?= $data["last_date_trx_lembur"]; ?>">
                        </div>
                        <script>
                            $('#txtTanggalLembur').datepicker({
                                uiLibrary: 'bootstrap4'
                                ,format: 'yyyy-mm-dd'
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnPrint">Print</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->load->view("boxing/footer"); ?>