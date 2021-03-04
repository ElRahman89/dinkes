<?php 
include 'config.php';
$id_pim=$_GET['id_pim'];
mysqli_query($conn, "DELETE from hasil_pengawasanIM where id_pim='$id_pim'");
header("location:lihat_data2.php");

?>