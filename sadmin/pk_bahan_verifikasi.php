<?php
include '../koneksi.php';

if (isset($_GET["id"])) {
        $sql_cek = "UPDATE tbl_peminjaman SET status_verifikasi='Sudah Terverifikasi' WHERE id_peminjaman = '".$_GET['id']."'";
        $query_cek = mysqli_query($conn, $sql_cek);
        $berita_acara = "INSERT INTO tb_berita_acara_peminjaman (id_berita_acara_peminjaman, id_peminjaman) VALUES (
            '".NULL."',
            '" .$_GET["id"]. "')";
        $query_beita_acara = mysqli_query($conn, $berita_acara);
        if($query_cek){
            echo "<script>alert('Data Berhasil Terverifikasi');</script>";
            echo "<script>location.href='pk-bahan.php';</script>";
        }
    }   
?>