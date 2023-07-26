<?php
require '../koneksi.php';
require '../vendor/autoload.php';
include '../koneksi.php';

$sql_cek = "SELECT * FROM tb_berita_acara_peminjaman b
INNER JOIN tbl_peminjaman p ON b.id_peminjaman = p.id_peminjaman
INNER JOIN tbl_user u ON u.id_user = p.id_user
INNER JOIN tbl_barang br ON br.id_barang = p.id_barang";
$query_cek = mysqli_query($conn, $sql_cek);
$dt = new DateTime();

     
     
    
    // $data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);









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
                <img src="../assets/images/kalsel.png" style="width:90px; height:90px;"> 
            </td>
            <td style="width:77%;">
                <center>
                    <p style="font-size: 15px;"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></p>
                    <P style="font-size: 15px;"><b>DINAS PENDIDIKAN DAN KEBUDAYAAN</b></P>
                    <P style="font-size: 15px;"><b>SMK NEGERI 2 BANJARBARU</b></P>
                    <P style="font-size: 12px";>Jalan Nusatara Nomor 1 <img src="../assets/images/phone.png" style="width:10px; height: 10px;">/Fax(0511)4773452 Loktabat Selatan Banjarbaru</P>
                    <p style="font-size: 12px";>Website https://www.smkn2banjarbaru.sch.id Email: smkn2bjb@gmail.com</p>
                </center>
            </td>
        </tr>
    </table>
    <hr style="color: black; margin: 0px; padding: 0px; height: 5px;">
    <br>

    
    <h3 align="center">Rekapitulasi Berita Acara Peminjaman Alat Praktek</h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>ID Berita Acara Peminjaman</th>
        <th>ID Peminjaman</th>
        <th>Petugas</th>
    </tr> ';
    $i = 1;
    foreach( $query_cek as $row) {
        $html .= '<tr>
        <td align="center">'. $i++ .'</td>
        <td align="center">'. $row["id_berita_acara_peminjaman"].'</td>
        <td align="center">'. $row["nm_user"].'</td>
        <td align="center">Muhammad Fiqri Perdana</td>
        </tr>';
    }

    $html .=   '</table>
    <table style="border: 1px solid #fff;">
        <tr></tr>
        <tr>
        
            <td align="right" style="width: 15%;">
            <br>
            Banjarbaru, '.$dt->format('d-m-Y').'
            </td>
        </tr>
        
        <tr>
            <td align="right" style="width: 15%; padding-right: 45px;">
                Mengetahui
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 20%; padding-right: 10px">
            KEPALA PROGRAM TJKT
            </td>
        </tr>
        <tr>
            <td align="right" style="width: 30%; padding-top: 90px; padding-right: 15px">
            Omar M.A.A, S.Pd.
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

    

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
