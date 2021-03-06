<?php $this->load->view("boxing/header"); ?>

    <!-- Script -->
    <script type="text/javascript">
        var table = null;

        function add() {
            $('#frmAdd')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#ModalAdd').modal('show');
        }

        $(document).ready(function() {
            /* data table */
            table = $('#tableData').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [[ 0, 'asc' ]],
                "ajax": {
                    "url": "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/pagination"); ?>",
                    "type": "POST"
                },
                "deferRender": true,
                "aLengthMenu": [[10, 25, 50],[10, 25, 50]],
                "columns": [
                    { "data": "full_name" }
                    ,{ "data": "email" }
                    ,{ "data": "is_active" }
                    ,{ "data": "last_login" }
                    // ,{ "data": "last_prev_login" }
                    ,{ "render": function ( data, type, row) {
                            var html  = "<a class='btn btn-warning btn-sm item_edit' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id + "' rel = '" + row.id + "'><span class='fas fa-edit'></span></a> "
                            html += "<a class='btn btn-danger btn-sm item_delete' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id +"' rel = '" + row.id + "'><span class='fas fa-trash'></span></a>"
                            return html;
                        }
                    }
                ],
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
                            $('[name="txtEmail"]').val("");
                            $('[name="txtFirstName"]').val("");
                            $('[name="txtLastName"]').val("");
                            $('[name="txtIsActive"]').val("");
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
                        $('[name="txtEmailUpdate"]').val(data.result.email);
                        $('[name="txtCurrentEmailUpdate"]').val(data.result.email);
                        $('[name="txtFirstNameUpdate"]').val(data.result.first_name);
                        $('[name="txtLastNameUpdate"]').val(data.result.last_name);
                        $('[name="txtIsActiveUpdate"]').val(data.result.is_active);
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
                            $('[name="txtEmailUpdate"]').val("");
                            $('[name="txtCurrentEmailUpdate"]').val("");
                            $('[name="txtFirstNameUpdate"]').val("");
                            $('[name="txtLastNameUpdate"]').val("");
                            $('[name="txtIsActiveUpdate"]').val("");
                            $('#ModalUpdate').modal('hide');
                            table.ajax.reload(null, false); //reload datatable ajax
                        }
                        $('#btnUpdate').text('Save'); //change button text
                        $('#btnUpdate').attr('disabled', false); //set button enable 
                    }, error: function (jqXHR, textStatus, errorThrown) {
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
            <!-- Add Button -->
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6">
                    <div class="text-right">
                        <button class="btn btn-sm btn-success mb-1" onclick="add()"><span class='fas fa-plus'></span></button>
                    </div>
                </div>
            </div>
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
                                    <label class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtEmail" id="txtEmail" class="form-control" autocomplete="off" placeholder="Email">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">First Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtFirstName" id="txtFirstName" class="form-control" autocomplete="off" placeholder="First Name">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>	
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Last Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLastName" id="txtLastName" class="form-control" autocomplete="off" placeholder="Last Name">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Active</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="txtIsActive" name="txtIsActive" placeholder="Active" >
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>
                                        </select>
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
            <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form role="form" id="frmUpdate">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data <?= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="" name="txtIdUpdate"/>
                                <input type="hidden" value="" name="txtCurrentEmailUpdate"/>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtEmailUpdate" id="txtEmailUpdate" class="form-control" autocomplete="off" placeholder="Email">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">First Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtFirstNameUpdate" id="txtFirstNameUpdate" class="form-control" autocomplete="off" placeholder="First Name">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>	
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Last Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLastNameUpdate" id="txtLastNameUpdate" class="form-control" autocomplete="off" placeholder="Last Name">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Active</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="txtIsActiveUpdate" name="txtIsActiveUpdate" placeholder="Active" >
                                            <option value="Y">Y</option>
                                            <option value="N">N</option>
                                        </select>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Reset Password</label>
                                    <div class="col-md-8 custom-control">
                                        <input type="checkbox" class="form-control custom-control-input" id="chkResetPassword" name="chkResetPassword">
                                        <label class="custom-control-label" for="chkResetPassword">Yes</label>
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
            </div>
            <!--END MODAL UPDATE-->

            <!--MODAL DELETE-->
            <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="frmDelete" name="frmDelete">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Data <?= $data["title"]; ?></h5>
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
            </div>
            <!--END MODAL DELETE-->
        </div>
    </div>
    
<?php $this->load->view("boxing/footer"); ?>