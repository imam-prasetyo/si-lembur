<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/icon" href="<?= base_url("img/ico/logo_ubuntu_22359.ico"); ?>"/>
        <title><?= $data["config_web"]["title_tab"]." | ".$data["title"]; ?></title>

        <!-- Page level plugin CSS-->
        <!-- Custom fonts for this template-->
        <link href="<?= base_url("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= base_url("assets/css/sb-admin-2.css"); ?>" rel="stylesheet">
        <link href="<?= base_url("assets/css/custom.css"); ?>" rel="stylesheet">    
        <!-- Summernote-->
        <link href="<?= base_url("assets/vendor/summernote/summernote-bs4.css"); ?>" rel="stylesheet">

        <!-- Page level plugin JavaScript-->
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url("assets/vendor/jquery/jquery.min.js"); ?>"></script>
        <script src="<?= base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url("assets/vendor/jquery-easing/jquery.easing.min.js"); ?>"></script>
        <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
        <script src="<?= base_url("assets/vendor/datatables/jquery.dataTables.js"); ?>"></script>
        <script src="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?= base_url("assets/js/sb-admin-2.min.js"); ?>"></script>
        <script src="<?= base_url("assets/js/custom.js"); ?>"></script>
        <!-- Summernote-->
        <script src="<?= base_url("assets/vendor/summernote/summernote-bs4.js"); ?>"></script>
    </head>

    <body id="page-top">

        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view("boxing/sidebar"); ?>

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php $this->load->view("boxing/topbar"); ?>

                    <div class="container-fluid">
                        <!-- Breadcrumbs-->
                        <?php $this->load->view("boxing/breadcrumb"); ?>

                        <!-- Flashdata -->
                        <?= $this->session->flashdata('message'); ?>
