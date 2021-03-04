<?php
include 'config.php';

$idBidan=$_POST['idBidan'];
$Surat_ijin_kerja_bidan=$_POST['Surat_ijin_kerja_bidan'];
$Nama_Bidan=mysqli_real_escape_string($conn, $_POST['Nama_Bidan']);
$tlBidan=$_POST['tlBidan'];
$tglBidan=$_POST['tglBidan'];
$alamatBidan=mysqli_real_escape_string($conn, $_POST['alamatBidan']);
$kotaBidan=$_POST['kotaBidan'];
$nomorstrBidan=$_POST['nomorstrBidan'];
$namasaranaBidan=$_POST['namasaranaBidan'];
$alamatsaranaBidan=mysqli_real_escape_string($conn, $_POST['alamatsaranaBidan']);
$kotasaranaBidan=$_POST['kotasaranaBidan'];
$masaberlakuBidan=$_POST['masaberlakuBidan'];
$tglcetakBidan=$_POST['tglcetakBidan'];



mysqli_query($conn, "UPDATE sdmkBidan set Surat_ijin_kerja_bidan='$Surat_ijin_kerja_bidan', Nama_Bidan='$Nama_Bidan', tlBidan='$tlBidan', tglBidan='$tglBidan', alamatBidan='$alamatBidan', kotaBidan='$kotaBidan', nomorstrBidan='$nomorstrBidan', namasaranaBidan='$namasaranaBidan', alamatsaranaBidan='$alamatsaranaBidan', kotasaranaBidan='$kotasaranaBidan', masaberlakuBidan='$masaberlakuBidan', tglcetakBidan='$tglcetakBidan' WHERE idBidan='$idBidan'");

header("location:sdmkBidan.php");

?>
