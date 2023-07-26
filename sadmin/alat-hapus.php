<?php
session_start();

if ($_SESSION["level"] == 2) {
    header("Location: logout.php");
    exit;
}
include "../koneksi.php";
$id_bagian = $_GET['id'];

$query = "DELETE FROM tbl_bagian WHERE id_bagian = '$id_bagian'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<script>
            alert('Data berhasil dihapus ...!');
            document.location.href = 'bagian.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus ...!');
            history.go(-1);
        </script>";
}
