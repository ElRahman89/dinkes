<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Janji Kunjungan Klinik Masa Tenggang</h3>
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
<!-- <br>
<form action="kunjungansarana.php" method="get">
	<div class="input-group col-md-5">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari Data di sini .." aria-describedby="basic-addon1" name="cari">
		
	</div>
</form> -->
<br>
	<div class="input-group col-md-3 col-md-offset-9">
		<span class="input-group-addon" id="basic-addon1">Filter : </span>
		<select class="form-control" onchange="get_filter(this.value)">
			<option value="0">Pilih Status</option>
			<option value="Selesai">Selesai</option>
			<option value="Belum Selesai">Belum Selesai</option>
		</select>
	</div>
	<br>
<div id="dttenggang">
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
</div>

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
				<form action="tambah_janji_tenggang.php" method="post">
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
						<label>Penanggung Jawab Klinik</label>
						<input name="penanggung_klinik" id="penanggung_klinik" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Penanggung Jawab Dinkes</label>
						<input name="penanggung_dinkes" id="penanggung_dinkes" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Keterangan Permasalahan</label>
						<input name="ket_tenggang" id="ket_tenggang" type="text" class="form-control" placeholder="" required>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label>Jadwal Kunjungan</label>
						<select class="form-control" name="tgl_tenggang" id="tgl_tenggang" onchange="get_jam(this.value)">
							<option> --- Pilih Tanggal --- </option>
							<?php  
							$sql2 = mysqli_query($conn, "SELECT * FROM jadwal j JOIN detail_jadwal dj ON dj.idjadwal = j.idjadwal 
								WHERE dj.status = 'Kosong' GROUP BY tgljadwal ORDER BY tgljadwal ASC");
							if (mysqli_num_rows($sql) != 0) {
								while($row2 = mysqli_fetch_assoc($sql2)){ ?>
								<option value="<?php echo $row2['idjadwal'] ;?>"> <?php echo date("d F Y", strtotime($row2['tgljadwal'])) ?></option>
							<?php }
							}
							?>
						</select>
						<!-- <input name="tgl_kunjungan" id="tgl_kunjungan" type="date" class="form-control" required> -->
					</div>
					<div class="form-group">
						<label>Jam Kunjungan</label>
						<div id="dtjam">
							<input type="text" name="" disabled class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status" id="status">
							<option value="Dinkes ke Klinik">Dinkes ke Klinik</option>
							<option value="Klinik ke Dinkes">Klinik ke Dinkes</option>
						</select>
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
<script>
  function get_filter(val) {
        $.ajax({
            type: "POST",
            data: ({sts : ""+val}),
            url: "filter_tenggang.php",
            success: function(data) {
                $("#dttenggang").html(data);
                
            }
        });
        /*alert(val)*/
    }
      function get_jam(val) {
        $.ajax({
            type: "POST",
            data: ({idj : ""+val}),
            url: "get_jam.php",
            success: function(data) {
                $("#dtjam").html(data);
                
            }
        });
    }
</script>