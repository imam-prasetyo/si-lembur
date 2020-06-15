<?php $this->load->view("boxing/header"); ?>

            <!-- Custom JavaScript-->
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#frmUpdate').submit(function(e) {
                        $('#submit').text('Updating...'); //change button text
                        $('#submit').attr('disabled', true); //set button disable 
                        $.ajax({
                            url  : "<?= base_url($data["url_web"]["class"]."/".$data["url_web"]["function"]."/update-profile"); ?>",
                            type: "POST",
                            data: new FormData(this),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                            success: function(data) {
                                if (data.error_status) {
                                    $('.form-group').removeClass('has-error'); // clear error class
                                    $('.help-block').empty(); // clear error string
                                    for (var i = 0; i < data.error_input.length; i++)  {
                                        //select parent twice to select div form-group class and add has-error class
                                        $('[name="'+data.error_input[i]+'"]').parent().parent().addClass('has-error');
                                        //select span help-block class set text error string
                                        $('[name="'+data.error_input[i]+'"]').next().text(data.error_string[i]);
                                    }
                                } else {
                                    $('[name="file"]').val("");
                                    $('#frmUpdate')[0].reset(); // reset form on modals
                                    $('#img-upload').attr('src', '');
                                    $('.form-group').removeClass('has-error'); // clear error class
                                    $('.help-block').empty(); // clear error string
                                    window.location = data.uri;
                                }
                                $('#submit').text('Save Changes'); //change button text
                                $('#submit').attr('disabled', false); //set button enable 
                            }, error: function (jqXHR, textStatus, errorThrown) {
                                alert('Error save data.');
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
                            <div class="col-sm-3">
                                <div class="text-center">
                                    <img class="m-x-auto mb-3 img-fluid img-circle rounded" alt="avatar" id="myImageProfile" src="<?= base_url("img/profile/large/".$data["user_login"]["image"]); ?>"/>
                                    </br>
                                    <input type="checkbox" class="custom-control-input" name="chkRemoveImage" id="chkRemoveImage">
                                    <label class="custom-control-label" for="chkRemoveImage">
                                        <i class="fas fa-trash"></i> Remove
                                    </label>
                                </div>
                                </br>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <input type="file" name="update" id="imgInp" class="custom-file-input" />
                                                <small class="text-danger">
                                                    <span class="help-block"></span>
                                                </small>
                                                <label class="custom-file-label" for="customFileLang"></label>
                                            </span>
                                        </span>
                                        <input type="hidden" name="txtImageUpdate" id="txtImageUpdate" value="<?= $data["user_login"]["image"]; ?>" class="form-control" autocomplete="off" placeholder="Image">
                                        <input type="hidden" id="img-name" class="form-control" readonly>
                                    </div>
                                    <br/>
                                    <img id='img-upload' class="rounded mx-auto d-block"/>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <input type="hidden" name="txtIdUpdate" value="<?= $data["user_login"]["id"]; ?>"/>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="txtEmailUpdate" id="txtEmailUpdate" class="form-control" autocomplete="off" placeholder="Email" value="<?= $data["user_login"]["email"]; ?>" readonly >
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="txtFirstNameUpdate" id="txtFirstNameUpdate" class="form-control" autocomplete="off" placeholder="First Name" value="<?= $data["user_login"]["first_name"]; ?>" >
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="txtLastNameUpdate" id="txtLastNameUpdate" class="form-control" autocomplete="off" placeholder="Last Name" value="<?= $data["user_login"]["last_name"]; ?>" >
                                        <small class="text-danger">
                                            <span class="help-block"></span>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <button class="btn btn-primary" id="btnUpload" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php $this->load->view("boxing/footer"); ?>