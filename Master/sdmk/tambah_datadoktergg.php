<?php 
include 'config.php';

$link = mysqli_connect("localhost", "root", "", "sdk") or die($link);

		$namaDoktergg=mysqli_real_escape_string($link, $_POST['namaDoktergg']);
		$tempatlahirDoktergg=$_POST['tempatlahirDoktergg'];
		$tgllahirDoktergg=$_POST['tgllahirDoktergg'];
		
		$alamatDoktergg=mysqli_real_escape_string($link, $_POST['alamatDoktergg']);
		
		$sip1Doktergg=$_POST['sip1Doktergg'];
		$namasarana1Doktergg=$_POST['namasarana1Doktergg'];
		$alamatsarana1Doktergg=mysqli_real_escape_string($link, $_POST['alamatsarana1Doktergg'];
		$tglcetak1Doktergg=$_POST['tglcetak1Doktergg'];
		$sip2Doktergg=$_POST['sip2Doktergg'];
		$namasarana2Doktergg=$_POST['namasarana2Doktergg']);
		$alamatsarana2Doktergg=mysqli_real_escape_string($link, $_POST['alamatsarana2Doktergg']);
		$tglcetak2Doktergg=$_POST['tglcetak2Doktergg'];
		$expDoktergg=$_POST['expDoktergg'];
		


//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sdmkDoktergg WHERE sip1Doktergg='$sip1Doktergg'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into sdmkDoktergg values('','$namaDoktergg','$tempatlahirDoktergg','$tgllahirDoktergg','$alamatDoktergg','$sip1Doktergg','$namasarana1Doktergg','$alamatsarana1Doktergg','$tglcetak1Doktergg','$sip2Doktergg','$namasarana2Doktergg','$alamatsarana2Doktergg','$tglcetak2Doktergg','$expDoktergg')");

	header("location:sdmkDoktergg.php");
    }
    



 ?>