<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/a.jpg',1,1,2,2);
$pdf->SetX(4);

$pdf->MultiCell(19.5,0.5,'CV. RAHMAN FURNITURE',0,'L');
$pdf->SetX(4);

$pdf->MultiCell(19.5,0.5,'Telpon : 081357944889',0,'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);

$pdf->MultiCell(19.5,0.5,'JL. Rungkut Asri No. 17 Surabaya',0,'L');
$pdf->SetX(4);

$pdf->MultiCell(19.5,0.5,'website : www.rahmanfurniture.com email : rahmanfurniture@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);

$pdf->SetLineWidth(0.1);
$pdf->Line(1,3.2,28.5,3.2);

$pdf->SetLineWidth(0);
$pdf->ln(1);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);

$pdf->SetFont('Arial','B',10);

$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Suplier', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'modal', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'harga', 1, 0, 'C');

$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($conn, "SELECT * from Daftar_Klinik");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['Nama_KlinikPratama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['Alamat_Klinik'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['Penanggung_Jawab'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['Tgl_Berlaku'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, $lihat['Tgl_JatuhTempo'],1, 0, 'C');


	$no++;
}

$pdf->Output("Surat izin operasional.pdf","I");

?>
