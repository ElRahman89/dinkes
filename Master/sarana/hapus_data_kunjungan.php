<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from kunjungan where Id_Kunjungan='$No'");
header("location:kunjungansarana.php");

?>
