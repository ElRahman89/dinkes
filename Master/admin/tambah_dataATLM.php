<?php 
include 'config.php';

$link = mysqli_connect("localhost", "root", "", "sdk") or die($link);

		$namaATLM=mysqli_real_escape_string($link, $_POST['namaATLM']);
		$tempatlahirATLM=$_POST['tempatlahirATLM'];
		$tgllahirATLM=$_POST['tgllahirATLM'];
		
		$alamatATLM=mysqli_real_escape_string($link, $_POST['alamatATLM']);
		
		$sipATLM=$_POST['sipATLM'];
		$namasaranaATLM=$_POST['namasaranaATLM'];
		$alamatsaranaATLM=mysqli_real_escape_string($link, $_POST['alamatsaranaATLM']);
		$tglcetakATLM=$_POST['tglcetakATLM'];
		$expATLM=$_POST['expATLM'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkatlm WHERE sipATLM='$sipATLM'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkatlm values('','$namaATLM','$tempatlahirATLM','$tgllahirATLM','$alamatATLM','$sipATLM','$namasaranaATLM','$alamatsaranaATLM','$tglcetakATLM','$expATLM')");

	header("location:sdmkATLM.php");
    }
 ?>