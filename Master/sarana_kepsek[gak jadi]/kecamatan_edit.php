<?php 
include 'header.php';

?>


<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Kecamatan</h3>
<a class="btn" href="kecamatan_data.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id_kecamatan = $_GET['id_kecamatan'];
$det=mysqli_query($conn, "SELECT * FROM Kecamatan WHERE id_kecamatan='$id_kecamatan'")OR die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>	

	<form action="kecamatan_update.php?id_kecamatan=<?php echo $id_kecamatan; ?>" method="post">
		<table class="table">
			<tr>
				<td>Nama Kecamatan</td>
				<td><input type="text" class="form-control" name="nm_kecamatan" value="<?php echo $d['nm_kecamatan'] ?>"></td>
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