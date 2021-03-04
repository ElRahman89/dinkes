<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=sdk", "root", "");
$tanggal = date("Y-m-d H:i:s");
$No=$_GET['No'];
$query = "
INSERT INTO hasil_pengawasanIO 
(id_pio, nama_klinik, poin_IO, keterangan, tanggal_pengawasan) 
VALUES ('', :last_name, :first_name, :keterangan, '$tanggal')
";

for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
{
	$data = array(
		':first_name'	=>	$_POST['hidden_first_name'][$count],
		':last_name'	=>	$_POST['hidden_last_name'][$count],
		':keterangan'	=>	$_POST['hidden_keterangan'][$count]
	);
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

?>