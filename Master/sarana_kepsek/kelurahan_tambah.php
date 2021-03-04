<?php 
include 'config.php';

$nig=$_POST['id_kelurahan'];
$nm_kelurahan=$_POST['nm_kelurahan'];


mysqli_query($conn, "INSERT INTO Kelurahan VALUES('$id_kelurahan','$nm_kelurahan')");

header("location:kelurahan_data.php");


 ?>