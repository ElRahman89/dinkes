<?php 
include 'header.php';

?>


<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Kelurahan</h3>
<a class="btn" href="kelurahan_data.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_kelurahan = $_GET['id_kelurahan'];
$det=mysqli_query($conn, "SELECT * FROM Kelurahan WHERE id_kelurahan='$id_kelurahan'")OR die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>	

	<form action="kelurahan_update.php?id_kelurahan=<?php echo $id_kelurahan; ?>" method="post">
		<table class="table">
			<tr>
				<td>Nama Kelurahan</td>
				<td><input type="text" class="form-control" name="nm_kelurahan" value="<?php echo $d['nm_kelurahan'] ?>"></td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" name="submit2" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>