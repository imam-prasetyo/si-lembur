<?php $this->load->view("boxing/header"); ?>

    <!-- Script -->
    <script type="text/javascript">
        var table = null;

        $(document).ready(function() {

            table = $('#tableData').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [[ 0, 'asc' ]],
                "ajax":
                {
                    "url": "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/pagination"); ?>",
                    "type": "POST"
                },
                "deferRender": true,
                "aLengthMenu": [[10, 25, 50],[10, 25, 50]],
                "columns": [
                    { "data": "name" }
                    ,{ "data": "value" }
                    ,{ "data": "date_update" }
                    ,{ "render": function ( data, type, row) {
                            var html  = "<a class='btn btn-warning btn-sm item_edit' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id + "' rel = '" + row.id + "'><span class='fas fa-edit'></span></a> "
                            // html += "<a class='btn btn-danger btn-sm item_delete' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id +"' rel = '" + row.id + "'><span class='fas fa-trash'></span></a>"
                            return html;
                        }
                    }
                ],
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
                        $('[name="txtNameUpdate"]').val(data.result.name);
                        $('[name="txtValueUpdate"]').val(data.result.value);
                        $('[name="txtDescriptionUpdate"]').val(data.result.description);
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
                            $('[name="txtNameUpdate"]').val("");
                            $('[name="txtValueUpdate"]').val("");
                            $('[name="txtDescriptionUpdate"]').val("");
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
            <!-- Table -->
            <table class="table table-striped" id="tableData">
                <thead>
                    <tr>
                        <?php echo $data["header_datatable"]; ?>
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
                                <h5 class="modal-title" id="exampleModalLabel">Update Data <?= $data["title"]; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="" name="txtIdUpdate"/>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtNameUpdate" id="txtNameUpdate" class="form-control" autocomplete="off" placeholder="Name" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Value</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtValueUpdate" id="txtValueUpdate" class="form-control" autocomplete="off" placeholder="Value">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtDescriptionUpdate" id="txtDescriptionUpdate" class="form-control" autocomplete="off" placeholder="Description">
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
            </div>
            <!--END MODAL UPDATE-->

        </div>
    </div>
<?php $this->load->view("boxing/footer"); ?>