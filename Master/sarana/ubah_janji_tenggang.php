<?php 
include 'config.php';
    $idj = $_POST['idj'];
    $sql = mysqli_query($conn, "SELECT iddetailjadwal FROM janji_tenggang WHERE idjanjitenggang = '$idj'");
    $qwr = mysqli_fetch_array($sql);
    $idjd= $qwr['iddetailjadwal'];
    mysqli_query($conn, "UPDATE janji_tenggang SET statusjanji = 'Selesai' WHERE idjanjitenggang = '$idj'");

    mysqli_query($conn, "UPDATE detail_jadwal SET status = 'Kosong' WHERE iddetailjadwal = '$idjd'");

	header("location:janji_tenggang.php");

 ?>