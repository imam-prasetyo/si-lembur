<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/icon" href="<?= base_url(); ?>assets/img/favicon/favicon.ico">
		<title>BNI Syariah | <?= $data["title"]; ?></title>
		<!-- Bootstrap core CSS -->
		<link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="<?= base_url(); ?>assets/css/modern-business.css" rel="stylesheet">
		<!-- Page level plugin CSS-->
		<link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
		<!-- Bootstrap core JavaScript -->
		<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
		<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
	</head>

	<body>
		<!-- Navigation -->
		<?php $this->load->view("main/topbar"); ?>

		<!-- Page Content -->
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<?php $this->load->view("main/breadcrumb"); ?>