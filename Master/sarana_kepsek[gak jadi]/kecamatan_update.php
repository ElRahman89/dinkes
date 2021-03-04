<?php 
include 'config.php';

$id_kecamatan=$_GET['id_kecamatan'];

$nm_kecamatan=$_POST['nm_kecamatan'];

  $query = "SELECT * FROM Kecamatan WHERE id_kecamatan='".$id_kecamatan."'";
  $sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql	
mysqli_query($conn, "UPDATE Kecamatan SET id_kecamatan='$id_kecamatan', nm_kecamatan='$nm_kecamatan' WHERE id_kecamatan='$id_kecamatan'");

header("location:kecamatan_data.php");

?>
