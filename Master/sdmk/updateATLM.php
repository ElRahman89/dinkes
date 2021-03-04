<?php
include 'config.php';

$No=$_POST['No'];
$namaATLM=mysqli_real_escape_string($conn, $_POST['namaATLM']);
$tempatlahirATLM=$_POST['tempatlahirATLM'];
$tgllahirATLM=$_POST['tgllahirATLM'];
$alamatATLM=mysqli_real_escape_string($conn, $_POST['alamatATLM']);
$sipATLM=$_POST['sipATLM'];
$namasaranaATLM=$_POST['namasaranaATLM'];
$alamatsaranaATLM=mysqli_real_escape_string($conn, $_POST['alamatsaranaATLM']);
$tglcetakATLM=$_POST['tglcetakATLM'];
$expATLM=$_POST['expATLM'];



mysqli_query($conn, "UPDATE sdmkATLM set namaATLM='$namaATLM', tempatlahirATLM='$tempatlahirATLM', tgllahirATLM='$tgllahirATLM', alamatATLM='$alamatATLM', sipATLM='$sipATLM', namasaranaATLM='$namasaranaATLM', alamatsaranaATLM='$alamatsaranaATLM', tglcetakATLM='$tglcetakATLM', expATLM='$expATLM' WHERE No='$No'");

header("location:sdmkATLM.php");

?>
