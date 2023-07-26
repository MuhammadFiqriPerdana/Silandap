<?php
session_start();

if ($_SESSION["level"] == 1) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";

if (isset($_POST["submit"])){
    $id_barang = $_POST["id_barang"];
    $jumlah = $_POST["jumlah"];
    $tgl_pinjam = $_POST["tgl_pinjam"];
    $waktu_pinjam = $_POST["waktu_pinjam"];
    $selSto = mysqli_query($conn, "SELECT * FROM tbl_barang WHERE id_barang='". $_POST['id_barang'] ."'");
    $sto = mysqli_fetch_array($selSto);
    $stok = $sto['stok'];
    $sisa = $stok - $jumlah;
    if($stok < $jumlah){?>
    <script>
        alert('Oops! Jumlah Barang Yang Dipinjam Melebih Stok Yang Tersedia');
        document.location='pj-alat-tambah.php';
    </script>
    <?php
    } else {
        $sql_simpan = "INSERT INTO tbl_peminjaman(id_peminjaman, id_user, id_barang, jumlah, tgl_pinjam, waktu_pinjam, status_verifikasi, kepemilikan, kondisi) VALUES (
            '" .NULL. "',
            '". $_SESSION['ses_id'] ."',
            '" .$id_barang. "',
            '" .$jumlah. "',
            '" .$tgl_pinjam. "',
            '" .$waktu_pinjam. "',
            'Belum Terverifikasi',
            '" .$_SESSION['jurusan']. "',
            'Baik')";
        $upstok = mysqli_query($conn, "UPDATE tbl_barang SET stok='$sisa' WHERE id_barang='" .$_POST['id_barang']. "'");
        $query_simpan = mysqli_query($conn, $sql_simpan, $upstok);
    }
    if($query_simpan){
        ?>
            <script>
            alert('Tambah Data Berhasil');
            document.location='pk-bahan.php';
            </script>
        <?php
    }else {
        ?>
            <script>
            alert('Tambah Data Gagal');
            document.location='pk-bahan-tambah.php';
        </script>
        <?php
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
    <title>Silandap - Tambah Data Pemakaian Bahan Habis Pakai</title>
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
                                <li class="breadcrumb-item"><a href="pk-bahan.php">Data Pemakaian Bahan Habis Pakai</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Pemakaian Bahan Habis Pakai</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Data Pemakaian Bahan Habis Pakai</h6>
                        <hr />
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body px-5 pb-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-plus me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Tambah Pemakaian Bahan Habis Pakai</h5>
                                </div>
                                <hr>
                                <form class="row g-3" method="POST" target="">
                                    <div class="col-12">
                                        <label for="id_barang" class="form-label">Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
									<?php
									$jurusan = $_SESSION['jurusan'];
									$query = "select * from tbl_barang WHERE kategori = 'Bahan' AND kepemilikan = '".$_SESSION["jurusan"]."'";
									$hasil = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_barang'] ?>">
											<?php echo $row['nama_barang'] ?>
										</option>
									<?php
									}
									?>
								</select>
                                    </div>
                                    <div class="col-12">
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="tgl_pinjam" class="form-label">Tanggal Pemakaian</label>
                                        <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="waktu_pinjam" class="form-label">Jam Pelajaran Pemakaian</label>
                                        <input type="text" class="form-control" name="waktu_pinjam" id="waktu_pinjam" placeholder="Jam Pelajaran" required>
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