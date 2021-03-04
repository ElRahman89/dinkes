<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Tindakan Hasil Visitasi</h3>
<button disabled style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from tindakan_hasil_visitasi");
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
		<th class="col-md-1">Tanggal Kunjungan</th>
		<th class="col-md-1">Tanggal Tindakan</th>
		<th class="col-md-1">Pemberi Info</th>
		<th class="col-md-1">Penerima Info</th>
		<th class="col-md-1">Tindakan Melalui</th>
		<th class="col-md-1">Keterangan</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from tindakan_hasil_visitasi hv JOIN kunjungan k ON hv.Id_Kunjungan = k.Id_Kunjungan where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from tindakan_hasil_visitasi hv JOIN kunjungan k ON hv.Id_Kunjungan = k.Id_Kunjungan limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		$idhv = $b['idtindakanhv'];
		$nmhv = $b['Nama_KlinikPratama'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['Jadwal_Kunjungan']))?></td>
			<td><?php echo date('d F Y', strtotime($b['tgl_tindakan_hv'])) ?></td>
			<td><?php echo $b['pemberi_info_hv'] ?></td>
			<td><?php echo $b['penerima_info_hv'] ?></td>
			<td><?php echo $b['tindakan_melalui_hv'] ?></td>
			<td><?php echo $b['hasil_tindakan_hv'] ?></td>
			<td><button disabled class="btn btn-md btn-warning" data-toggle="modal" data-target="#tdk<?php echo $idhv;?>"><i class="fa fa-edit"></i> Ubah Data</button>
			<div id="tdk<?php echo $idhv;?>" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Ubah Data Klinik <?php echo $nmhv;?></h4>
					</div>
					<div class="modal-body">
						<form action="tambah_hasil_visitasi.php" method="post">
							<input type="hidden" name="idhv" value="<?php echo $idhv;?>">
							<div class="col-md-6">
							<div class="form-group">
								<label>Pemberi Info</label>
								<input name="pemberi_info" id="pemberi_info" type="text" class="form-control" value="<?php echo $b['pemberi_info_hv'];?>" required>
							</div>
							<div class="form-group">
								<label>Penerima Info</label>
								<input name="penerima_info" id="penerima_info" type="text" class="form-control" value="<?php echo $b['penerima_info_hv'];?>" required>
							</div>
							<div class="form-group">
								<label>Tanggal Tindakan</label>
								<input name="tgl_tindakan" id="tgl_tindakan" type="date" class="form-control" value="<?php echo $b['tgl_tindakan_hv'];?>" required>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label>Tindakan Melalui</label>
								<select class="form-control" name="tindakan_melalui" id="tindakan_melalui">
									<option value="Telepon">Telepon</option>
									<option value="E-Mail">E-Mail</option>
								</select>
							</div>
							<div class="form-group">
								<label>Hasil Visitasi</label>
								<input name="hasil_visitasi" id="hasil_visitasi" type="text" class="form-control" value="<?php echo $b['hasil_tindakan_hv'];?>" placeholder="" required>
								<!-- <input name="tgl_kunjungan" id="tgl_kunjungan" type="date" class="form-control" required> -->
							</div>				
						</div>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" name="batal">Batal</button>
							<input type="submit" name="ubah" class="btn btn-primary" value="Ubah">
						</div>
					</form>
				</div>
			</div>
		</div>
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
<script>
            function validasi(){
                var Nomer_Urut = document.getElementById('Nomer_Urut');
                var Badan_Hukum = document.getElementById('Badan_Hukum');
                var Nama_Notaris = document.getElementById('Nama_Notaris');
                var No_Notaris_atau_Menteri_Kehakiman = document.getElementById('No_Notaris_atau_Menteri_Kehakiman');
                var Tempat_Kedudukan = document.getElementById('Tempat_Kedudukan');
                var Klinik_Pratama = document.getElementById('Klinik_Pratama');

                if (harusDiisi(Nomer_Urut, "Nomer_Urut Barang belum diisi")) {
                    if (harusDiisi(Badan_Hukum, "Badan_Hukum belum diisi")) {
                        if (harusDiisi(Nama_Notaris, "Nama_Notaris belum diisi")) {
                            if (harusDiisi(No_Notaris_atau_Menteri_Kehakiman, "No_Notaris_atau_Menteri_Kehakiman belum diisi")) {
                            	if (harusDiisi(Tempat_Kedudukan, "Tempat_Kedudukan belum diisi")) {
                            		if (harusDiisi(Klinik_Pratama, "Klinik_Pratama belum diisi")) {
                            			return true;
                        			};
                        		};
                        	};
                        };
                    };
                };
                return false;
            }

            function harusDiisi(att, msg){
                if (att.value.length == 0) {
                    alert(msg);
                    att.focus();
                    return false;
                }

                return true;
            }
</script>

<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tambah_hasil_visitasi.php" method="post">
					<div class="col-md-6">
					<div class="form-group">
						<label>Nama Klinik</label>
						<select class="form-control" name="nama_klinik" id="nama_klinik">
							<option> --- Pilih Klinik --- </option>
							<?php  
							$sql = mysqli_query($conn, "SELECT * FROM kunjungan");
							if (mysqli_num_rows($sql) != 0) {
								while($row = mysqli_fetch_assoc($sql)){ ?>
									<option value="<?php echo $row['Id_Kunjungan']?>"><?php echo $row['Nama_KlinikPratama'].' - '.date("d F Y", strtotime($row['Jadwal_Kunjungan']))?></option>
								<?php
								}
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<label>Pemberi Info</label>
						<input name="pemberi_info" id="pemberi_info" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Penerima Info</label>
						<input name="penerima_info" id="penerima_info" type="text" class="form-control" required>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Tanggal Tindakan</label>
						<input name="tgl_tindakan" id="tgl_tindakan" type="date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tindakan Melalui</label>
						<select class="form-control" name="tindakan_melalui" id="tindakan_melalui">
							<option value="Telepon">Telepon</option>
							<option value="E-Mail">E-Mail</option>
						</select>
					</div>
					<div class="form-group">
						<label>Hasil Visitasi</label>
						<input name="hasil_visitasi" id="hasil_visitasi" type="text" class="form-control" placeholder="" required>
						<!-- <input name="tgl_kunjungan" id="tgl_kunjungan" type="date" class="form-control" required> -->
					</div>				
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
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
