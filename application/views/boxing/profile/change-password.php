<?php $this->load->view("boxing/header"); ?>

            <!-- Custom JavaScript-->
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#frmUpdate').submit(function(e) {
                        $('#submit').text('Updating...'); //change button text
                        $('#submit').attr('disabled', true); //set button disable
                        $.ajax({
                            type : "POST",
                            url  : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/update-password"); ?>",
                            dataType : "JSON",
                            data : $(this).serialize(),
                            success: function(data) {
                                if (data.error_status) {
                                    $('.form-group').removeClass('has-error'); // clear error class
                                    $('.help-block').empty(); // clear error string
                                    for (var i = 0; i < data.error_input.length; i++) {
                                        if(data.error_input[i] != "") {
                                            //select parent twice to select div form-group class and add has-error class
                                            $('[name="'+data.error_input[i]+'"]').parent().parent().addClass('has-error');
                                            //select span help-block class set text error string
                                            $('[name="'+data.error_input[i]+'"]').next().text(data.error_string[i]);
                                        }
                                    }
                                } else {
                                    window.location = data.uri;
                                }
                                $('#submit').text('Save Changes'); //change button text
                                $('#submit').attr('disabled', false); //set button enable 
                            }, error: function (jqXHR, textStatus, errorThrown) {
                                alert('Error save changes');
                                $('#submit').text('Save Changes'); //change button text
                                $('#submit').attr('disabled', false); //set button enable 
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
                    <form method="POST" id="frmUpdate">
                        <div class="row">
                            <div class="col-lg-12 push-lg-4 personal-info">
                                <input type="hidden" value="<?= $data["user_login"]["id"]; ?>" name="txtIdUpdate"/>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="txtCurrentPassword" id="txtCurrentPassword" class="form-control" autocomplete="off" placeholder="Current Password">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="txtNewPassword" id="txtNewPassword" class="form-control" autocomplete="off" placeholder="New Password">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirmation Password</label>
                                    <div class="col-lg-9">
                                        <input type="password" name="txtConfirmationPassword" id="txtConfirmationPassword" class="form-control" autocomplete="off" placeholder="Confirmation Password">
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <button class="btn btn-primary" id="submit" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php $this->load->view("boxing/footer"); ?>