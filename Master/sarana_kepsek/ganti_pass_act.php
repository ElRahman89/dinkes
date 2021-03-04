<?php 
include 'config.php';
$user=$_POST['user'];
$lama=md5($_POST['lama']);
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=mysqli_query($conn, "SELECT * from Admin where Password='$lama' and Username='$user'");
if(mysqli_num_rows($cek)==1){
	if($baru==$ulang){
		$b = md5($baru);
		mysqli_query($conn, "UPDATE Admin set Password='$b' where Username='$user'");
		header("location:ganti_pass.php?pesan=oke");
	}else{
		header("location:ganti_pass.php?pesan=tdksama");
	}
}else{
	header("location:ganti_pass.php?pesan=gagal");
}

 ?>