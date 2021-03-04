<?php
include 'config.php';

$No=$_POST['No'];
$namaDokter=mysqli_real_escape_string($conn, $_POST['namaDokter']);
$tempatlahirDokter=$_POST['tempatlahirDokter'];
$tgllahirDokter=$_POST['tgllahirDokter'];
$alamatDokter=mysqli_real_escape_string($conn, $_POST['alamatDokter']);
$sip1Dokter=$_POST['sip1Dokter'];
$namasarana1Dokter=$_POST['namasarana1Dokter'];
$alamatsarana1Dokter=mysqli_real_escape_string($conn, $_POST['alamatsarana1Dokter']);
$tglcetak1Dokter=$_POST['tglcetak1Dokter'];
$sip2Dokter=$_POST['sip2Dokter'];
$namasarana2Dokter=$_POST['namasarana2Dokter'];
$alamatsarana2Dokter=mysqli_real_escape_string($conn, $_POST['alamatsarana2Dokter']);
$tglcetak2Dokter=$_POST['tglcetak2Dokter'];
$sip3Dokter=$_POST['sip3Dokter'];
$namasarana3Dokter=$_POST['namasarana3Dokter'];
$alamatsarana3Dokter=mysqli_real_escape_string($conn, $_POST['alamatsarana3Dokter']);
$tglcetak3Dokter=$_POST['tglcetak3Dokter'];
$expDokter=$_POST['expDokter'];



mysqli_query($conn, "UPDATE sdmkdokter set namaDokter='$namaDokter', tempatlahirDokter='$tempatlahirDokter', tgllahirDokter='$tgllahirDokter', alamatDokter='$alamatDokter', sip1Dokter='$sip1Dokter', namasarana1Dokter='$namasarana1Dokter', alamatsarana1Dokter='$alamatsarana1Dokter', tglcetak1Dokter='$tglcetak1Dokter', sip2Dokter='$sip2Dokter', namasarana2Dokter='$namasarana2Dokter', alamatsarana2Dokter='$alamatsarana2Dokter', tglcetak2Dokter='$tglcetak2Dokter', sip3Dokter='$sip3Dokter', namasarana3Dokter='$namasarana3Dokter', alamatsarana3Dokter='$alamatsarana3Dokter', tglcetak3Dokter='$tglcetak3Dokter', expDokter='$expDokter' WHERE No='$No'");

header("location:sdmkDokter.php");

?>
