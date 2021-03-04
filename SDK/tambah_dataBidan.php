<?php 
include 'config.php';

		$Surat_ijin_kerja_bidan=$_POST['Surat_ijin_kerja_bidan'];
		$Nama_Bidan=$_POST['Nama_Bidan'];
		$tlBidan=$_POST['tlBidan'];
		$tglBidan=$_POST['tglBidan'];
		$alamatBidan=$_POST['alamatBidan'];
		$kotaBidan=$_POST['kotaBidan'];
		$nomorstrBidan=$_POST['nomorstrBidan'];
		$namasaranaBidan=$_POST['namasaranaBidan'];
		$alamatsaranaBidan=$_POST['alamatsaranaBidan'];
		$kotasaranaBidan=$_POST['kotasaranaBidan'];
		$masaberlakuBidan=$_POST['masaberlakuBidan'];
		$tglcetakBidan=$_POST['tglcetakBidan'];


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkBidan WHERE nomorstrBidan='$nomorstrBidan'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkBidan values('','$Surat_ijin_kerja_bidan','$Nama_Bidan','$tlBidan','$tglBidan','$alamatBidan','$kotaBidan','$nomorstrBidan','$namasaranaBidan','$alamatsaranaBidan','$kotasaranaBidan','$masaberlakuBidan','$tglcetakBidan')");

	header("location:sdmkbidan.php");
    }
    



 ?>