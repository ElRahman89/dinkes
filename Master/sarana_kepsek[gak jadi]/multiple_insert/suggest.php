<?php
$con = mysqli_connect('localhost','root','');
$db  = mysqli_select_db($con, 'sdk');

$first_name = addslashes($_POST['first_name']);
$query = mysqli_query($con, 'SELECT deskripsi from poin_IzinOperasional where deskripsi like "'.$first_name.'%" ');
while($data=mysqli_fetch_array($query)){
	echo '<span class="pilihan" onclick="pilih_poin(\''.$data['deskripsi'].'\');hideStuff(\'suggest\');">'.$data['deskripsi'].'</span>';
}
?>