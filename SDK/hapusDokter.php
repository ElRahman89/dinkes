<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkdokter where No='$No'");
header("location:sdmkDokter.php");

?>
