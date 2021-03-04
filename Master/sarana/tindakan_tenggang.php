<?php include 'header.php'; ?>
<link href="foto/logo.png" rel="shortcut icon">
<h3><span class="glyphicon glyphicon-briefcase"></span> Tindakan Klinik Masa Tenggang</h3>
<!-- <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2" name="tambahdata" id="tambahdata"><span class="glyphicon glyphicon-plus"></span>Tambah Data</button> -->
<!-- <br/>
<br/> -->


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
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select class="form-control" name="thn" onchange="getgraf(this.value)">
			<option value="0">-- Pilih Tahun --</option>
			<?php 
			$sql=mysqli_query($conn, "SELECT YEAR(tgl_tindakan_mt) as thn from tindakan_masa_tenggang ORDER BY tgl_tindakan_mt ASC");
			while($row = mysqli_fetch_array($sql)){
			?>
			<option value="<?php echo $row['thn'];?>"><?php echo $row['thn'];?></option>
			<?php }?>
		</select>
	</div>
<div id="graf"></div>
<br>
<form action="tindakan_tenggang.php" method="get">
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
		<th class="col-md-1">Jadwal Tindakan</th>
		<th class="col-md-1">Penerima Info</th>
		<th class="col-md-1">Pemberi Info</th>
		<th class="col-md-1">Tindakan Melalui</th>
		<th class="col-md-1">Keterangan</th>
		<th class="col-md-1">Aksi</th>
	</tr>
	<?php
	if(isset($_GET['cari'])){
		$cari=($_GET['cari']);
		$brg=mysqli_query($conn, "SELECT * from tindakan_masa_tenggang where Nama_KlinikPratama like '%".$cari."%'");
	}else{
		$brg=mysqli_query($conn, "SELECT * from tindakan_masa_tenggang limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){
		$idk = $b['id_tindakan_mt'];
        $nmk = $b['Nama_KlinikPratama'];
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['Nama_KlinikPratama'] ?></td>
			<td><?php echo date('d F Y', strtotime($b['tgl_tindakan_mt']))?></td>
			<td><?php echo $b['penerima_info_mt'] ?></td>
			<td><?php echo $b['pemberi_info_mt'] ?></td>
			<td><?php echo $b['tindakan_melalui_mt'] ?></td>
			<td><?php echo $b['hasil_tindakan_mt'] ?></td>
			<td><button class="btn btn-md btn-warning" data-toggle="modal" data-target="#tdk<?php echo $idk;?>"><i class="fa fa-edit"></i> Ubah Data</button>
				<!--modal-->
			    <div class="modal fade" id="tdk<?php echo $idk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			      <div class="modal-dialog modal-md" role="document">
			        <div class="modal-content">
			          <div class="modal-header">
			            <h5 class="modal-title" id="exampleModalLabel">Form Tindakan Klinik <?php echo $b['Nama_KlinikPratama'];?></h5>
			            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			              <span aria-hidden="true">&times;</span>
			            </button> -->
			          </div>
			          <div class="modal-body">
			        <form action="tambah_tindakan.php" method="post" role="form" enctype="multipart/form-data">
			        <div class="col-md-6">
			            <input type="hidden" name="idk" value="<?php echo $b['id_tindakan_mt'];?>">
			        <div class="form-group">
			            <label>Tindakan Melalui</label>
			            <select class="form-control" name="melalui" id="melalui">
			                <option value="Telepon">Telepon</option>
			                <option value="E-Mail">E-Mail</option>
			            </select>
			        </div>
			        <div class="form-group">
			            <label>Tanggal Tindakan</label>
			            <input name="tgl_tindakan" id="tgl_tindakan" type="date" class="form-control" value="<?php echo $b['tgl_tindakan_mt'];?>" required>
			        </div>
			        <div class="form-group">
			            <label>Pemberi Info</label>
			            <input type="text" name="pemberi" class="form-control" value="<?php echo $b['pemberi_info_mt'];?>">
			        </div>
			        </div>
			        <div class="col-md-6">
			        <div class="form-group">
			            <label>Penerima Info</label>
			            <input name="penerima" id="penerima" type="text" class="form-control" value="<?php echo $b['penerima_info_mt'];?>" required>
			        </div>
			        <div class="form-group">
			            <label>Hasil Tindakan</label>
			            <input type="text" name="hasil" class="form-control" value="<?php echo $b['hasil_tindakan_mt'];?>">
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
			          </div>
			          <div class="modal-footer">
			            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
			            <button type="submit" class="btn btn-warning" name="ubah_data">Ubah</button>
			          </div>
			        </div>
			      </div>
			    </div>
			<!--modal-->
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


		</div>
	</div>
</div>



<?php
include 'footer.php';

?>
<script src="../assets/grafik/code/highcharts.js"></script>
<script src="../assets/grafik/code/modules/exporting.js"></script>
<script src="../assets/grafik/code/modules/export-data.js"></script>
<script>
  function getgraf(val) {
        $.ajax({
            type: "POST",
            data: ({th : ""+val}),
            url: "graf_tt.php",
            success: function(data) {
                $("#graf").html(data);
                
            }
        });
    }
</script>
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Tindaka Klinik Masa Tenggang'
    },
    subtitle: {
        text: 'Tahun <?php echo $th;?>'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Tindakan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Tindakan</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'By Phone',
        data: [
                <?php for($a=0; $a<12; $a++){ ?>
                    <?php echo $em[$a];?>,
                <?php }?>
                ]

    }, {
        name: 'By Email',
        data: [
                <?php for($b=0; $b<12; $b++){ ?>
                    <?php echo $ph[$b];?>,
                <?php }?>
                ]

    }]
});
        </script>