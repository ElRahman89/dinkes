<?php
include 'config.php';

$No=$_POST['No'];
$namaPerawat=mysqli_real_escape_string($conn, $_POST['namaPerawat']);
$tempatlahirPerawat=$_POST['tempatlahirPerawat'];
$tgllahirPerawat=$_POST['tgllahirPerawat'];
$alamatPerawat=mysqli_real_escape_string($conn, $_POST['alamatPerawat']);
$sipPerawat=$_POST['sipPerawat'];
$namasaranaPerawat=$_POST['namasaranaPerawat'];
$alamatsaranaPerawat=mysqli_real_escape_string($conn, $_POST['alamatsaranaPerawat']);
$tglcetakPerawat=$_POST['tglcetakPerawat'];
$expPerawat=$_POST['expPerawat'];



mysqli_query($conn, "UPDATE sdmkperawat set namaPerawat='$namaPerawat', tempatlahirPerawat='$tempatlahirPerawat', tgllahirPerawat='$tgllahirPerawat', alamatPerawat='$alamatPerawat', sipPerawat='$sipPerawat', namasaranaPerawat='$namasaranaPerawat', alamatsaranaPerawat='$alamatsaranaPerawat', tglcetakPerawat='$tglcetakPerawat', expPerawat='$expPerawat' WHERE No='$No'");

header("location:sdmkPerawat.php");

?>
