<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Kelurahan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahguru" id="tambahgurux"><span class="glyphicon glyphicon-plus"></span>Tambah Data Kelurahan</button>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from Kelurahan");
$jum=mysqli_fetch_array($jumlah_record);
$halaman= ceil($jum[0] / $per_hal); //--> buat hitung halaman
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;




?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum[0]; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	</div>
<form action="kelurahan_cari.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari data di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Kelurahan</th>	
		<th class="col-md-4">Pengaturan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysqli_real_escape_string($conn, $_GET['cari']);
		$gbk=mysqli_query($conn, "SELECT * from Kelurahan where nm_kelurahan like '%$cari%'");
	}else{
		$gbk=mysqli_query($conn, "SELECT * from Kelurahan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($gbk)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['nm_kelurahan'] ?></td>
			<td>
				
				<a href="kelurahan_edit.php?id_kelurahan=<?php echo $b['id_kelurahan']; ?>" class="btn btn-info" name="edit">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='kelurahan_hapus.php?id_kelurahan=<?php echo $b['id_kelurahan']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>

<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Kelurahan</h4>
			</div>
			<div class="modal-body">
				<form action="kelurahan_tambah.php" method="post">
					<div class="form-group">
						<label>Nama Kelurahan</label>
						<input name="nm_kelurahan" type="text" class="form-control" placeholder="Nama kelurahan..">
					</div>
																			

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" name="batal">Batal</button>
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>
