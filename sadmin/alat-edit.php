<?php
session_start();

if ($_SESSION["level"] == 2) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";
$id_barang = $_GET['id'];

$query_barang = "SELECT * FROM tbl_barang WHERE id_barang = '$id_barang'";
$result_barang = mysqli_query($conn, $query_barang);
$row_barang = mysqli_fetch_assoc($result_barang);

if (isset($_POST["submit"])) {

    $kode_barang = $_POST["kode_barang"];
    $nm_barang = $_POST["nm_barang"];
    $kondisi = $_POST["kondisi"];
    $jumlah = $_POST["jumlah"];


    $query = "UPDATE tbl_barang SET kode_barang= '$kode_barang', nm_barang = '$nm_barang', kondisi = '$kondisi', jumlah = '$jumlah'  WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Data berhasil disimpan...!');
            document.location.href = 'barang.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan...!');
            history.go(-1);
        </script>";
    }
}
?>


<!doctype html>
<html lang="en" class="">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
    <link href="../assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../assets/css/header-colors.css" />
    <title>Silandap - Edit Bahan</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">

        <?php include "theme-sidebar.php" ?>

        <?php include "theme-header.php" ?>

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item"><a href="bahan.php">Data Bahan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Bahan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Data barang</h6>
                        <hr />
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body px-5 pb-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-plus me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Edit barang</h5>
                                </div>
                                <hr>
                                <form class="row g-3" method="POST" target="">
                                    <div class="col-12">
                                        <label for="kode_barang" class="form-label">Kode Alat</label>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang " placeholder="Kode Alat" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="nama_barang" class="form-label">Nama Alat</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Alat" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="kondisi" class="form-label">Kondisi</label>
                                        <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" required>
                                    </div>
                                </form>
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

        <!--end wrapper-->
        <!-- Bootstrap JS -->
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <!--plugins-->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="../assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <!--app JS-->
        <script src="../assets/js/app.js"></script>
</body>

</html>