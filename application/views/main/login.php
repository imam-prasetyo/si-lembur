<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/icon" href="<?= base_url(); ?>assets/img/favicon/favicon.ico">
        <title>BNI Syariah | <?= $data["title"]; ?></title>
        <!-- Custom fonts for this template-->
        <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?= base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom JavaScript-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#frmLogin').submit(function(e) {
                    $('#submit').text('Loggin...'); //change button text
                    $('#submit').attr('disabled', true); //set button disable 
                    $.ajax({
                        type : "POST",
                        url  : "<?= base_url(); ?>login",
                        dataType : "JSON",
                        data : $(this).serialize(),
                        success: function(data) {
                            if (data.status) {
                                $('.form-group').removeClass('has-error'); // clear error class
                                $('.help-block').empty(); // clear error string
                                for (var i = 0; i < data.inputerror.length; i++) {
                                    if(data.inputerror[i] != "") {
                                        //select parent twice to select div form-group class and add has-error class
                                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                                        //select span help-block class set text error string
                                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                                    }
                                }
                            } else {
                                window.location = data.uri;
                            }
                            $('#submit').text('Login'); //change button text
                            $('#submit').attr('disabled', false); //set button enable 
                        }, error: function (jqXHR, textStatus, errorThrown) {
                            // alert('Error login');
                            alert(JSON.stringify(jqXHR));
                            $('#submit').text('Login'); //change button text
                            $('#submit').attr('disabled', false); //set button enable 
                        }
                    });
                    e.preventDefault();
                });
            });
        </script>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center" ><?= $data["title"]; ?></div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" id="frmLogin">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            <small class="text-danger">
                                <span class="help-block"></span>
                            </small>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary btn-block" >Login</button>
                    </form>
                    <!-- <div class="text-center">
                        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                    </div> -->
                </div>
            </div>
        </div>
    </body>
</html>

<!-- <pre>
    <?php
        // echo var_dump($data);
    ?>
</pre> -->