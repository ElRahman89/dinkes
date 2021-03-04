<?php 
include 'config.php';

$id_kelurahan=$_GET['id_kelurahan'];

$nm_kelurahan=$_POST['nm_kelurahan'];

  $query = "SELECT * FROM Kelurahan WHERE id_kelurahan='".$id_kelurahan."'";
  $sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql	
mysqli_query($conn, "UPDATE Kelurahan SET id_kelurahan='$id_kelurahan', nm_kelurahan='$nm_kelurahan' WHERE id_kelurahan='$id_kelurahan'");

header("location:kelurahan_data.php");

?>
