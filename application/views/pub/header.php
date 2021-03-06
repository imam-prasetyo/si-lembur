<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/icon" href="<?= base_url(); ?>img/ico/favicon.ico"/>
        <title><?= $data["config_web"]["title_tab"]." | ".$data["title"]; ?></title>
        <!-- Bootstrap core CSS -->
        <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url("assets/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?= base_url(); ?>assets/css/modern-business.css" rel="stylesheet">
        <link href="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet">
        <link href="<?= base_url("assets/vendor/gijgo/css/gijgo.min.css"); ?>" rel="stylesheet">
        <!-- Bootstrap core JavaScript -->
        <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url("assets/vendor/datatables/jquery.dataTables.js"); ?>"></script>
        <script src="<?= base_url("assets/vendor/datatables/dataTables.bootstrap4.js"); ?>"></script>
        <script src="<?= base_url("assets/vendor/gijgo/js/gijgo.min.js"); ?>"></script>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url('img/logo/site/small/default.png'); ?>" /> <?= $data["config_web"]["title"]; ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Overtime
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="<?= base_url($data["config_web"]["user_panel"]."/overtime"); ?>">Overtime</a>
                                <a class="dropdown-item" href="<?= base_url($data["config_web"]["user_panel"]."/overtime-history"); ?>">History</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shift
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="<?= base_url($data["config_web"]["user_panel"]."/shift"); ?>">Shift</a>
                                <a class="dropdown-item" href="<?= base_url($data["config_web"]["user_panel"]."/shift-history"); ?>">History</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url($data["config_web"]["user_panel"]."/logout");?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php if($data["page"] == "default") { ?>
        <header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>First Slide</h3>
                            <p>This is a description for the first slide.</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Second Slide</h3>
                            <p>This is a description for the second slide.</p>
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Third Slide</h3>
                            <p>This is a description for the third slide.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
        <?php } ?>

        <!-- Page Content -->
        <div class="container">
            
            <!-- Page Heading/Breadcrumbs -->
            <h1 class="mt-4 mb-3">
                <!-- <small>Subheading</small> -->
            </h1>

            <br>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url(); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><?= $data["title"]; ?></li>
            </ol>