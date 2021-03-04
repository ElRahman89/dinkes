<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Ahli Teknologi Laboratorium Medik</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-default col-md-2" name="tambahdata" id="tambahdata" disabled><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from sdmkatlm");
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
<form action="cariATLM.php" method="get">
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
		<th class="col-md-1">Jumlah Asisten Doktergg Gigi</th>
		<th class="col-md-1">Jumlah Doktergg</th>
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
		$brg=mysqli_query($conn, "SELECT * from sdmkatlm where namaATLM like '%".$cari."%' or namasaranaATLM like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from sdmkatlm limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			
			
			<td><?php echo $b['sipATLM'] ?></td>
			<td><?php echo $b['namaATLM'] ?></td>
			
			
			
			<td><?php echo $b['namasaranaATLM'] ?></td>
			<td><?php echo $b['alamatsaranaATLM'] ?></td>
			<td><?php echo $b['tglcetakATLM'] ?></td>
			<td><?php echo $b['expATLM'] ?></td>
			<td>
				<a href="det_dataATLM.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				<a href="editATLM.php?No=<?php echo $b['No']; ?>" class="btn btn-default" name="edit" disabled>Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusATLM.php?No=<?php echo $b['No']; ?>' }" class="btn btn-default" name="hapus" disabled>Hapus</a>
			</td>
		</tr>				
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Dokter Gigi</td>
		<td>			
		<?php 
		
			$x=mysqli_query($conn, "SELECT count(namaATLM) as namaATLM from sdmkatlm");	
			$xx=mysqli_fetch_array($x);			
			echo "<b>". number_format($xx['namaATLM'])."</b>";		
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
                
                var namaATLM = document.getElementById('namaATLM');
                var tempatlahirATLM = document.getElementById('tempatlahirATLM');
                var tgllahirATLM = document.getElementById('tgllahirATLM');
                var alamatATLM = document.getElementById('alamatATLM');
                var namasaranaATLM = document.getElementById('namasaranaATLM');
 
                    if (harusDiisi(namaATLM, "namaATLM belum diisi")) {
                        if (harusDiisi(tempatlahirATLM, "tempatlahirATLM belum diisi")) {
                            if (harusDiisi(tgllahirATLM, "tgllahirATLM belum diisi")) {
                            	if (harusDiisi(alamatATLM, "alamatATLM belum diisi")) {
                            		if (harusDiisi(namasaranaATLM, "namasaranaATLM belum diisi")) {
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
				<form onsubmit="return validasi()" action="tambah_dataATLM.php" method="post">
				
					<div class="form-group">
						<label>Nama ATLM</label>
						<input name="namaATLM" id="namaATLM" type="text" class="form-control" placeholder="Nama ATLM">
					</div>
					<div class="form-group">
						<label>Kota Lahir ATLM</label>
						<input name="tempatlahirATLM" id="tempatlahirATLM" type="text" class="form-control" placeholder="Kota Lahir ATLM">
					</div>
					<div class="form-group">
						<label>tanggal Lahir ATLM</label>
						<input name="tgllahirATLM" id="tgllahirATLM" type="date" class="form-control" placeholder="Tanggal Lahir ATLM">
					</div>
					<div class="form-group">
						<label>Alamat ATLM</label>
						<input name="alamatATLM" id="alamatATLM" type="text" class="form-control" placeholder="Alamat ATLM">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik ATLM</label>
						<input name="sipATLM" id="sipATLM" type="text" class="form-control" placeholder="Surat Ijin Praktik ATLM">
					</div>
					<div class="form-group">
						<label>Nama Sarana ATLM</label>
						<br/>
						<select name="namasaranaATLM" id="namasaranaATLM" class="form-control" >
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
						<label>Alamat sarana ATLM</label>
						<input name="alamatsaranaATLM" id="alamatsaranaATLM" type="text" class="form-control" placeholder="Alamat Sarana ATLM">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP</label>
						<input name="tglcetakATLM" id="tglcetakATLM" type="date" class="form-control" placeholder="Tgl Cetak SIP">
					</div>
					<div class="form-group">
						<label>Masa Berlaku</label>
						<input name="expATLM" id="expATLM" type="date" class="form-control" placeholder="Masa Berlaku">
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
