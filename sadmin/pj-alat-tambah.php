<?php
session_start();

if ($_SESSION["level"] == 2) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";

if (isset($_POST["submit"])){
    $id_siswa = $_POST["id_siswa"];
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
        $sql_simpan = "INSERT INTO tbl_peminjaman(id_peminjaman, id_user, id_barang, jumlah, tgl_pinjam, waktu_pinjam, status_verifikasi) VALUES (
            '" .NULL. "',
            '" .$id_siswa. "',
            '" .$id_barang. "',
            '" .$jumlah. "',
            '" .$tgl_pinjam. "',
            '" .$waktu_pinjam. "',
            'Sedang  Dipinjam')";
        $upstok = mysqli_query($conn, "UPDATE tbl_barang SET stok='$sisa' WHERE id_barang='" .$_POST['id_barang']. "'");
        $query_simpan = mysqli_query($conn, $sql_simpan, $upstok);
    }
    if($query_simpan){
        ?>
            <script>
            alert('Tambah Data Berhasil');
            document.location='pj-alat.php';
            </script>
        <?php
    }else {
        ?>
            <script>
            alert('Tambah Data Gagal');
            document.location='pj-alat-tambah.php';
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
    <title>Simawar - Tambah Data Peminjaman Alat</title>
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
                                <li class="breadcrumb-item"><a href="index.php">Data Alat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Alat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Data Peminjaman Alat</h6>
                        <hr />
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body px-5 pb-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bx-plus me-1 font-22 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-primary">Tambah Peminjaman Alat</h5>
                                </div>
                                <hr>
                                <form class="row g-3" method="POST" target="">
                                <div class="col-12">
                                        <label for="id_siswa" class="form-label">Siswa</label>
                                        <select name="id_siswa" id="id_siswa" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
									<?php
									
									$query = "select * from tbl_SISWA";
									$hasil = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_siswa'] ?>">
											<?php echo $row['nama_siswa'] ?> -
											<?php echo $row['kelas'] ?>
										</option>
									<?php
									}
									?>
								</select>
                                    </div>
                                    <div class="col-12">
                                        <label for="id_barang" class="form-label">Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control select2" style="width: 100%;">
									<option selected="selected">-- Pilih --</option>
									<?php
									
									$query = "select * from tbl_barang WHERE kategori = 'Alat' AND kondisi = 'Baik'";
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
                                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                        <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="waktu_pinjam" class="form-label">Jam Pelajaran Pinjam</label>
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