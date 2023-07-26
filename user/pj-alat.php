<?php
session_start();

if ($_SESSION["level"] == 1 ) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";

$query_pj_alat = "SELECT * FROM tbl_peminjaman pj INNER JOIN tbl_user u ON u.id_user = pj.id_user INNER JOIN tbl_barang b ON pj.id_barang = b.id_barang LEFT JOIN tbl_pengembalian k ON pj.id_peminjaman = k.id_pin WHERE b.kategori = 'Alat' AND pj.id_user='".$_SESSION["ses_id"]."' AND k.id_pin IS NULL";
$result_pj_alat = mysqli_query($conn, $query_pj_alat);

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
    <link href="../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
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
    <title>Silandap - Peminjaman Alat</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Data Peminjaman Alat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h5 class="my-4 text-uppercase">Data Peminjaman Alat</h5>
                <div class="col">
                    <a href="pj-alat-tambah.php" class="btn btn-primary"><i class='bx bx-plus mr-1'></i>Tambah Data</a>
                </div>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Action</th>
                                        <th>Nama Peminjam</th>
                                        <th>Nama Barang</th>
                                        <th>Kondisi</th>
                                        <th>Jumlah</th>
                                        <th>Status Verifikasi</th>
                                        <th>Berita Acara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row_pj_alat = mysqli_fetch_assoc($result_pj_alat)) { ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="pj-alat-kembali.php?id=<?php echo $row_pj_alat['id_peminjaman'] ?>"  title="Kembali" class="ms-2 text-light bg-success border-0"><span class="iconify" data-icon="akar-icons:arrow-back"></span></a>
                                                </div>
                                            <td><?php echo $row_pj_alat["nm_user"] ?></td>
                                            <td><?php echo $row_pj_alat["nama_barang"] ?></td>
                                            <td><?php echo $row_pj_alat["kondisi"] ?></td>
                                            <td><?php echo $row_pj_alat["jumlah"] ?></td>
                                            <td><?php echo $row_pj_alat["status_verifikasi"] ?></td>
                                            <td>
                                                <a href="pj_alat_berita_acara.php?id=<?php echo $row_pj_alat['id_peminjaman']; ?>" title="Print Berita" target="_blank" class="btn btn-success <?= $row_pj_alat['status_verifikasi'] == 'Belum Terverifikasi' ? 'disabled' : '' ?>">
                                                <span class="iconify" data-icon="bytesize:print"></span>

                                            </td>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    <script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
    <!--app JS-->
    <script src="../assets/js/app.js"></script>
</body>

</html>