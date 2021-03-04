<?php 
include 'config.php';
$id_kelurahan=$_GET['id_kelurahan'];
mysqli_query($conn, "DELETE from Kelurahan where id_kelurahan='$id_kelurahan'");
header("location:kelurahan_data.php");

?>