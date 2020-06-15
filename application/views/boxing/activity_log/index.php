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
                    { "data": "log_user" }
                    ,{ "data": "log_type" }
                    ,{ "data": "log_datetime" }
                    ,{ "render": function ( data, type, row) {
                            var html  = "<a class='btn btn-primary btn-sm item_edit' href='javascript:void(0);' id = '" + row.id + "' name = '" + row.id + "' rel = '" + row.id + "'><span class='fas fa-eye'></span></a> "
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
                        $('[name="txtLogUser"]').val(data.result.log_user);
                        $('[name="txtLogType"]').val(data.result.log_type);
                        $('[name="txtLogAction"]').val(data.result.log_action);
                        $('[name="txtLogItem"]').val(data.result.log_item);
                        $('[name="txtLogAssignTo"]').val(data.result.log_assign_to);
                        $('[name="txtLogAssignType"]').val(data.result.log_assign_type);
                        $('[name="txtLogDatetime"]').val(data.result.log_datetime);
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
            <!-- Table -->
            <table class="table table-striped" id="tableData">
                <thead>
                    <tr>
                        <?php echo $data["header_datatable"]; ?>
                    </tr>
                </thead>
                <tbody id="showData"></tbody>
            </table>

            <!-- MODAL VIEW -->
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
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log User</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogUser" id="txtLogUser" class="form-control" autocomplete="off" placeholder="Log User" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Type</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogType" id="txtLogType" class="form-control" autocomplete="off" placeholder="Log Type" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Action</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogAction" id="txtLogAction" class="form-control" autocomplete="off" placeholder="Log Action" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Item</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogItem" id="txtLogItem" class="form-control" autocomplete="off" placeholder="Log Item" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Assign To</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogAssignTo" id="txtLogAssignTo" class="form-control" autocomplete="off" placeholder="Log Assign To" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Assign Type</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogAssignType" id="txtLogAssignType" class="form-control" autocomplete="off" placeholder="Log Assign Type" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Log Datetime</label>
                                    <div class="col-md-10">
                                        <input type="text" name="txtLogDatetime" id="txtLogDatetime" class="form-control" autocomplete="off" placeholder="Log Datetime" readonly>
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL VIEW-->

        </div>
    </div>
<?php $this->load->view("boxing/footer"); ?>