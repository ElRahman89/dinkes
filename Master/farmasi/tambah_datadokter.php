<?php 
include 'config.php';

		$namaDokter=$_POST['namaDokter'];
		$tempatlahirDokter=$_POST['tempatlahirDokter'];
		$tgllahirDokter=$_POST['tgllahirDokter'];
		
		$alamatDokter=$_POST['alamatDokter'];
		
		$sip1Dokter=$_POST['sip1Dokter'];
		$namasarana1Dokter=$_POST['namasarana1Dokter'];
		$alamatsarana1Dokter=$_POST['alamatsarana1Dokter'];
		$tglcetak1Dokter=$_POST['tglcetak1Dokter'];
		$sip2Dokter=$_POST['sip2Dokter'];
		$namasarana2Dokter=$_POST['namasarana2Dokter'];
		$alamatsarana2Dokter=$_POST['alamatsarana2Dokter'];
		$tglcetak2Dokter=$_POST['tglcetak2Dokter'];
		$sip3Dokter=$_POST['sip3Dokter'];
		$namasarana3Dokter=$_POST['namasarana3Dokter'];
		$alamatsarana3Dokter=$_POST['alamatsarana3Dokter'];
		$tglcetak3Dokter=$_POST['tglcetak3Dokter'];
		$expDokter=$_POST['expDokter'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkdokter WHERE sip1Dokter='$sip1Dokter'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkdokter values('','$namaDokter','$tempatlahirDokter','$tgllahirDokter','$alamatDokter','$sip1Dokter','$namasarana1Dokter','$alamatsarana1Dokter','$tglcetak1Dokter','$sip2Dokter','$namasarana2Dokter','$alamatsarana2Dokter','$tglcetak2Dokter','$sip3Dokter','$namasarana3Dokter','$alamatsarana3Dokter','$tglcetak3Dokter','$expDokter')");

	header("location:sdmkDokter.php");
    }
    



 ?>