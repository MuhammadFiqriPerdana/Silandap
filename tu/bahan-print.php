<?php
require '../koneksi.php';
require '../vendor/autoload.php';
include '../koneksi.php';

$sql_cek = "SELECT * FROM tbl_barang WHERE kategori='Bahan'";
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

    
    <h3 align="center">LAPORAN DATA STOK BAHAN PRAKTEK</h3>
    <table width="100%" border="1" cellpading="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kode Alat</th>
        <th>Nama Alat</th>
        <th>Stok Alat</th>
    </tr> ';
    $i = 1;
    foreach( $query_cek as $row) {
        $html .= '<tr>
        <td align="center">'. $i++ .'</td>
        <td align="center">'. $row["kode_barang"].'</td>
        <td align="center">'. $row["nama_barang"].'</td>
        <td align="center">'. $row["stok"].'</td>
        </tr>';
    }

    $html .=   '</table>
    <table style="border: 1px solid #fff;">
    <tr></tr>
    <tr>
    
        <td align="right" style="width: 15%; padding-right: 65px;">
        <br>
        Banjarbaru, '.$dt->format('d-m-Y').'
        </td>
    </tr>
    
    <tr>
        <td align="right" style="width: 15%; padding-right: 74px;">
            Mengetahui
        </td>
    </tr>
    <tr>
        <td align="right" style="width: 20%; padding-right: 10px">
        KEPALA PROGRAM KEAHLIAN
        </td>
    </tr>
    <tr>
        <td align="right" style="width: 30%; padding-top: 90px; padding-right: 51px">
        Omar M.A.A, S.Pd
        </td>
    </tr>
    <tr>
        <td align="right" style="width: 20%; padding-right: 15px">
        NIP. 198111242009031002
        </td>
    </tr>
</table>
    
</body>
</html>';

    

$mpdf->WriteHTML($html);
$mpdf->Output();
?>
