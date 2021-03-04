<?php 
include 'config.php';

$nig=$_POST['id_kecamatan'];
$nm_kecamatan=$_POST['nm_kecamatan'];


mysqli_query($conn, "INSERT INTO Kecamatan VALUES('$id_kecamatan','$nm_kecamatan')");

header("location:kecamatan_data.php");


 ?>