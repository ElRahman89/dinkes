<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Jadwal Kunjungan Klinik Masa Tenggang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php
$today = date('Y-m-d');
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from kunjungan");
$jum=mysqli_fetch_array($jumlah_record);
$halaman= ceil($jum[0] / $per_hal); //--> iki sing wes tak ganti
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;


// $jum=mysqli_fetch_array($jumlah_record);
// $tipe_jum = gettype($jum);
// echo $tipe_jum;

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
	<!-- <a style="margin-bottom:10px" href=" cetak_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a> -->
</div>
<form action="kunjungansarana.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data di sini .." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Klinik</th>
		<th class="col-md-1">Jadwal Kunjungan</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from kunjungan where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from kunjungan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>


			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['Jadwal_Kunjungan']))?></td>

			<td>
				<!-- <a href="det_data.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				<a href="datapemohon_edit.php?No=<?php echo $b['No']; ?>" class="btn btn-warning" name="edit">Edit</a>
				<a href="multiple_insert/index.php?No=<?php echo $b['No']; ?>" class="btn btn-primary" name="status">Status IO</a>
				<a href="multiple_insert2/index.php?No=<?php echo $b['No']; ?>" class="btn btn-primary" name="status">Status IM</a>
				<a href="cetak_barang.php?No=<?php echo $b['No']; ?>" target="_blank" class="btn btn-success" name="cetak">cetak</a> -->
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_data_kunjungan.php?No=<?php echo $b['Id_Kunjungan']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td>
		</tr>
		<?php
	}
	?>
	<!-- <tr>
		<td colspan="4">Total Dokter</td>
		<td>
		<?php

			$x=mysqli_query($conn, "SELECT sum(Jml_Dokter) as Jumlah_Dokter from Data_Pemohon");
			$xx=mysqli_fetch_array($x);
			echo "<b>". number_format($xx['Jumlah_Dokter'])."</b>";
		?>
		</td>
	</tr> -->
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
				<h4 class="modal-title">Tambah Data Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tambah_kunjungan.php" method="post">

					<div class="form-group">
						<label>Nama Klinik</label>
						<select class="form-control" name="nama_klinik" id="nama_klinik">
							<option> --- Pilih Klinik --- </option>
							<?php  
							$sql = mysqli_query($conn, "SELECT * FROM daftar_klinik ORDER BY No ASC");
							if (mysqli_num_rows($sql) != 0) {
								while($row = mysqli_fetch_assoc($sql)){
									echo '<option>'.$row['Nama_KlinikPratama'].'</option>';
								}
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Jadwal Kunjungan</label>
						<input name="tgl_jadwal" id="tgl_jadwal" type="date" class="form-control" min="<?php echo $today;?>" required>
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
