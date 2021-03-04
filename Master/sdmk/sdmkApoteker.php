<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Apoteker</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from sdmkapoteker");
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
<form action="cariApoteker.php" method="get">
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
		<th class="col-md-1">Surat Ijin Praktik</th>
		<th class="col-md-1">Nama</th>
		<!-- <th class="col-md-1">Kota Klinik</th> -->
		
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
		<th class="col-md-1">Nama Sarana</th>
		
		<!-- <th class="col-md-1">Contact Person</th> -->
		<th class="col-md-1">Alamat Sarana</th>
		<th class="col-md-1">Tgl Cetak</th>
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
		$brg=mysqli_query($conn, "SELECT * from sdmkapoteker where namaApoteker like '%".$cari."%' or namasaranaApoteker like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from sdmkapoteker limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			
			
			<td><?php echo $b['sipApoteker'] ?></td>
			<td><?php echo $b['namaApoteker'] ?></td>
			
			
			
			<td><?php echo $b['namasaranaApoteker'] ?></td>
			<td><?php echo $b['alamatsaranaApoteker'] ?></td>
			<td><?php echo $b['tglcetakApoteker'] ?></td>
			<td><?php echo $b['expApoteker'] ?></td>
			<td>
				<a href="det_dataApoteker.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				<a href="editApoteker.php?No=<?php echo $b['No']; ?>" class="btn btn-warning" name="edit">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusApoteker.php?No=<?php echo $b['No']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td>
		</tr>				
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Dokter</td>
		<td>			
		<?php 
		
			$x=mysqli_query($conn, "SELECT count(namaApoteker) as namaApoteker from sdmkapoteker");	
			$xx=mysqli_fetch_array($x);			
			echo "<b>". number_format($xx['namaApoteker'])."</b>";		
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
                
                var namaApoteker = document.getElementById('namaApoteker');
                var tempatlahirApoteker = document.getElementById('tempatlahirApoteker');
                var tgllahirApoteker = document.getElementById('tgllahirApoteker');
                var alamatApoteker = document.getElementById('alamatApoteker');
                var namasaranaApoteker = document.getElementById('namasaranaApoteker');
 
                    if (harusDiisi(namaApoteker, "namaApoteker belum diisi")) {
                        if (harusDiisi(tempatlahirApoteker, "tempatlahirApoteker belum diisi")) {
                            if (harusDiisi(tgllahirApoteker, "tgllahirApoteker belum diisi")) {
                            	if (harusDiisi(alamatApoteker, "alamatApoteker belum diisi")) {
                            		if (harusDiisi(namasaranaApoteker, "namasaranaApoteker belum diisi")) {
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
				<form onsubmit="return validasi()" action="tambah_dataapoteker.php" method="post">
				
					<div class="form-group">
						<label>Nama Apoteker</label>
						<input name="namaApoteker" id="namaApoteker" type="text" class="form-control" placeholder="Nama Apoteker">
					</div>
					<div class="form-group">
						<label>Kota Lahir Apoteker</label>
						<input name="tempatlahirApoteker" id="tempatlahirApoteker" type="text" class="form-control" placeholder="Kota Lahir Apoteker">
					</div>
					<div class="form-group">
						<label>tanggal Lahir Apoteker</label>
						
						<input name="tgllahirApoteker" id="tgllahirApoteker" type="date" class="form-control" min="1900-12-31" placeholder="Tanggal Lahir Apoteker">
						

					</div>
					<div class="form-group">
						<label>Alamat Apoteker</label>
						<input name="alamatApoteker" id="alamatApoteker" type="text" class="form-control" placeholder="Alamat Apoteker">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik Apoteker</label>
						<input name="sipApoteker" id="sipApoteker" type="text" class="form-control" placeholder="Surat Ijin Praktik Apoteker">
					</div>
					<div class="form-group">
						<label>Nama Sarana</label> <br/>
						<select name="namasaranaApoteker" id="namasaranaApoteker" class="form-control" >
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
						<label>Alamat sarana Apoteker</label>
						<input name="alamatsaranaApoteker" id="alamatsaranaApoteker" type="text" class="form-control" placeholder="Alamat Sarana Apoteker">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP</label>
						<input name="tglcetakApoteker" id="tglcetakApoteker" type="date" class="form-control" placeholder="Tgl Cetak SIP">
					</div>
					<div class="form-group">
						<label>Masa Berlaku</label>
						<input name="expApoteker" id="expApoteker" type="date" class="form-control" placeholder="Masa Berlaku">
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
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
</script>



<?php 
include 'footer.php';

?>
