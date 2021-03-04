<?php
include 'config.php';

$No=$_POST['No'];
$namaATLM=$_POST['namaATLM'];
$tempatlahirATLM=$_POST['tempatlahirATLM'];
$tgllahirATLM=$_POST['tgllahirATLM'];
$alamatATLM=$_POST['alamatATLM'];
$sipATLM=$_POST['sipATLM'];
$namasaranaATLM=$_POST['namasaranaATLM'];
$alamatsaranaATLM=$_POST['alamatsaranaATLM'];
$tglcetakATLM=$_POST['tglcetakATLM'];
$expATLM=$_POST['expATLM'];



mysqli_query($conn, "UPDATE sdmkATLM set namaATLM='$namaATLM', tempatlahirATLM='$tempatlahirATLM', tgllahirATLM='$tgllahirATLM', alamatATLM='$alamatATLM', sipATLM='$sipATLM', namasaranaATLM='$namasaranaATLM', alamatsaranaATLM='$alamatsaranaATLM', tglcetakATLM='$tglcetakATLM', expATLM='$expATLM' WHERE No='$No'");

header("location:sdmkATLM.php");

?>
