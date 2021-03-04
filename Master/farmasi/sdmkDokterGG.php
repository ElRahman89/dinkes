<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Dokter Gigi</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-default col-md-2" name="tambahdata" id="tambahdata" disabled><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php 
$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from sdmkdoktergg");
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
<form action="cariDokterGG.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		
		<th class="col-md-1">Surat Ijin Praktik I</th>
		<th class="col-md-1">Nama</th>
		
		<th class="col-md-1">Nama Sarana</th>
		
		<!-- <th class="col-md-1">Contact Person</th> -->
		<th class="col-md-1">Alamat Sarana</th>
		<th class="col-md-1">Tgl Cetak</th>
		<th class="col-md-1">Masa Berlaku</th>
		
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Pengaturan</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from sdmkdoktergg where namaDoktergg like '%".$cari."%' or namasarana1Doktergg like '%".$cari."%' or namasarana2Doktergg like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from sdmkdoktergg limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			
			
			<td><?php echo $b['sip1Doktergg'] ?></td>
			<td><?php echo $b['namaDoktergg'] ?></td>
			
			
			
			<td><?php echo $b['namasarana1Doktergg'] ?></td>
			<td><?php echo $b['alamatsarana1Doktergg'] ?></td>
			<td><?php echo $b['tglcetak1Doktergg'] ?></td>
			<td><?php echo $b['expDoktergg'] ?></td>
			<td>
				<a href="det_datadokterGG.php?No=<?php echo $b['No']; ?>" class="btn btn-info">Detail</a>
				<a href="editDoktergg.php?No=<?php echo $b['No']; ?>" class="btn btn-default" name="edit" disabled>Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusDoktergg.php?No=<?php echo $b['No']; ?>' }" class="btn btn-default" name="hapus" disabled>Hapus</a>
			</td>
		</tr>				
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Dokter Gigi</td>
		<td>			
		<?php 
		
			$x=mysqli_query($conn, "SELECT count(namaDoktergg) as namaDoktergg from sdmkdoktergg");	
			$xx=mysqli_fetch_array($x);			
			echo "<b>". number_format($xx['namaDoktergg'])."</b>";		
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
                
                var namaDoktergg = document.getElementById('namaDoktergg');
                var tempatlahirDoktergg = document.getElementById('tempatlahirDoktergg');
                var tgllahirDoktergg = document.getElementById('tgllahirDoktergg');
                var alamatDoktergg = document.getElementById('alamatDoktergg');
                var namasaranaDoktergg = document.getElementById('namasaranaDoktergg');
 
                    if (harusDiisi(namaDoktergg, "namaDoktergg belum diisi")) {
                        if (harusDiisi(tempatlahirDoktergg, "tempatlahirDoktergg belum diisi")) {
                            if (harusDiisi(tgllahirDoktergg, "tgllahirDoktergg belum diisi")) {
                            	if (harusDiisi(alamatDoktergg, "alamatDoktergg belum diisi")) {
                            		if (harusDiisi(namasaranaDoktergg, "namasarana1Doktergg belum diisi")) {
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
				<form onsubmit="return validasi()" action="tambah_datadoktergg.php" method="post">
				
					<div class="form-group">
						<label>Nama Dokter Gigi</label>
						<input name="namaDoktergg" id="namaDoktergg" type="text" class="form-control" placeholder="Nama Dokter Gigi">
					</div>
					<div class="form-group">
						<label>Kota Lahir Dokter Gigi</label>
						<input name="tempatlahirDoktergg" id="tempatlahirDoktergg" type="text" class="form-control" placeholder="Kota Lahir Dokter Gigi">
					</div>
					<div class="form-group">
						<label>tanggal Lahir Dokter Gigi</label>
						<input name="tgllahirDoktergg" id="tgllahirDoktergg" type="date" class="form-control" placeholder="Tanggal Lahir Dokter Gigi">
					</div>
					<div class="form-group">
						<label>Alamat Dokter Gigi</label>
						<input name="alamatDoktergg" id="alamatDoktergg" type="text" class="form-control" placeholder="Alamat Dokter Gigi">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik I Dokter Gigi</label>
						<input name="sip1Doktergg" id="sip1Doktergg" type="text" class="form-control" placeholder="Surat Ijin Praktik I Dokter Gigi">
					</div>
					<div class="form-group">
						<label>Nama Sarana I Dokter Gigi</label>
						<br/>
						<select name="namasarana1Doktergg" id="namasarana1Doktergg" class="form-control" >
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
						<label>Alamat sarana I Dokter Gigi</label>
						<input name="alamatsarana1Doktergg" id="alamatsarana1Doktergg" type="text" class="form-control" placeholder="Alamat Sarana I Dokter Gigi">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP I</label>
						<input name="tglcetak1Doktergg" id="tglcetak1Doktergg" type="date" class="form-control" placeholder="Tgl Cetak SIP I">
					</div>
					<div class="form-group">
						<label>Surat Ijin Praktik II Dokter Gigi</label>
						<input name="sip2Doktergg" id="sip2Doktergg" type="text" class="form-control" placeholder="Surat Ijin Praktik II Dokter Gigi">
					</div>
					<div class="form-group">
						<label>Nama Sarana II Dokter Gigi</label>
						<br/>
						<select name="namasarana2Doktergg" id="namasarana2Doktergg" class="form-control" >
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
						<label>Alamat sarana II Dokter Gigi</label>
						<input name="alamatsarana2Doktergg" id="alamatsarana2Doktergg" type="text" class="form-control" placeholder="Alamat Sarana II Dokter Gigi">
					</div>											
					<div class="form-group">
						<label>Tanggal Cetak SIP II</label>
						<input name="tglcetak2Doktergg" id="tglcetak2Doktergg" type="date" class="form-control" placeholder="Tgl Cetak SIP II">
					</div>
					<div class="form-group">
						<label>Masa Berlaku</label>
						<input name="expDoktergg" id="expDoktergg" type="date" class="form-control" placeholder="Masa Berlaku">
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
