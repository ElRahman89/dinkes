<?php 
include 'config.php';
$user=$_POST['user'];
$foto=$_FILES['foto']['name'];

// move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// 	mysql_query("update admin set foto='$foto' where uname='$user'");


$u=mysqli_query($conn, "SELECT * from Admin where Username='$user'");
$us=mysqli_fetch_array($u);
if(file_exists("foto/".$us['foto'])){
	unlink("foto/".$us['foto']);
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysqli_query($conn, "UPDATE Admin set Foto='$foto' where Username='$user'");
	header("location:ganti_foto.php?pesan=oke");
}else{
	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
	mysqli_query($conn, "UPDATE Admin set Foto='$foto' where Username='$user'");
	header("location:ganti_foto.php?pesan=oke");
}
?>
