<?php 
include 'config.php';

	$nama_klinik=$_POST['nama_klinik'];
	$tgl_tenggang=$_POST['tgl_tenggang'];
	$jamjadwal=$_POST['jamjadwal'];
    $penanggung_klinik=$_POST['penanggung_klinik'];
    $penanggung_dinkes=$_POST['penanggung_dinkes'];
	$ket_tenggang=$_POST['ket_tenggang'];
    $status=$_POST['status'];

    mysqli_query($conn, "INSERT into janji_tenggang values('','$tgl_tenggang','$jamjadwal','$nama_klinik','$penanggung_klinik','$penanggung_dinkes','$ket_tenggang', '$status', 'Belum Selesai')");

    mysqli_query($conn, "UPDATE detail_jadwal SET status = 'Penuh' WHERE idjadwal = '$tgl_tenggang' AND iddetailjadwal = '$jamjadwal'");

	header("location:janji_tenggang.php");
    



 ?>