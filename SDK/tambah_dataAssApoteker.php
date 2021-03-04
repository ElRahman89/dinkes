<?php 
include 'config.php';

		$namaAssApoteker=$_POST['namaAssApoteker'];
		$tempatlahirAssApoteker=$_POST['tempatlahirAssApoteker'];
		$tgllahirAssApoteker=$_POST['tgllahirAssApoteker'];
		$alamatAssApoteker=$_POST['alamatAssApoteker'];
		$sipAssApoteker=$_POST['sipAssApoteker'];
		
		$namasaranaAssApoteker=$_POST['namasaranaAssApoteker'];
		$alamatsaranaAssApoteker=$_POST['alamatsaranaAssApoteker'];
		
		$tglcetakAssApoteker=$_POST['tglcetakAssApoteker'];
		$expAssApoteker=$_POST['expAssApoteker'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkassapoteker WHERE sipAssApoteker='$sipAssApoteker'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkassapoteker values('','$namaAssApoteker','$tempatlahirAssApoteker','$tgllahirAssApoteker','$alamatAssApoteker','$sipAssApoteker','$namasaranaAssApoteker','$alamatsaranaAssApoteker','$tglcetakAssApoteker','$expAssApoteker')");

	header("location:sdmkAssApoteker.php");
    }
    



 ?>