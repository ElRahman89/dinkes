<?php
include 'config.php';

$No=$_POST['No'];
$namaApoteker=mysqli_real_escape_string($conn, $_POST['namaApoteker']);
$tempatlahirApoteker=$_POST['tempatlahirApoteker'];
$tgllahirApoteker=$_POST['tgllahirApoteker'];
$alamatApoteker=mysqli_real_escape_string($conn, $_POST['alamatApoteker']);
$sipApoteker=$_POST['sipApoteker'];
$namasaranaApoteker=$_POST['namasaranaApoteker'];
$alamatsaranaApoteker=mysqli_real_escape_string($conn, $_POST['alamatsaranaApoteker']);
$tglcetakApoteker=$_POST['tglcetakApoteker'];
$expApoteker=$_POST['expApoteker'];



mysqli_query($conn, "UPDATE sdmkApoteker set namaApoteker='$namaApoteker', tempatlahirApoteker='$tempatlahirApoteker', tgllahirApoteker='$tgllahirApoteker', alamatApoteker='$alamatApoteker', sipApoteker='$sipApoteker', namasaranaApoteker='$namasaranaApoteker', alamatsaranaApoteker='$alamatsaranaApoteker', tglcetakApoteker='$tglcetakApoteker', expApoteker='$expApoteker' WHERE No='$No'");

header("location:sdmkApoteker.php");

?>
