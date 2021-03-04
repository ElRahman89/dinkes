<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from Data_Pemohon where No='$No'");
header("location:datapemohonasli.php");

?>
