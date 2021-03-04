<?php
include 'config.php';
$No=$_GET['No'];
mysqli_query($conn, "DELETE from sdmkatlm where No='$No'");
header("location:sdmkATLM.php");

?>
