<?php
include 'config.php';
$idBidan=$_GET['idBidan'];
mysqli_query($conn, "DELETE from sdmkbidan where idBidan='$idBidan'");
header("location:sdmkBidan.php");

?>
