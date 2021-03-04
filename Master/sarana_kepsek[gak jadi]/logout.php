<?php 
session_start();
session_destroy();
header("location:/klinik_dinkes/index.php");
?>