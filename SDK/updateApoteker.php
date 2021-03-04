<?php
include 'config.php';

$No=$_POST['No'];
$namaApoteker=$_POST['namaApoteker'];
$tempatlahirApoteker=$_POST['tempatlahirApoteker'];
$tgllahirApoteker=$_POST['tgllahirApoteker'];
$alamatApoteker=$_POST['alamatApoteker'];
$sipApoteker=$_POST['sipApoteker'];
$namasaranaApoteker=$_POST['namasaranaApoteker'];
$alamatsaranaApoteker=$_POST['alamatsaranaApoteker'];
$tglcetakApoteker=$_POST['tglcetakApoteker'];
$expApoteker=$_POST['expApoteker'];



mysqli_query($conn, "UPDATE sdmkApoteker set namaApoteker='$namaApoteker', tempatlahirApoteker='$tempatlahirApoteker', tgllahirApoteker='$tgllahirApoteker', alamatApoteker='$alamatApoteker', sipApoteker='$sipApoteker', namasaranaApoteker='$namasaranaApoteker', alamatsaranaApoteker='$alamatsaranaApoteker', tglcetakApoteker='$tglcetakApoteker', expApoteker='$expApoteker' WHERE No='$No'");

header("location:sdmkApoteker.php");

?>
