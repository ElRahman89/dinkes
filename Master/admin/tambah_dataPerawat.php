<?php 
include 'config.php';

$link = mysqli_connect("localhost", "root", "", "sdk") or die($link);

		$namaPerawat=mysqli_real_escape_string($link, $_POST['namaPerawat']);
		$tempatlahirPerawat=$_POST['tempatlahirPerawat'];
		$tgllahirPerawat=$_POST['tgllahirPerawat'];
		$alamatPerawat=mysqli_real_escape_string($link, $_POST['alamatPerawat']);
		$sipPerawat=$_POST['sipPerawat'];
		
		$namasaranaPerawat=$_POST['namasaranaPerawat'];
		$alamatsaranaPerawat=mysqli_real_escape_string($link, $_POST['alamatsaranaPerawat']);
		
		$tglcetakPerawat=$_POST['tglcetakPerawat'];
		$expPerawat=$_POST['expPerawat'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkperawat WHERE sipPerawat='$sipPerawat'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkperawat values('','$namaPerawat','$tempatlahirPerawat','$tgllahirPerawat','$alamatPerawat','$sipPerawat','$namasaranaPerawat','$alamatsaranaPerawat','$tglcetakPerawat','$expPerawat')");

	header("location:sdmkPerawat.php");
    }
    



 ?>