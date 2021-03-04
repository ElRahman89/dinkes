<?php
include 'config.php';

$No=$_POST['No'];
$namaAssApoteker=$_POST['namaAssApoteker'];
$tempatlahirAssApoteker=$_POST['tempatlahirAssApoteker'];
$tgllahirAssApoteker=$_POST['tgllahirAssApoteker'];
$alamatAssApoteker=$_POST['alamatAssApoteker'];
$sipAssApoteker=$_POST['sipAssApoteker'];
$namasaranaAssApoteker=$_POST['namasaranaAssApoteker'];
$alamatsaranaAssApoteker=$_POST['alamatsaranaAssApoteker'];
$tglcetakAssApoteker=$_POST['tglcetakAssApoteker'];
$expAssApoteker=$_POST['expAssApoteker'];



mysqli_query($conn, "UPDATE sdmkAssApoteker set namaAssApoteker='$namaAssApoteker', tempatlahirAssApoteker='$tempatlahirAssApoteker', tgllahirAssApoteker='$tgllahirAssApoteker', alamatAssApoteker='$alamatAssApoteker', sipAssApoteker='$sipAssApoteker', namasaranaAssApoteker='$namasaranaAssApoteker', alamatsaranaAssApoteker='$alamatsaranaAssApoteker', tglcetakAssApoteker='$tglcetakAssApoteker', expAssApoteker='$expAssApoteker' WHERE No='$No'");

header("location:sdmkAssApoteker.php");

?>
