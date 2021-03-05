<?php 
include 'header.php';
// echo $date = date('Y-m-d');
//echo $thnasd = date("Y", strtotime("-6 months", $date));
$thn = date("Y-m-d",strtotime("-6 months"));
$thnbln = date("Y-m-d",strtotime("-1 months", strtotime($thn)));
$date = date("mY");
$sql = mysqli_query($conn, "SELECT * FROM jadwal where DATE_FORMAT(tgljadwal, '%m%Y') = $date");
$row = mysqli_num_rows($sql);
$kln = CAL_GREGORIAN;
$b = date("m");
$t = date("Y");
$tma = '08:00';
$tmak = '09:00';
if($row == 0){
    #berhitung id guru
      $query1     = "SELECT max(idjadwal) AS idj FROM jadwal WHERE idjadwal LIKE '%J-%'";
      $hasil1     = mysqli_query($conn, $query1);
           if (mysqli_num_rows($hasil1)>0) {
              $row1 = mysqli_fetch_array($hasil1);
                 $idmax       = $row1['idj'];
                 $id_urut     = (int)substr($idmax,2,10);
                 $id_urut++;
              $idj = "J-".sprintf("%010s",$id_urut);
          }else{
              $idj = "J-0000000000";
          }
    #berhitung sudah 
    $hari = cal_days_in_month($kln, $b, $t);
    for($i=1; $i<$hari; $i++){
        $idjj = $idj++;
        if($i<10){
        $tg = date("Y-m-");
        $tg2= $tg.'0'.$i;
        $inshari = mysqli_query($conn, "INSERT INTO jadwal VALUES ('$idjj','$tg2')");
        for($ii=1; $ii<9; $ii++){
            $tma = '07:00';
            $tmak = '08:00';
            //echo date("H:i:s A");
            //$tglpla2 = date("H:i", strtotime("+1 hours", strtotime($tma)));
            $tglpla = date("H:i", strtotime("+".$ii." hours", strtotime($tma)));
            $tglplak = date("H:i", strtotime("+".$ii." hours", strtotime($tmak)));
            $tfa = $tglpla.' - '.$tglplak;
            $insjam = mysqli_query($conn, "INSERT INTO detail_jadwal VALUES ('','$idjj','$tfa','Kosong')");  
        }
        }
        //echo $i;
        $tg = date("Y-m-");
        $tg2= $tg.''.$i;
        $inshari = mysqli_query($conn, "INSERT INTO jadwal VALUES ('$idjj','$tg2')");
        for($ii=1; $ii<9; $ii++){
            $tma = '07:00';
            $tmak = '08:00';
            //echo date("H:i:s A");
            //$tglpla2 = date("H:i", strtotime("+1 hours", strtotime($tma)));
            $tglpla = date("H:i", strtotime("+".$ii." hours", strtotime($tma)));
            $tglplak = date("H:i", strtotime("+".$ii." hours", strtotime($tmak)));
            $tfa = $tglpla.' - '.$tglplak;
            $insjam = mysqli_query($conn, "INSERT INTO detail_jadwal VALUES ('','$idjj','$tfa','Kosong')");  
        }
    }
}
?>

<!-- Pemanisnya -->
		<!-- Bootstrap Core CSS -->
        <link rel="icon" type="image/png" href="../foto/icon.png"/>
		    <link href="../../dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="../../dashboard/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

		    <!-- MetisMenu CSS -->
		    <link href="../../dashboard/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		    <!-- Custom CSS -->
		    <link href="../../dashboard/dist/css/sb-admin-2.css" rel="stylesheet">

		    <!-- Morris Charts CSS -->
		    <link href="../../dashboard/vendor/morrisjs/morris.css" rel="stylesheet">

		    <!-- Custom Fonts -->
		    <link href="../../dashboard/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		    <link rel="stylesheet" href="../bootstrap_js/bootstrap.min.css">

		    <script src="../bootstrap_js/jquery.min.js"></script>

		    <script src="../bootstrap_js/bootstrap.min.js"></script>

            



		    

<!-- Pemanisnya -->

<div id="dtdashboard">
<!-- Count File and Load Data -->
<?php 

$jumlah_dokter=mysqli_query($conn, "SELECT SUM(Jml_Dokter) from data_pemohon");
$jum_dokter=mysqli_fetch_array($jumlah_dokter);

$jumlah_klinik_aktif=mysqli_query($conn, "SELECT COUNT(Keterangan_Pemohon) FROM `data_pemohon` WHERE Keterangan_Pemohon NOT LIKE '%TUTUP%'");
$jum_kpaktif=mysqli_fetch_array($jumlah_klinik_aktif);

$jumlah_klinik_pasif=mysqli_query($conn, "SELECT COUNT(*) FROM (SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo FROM data_pemohon WHERE Tgl_JatuhTempo <= '$thn') src");
$jum_kppasif=mysqli_fetch_array($jumlah_klinik_pasif);


$jumlah_klinik_nakal=mysqli_query($conn, "SELECT COUNT(*) FROM (SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo FROM data_pemohon WHERE Tgl_JatuhTempo <= '$thnbln') src");
$jum_kpnakal=mysqli_fetch_array($jumlah_klinik_nakal);

$jumlah_klinik_stop=mysqli_query($conn, "SELECT COUNT(Keterangan_Pemohon) FROM data_pemohon where Keterangan_Pemohon Like '%TUTUP%'");
$jum_kpstop=mysqli_fetch_array($jumlah_klinik_stop);

$sql_klinik_aktif    ="SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, status_io, status_im FROM `data_pemohon` WHERE Keterangan_Pemohon NOT LIKE '%TUTUP%'";
$hasil_klinik_aktif = mysqli_query($conn, $sql_klinik_aktif);
$no_klinik_aktif=1;

$sql_klinik_tenggang    ="SELECT dp.No, dp.Klinik_Pratama, dp.Alamat_Klinik, dp.Penanggung_Jawab, dp.Tgl_Berlaku, dp.Tgl_JatuhTempo, dp.status_io, dp.status_im FROM data_pemohon dp LEFT JOIN tindakan_masa_tenggang tmt ON tmt.Nama_KlinikPratama = dp.Klinik_Pratama WHERE dp.Tgl_JatuhTempo <= '$thn' AND tmt.id_tindakan_mt IS NULL ORDER BY No ASC LIMIT 5
";
$hasil_klinik_tenggang = mysqli_query($conn, $sql_klinik_tenggang);
$sql_klinik_tenggang1   ="SELECT No, Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, status_io, status_im FROM data_pemohon WHERE Tgl_JatuhTempo <= '$thn'
";
$hasil_klinik_tenggang1 = mysqli_query($conn, $sql_klinik_tenggang1);
$no_klinik_tenggang=1;
$no_klinik_tenggang1=1;

$sql_klinik_nakal    ="SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, status_io, status_im FROM Data_Pemohon WHERE Tgl_JatuhTempo <= '$thnbln'";
$hasil_klinik_nakal  =mysqli_query($conn, $sql_klinik_nakal);
$no_klinik_nakal=1;

$sql_klinik_tutup    ="SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, Keterangan_Pemohon, status_io, status_im FROM Data_Pemohon where Keterangan_Pemohon Like '%TUTUP%'";
$hasil_klinik_tutup  =mysqli_query($conn, $sql_klinik_tutup);
$no_klinik_tutup=1;
?>

<link href="foto/dinkes_logo.png" rel="shortcut icon">

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <div class="col-lg-4">
                    <!-- <h1 class="page-header">Filter</h1> -->
                    <label style="padding-top: 40px"></label>
                    <select name="filter" id="filter" class="form-control" onchange="get_filter(this.value)">
                        <option>-- Pilih Kasifikasi --</option>
                        <option value="Bersalin">Bersalin</option>
                        <option value="Kecantikan">Kecantikan</option>
                        <option value="Hemodialisis">Hemodialisis</option>
                        <option value="Gigi">Gigi</option>
                        <option value="Umum">Umum</option>
                        <option value="Jantung">Jantung</option>
                        <option value="Rehabilitasi">Rehabilitasi Medik</option>
                    </select>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kpaktif[0]; ?></div>
                                    <div>Daftar Klinik Yang Masih Aktif</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#klinik_aktif">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kppasif[0]; ?></div>
                                    <div>Daftar Klinik Masa Tenggang</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#klinik_tenggang">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                    
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kpnakal[0]; ?></div>
                                    <div>Daftar Klinik Melebihi Masa Tenggang</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#klinik_nakal">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kpstop[0]; ?></div>
                                    <div>Daftar Klinik Yang Sudah Tutup</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#klinik_tutup">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
</div>
                <div class="col-lg-12 col-md-12">

                    <!-- Datanya Diagram Pie -->

                    <div id="klinik_aktif" class="collapse">
                        <h2>Daftar Klinik Aktif</h2>
                        <!-- <p><a name="export" href="export.php"><button>Export Data ke Excel</button></a></p> -->
                        <form method="post" action="export_aktif.php">
                         <input type="submit" name="export_aktif" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>
                            </tr>
                            <?php
                                while($row_klinik_aktif=mysqli_fetch_assoc($hasil_klinik_aktif))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_aktif++;?></td>
                                <td><?php echo $row_klinik_aktif['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_aktif['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_aktif['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_aktif['Tgl_Berlaku'];?></td>
                                <td><?php echo date("d M Y", strtotime($row_klinik_aktif['Tgl_JatuhTempo']));?></td>
                                <td><?php echo $row_klinik_aktif['status_io'];?></td>
                                <td><?php echo $row_klinik_aktif['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_tenggang" class="collapse">
                        <h2>Klinik Masuk Masa Tenggang</h2>
                        <form method="post" action="export_pasif.php">
                         <input type="submit" name="export_pasif" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        <br>
                        <h4>Daftar Klinik Masuk Masa Tenggang Yang Diprioritaskan</h4>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th>
                                <th>KLINIK PRATAMA</th>
                                <th>ALAMAT KLINIK</th>
                                <th>PENANGGUNG JAWAB</th>
                                <th>TANGGAL BERLAKU</th>
                                <th>TANGGAL JATUH TEMPO</th>
                                <th>STATUS PENGAWASAN IO</th>
                                <th>STATUS PENGAWASAN IM</th>
                                <th>TINDAKAN</th>
                            </tr>
                            <?php
                                while($row_klinik_pasif=mysqli_fetch_assoc($hasil_klinik_tenggang))
                                    {
                                    $idk = $row_klinik_pasif['No'];
                                    $nmk = $row_klinik_pasif['Klinik_Pratama'];

                            ?>
                            <tr>
                                <td><?php echo $no_klinik_tenggang++;?></td>
                                <td><?php echo $row_klinik_pasif['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_pasif['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_pasif['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_pasif['Tgl_Berlaku'];?></td>
                                <td><?php echo date("d M Y", strtotime($row_klinik_pasif['Tgl_JatuhTempo']));?></td>
                                <td><?php echo $row_klinik_pasif['status_io'];?></td>
                                <td><?php echo $row_klinik_pasif['status_im'];?></td>
                                <td><center>
                                    <?php 
                                    $sql = mysqli_query($conn,"SELECT * FROM tindakan_masa_tenggang WHERE Nama_KlinikPratama = '$nmk'");
                                    $row = mysqli_num_rows($sql);
                                    if($row > 0){ ?>
                                    <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i><a href="tindakan_tenggang.php"> Lihat Tindakan</a></button>
                                    <?php }else{ ?>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#tdk<?php echo $idk;?>"><i class="fa fa-edit"></i> Tindakan</button>
                                <!--modal-->
                                <div class="modal fade" id="tdk<?php echo $idk;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Tindakan Klinik <?php echo $row_klinik_pasif['Klinik_Pratama'];?></h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button> -->
                                      </div>
                                      <div class="modal-body">
                                    <form action="tambah_tindakan.php" method="post" role="form" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <input type="hidden" name="idk" value="<?php echo $row_klinik_pasif['Klinik_Pratama'];?>">
                                    <div class="form-group">
                                        <label>Tindakan Melalui</label>
                                        <select class="form-control" name="melalui" id="melalui">
                                            <option value="Telepon">Telepon</option>
                                            <option value="E-Mail">E-Mail</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Tindakan</label>
                                        <input name="tgl_tindakan" id="tgl_tindakan" type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pemberi Info</label>
                                        <input type="text" name="pemberi" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Penerima Info</label>
                                        <input name="penerima" id="penerima" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Hasil Tindakan</label>
                                        <input type="text" name="hasil" class="form-control">
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
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            <!--modal-->
                                    <?php } ?>
                                
                                </center></td>
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                        <br>
                        <h4>Daftar Klinik Masuk Masa Tenggang</h4>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th>
                                <th>KLINIK PRATAMA</th>
                                <th>ALAMAT KLINIK</th>
                                <th>PENANGGUNG JAWAB</th>
                                <th>TANGGAL BERLAKU</th>
                                <th>TANGGAL JATUH TEMPO</th>
                                <th>STATUS PENGAWASAN IO</th>
                                <th>STATUS PENGAWASAN IM</th>
                            </tr>
                            <?php
                                while($row_klinik_pasif1=mysqli_fetch_assoc($hasil_klinik_tenggang1))
                                    {
                                    $idk = $row_klinik_pasif1['No'];
                                    $nmk = $row_klinik_pasif1['Klinik_Pratama'];

                            ?>
                            <tr>
                                <td><?php echo $no_klinik_tenggang1++;?></td>
                                <td><?php echo $row_klinik_pasif1['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_pasif1['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_pasif1['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_pasif1['Tgl_Berlaku'];?></td>
                                <td><?php echo date("d M Y", strtotime($row_klinik_pasif1['Tgl_JatuhTempo']));?></td>
                                <td><?php echo $row_klinik_pasif1['status_io'];?></td>
                                <td><?php echo $row_klinik_pasif1['status_im'];?></td>
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_nakal" class="collapse">
                        <h2>Daftar Klinik Melebihi Masa Tenggang</h2>
                        <form method="post" action="export_nakal.php">
                         <input type="submit" name="export_nakal" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>
                            </tr>
                            <?php
                                while($row_klinik_nakal=mysqli_fetch_assoc($hasil_klinik_nakal))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_nakal++;?></td>
                                <td><?php echo $row_klinik_nakal['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_nakal['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_nakal['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_nakal['Tgl_Berlaku'];?></td>
                                <td><?php echo date("d M Y", strtotime($row_klinik_nakal['Tgl_JatuhTempo']));?></td>
                                <td><?php echo $row_klinik_nakal['status_io'];?></td>
                                <td><?php echo $row_klinik_nakal['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>


                    
                    <!-- Datanya -->

                    <div id="klinik_tutup" class="collapse">
                        <h2>Daftar Klinik Yang Sudah Tutup</h2>
                        <form method="post" action="export_tutup.php">
                         <input type="submit" name="export_tutup" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th>
                            </tr>
                            <?php
                                while($row_klinik_tutup=mysqli_fetch_assoc($hasil_klinik_tutup))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_tutup++;?></td>
                                <td><?php echo $row_klinik_tutup['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_tutup['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_tutup['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_tutup['Tgl_Berlaku'];?></td>
                                <td><?php echo date("d M Y", strtotime($row_klinik_tutup['Tgl_JatuhTempo']));?></td>
                                <td><?php echo $row_klinik_tutup['Keterangan_Pemohon'];?></td>
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_bersalin" class="collapse">
                        <h2>Daftar Klinik Bersalin</h2>
                        <form method="post" action="export_bersalin.php">
                         <input type="submit" name="export_bersalin" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_bersalin=mysqli_fetch_assoc($hasil_klinik_bersalin))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_bersalin++;?></td>
                                <td><?php echo $row_klinik_bersalin['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_bersalin['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_bersalin['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_bersalin['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_bersalin['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_bersalin['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_bersalin['status_io'];?></td>
                                <td><?php echo $row_klinik_bersalin['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_kecantikan" class="collapse">
                        <h2>Daftar Klinik Kecantikan</h2>
                        <form method="post" action="export_kecantikan.php">
                         <input type="submit" name="export_kecantikan" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_kecantikan=mysqli_fetch_assoc($hasil_klinik_kecantikan))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_kecantikan++;?></td>
                                <td><?php echo $row_klinik_kecantikan['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_kecantikan['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_kecantikan['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_kecantikan['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_kecantikan['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_kecantikan['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_kecantikan['status_io'];?></td>
                                <td><?php echo $row_klinik_kecantikan['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_mata" class="collapse">
                        <h2>Daftar Klinik Mata</h2>
                        <form method="post" action="export_mata.php">
                         <input type="submit" name="export_mata" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_mata=mysqli_fetch_assoc($hasil_klinik_mata))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_mata++;?></td>
                                <td><?php echo $row_klinik_mata['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_mata['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_mata['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_mata['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_mata['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_mata['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_mata['status_io'];?></td>
                                <td><?php echo $row_klinik_mata['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_hemodialisis" class="collapse">
                        <h2>Daftar Klinik hemodialisis</h2>
                        <form method="post" action="export_hemodialisis.php">
                         <input type="submit" name="export_hemodialisis" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_hemodialisis=mysqli_fetch_assoc($hasil_klinik_hemodialisis))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_hemodialisis++;?></td>
                                <td><?php echo $row_klinik_hemodialisis['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['status_io'];?></td>
                                <td><?php echo $row_klinik_hemodialisis['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_gigi" class="collapse">
                        <h2>Daftar Klinik Gigi</h2>
                        <form method="post" action="export_gigi.php">
                         <input type="submit" name="export_gigi" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_gigi=mysqli_fetch_assoc($hasil_klinik_gigi))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_gigi++;?></td>
                                <td><?php echo $row_klinik_gigi['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_gigi['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_gigi['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_gigi['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_gigi['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_gigi['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_gigi['status_io'];?></td>
                                <td><?php echo $row_klinik_gigi['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_umum" class="collapse">
                        <h2>Daftar Klinik Umum</h2>
                        <form method="post" action="export_umum.php">
                         <input type="submit" name="export_umum" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_umum=mysqli_fetch_assoc($hasil_klinik_umum))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_umum++;?></td>
                                <td><?php echo $row_klinik_umum['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_umum['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_umum['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_umum['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_umum['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_umum['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_umum['status_io'];?></td>
                                <td><?php echo $row_klinik_umum['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_jantung" class="collapse">
                        <h2>Daftar Klinik Jantung</h2>
                        <form method="post" action="export_jantung.php">
                         <input type="submit" name="export_jantung" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_jantung=mysqli_fetch_assoc($hasil_klinik_jantung))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_jantung++;?></td>
                                <td><?php echo $row_klinik_jantung['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_jantung['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_jantung['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_jantung['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_jantung['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_jantung['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_jantung['status_io'];?></td>
                                <td><?php echo $row_klinik_jantung['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                    
                    <!-- Datanya -->

                    <div id="klinik_rehabilitasi" class="collapse">
                        <h2>Daftar Klinik rehabilitasi</h2>
                        <form method="post" action="export_rehabilitasi.php">
                         <input type="submit" name="export_rehabilitasi" class="btn btn-success" value="Export Data ke Excel" />
                        </form>
                        <br>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>PENANGGUNG JAWAB</th><th>TANGGAL BERLAKU</th><th>TANGGAL JATUH TEMPO</th><th>KETERANGAN</th><th>STATUS PENGAWASAN IO</th><th>STATUS PENGAWASAN IM</th>

                            </tr>
                            <?php
                                while($row_klinik_rehabilitasi=mysqli_fetch_assoc($hasil_klinik_rehabilitasi))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_rehabilitasi++;?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Klinik_Pratama'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Alamat_Klinik'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Penanggung_Jawab'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Tgl_Berlaku'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Tgl_JatuhTempo'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['Keterangan_Pemohon'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['status_io'];?></td>
                                <td><?php echo $row_klinik_rehabilitasi['status_im'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>

                </div>

                

                </div>
                


                 
            </div>
            </div>

<?php 
include 'footer.php';
$th = date("Y");
$bln = array('01','02','03','04','05','06','07','08','09','10','11','12');
for($i=0; $i<12; $i++){
$sql = mysqli_query($conn, "SELECT IFNULL(COUNT(id_tindakan_mt),'0') as ttl FROM tindakan_masa_tenggang WHERE YEAR(tgl_tindakan_mt) = '$th' AND MONTH(tgl_tindakan_mt) = '$bln[$i]' AND tindakan_melalui_mt = 'E-Mail'");
$qwr = mysqli_fetch_array($sql);
$em[] = $qwr['ttl'];

$sql1 = mysqli_query($conn, "SELECT IFNULL(COUNT(id_tindakan_mt),'0') as ttl FROM tindakan_masa_tenggang WHERE YEAR(tgl_tindakan_mt) = '$th' AND MONTH(tgl_tindakan_mt) = '$bln[$i]' AND tindakan_melalui_mt = 'Telepon'");
$qwr1 = mysqli_fetch_array($sql1);
$ph[] = $qwr1['ttl'];
}

?>
<script src="../assets/grafik/code/highcharts.js"></script>
<script src="../assets/grafik/code/modules/exporting.js"></script>
<script src="../assets/grafik/code/modules/export-data.js"></script>
<script>
  function get_filter(val) {
        $.ajax({
            type: "POST",
            data: ({sts : ""+val}),
            url: "filter_dashboard.php",
            success: function(data) {
                $("#dtdashboard").html(data);
                
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