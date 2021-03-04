<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Data Klinik Sarana</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata" disabled><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from Data_Pemohon");
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
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari nama klinik disini.." aria-describedby="basic-addon1" name="cari">
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<!-- <th class="col-md-4">Keterangan Pemohon</th> -->
		<!-- <th class="col-md-3">Nomer Urut</th>
		<th class="col-md-1">Badan Hukum</th>
		<th class="col-md-1">Nama Notaris</th>
		<th class="col-md-1">No. Notaris / Menteri Kehakiman</th>
		<th class="col-md-1">Tempat Kedudukan</th> -->
		<th class="col-md-1">Klinik Pratama</th>
		<th class="col-md-1">Alamat Klinik</th>
		<!-- <th class="col-md-1">Kota Klinik</th> -->
		<th class="col-md-1">Penanggung Jawab</th>
		<!-- <th class="col-md-1">Tanggal Berlaku</th>
		<th class="col-md-1">Tanggal Jatuh Tempo</th>
		<th class="col-md-1">Tanggal Dikeluarkan</th> -->
		<!-- <th class="col-md-1">Nama Pemilik</th>
		<th class="col-md-1">Alamat Pemilik</th>
		<th class="col-md-1">No. IMB</th>
		<th class="col-md-1">No. Izin Lingkungan </th>
		<th class="col-md-1">Tanggal Izin Lingkungan </th>
		<th class="col-md-1">Status Izin</th>
		<th class="col-md-1">No. Pemohon</th>
		<th class="col-md-1">Jabatan Pemohon</th>
		<th class="col-md-1">Tanggal Cek Lokasi</th>
		<th class="col-md-1">Tanggal Surat Pemohon</th>
		<th class="col-md-1">Sertifikat</th>
		<th class="col-md-1">Lama Izin</th> -->
		<th class="col-md-1">Layanan Klinik</th>

		<!-- <th class="col-md-1">Contact Person</th> -->
		<th class="col-md-1">Kelurahan</th>
		<th class="col-md-1">Kecamatan</th>
		<th class="col-md-1">Wilayah</th>
		<!-- <th class="col-md-1">Keterangan Perizian</th>
		<th class="col-md-1">Jenis Pelayanan</th>
		<th class="col-md-1">Jumah Apoteker</th>
		<th class="col-md-1">Jumlah Asisten Apoteker</th>
		<th class="col-md-1">Jumlah Dokter</th>
		<th class="col-md-1">Jumlah Drg</th>
		<th class="col-md-1">Jumlah Analis</th>
		<th class="col-md-1">Jumlah Asisten Perawat Gigi</th>
		<th class="col-md-1">Jumlah Perawat</th>
		<th class="col-md-1">Jumlah Bidan</th>
		<th class="col-md-1">Jumlah Beautician</th>
		<th class="col-md-1">Jumlah Investasi</th>
		<th class="col-md-1">Email</th>
		<th class="col-md-1">Jumlah Non Medis</th> -->
		<!-- <th class="col-md-1">Keterangan Tambahan</th>ß -->
		<th class="col-md-1">Status IO</th>	
		<th class="col-md-1">Status IM</th>	
		<th class="col-md-2">Pengaturan</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from Data_Pemohon where Klinik_Pratama like '%".$cari."%' or Penanggung_Jawab like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from Data_Pemohon limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>


			<td><?php echo $b['Klinik_Pratama'] ?></td>
			<td><?php echo $b['Alamat_Klinik'] ?></td>

			<td><?php echo $b['Penanggung_Jawab'] ?></td>


			<td><?php echo $b['Layanan_Klinik'] ?></td>


			<td><?php echo $b['Kelurahan'] ?></td>
			<td><?php echo $b['Kecamatan'] ?></td>
			<td><?php echo $b['Wilayah'] ?></td>
			<td><?php echo $b['status_io'] ?></td>
			<td><?php echo $b['status_im'] ?></td>
			<td>
				<a href="det_data.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				
				<a href="lihat_data.php?No=<?php echo $b['No']; ?>" class="btn btn-primary" name="status">Status IO</a>
				<a href="lihat_data2.php?No=<?php echo $b['No']; ?>" class="btn btn-primary" name="status">Status IM</a>
				
			</td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan="4">Total Dokter</td>
		<td>
		<?php

			$x=mysqli_query($conn, "SELECT sum(Jml_Dokter) as Jumlah_Dokter from Data_Pemohon");
			$xx=mysqli_fetch_array($x);
			echo "<b>". number_format($xx['Jumlah_Dokter'])."</b>";
		?>
		</td>
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
				<form onsubmit="return validasi()" action="tambah_data.php" method="post">

					<div class="form-group">
						<label>Keterangan_Pemohon</label>
						<input name="Keterangan_Pemohon" id="Keterangan_Pemohon" type="text" class="form-control" placeholder="Keterangan_Pemohon">
					</div>
					<div class="form-group">
						<label>Nomer_Urut</label>
						<input name="Nomer_Urut" id="Nomer_Urut" type="text" class="form-control" placeholder="Nomer_Urut ..">
					</div>
					<div class="form-group">
						<label>Badan_Hukum</label>
						<input name="Badan_Hukum" id="Badan_Hukum" type="text" class="form-control" placeholder="Badan_Hukum">
					</div>
					<div class="form-group">
						<label>Nama_Notaris</label>
						<input name="Nama_Notaris" id="Nama_Notaris" type="text" class="form-control" placeholder="Nama_Notaris">
					</div>
					<div class="form-group">
						<label>No_Notaris_atau_Menteri_Kehakiman</label>
						<input name="No_Notaris_atau_Menteri_Kehakiman" id="No_Notaris_atau_Menteri_Kehakiman" type="text" class="form-control" placeholder="No_Notaris_atau_Menteri_Kehakiman">
					</div>
					<div class="form-group">
						<label>Tempat_Kedudukan</label>
						<input name="Tempat_Kedudukan" id="Tempat_Kedudukan" type="text" class="form-control" placeholder="Tempat_Kedudukan">
					</div>
					<div class="form-group">
						<label>Klasifikasi</label>
						<td>
							<div class="form-group">
								<select class="form-control" name="klasifikasi" id="klasifikasi">
									<option> --- Pilih Klasifikasi --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM klasifikasi ORDER BY Nama_Klasifikasi ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['Nama_Klasifikasi'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Jenis Pelayanan</label>
						<td>
							<div class="form-group">
								<select class="form-control" name="Jenis_Pelayanan" id="Jenis_Pelayanan">
									<option> --- Pilih Jenis Pelayanan --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM jns_layanan ORDER BY Jenis_Pelayanan ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['Jenis_Pelayanan'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Klinik_Pratama</label>
						<input name="Klinik_Pratama" id="Klinik_Pratama" type="text" class="form-control" placeholder="Klinik_Pratama">
					</div>
					<div class="form-group">
						<label>Alamat_Klinik</label>
						<input name="Alamat_Klinik" id="Alamat_Klinik" type="text" class="form-control" placeholder="Alamat_Klinik">
					</div>
					<div class="form-group">
						<label>Kota_Klinik</label>
						<input name="Kota_Klinik" id="Kota_Klinik" type="text" class="form-control" placeholder="Kota_Klinik">
					</div>
					<div class="form-group">
						<label>Penanggung_Jawab</label>
						<input name="Penanggung_Jawab" id="Penanggung_Jawab" type="text" class="form-control" placeholder="Penanggung_Jawab">
					</div>
					<div class="form-group">
						<label>Tgl_Berlaku</label>
						<input name="Tgl_Berlaku" id="Tgl_Berlaku" type="date" class="form-control" placeholder="Tgl_Berlaku">
					</div>
					<div class="form-group">
						<label>Tgl_JatuhTempo</label>
						<input name="Tgl_JatuhTempo" id="Tgl_JatuhTempo" type="date" class="form-control" placeholder="Tgl_JatuhTempo">
					</div>
					<div class="form-group">
						<label>Tgl_Dikeluarkan</label>
						<input name="Tgl_Dikeluarkan" id="Tgl_Dikeluarkan" type="date" class="form-control" placeholder="Tgl_Dikeluarkan">
					</div>
					<div class="form-group">
						<label>Nama_Pemilik</label>
						<input name="Nama_Pemilik" id="Nama_Pemilik" type="text" class="form-control" placeholder="Nama_Pemilik">
					</div>
					<div class="form-group">
						<label>Alamat_Pemilik</label>
						<input name="Alamat_Pemilik" id="Alamat_Pemilik" type="text" class="form-control" placeholder="Alamat_Pemilik">
					</div>
					<div class="form-group">
						<label>No_IMB</label>
						<input name="No_IMB" id="No_IMB" type="text" class="form-control" placeholder="No_IMB">
					</div>
					<div class="form-group">
						<label>No_IzinLingkungan</label>
						<input name="No_IzinLingkungan" id="No_IzinLingkungan" type="text" class="form-control" placeholder="No_IzinLingkungan">
					</div>
					<div class="form-group">
						<label>Tgl_IzinLingkungan</label>
						<input name="Tgl_IzinLingkungan" id="Tgl_IzinLingkungan" type="date" class="form-control" placeholder="Tgl_IzinLingkungan">
					</div>
					<div class="form-group">
						<label>Status_Izin</label>
						<input name="Status_Izin" id="Status_Izin" type="text" class="form-control" placeholder="Status_Izin">
					</div>
					<div class="form-group">
						<label>No_Pemohon</label>
						<input name="No_Pemohon" id="No_Pemohon" type="text" class="form-control" placeholder="No_Pemohon">
					</div>
					<div class="form-group">
						<label>Jabatan_Pemohon</label>
						<input name="Jabatan_Pemohon" id="Jabatan_Pemohon" type="text" class="form-control" placeholder="Jabatan_Pemohon">
					</div>
					<div class="form-group">
						<label>Tgl_CekLokasi</label>
						<input name="Tgl_CekLokasi" id="Tgl_CekLokasi" type="date" class="form-control" placeholder="Tgl_CekLokasi">
					</div>
					<div class="form-group">
						<label>Tgl_SuratPemohon</label>
						<input name="Tgl_SuratPemohon" id="Tgl_SuratPemohon" type="date" class="form-control" placeholder="Tgl_SuratPemohon">
					</div>
					<div class="form-group">
						<label>Sertifikat</label>
						<input name="Sertifikat" id="Sertifikat" type="text" class="form-control" placeholder="Sertifikat">
					</div>
					<div class="form-group">
						<label>Lama_Izin</label>
						<input name="Lama_Izin" id="Lama_Izin" type="text" class="form-control" placeholder="Lama_Izin">
					</div>
					<div class="form-group">
						<label>Layanan_Klinik</label>
						<td>
							<div class="form-group">
								<select class="form-control" name="Layanan_Klinik" id="Layanan_Klinik">
									<option> --- Pilih Layanan Klinik --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM layanan_klinik ORDER BY nama_layananKlinik ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['nama_layananKlinik'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input name="Telepon" id="Telepon" type="text" class="form-control" placeholder="Telepon">
					</div>
					<div class="form-group">
						<label>Contact_Person</label>
						<input name="Contact_Person" id="Contact_Person" type="text" class="form-control" placeholder="Contact_Person">
					</div>
					<div class="form-group">
						<label>Kelurahan</label>
						<td>
							<div class="form-group">
								<select class="form-control" name="Keluruhan" id="Keluruhan">
									<option> --- Pilih Kelurahan --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM Kelurahan ORDER BY nm_kelurahan ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['nm_kelurahan'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<td>
							<div class="form-group">
								<select class="form-control" name="Kecamatan" id="Kecamatan">
									<option> --- Pilih Kecamatan --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM Kecamatan ORDER BY nm_kecamatan ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['nm_kecamatan'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>

					<div class="form-group">
						<label>Wilayah</label>
						<td>
							
							<div class="form-group">
								<select class="form-control" name="Wilayah" id="Wilayah">
									<option> --- Pilih Wilayah --- </option>
									<?php  
									$sql = mysqli_query($conn, "SELECT * FROM jns_wil ORDER BY jns_wilayah ASC");
									if (mysqli_num_rows($sql) != 0) {
										while($row = mysqli_fetch_assoc($sql)){
											echo '<option>'.$row['jns_wilayah'].'</option>';
										}
									}

									?>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Keterangan_Perizinan</label>
						<input name="Keterangan_Perizinan" id="Keterangan_Perizinan" type="text" class="form-control" placeholder="Keterangan_Perizinan">
					</div>
					<div class="form-group">
						<label>Jml_Apoteker</label>
						<input name="Jml_Apoteker" id="Jml_Apoteker" type="text" class="form-control" placeholder="Jml_Apoteker">
					</div>
					<div class="form-group">
						<label>Jml_Asisten</label>
						<input name="Jml_Asisten" id="Jml_Asisten" type="text" class="form-control" placeholder="Jml_Asisten">
					</div>
					<div class="form-group">
						<label>Jml_Dokter</label>
						<input name="Jml_Dokter" id="Jml_Dokter" type="text" class="form-control" placeholder="Jml_Dokter">
					</div>
					<div class="form-group">
						<label>Jml_Drg</label>
						<input name="Jml_Drg" id="Jml_Drg" type="text" class="form-control" placeholder="Jml_Drg">
					</div>
					<div class="form-group">
						<label>Jml_Analis</label>
						<input name="Jml_Analis" id="Jml_Analis" type="text" class="form-control" placeholder="Jml_Analis">
					</div>
					<div class="form-group">
						<label>Jml_Asisten_Perawat_Gigi</label>
						<input name="Jml_Asisten_Perawat_Gigi" id="Jml_Asisten_Perawat_Gigi" type="text" class="form-control" placeholder="Jml_Asisten_Perawat_Gigi">
					</div>
					<div class="form-group">
						<label>Jml_Perawat</label>
						<input name="Jml_Perawat" id="Jml_Perawat" type="text" class="form-control" placeholder="Jml_Perawat">
					</div>
					<div class="form-group">
						<label>Jml_Bidan</label>
						<input name="Jml_Bidan" id="Jml_Bidan" type="text" class="form-control" placeholder="Jml_Bidan">
					</div>
					<div class="form-group">
						<label>Jml_Beautician</label>
						<input name="Jml_Beautician" id="Jml_Beautician" type="text" class="form-control" placeholder="Jml_Beautician">
					</div>
					<div class="form-group">
						<label>Jml_Investasi</label>
						<input name="Investasi" id="Investasi" type="text" class="form-control" placeholder="Investasi">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="Email" id="Email" type="text" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Jml_Non_Medis</label>
						<input name="Jml_Non_Medis" id="Jml_Non_Medis" type="text" class="form-control" placeholder="Jml_Non_Medis">
					</div>
					<div class="form-group">
						<label>Keterangan_Tambahan</label>
						<input name="Keterangan_Tambahan" id="Keterangan_Tambahan" type="text" class="form-control" placeholder="Keterangan_Tambahan">
					</div>
					<div class="form-group">
						<label>Status Izin Operasional</label>
						<td>
							
							<div class="form-group">
								<select class="form-control" name="status_io" id="status_io">
									<option> --- Pilih Status --- </option>
									<option value="Sesuai">Sesuai</option>
									<option value="Belum Sesuai">Belum Sesuai</option>
								</select>
							</div>
						</td>
					</div>
					<div class="form-group">
						<label>Status Izin Mendirikan</label>
						<td>
							
							<div class="form-group">
								<select class="form-control" name="status_im" id="status_im">
									<option> --- Pilih Status --- </option>
									<option value="Sesuai">Sesuai</option>
									<option value="Belum Sesuai">Belum Sesuai</option>
								</select>
							</div>
						</td>
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
