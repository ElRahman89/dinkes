<?php 
include 'config.php';

$idj = $_POST['idj'];
$sql = mysqli_query($conn, "SELECT * FROM detail_jadwal WHERE idjadwal = '$idj' AND status = 'Kosong'");
?>
<select name="jamjadwal" class="form-control">
	<?php 
	while($row = mysqli_fetch_array($sql)){
	?>
	<option value="<?php echo $row['iddetailjadwal'];?>"><?php echo $row['jamjadwal'];?></option>
	<?php }?>
</select>