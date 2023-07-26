<?php
session_start();


if ($_SESSION["level"] == 1) {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include "../koneksi.php";
?>

<!doctype html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../assets/css/header-colors.css" />
    <title>Simawar - Dashboard</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <?php include "theme-sidebar.php" ?>

        <?php include "theme-header.php" ?>

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                    <?php
                    $query_alat = "SELECT * FROM tbl_barang WHERE kategori='Alat'";
                    $result_alat = mysqli_query($conn, $query_alat);
                    $jml_alat = mysqli_num_rows($result_alat);

                     ?>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-danger">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Jumlah Alat</p>
                                        <h5 class="mb-0 text-white"><?php echo $jml_alat ?></h5>
                                    </div>
                                    <div class="ms-auto text-white"> <i class='bx bx-cabinet font-30'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="chart1"></div>
                        </div>
                    </div>
                    <?php
                    $query_bahan = "SELECT * FROM tbl_barang WHERE kategori='Bahan'";
                    $result_bahan = mysqli_query($conn, $query_bahan);
                    $jml_bahan = mysqli_num_rows($result_bahan);

                     ?>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden bg-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-white">Jumlah Bahan</p>
                                        <h5 class="mb-0 text-white"><?php echo $jml_bahan ?></h5>
                                    </div>
                                    <div class="ms-auto text-white"> <i class='bx bx-cabinet font-30'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="chart2"></div>
                        </div>
                    </div>

                </div>
                <!--end row-->
                <!--end row-->
                <div class="row">
                    <div class="col">
                        <div class="card radius-10 mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-1">Stok Alat</h5>
                                    </div>
                                </div>
                                <?php 
                                $quer_alat2 = "SELECT * FROM tbl_barang WHERE kategori='Alat' LIMIT 5";
                                $result_alat2 = mysqli_query($conn, $quer_alat2);
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alat</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            while ($row_alat2 = mysqli_fetch_assoc($result_alat2)) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row_alat2["nama_barang"] ?></td>
                                                <td><?php echo $row_alat2["stok"] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card radius-10 mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="mb-1">Stok Bahan</h5>
                                    </div>
                                </div>
                                <?php 
                                $quer_bahan2 = "SELECT * FROM tbl_barang WHERE kategori='Bahan' LIMIT 5";
                                $result_bahan2 = mysqli_query($conn, $quer_bahan2);
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Alat</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            while ($row_bahan2 = mysqli_fetch_assoc($result_bahan2)) { ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $row_bahan2["nama_barang"] ?></td>
                                                <td><?php echo $row_bahan2["stok"] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

        <?php include "theme-footer.php" ?>

    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/plugins/highcharts/js/highcharts.js"></script>
    <script src="../assets/plugins/highcharts/js/exporting.js"></script>
    <script src="../assets/plugins/highcharts/js/variable-pie.js"></script>
    <script src="../assets/plugins/highcharts/js/export-data.js"></script>
    <script src="../assets/plugins/highcharts/js/accessibility.js"></script>
    <script src="../assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="../assets/js/index.js"></script>
    <!--app JS-->
    <script src="../assets/js/app.js"></script>
    <script>
        new PerfectScrollbar('.customers-list');
        new PerfectScrollbar('.store-metrics');
        new PerfectScrollbar('.product-list');
    </script>
</body>

</html>