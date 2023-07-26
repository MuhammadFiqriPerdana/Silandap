<?php
session_start();

if ($_SESSION["level"] == 1) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";
$id_pj = $_GET['id'];

$query_pj = "SELECT * FROM tbl_peminjaman pj 
INNER JOIN tbl_user u ON u.id_user = pj.id_user INNER JOIN 
tbl_barang b ON pj.id_barang = b.id_barang";
$result_pj = mysqli_query($conn, $query_pj);
$row_pj = mysqli_fetch_assoc($result_pj);

if (isset($_POST["submit"])) {


    
    $id_barang = $_POST["id_barang"];
    $kondisi = $_POST["kondisi"];
    $tgl_kembali = $_POST["tgl_kembali"];
    $waktu_kembali = $_POST["waktu_kembali"];
    $query = "INSERT INTO tbl_pengembalian VALUES (NULL, $id_pj, '$tgl_kembali', '$waktu_kembali', '$kondisi')";
    $result = mysqli_query($conn, $query);
    $row_pj = mysqli_fetch_assoc($result_pj);
    $last_id = mysqli_insert_id($conn);

    $selSto = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE id_barang='$id_barang'");
    $sto    = mysqli_fetch_array($selSto);
    $stok    = $sto['stok'];
    $jumlah = $_POST["jumlah"];
    $kembali = $stok + $jumlah;
    $upstock = "UPDATE tbl_barang SET stok='$kembali' WHERE id_barang = '$id_barang'";
    $result_stok = mysqli_query($conn, $upstock);
    
    $berita_acara = "INSERT tb_berita_acara_pengembalian (id_berita_acara_pengembalian, id_pengembalian) VALUES ('NULL', '$last_id')";
    $query_berita_acara = mysqli_query($conn, $berita_acara);

    if($kondisi == 'Rusak'){
        $upkon = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE id_barang='$id_barang'");
        $kon = mysqli_fetch_array($upkon);
        $kondisi1 = $kon['kondisi'];
        $updatekondisi = "UPDATE tbl_barang SET kondisi='$kondisi' WHERE id_barang='$id_barang'";
        $result_kondisi = mysqli_query($conn, $updatekondisi);
        
        
    }


    
        



    if ($result) {
        echo "<script>
            alert('Data berhasil disimpan...!');
            document.location.href = 'pj-alat.php';
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
    
    <title>Simawar - Pengembalian Alat</title>
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
                                <li class="breadcrumb-item"><a href="pj-alat.php">Data Peminjaman</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengembalian Alat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Data Peminjaman</h6>
                        <hr />
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body px-5 pb-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-plus me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Pengembalian Alat</h5>
                                </div>
                                <hr>
                                <form class="row g-3" method="POST" target="">
                                    <div class="col-12">
                                        <label for="id_user" class="form-label">Nama Peminjam</label>
                                        <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $row_pj["nm_user"] ?>" readonly>
                                    </div>
                                        <input type="hidden" class="form-control" name="id_barang" id="id_barang" value="<?php echo $row_pj["id_barang"] ?> " readonly>
                                        <input type="hidden" class="form-control" name="jumlah" id="jumlah" value="<?php echo $row_pj["jumlah"] ?>" readonly>
                                        <div class="col-12">
                                        <label class="form-label">Kondisi Alat</label>
                                        <select name="kondisi" id="kondisi" class="form-control select2" style="width: 100%;">
                                        <option selected="selected">-- Pilih --</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Tanggal Kembali</label>
                                        <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="waktu_kembali" class="form-label">Jam Pelajaran Kembali</label>
                                        <input type="text" class="form-control" name="waktu_kembali" id="waktu_kembali" placeholder="Jam Pelajaran" required>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-5" name="submit">Simpan</button>
                                        <button type="button" class="btn btn-secondary px-5" onclick="self.history.back()">Cancel</button>
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