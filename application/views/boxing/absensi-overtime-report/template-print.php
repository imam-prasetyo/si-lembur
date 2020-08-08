<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Page level plugin CSS-->
        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Page level plugin JavaScript-->
        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </head>

    <body id="page-top">

        <div id="wrapper">

            <table class="table table-bordered" width="100%" style="text-align:center;">
                <tbody>
                    <tr>
                        <td><img src="img/logo/site/small/default.png" /></td>
                        <td><h2><?php echo $headerReport; ?></h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><h3>Divisi <?php echo $divisiDeskripsi; ?></h3></td>
                    </tr>
                </tbody>
            </table>

            <br/>
            <br/>
            <br/>

            <table class="table table-bordered" width="100%" style="text-align:center;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Jam Mulai</th>
                        <th scope="col">Jam Selesai</th>
                        <th scope="col">Tanggal Input</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $counter = 1;
                        for($i = 0; $i < count($trxLembur); $i++) { 
                    ?>
                    <tr>
                        <th scope="row"><?php echo $counter; ?></th>
                        <td><?php echo $trxLembur[$i]["nama_pegawai"]; ?></td>
                        <td><?php echo $trxLembur[$i]["unit"]; ?></td>
                        <td><?php echo $trxLembur[$i]["jam_mulai"]; ?></td>
                        <td><?php echo $trxLembur[$i]["jam_selesai"]; ?></td>
                        <td><?php echo $trxLembur[$i]["tanggal_input"]; ?></td>
                    </tr>
                    <tr>
                        <td>Alasan</td>
                        <td><?php echo $trxLembur[$i]["alasan"]; ?></td>
                    </tr>
                    <?php $counter++; ?>
                    <?php } ?>
                </tbody>
            </table>

            <br/>
            <br/>
            <br/>

            <table class="table table-bordered" width="100%" style="text-align:center;">
                <tbody>
                    <tr>
                        <td><?php echo $namaApproval; ?></td>
                    </tr>
                </tbody>
            </table>

            <br/>
            <br/>
            <br/>

            <table class="table table-bordered" width="100%" style="text-align:center;">
                <tbody>
                    <tr>
                        <td><?php echo $jabatanApproval; ?></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- /#wrapper -->
    </body>
</html>
