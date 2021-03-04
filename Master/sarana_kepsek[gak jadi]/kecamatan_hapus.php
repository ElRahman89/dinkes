<?php 
include 'config.php';
$id_kecamatan=$_GET['id_kecamatan'];
mysqli_query($conn, "DELETE from Kecamatan where id_kecamatan='$id_kecamatan'");
header("location:kecamatan_data.php");

?>