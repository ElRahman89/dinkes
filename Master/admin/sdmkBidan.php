<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Bidan</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php 
$orderBy= (isset($_GET['by'])) ?$_GET['by'] : "namasaranaBidan";

$per_hal=10;
$jumlah_record=mysqli_query($conn, "SELECT COUNT(*) from sdmkbidan");
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
<form action="cariBidan.php" method="get">
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
		<th class="col-md-1">Surat Ijin Kerja Bidan</th>
		<th class="col-md-1">Nama</th>
		<!-- <th class="col-md-1">Kota Klinik</th> -->
		<th class="col-md-1">Alamat Rumah</th>
		
		<th class="col-md-1"><a href="<?php $_SERVER['PHP_SELF']?>?by=namasaranaBidan">Nama Sarana</th>
		
		<!-- <th class="col-md-1">Contact Person</th> -->
		<th class="col-md-1">Kota</th>
		<th class="col-md-1">Masa Berlaku</th>
		<th class="col-md-1">Tgl Surat Izin</th>
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
		$brg=mysqli_query($conn, "SELECT * from sdmkBidan where Nama_Bidan like '%".$cari."%' or namasaranaBidan like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from sdmkBidan limit $start, $per_hal");
	}
	$idBidan=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $idBidan++ ?></td>
			
			
			<td><?php echo $b['Surat_ijin_kerja_bidan'] ?></td>
			<td><?php echo $b['Nama_Bidan'] ?></td>
			
			<td><?php echo $b['alamatBidan'] ?></td>
			
			
			<td><?php echo $b['namasaranaBidan'] ?></td>
			
			
			<td><?php echo $b['nomorstrBidan'] ?></td>
			<td><?php echo $b['masaberlakuBidan'] ?></td>
			<td><?php echo $b['tglcetakBidan'] ?></td>
			<td>
				<a href="det_dataBidan.php?idBidan=<?php echo $b['idBidan']; ?>" class="btn btn-info">Detail</a>
				<a href="editBidan.php?idBidan=<?php echo $b['idBidan']; ?>" class="btn btn-warning" name="edit">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapusBidan.php?idBidan=<?php echo $b['idBidan']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td>
		</tr>				
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Bidan</td>
		<td>			
		<?php 
		
			$x=mysqli_query($conn, "SELECT count(Nama_Bidan) as Jumlah_Dokter from sdmkbidan");	
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
                
                var Nama_Bidan = document.getElementById('Nama_Bidan');
                var tlBidan = document.getElementById('tlBidan');
                var tglBidan = document.getElementById('tglBidan');
                var alamatBidan = document.getElementById('alamatBidan');
                var kotaBidan = document.getElementById('kotaBidan');
 
                    if (harusDiisi(Nama_Bidan, "Nama_Bidan belum diisi")) {
                        if (harusDiisi(tlBidan, "tlBidan belum diisi")) {
                            if (harusDiisi(tglBidan, "tglBidan belum diisi")) {
                            	if (harusDiisi(alamatBidan, "alamatBidan belum diisi")) {
                            		if (harusDiisi(kotaBidan, "kotaBidan belum diisi")) {
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
				<h4 class="modal-title">Tambah Bidan Baru</h4>
			</div>
			<div class="modal-body">
				<form onsubmit="return validasi()" action="tambah_dataBidan.php" method="post">
				
					<div class="form-group">
						<label>Surat Ijin Kerja Bidan</label>
						<input name="Surat_ijin_kerja_bidan" id="Surat_ijin_kerja_bidan" type="text" class="form-control" placeholder="Surat ijin kerja bidan">
					</div>
					<div class="form-group">
						<label>Nama Bidan</label>
						<input name="Nama_Bidan" id="Nama_Bidan" type="text" class="form-control" placeholder="Nama Bidan">
					</div>
					<div class="form-group">
						<label>Kota Lahir Bidan</label>
						<input name="tlBidan" id="tlBidan" type="text" class="form-control" placeholder="Kota Lahir Bidan">
					</div>
					<div class="form-group">
						<label>tanggal Lahir Bidan</label>
						<input name="tglBidan" id="tglBidan" type="date" class="form-control" placeholder="Tanggal Lahir Bidan">
					</div>
					<div class="form-group">
						<label>Alamat Bidan</label>
						<input name="alamatBidan" id="alamatBidan" type="text" class="form-control" placeholder="Alamat Bidan">
					</div>
					<div class="form-group">
						<label>kota Tinggal Bidan</label>
						<input name="kotaBidan" id="kotaBidan" type="text" class="form-control" placeholder="Kota Bidan">
					</div>
					<div class="form-group">
						<label>Nomor STR Bidan</label>
						<input name="nomorstrBidan" id="nomorstrBidan" type="text" class="form-control" placeholder="No. STR Bidan">
					</div>
					<div class="form-group">
						<label>Nama Sarana Bidan</label>
						<br/>
						<select name="namasaranaBidan" id="namasaranaBidan" class="form-control" >
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
						<label>Alamat Sarana Bidan</label>
						<input name="alamatsaranaBidan" id="alamatsaranaBidan" type="text" class="form-control" placeholder="Alamat Sarana Bidan">
					</div>
					<div class="form-group">
						<label>Kota Sarana Bidan</label>
						<input name="kotasaranaBidan" id="kotasaranaBidan" type="text" class="form-control" placeholder="Kota Sarana Bidan">
					</div>
					<div class="form-group">
						<label>Masa Berlaku Bidan</label>
						<input name="masaberlakuBidan" id="masaberlakuBidan" type="date" class="form-control" placeholder="Masa Berlaku Bidan">
					</div>
					<div class="form-group">
						<label>Tanggal Surat Izin Bidan</label>
						<input name="tglcetakBidan" id="tglcetakBidan" type="date" class="form-control" placeholder="Tanggal Cetak Bidan">
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
