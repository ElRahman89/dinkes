<?php 
include 'config.php';

		$namaApoteker=$_POST['namaApoteker'];
		$tempatlahirApoteker=$_POST['tempatlahirApoteker'];
		$tgllahirApoteker=$_POST['tgllahirApoteker'];
		
		$alamatApoteker=$_POST['alamatApoteker'];
		
		$sipApoteker=$_POST['sipApoteker'];
		$namasaranaApoteker=$_POST['namasaranaApoteker'];
		$alamatsaranaApoteker=$_POST['alamatsaranaApoteker'];
		$tglcetakApoteker=$_POST['tglcetakApoteker'];
		$expApoteker=$_POST['expApoteker'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkApoteker WHERE sipApoteker='$sipApoteker'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkapoteker values('','$namaApoteker','$tempatlahirApoteker','$tgllahirApoteker','$alamatApoteker','$sipApoteker','$namasaranaApoteker','$alamatsaranaApoteker','$tglcetakApoteker','$expApoteker')");

	header("location:sdmkApoteker.php");
    }
    



 ?>