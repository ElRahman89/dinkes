<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkassapoteker where No='$No'");
header("location:sdmkAssApoteker.php");

?>
