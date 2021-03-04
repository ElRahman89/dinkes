<?php 
include 'config.php';
$id_pio=$_GET['id_pio'];
mysqli_query($conn, "DELETE from hasil_pengawasanIO where id_pio='$id_pio'");
header("location:lihat_data.php");

?>