<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Dokter</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from sdmkdokter");
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

</div>
<form action="cariDokter.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data di sini .." aria-describedby="basic-addon1" name="cari">	
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
		<th class="col-md-1">Surat Ijin Praktik I Dokter</th>
		<th class="col-md-1">Nama</th>
		<!-- <th class="col-md-1">Kota Klinik</th> -->
		<th class="col-md-1">Alamat Rumah</th>
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
		<th class="col-md-1">Nama Sarana I</th>
		
		<!-- <th class="col-md-1">Contact Person</th> -->
		<th class="col-md-1">Alamat Sarana I</th>
		<th class="col-md-1">Tgl Surat Izin I</th>
		<th class="col-md-1">Masa Berlaku</th>
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
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Pengaturan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from sdmkdokter where namaDokter like '%".$cari."%' or namasarana1Dokter like '%".$cari."%' or namasarana2Dokter like '%".$cari."%' or namasarana3Dokter like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from sdmkdokter limit $start, $per_hal");
	}

	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			
			
			<td><?php echo $b['sip1Dokter'] ?></td>
			<td><?php echo $b['namaDokter'] ?></td>
			
			<td><?php echo $b['alamatDokter'] ?></td>
			
			
			<td><?php echo $b['namasarana1Dokter'] ?></td>
			
			
			<td><?php echo $b['alamatsarana1Dokter'] ?></td>
			<td><?php echo $b['tglcetak1Dokter'] ?></td>
			<td><?php echo $b['expDokter'] ?></td>
			
			<td>
				<a href="det_dataDokter.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				<a href="editDokter.php?No=<?php echo $b['No']; ?>" class="btn btn-warning" name="edit">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusDokter.php?No=<?php echo $b['No']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td>
		</tr>				
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Dokter</td>
		<td>			
		<?php 
		
			$x=mysqli_query($conn, "SELECT count(namaDokter) as namaDokter from sdmkdokter");	
			$xx=mysqli_fetch_array($x);			
			echo "<b>". number_format($xx['namaDokter'])."</b>";		
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
                
                var namaDokter = document.getElementById('namaDokter');
                var tempatlahirDokter = document.getElementById('tempatlahirDokter');
                var tgllahirDokter = document.getElementById('tgllahirDokter');
                var alamatDokter = document.getElementById('alamatDokter');
                var namasarana1Dokter = document.getElementById('namasarana1Dokter');
 
                    if (harusDiisi(namaDokter, "namaDokter belum diisi")) {
                        if (harusDiisi(tempatlahirDokter, "tempatlahirDokter belum diisi")) {
                            if (harusDiisi(tgllahirDokter, "tgllahirDokter belum diisi")) {
                            	if (harusDiisi(alamatDokter, "alamatDokter belum diisi")) {
                            		if (harusDiisi(namasarana1Dokter, "namasarana1Dokter belum diisi")) {
                            			return true;
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
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form onsubmit="return validasi()" action="tambah_datadokter.php" method="post">
				
					<div class="form-group">
						<label>Nama Dokter</label>
						<input name="namaDokter" id="namaDokter" type="text" class="form-control" placeholder="Nama Dokter">
					</div>
					<div class="form-group">
						<label>Kota Lahir Dokter</label>
						<input name="tempatlahirDokter" id="tempatlahirDokter" type="text" class="form-control" placeholder="Kota Lahir Dokter">
					</div>
					<div class="form-group">
						<label>tanggal Lahir Dokter</label>
						<input name="tgllahirDokter" id="tgllahirDokter" type="date" class="form-control" placeholder="Tanggal Lahir Dokter">
					</div>
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<input name="jeniskelaminDokter" id="jeniskelaminDokter" type="text" class="form-control" placeholder="Jenis Kelamin">
					</div>
					<div class="form-group">
						<label>Alamat Dokter</label>
						<input name="alamatDokter" id="alamatDokter" type="text" class="form-control" placeholder="Alamat Dokter">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik I Dokter</label>
						<input name="sip1Dokter" id="sip1Dokter" type="text" class="form-control" placeholder="Surat Ijin Praktik I Dokter">
					</div>
					<div class="form-group">
						<label>Nama Sarana I Dokter</label>
						
						<br/>
						<select name="namasarana1Dokter" id="namasarana1Dokter" class="form-control" >
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									echo '<option value="'.$qtabel['namaKlinik'].'">'.$qtabel['namaKlinik'].'</option>';				
								}
								?>
							</select>
					</div>
					<div class="form-group">
						<label>Alamat sarana I Dokter</label>
						<input name="alamatsarana1Dokter" id="alamatsarana1Dokter" type="text" class="form-control" placeholder="Alamat Sarana I Dokter">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP I</label>
						<input name="tglcetak1Dokter" id="tglcetak1Dokter" type="date" class="form-control" placeholder="Tgl Cetak SIP I">
					<div class="form-group">
						<label>Surat Ijin Praktik II Dokter</label>
						<input name="sip2Dokter" id="sip2Dokter" type="text" class="form-control" placeholder="Surat Ijin Praktik II Dokter">
					</div>
					<div class="form-group">
						<label>Nama Sarana II Dokter</label>
						<br/>
						<select name="namasarana2Dokter" id="namasarana2Dokter" class="form-control" >
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									echo '<option value="'.$qtabel['namaKlinik'].'">'.$qtabel['namaKlinik'].'</option>';				
								}
								?>
							</select>

					</div>
					<div class="form-group">
						<label>Alamat sarana II Dokter</label>
						<input name="alamatsarana2Dokter" id="alamatsarana2Dokter" type="text" class="form-control" placeholder="Alamat Sarana II Dokter">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP II</label>
						<input name="tglcetak2Dokter" id="tglcetak2Dokter" type="date" class="form-control" placeholder="Tgl Cetak SIP II">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik III Dokter</label>
						<input name="sip3Dokter" id="sip3Dokter" type="text" class="form-control" placeholder="Surat Ijin Praktik III Dokter">
					</div>
					<div class="form-group">
						<label>Nama Sarana III Dokter</label>
						<br/>
						<select name="namasarana3Dokter" id="namasarana3Dokter" class="form-control" >
								<?php
								include "config.php";
								$query = "select namaKlinik from integrasi.masterklinik";
								$hasil = mysqli_query($conn,$query);
								while ($qtabel = mysqli_fetch_assoc($hasil))
								{
									echo '<option value="'.$qtabel['namaKlinik'].'">'.$qtabel['namaKlinik'].'</option>';				
								}
								?>
							</select>

					</div>
					<div class="form-group">
						<label>Alamat sarana III Dokter</label>
						<input name="alamatsarana3Dokter" id="alamatsarana3Dokter" type="text" class="form-control" placeholder="Alamat Sarana III Dokter">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP III</label>
						<input name="tglcetak3Dokter" id="tglcetak3Dokter" type="date" class="form-control" placeholder="Tgl Cetak SIP III">
					</div>
					<div class="form-group">
						<label>Masa Berlaku</label>
						<input name="expDokter" id="expDokter" type="date" class="form-control" placeholder="Masa Berlaku">
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
