<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkapoteker where No='$No'");
header("location:sdmkApoteker.php");

?>
