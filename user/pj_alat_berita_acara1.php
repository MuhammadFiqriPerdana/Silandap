<?php

require '../fpdf/fpdf.php';
include '../koneksi.php';

$id = $_GET['id'];
function bulan($number){
    
    $bulan = substr($number,5,2);
    if ($bulan == "01") {
        # code...
        $bulan = "Januari";
    }elseif ($bulan == "02") {
    # code...
    $bulan = "Febuari";
}elseif ($bulan == "02") {
    # code...
    $bulan = "Febuari";
}elseif ($bulan == "03") {
    # code...
    $bulan = "Maret";
}elseif ($bulan == "04") {
    # code...
    $bulan = "April";
}elseif ($bulan == "05") {
    # code...
    $bulan = "Mei";
}elseif ($bulan == "06") {
    # code...
    $bulan = "Juni";
}elseif ($bulan == "07") {
    # code...
    $bulan = "Juli";
}elseif ($bulan == "08") {
    # code...
    $bulan = "Agustus";
}elseif ($bulan == "09") {
    # code...
    $bulan = "September";
}elseif ($bulan == "10") {
    # code...
    $bulan = "Oktober";
}elseif ($bulan == "11") {
    # code...
    $bulan = "November";
}elseif ($bulan == "12") {
    # code...
    $bulan = "Desember";
}
return $bulan;
}
$tanggal2 = date('Y-m-d');
    $tgl = substr($tanggal2,8,2);
    $thn = substr($tanggal2,0,4);
    $day = date('D', strtotime($tanggal2));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
$pdf=new PDF('P','mm','A4');
$berita_acara=mysqli_query($conn, "SELECT * FROM SELECT * FROM tb_berita_acara_peminjaman b
INNER JOIN tbl_peminjaman p ON b.id_peminjaman = p.id_peminjaman INNER JOIN tbl_user u ON u.id_user = p.id_user WHERE b.id_peminjaman = '".$_GET['id']."'");
$databeritaacara = mysqli_fetch_assoc($berita_acara);

$pdf->AddPage();
$pdf->Image('../assets/images/kalsel.png',13,9,22,27,'','');
$pdf->SetFont('Times','B',16);

$pdf->Cell(215,6,'PEMERINTAH PROVINSI KALIMANTAN SELATAN',0,1,'C');
$pdf->SetFont('Times','B',18);
$pdf->Cell(215,6,'DINAS PENDIDIKAN DAN KEBUDAYAAN',0,1,'C');
$pdf->Cell(215,6,'SMK NEGERI 2 BANJARBARU',0,1,'C');
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,1,'',0,1,'L');
$pdf->Cell(215,3,'Jalan Nusantara Nomor 1 Telp/Fax(0511)4773452 Loktabat Selatan Banjarbaru',0,1,'C');
$pdf->Cell(215,3,'Website https://www.smkn2banjarbaru.sch.id Email:smkn2bjb@gmail.com',0,1,'C');

$pdf->SetFont('Arial','B',13);
$pdf->Cell(5,6,'',0,1,'L');
$pdf->Cell('200',0,'Berita Acara Peminjaman Alat Praktek',0,1,'C');
$pdf->Cell(200,4,'__________________________________________',0,1,'C');
$pdf->Cell(5,4,'',0,1,'L');









