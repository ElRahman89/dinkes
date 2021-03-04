<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkperawat where No='$No'");
header("location:sdmkPerawat.php");

?>
