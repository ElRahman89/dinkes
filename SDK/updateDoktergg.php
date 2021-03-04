<?php
include 'config.php';

$No=$_POST['No'];
$namaDoktergg=$_POST['namaDoktergg'];
$tempatlahirDoktergg=$_POST['tempatlahirDoktergg'];
$tgllahirDoktergg=$_POST['tgllahirDoktergg'];
$alamatDoktergg=$_POST['alamatDoktergg'];
$sip1Doktergg=$_POST['sip1Doktergg'];
$namasarana1Doktergg=$_POST['namasarana1Doktergg'];
$alamatsarana1Doktergg=$_POST['alamatsarana1Doktergg'];
$tglcetak1Doktergg=$_POST['tglcetak1Doktergg'];
$sip2Doktergg=$_POST['sip2Doktergg'];
$namasarana2Doktergg=$_POST['namasarana2Doktergg'];
$alamatsarana2Doktergg=$_POST['alamatsarana2Doktergg'];
$tglcetak2Doktergg=$_POST['tglcetak2Doktergg'];
$expDoktergg=$_POST['expDoktergg'];



mysqli_query($conn, "UPDATE sdmkDoktergg set namaDoktergg='$namaDoktergg', tempatlahirDoktergg='$tempatlahirDoktergg', tgllahirDoktergg='$tgllahirDoktergg', alamatDoktergg='$alamatDoktergg', sip1Doktergg='$sip1Doktergg', namasarana1Doktergg='$namasarana1Doktergg', alamatsarana1Doktergg='$alamatsarana1Doktergg', tglcetak1Doktergg='$tglcetak1Doktergg', sip2Doktergg='$sip2Doktergg', namasarana2Doktergg='$namasarana2Doktergg', alamatsarana2Doktergg='$alamatsarana2Doktergg', tglcetak2Doktergg='$tglcetak2Doktergg', expDoktergg='$expDoktergg' WHERE No='$No'");

header("location:sdmkDoktergg.php");

?>
