<?php 
include 'config.php';
$sts = $_POST['sts'];
if($sts == '0'){ 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal");
$jum=mysqli_fetch_array($jumlah_record);
$halaman= ceil($jum[0] / $per_hal); //--> iki sing wes tak ganti
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;

?>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Klinik</th>
		<th class="col-md-1">Jadwal Janji</th>
		<th class="col-md-1">Jam Janji</th>
		<th class="col-md-1">Penanggung Jawab Klink</th>
		<th class="col-md-1">Penaggung Jawab Dinkes</th>
		<th class="col-md-1">Status Pertemuan</th>
		<th class="col-md-1">Keterangan</th>
		<th class="col-md-1">Status Janji</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal JOIN detail_jadwal dj ON dj.iddetailjadwal = jt.iddetailjadwal limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		$idj = $b['idjanjitenggang'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['tgljadwal']))?></td>
			<td><?php echo $b['jamjadwal']?></td>
			<td><?php echo $b['penanggungklinik'] ?></td>
			<td><?php echo $b['penanggungdinkes'] ?></td>
			<td><?php echo $b['statuspertemuan'] ?></td>
			<td><?php echo $b['ketjanji'] ?></td>
			<td><?php echo $b['statusjanji'] ?></td>
			<td>
				<?php 
				if($b['statusjanji'] == 'Belum Selesai'){?>
				<form action="ubah_janji_tenggang.php" method="POST">
				<button type="submit" class="btn btn-md btn-primary" value="<?php echo $idj;?>" name="idj"><i class="fa fa-check-o"></i> Selesai</button>
				</form>
				<?php }else{?>
				<button class="btn btn-md btn-primary" disabled><i class="fa fa-check-o"></i> Selesai</button>
				<?php }?>
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
<?php }elseif($sts == 'Selesai'){ 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal WHERE statusjanji = 'Selesai'");
$jum=mysqli_fetch_array($jumlah_record);
$halaman= ceil($jum[0] / $per_hal); //--> iki sing wes tak ganti
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
	<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Klinik</th>
		<th class="col-md-1">Jadwal Janji</th>
		<th class="col-md-1">Jam Janji</th>
		<th class="col-md-1">Penanggung Jawab Klink</th>
		<th class="col-md-1">Penaggung Jawab Dinkes</th>
		<th class="col-md-1">Status Pertemuan</th>
		<th class="col-md-1">Keterangan</th>
		<th class="col-md-1">Status Janji</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal JOIN detail_jadwal dj ON dj.iddetailjadwal = jt.iddetailjadwal where statusjanji = 'Selesai' limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		$idj = $b['idjanjitenggang'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['tgljadwal']))?></td>
			<td><?php echo $b['jamjadwal']?></td>
			<td><?php echo $b['penanggungklinik'] ?></td>
			<td><?php echo $b['penanggungdinkes'] ?></td>
			<td><?php echo $b['statuspertemuan'] ?></td>
			<td><?php echo $b['ketjanji'] ?></td>
			<td><?php echo $b['statusjanji'] ?></td>
			<td>
				<?php 
				if($b['statusjanji'] == 'Belum Selesai'){?>
				<form action="ubah_janji_tenggang.php" method="POST">
				<button type="submit" class="btn btn-md btn-primary" value="<?php echo $idj;?>" name="idj"><i class="fa fa-check-o"></i> Selesai</button>
				</form>
				<?php }else{?>
				<button class="btn btn-md btn-primary" disabled><i class="fa fa-check-o"></i> Selesai</button>
				<?php }?>
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
<?php }else{ 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal WHERE statusjanji = 'Belum Selesai'");
$jum=mysqli_fetch_array($jumlah_record);
$halaman= ceil($jum[0] / $per_hal); //--> iki sing wes tak ganti
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
	<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Nama Klinik</th>
		<th class="col-md-1">Jadwal Janji</th>
		<th class="col-md-1">Jam Janji</th>
		<th class="col-md-1">Penanggung Jawab Klink</th>
		<th class="col-md-1">Penaggung Jawab Dinkes</th>
		<th class="col-md-1">Status Pertemuan</th>
		<th class="col-md-1">Keterangan</th>
		<th class="col-md-1">Status Janji</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from janji_tenggang jt JOIN jadwal j ON j.idjadwal = jt.idjadwal JOIN detail_jadwal dj ON dj.iddetailjadwal = jt.iddetailjadwal where statusjanji = 'Belum Selesai' limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		$idj = $b['idjanjitenggang'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['tgljadwal']))?></td>
			<td><?php echo $b['jamjadwal']?></td>
			<td><?php echo $b['penanggungklinik'] ?></td>
			<td><?php echo $b['penanggungdinkes'] ?></td>
			<td><?php echo $b['statuspertemuan'] ?></td>
			<td><?php echo $b['ketjanji'] ?></td>
			<td><?php echo $b['statusjanji'] ?></td>
			<td>
				<?php 
				if($b['statusjanji'] == 'Belum Selesai'){?>
				<form action="ubah_janji_tenggang.php" method="POST">
				<button type="submit" class="btn btn-md btn-primary" value="<?php echo $idj;?>" name="idj"><i class="fa fa-check-o"></i> Selesai</button>
				</form>
				<?php }else{?>
				<button class="btn btn-md btn-primary" disabled><i class="fa fa-check-o"></i> Selesai</button>
				<?php }?>
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
<?php }
?>