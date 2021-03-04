<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkdoktergg where No='$No'");
header("location:sdmkDoktergg.php");

?>
