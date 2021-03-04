<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Data Kunjungan Klinik</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button>
<br/>
<br/>


<?php
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
<table class="table table-hover table-striped">
	<tr>
		<th><center>No</center></th>
		<th><center>Nama Klinik</center></th>
		<th><center>Jadwal Kunjungan</center></th>
		<th><center>Pengawas</center></th>
		<th><center>Penanggung Jawab</center></th>
		<th><center>Status Kunjungan</center></th>
		<th><center>Bukti</center></th>
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
		$idbk = $b['Id_Kunjungan'];
		?>
		<tr>
			<td><center><?php echo $no++ ?></td></center>


			<td><center><?php echo $b['Nama_KlinikPratama'] ?></td></center>
			<td><center><?php echo date('d F Y', strtotime($b['Jadwal_Kunjungan']))?></td></center>

			<td><center><?php echo $b['Pengawas'] ?></td></center>
			<td><center><?php echo $b['Penanggung_Jawab'] ?></td></center>
			<td><center><?php echo $b['Status_Kunjungan'] ?></td></center>
			<td><center><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#gambar<?php echo $idbk;?>"><i class="fa fa-eye"></i> Lihat Bukti</button>
			<!--modal-->
            <div class="modal fade" id="gambar<?php echo $idbk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bukti Kunjungan <?php echo date('d F Y', strtotime($b['Jadwal_Kunjungan']))?></h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> -->
                  </div>
                  <div class="modal-body">
                        <?php
                        $a=0;
                        $sqlf = "SELECT * FROM kunjungan
                        		WHERE Id_Kunjungan='$idbk'
                        ";
                        $qwrf = mysqli_query($conn, $sqlf);
                        $rowf = mysqli_fetch_array($qwrf);
						/*$idjf =$rowf['ID_FOTO_MOBIL'];*/
						$ftm =$rowf['Bukti_Kunjungan'];
						?>
                      	<center>
						<?php
                            if(empty($ftm)){
                        ?>
                            <p>Foto Kosong</p>
                        <?php
                        }else{ 
                        ?>
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($ftm);?>" width="400px">
                        <?php    
                        } 
                        ?>
                      	</center>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <!--modal-->
			</center></td>
			<!-- <td>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_data_kunjungan.php?No=<?php echo $b['Id_Kunjungan']; ?>' }" class="btn btn-danger" name="hapus">Hapus</a>
			</td> -->
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
				<form action="tambah_kunjungan.php" method="post" role="form" enctype="multipart/form-data">
					<div class="col-md-6">
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
						<input name="tgl_kunjungan" id="tgl_kunjungan" type="date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Pengawas</label>
						<input type="text" name="pengawas" class="form-control">
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Penanggung Jawab Klinik</label>
						<input name="penanggung" id="penanggung" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Status Kunjungan</label>
						<select name="status" class="form-control">
							<option>-- Pilih Status --</option>
							<option value="Selesai">Selesai</option>
							<option value="Belum">Belum</option>
							<option value="Cancel">Cancel</option>
						</select>
					</div>
					<div class="form-group">
						<label>Bukti Kunjungan</label>
						<input name="bukti" id="bukti" type="file" class="form-control" required>
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
