<?php
require __DIR__ . '/../koneksi.php';
require_once __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '../inc/koneksi.php';

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tbl_peminjaman pj INNER JOIN tbl_user u ON u.id_user = pj.id_user INNER JOIN tbl_barang b ON pj.id_barang = b.id_barang LEFT JOIN tbl_pengembalian k on pj.id_peminjaman = k.id_pin";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $hasil = mysqli_fetch_assoc($query_cek);
    $tanggal = $hasil['tgl_pinjam'];
   
 


}   







$mpdf = new \Mpdf\Mpdf();
ob_start();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/print.css" class="css">
    <title>PRINT DATA BARANG</title>
</head>
<body>
<table style="border: 1px solid #fff; width: 100%;">
        <tr>
            <td style="width: 15%;">
                <img src="../../dist/img/kalsel.png" style="width:90px; height:90px;"> 
            </td>
            <td style="width:77%;">
                <center>
                    <p style="font-size: 15px;"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></p>
                    <P style="font-size: 15px;"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></P>
                    <P style="font-size: 15px;"><b>SMK NEGERI 2 BANJARBARU</b></P>
                    <P style="font-size: 12px";>Jalan Nusatara Nomor 1 <img src="../../dist/img/phone.png" style="width:10px; height: 10px;">/Fax(0511)4773452 Loktabat Selatan Banjarbaru</P>
                    <p style="font-size: 12px";>Website https://www.smkn2banjarbaru.sch.id Email: smkn2bjb@gmail.com</p>
                </center>
            </td>
        </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    <h3 align="center">Berita Acara Peminjaman Alat Pratek </h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>ID Peminjaman</th>
        <th>Nama Peminjam</th>
    </tr> ';
    $i = 1;
    
    while ($row = mysqli_fetch_assoc($query_cek)) {
        $html .= '<tr>
        <td align="center">'. $row["id_peminjaman"].'</td>
        <td align="center">'. $row["nm_user"].'</td>
        </tr>';
    }

    $html .=   '</table>
    <table style="border: 1px solid #fff;">
        <tr></tr>
        <tr>
        
            <td align="right" style="width: 15%;">
            <br>
            <br>Banjarbaru, _______________
            </td>
        </tr>
        
        <tr>
            <td align="right" style="width: 15%; padding-right: 45px;">
                Mengetahui
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%; padding-right: 10px">
            KEPALA BENGKEL TKJ
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 30%; padding-top: 90px; padding-right: 15px">
            Muhammad Yasa, S.Pd
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%;">
            NIP. 198111242009031002
            </td>
        </tr>
    </table>
    
</body>
</html>';

    

$mpdf->WriteHTML(utf8_encode($html));
ob_end_clean();
$mpdf->Output();
?>

