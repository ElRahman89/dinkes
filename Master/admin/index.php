<?php 
include 'header.php';
include 'config1.php';
?>

<!-- Pemanisnya -->
		<!-- Bootstrap Core CSS -->
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

<!-- Diagram Pie -->
           
<!-- Diagram Pie -->

		    

<!-- Pemanisnya -->


<!-- Count File and Load Data -->
<?php 

$jumlah_klinik_aktif=mysqli_query($conn, "SELECT COUNT(namaDokter) FROM masterdokter ");
$jum_kpaktif=mysqli_fetch_array($jumlah_klinik_aktif); 

$jumlah_klinik_pasif=mysqli_query($conn, "SELECT COUNT(namaKlinik) FROM masterklinik");
$jum_kppasif=mysqli_fetch_array($jumlah_klinik_pasif);


$jumlah_klinik_nakal=mysqli_query($conn, "SELECT COUNT(namaDokterGG) FROM masterdoktergg");
$jum_kpnakal=mysqli_fetch_array($jumlah_klinik_nakal);

$jumlah_klinik_stop=mysqli_query($conn, "SELECT COUNT(namaApoteker) FROM masterapoteker");
$jum_kpstop=mysqli_fetch_array($jumlah_klinik_stop);

$jumlah_ass_apoteker=mysqli_query($conn, "SELECT COUNT(namaAssApoteker) FROM masterassapoteker");
$jum_ass_apoteker=mysqli_fetch_array($jumlah_ass_apoteker);

$jumlah_atlm=mysqli_query($conn, "SELECT COUNT(namaAtlm) FROM masteratlm");
$jum_atlm=mysqli_fetch_array($jumlah_atlm);

$jumlah_bidan=mysqli_query($conn, "SELECT COUNT(namaBidan) FROM masterbidan");
$jum_bidan=mysqli_fetch_array($jumlah_bidan);

$jumlah_perawat=mysqli_query($conn, "SELECT COUNT(namaPerawat) FROM masterperawat");
$jum_perawat=mysqli_fetch_array($jumlah_perawat);

?>

<?php
        $sql_klinik_aktif    ="SELECT sipDokter, namaDokter, alamatDokter, tglDokter, expDokter FROM masterdokter";
        $hasil_klinik_aktif  =mysqli_query($conn, $sql_klinik_aktif);
        $no_klinik_aktif=1;
?>

<?php
        $sql_klinik_tenggang    ="SELECT idKlinik, namaKlinik, alamatKlinik, tgcetakKlinik, mbKlinik FROM masterklinik";
        $hasil_klinik_tenggang  =mysqli_query($conn, $sql_klinik_tenggang);
        $no_klinik_tenggang=1;
?>

<?php
        $sql_klinik_nakal    ="SELECT sipDokterGG, namaDokterGG, alamatDokterGG, tglDokterGG, expDokterGG from masterdoktergg";
        $hasil_klinik_nakal  =mysqli_query($conn, $sql_klinik_nakal);
        $no_klinik_nakal=1;
?>

<?php
        $sql_klinik_tutup    ="SELECT sipApoteker, namaApoteker, alamatApoteker, tglApoteker, expApoteker FROM masterapoteker";
        $hasil_klinik_tutup  =mysqli_query($conn, $sql_klinik_tutup);
        $no_klinik_tutup=1;
?>

<?php
        $sql_ass_apoteker    ="SELECT sipAssApoteker, namaAssApoteker, alamatAssApoteker, tgcetakAssApoteker, expAssApoteker FROM masterassapoteker";
        $hasil_ass_apoteker  =mysqli_query($conn, $sql_ass_apoteker);
        $no_ass_apoteker=1;
?>

<?php
        $sql_atlm    ="SELECT sipAtlm, namaAtlm, alamatAtlm, tgcetakAtlm, expAtlm FROM masteratlm";
        $hasil_atlm  =mysqli_query($conn, $sql_atlm);
        $no_atlm=1;
?>

<?php
        $sql_bidan    ="SELECT sipBidan, namaBidan, alamatBidan, tglBidan, expBidan FROM masterbidan";
        $hasil_bidan  =mysqli_query($conn, $sql_bidan);
        $no_bidan=1;
?>

<?php
        $sql_perawat    ="SELECT sipPerawat, namaPerawat, alamatPerawat, tglPerawat, expPerawat FROM masterperawat";
        $hasil_perawat  =mysqli_query($conn, $sql_perawat);
        $no_perawat=1;
?>


<!-- Count File and Load Data-->


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kppasif[0]; ?></div>
                                    <div>Daftar Klinik</div>
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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kpaktif[0]; ?></div>
                                    <div>Daftar Dokter</div>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_kpnakal[0]; ?></div>
                                    <div>Daftar Dokter Gigi</div>
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
                                    <div>Daftar Apoteker</div>
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
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_ass_apoteker[0]; ?></div>
                                    <div>Daftar Ass Apoteker</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#ass_apoteker">
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
                                    <div class="huge"><?php echo $jum_atlm[0]; ?></div>
                                    <div>Daftar ATLM</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#atlm">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_bidan[0]; ?></div>
                                    <div>Daftar Bidan</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#bidan">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jum_perawat[0]; ?></div>
                                    <div>Daftar Perawat</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer" data-toggle="collapse" data-target="#perawat">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                



                <div class="col-lg-3 col-md-6">
                    
                    <!-- Datanya Diagram Pie -->

                    <!-- <div id="demo" class="collapse">
                        <div id="chartContainer" style="height: 480px; width: 430%;" class="col-lg-12"></div>

                        <script src="bootstrap_js/canvasjs.min.js"></script>
                    </div>

                    </div>
                    <br> -->

                    <!-- Datanya Diagram Pie -->
                    
                     <div id="klinik_tenggang" class="collapse">
                        <h2>Daftar Klinik </h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>Id Klinik</th><th>KLINIK PRATAMA</th><th>ALAMAT KLINIK</th><th>TANGGAL CETAK</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_klinik_pasif=mysqli_fetch_assoc($hasil_klinik_tenggang))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_tenggang++;?></td>
                                <td><?php echo $row_klinik_pasif['idKlinik'];?></td>
                                <td><?php echo $row_klinik_pasif['namaKlinik'];?></td>
                                <td><?php echo $row_klinik_pasif['alamatKlinik'];?></td>
                                <td><?php echo $row_klinik_pasif['tgcetakKlinik'];?></td>
                                <td><?php echo $row_klinik_pasif['mbKlinik'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                        </div>
                        </div>
                    
                                    


                    <div id="klinik_aktif" class="collapse">
                        <h2>Daftar Dokter</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP DOKTER</th><th>NAMA DOKTER</th><th>ALAMAT DOKTER</th><th>TANGGAL DOKTER</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_klinik_aktif=mysqli_fetch_assoc($hasil_klinik_aktif))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_aktif++;?></td>
                                <td><?php echo $row_klinik_aktif['sipDokter'];?></td>
                                <td><?php echo $row_klinik_aktif['namaDokter'];?></td>
                                <td><?php echo $row_klinik_aktif['alamatDokter'];?></td>
                                <td><?php echo $row_klinik_aktif['tglDokter'];?></td>
                                <td><?php echo $row_klinik_aktif['expDokter'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>
                    </div>

                    
                    <!-- Datanya -->

                                       <!-- Datanya -->

                    <div id="klinik_nakal" class="collapse">
                        <h2>Daftar Dokter Gigi</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP DOKTER GIGI</th><th>NAMA DOKTER GIGI</th><th>ALAMAT DOKTER GIGI</th><th>TANGGAL DOKTER GIGI</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_klinik_nakal=mysqli_fetch_assoc($hasil_klinik_nakal))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_nakal++;?></td>
                                <td><?php echo $row_klinik_nakal['sipDokterGG'];?></td>
                                <td><?php echo $row_klinik_nakal['namaDokterGG'];?></td>
                                <td><?php echo $row_klinik_nakal['alamatDokterGG'];?></td>
                                <td><?php echo $row_klinik_nakal['tglDokterGG'];?></td>
                                <td><?php echo $row_klinik_nakal['expDokterGG'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>
                    </div>


                    
                    <!-- Datanya -->

                    <div id="klinik_tutup" class="collapse">
                        <h2>Daftar Apoteker</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP APOTEKER</th><th>NAMA APOTEKER</th><th>ALAMAT APOTEKER</th><th>TANGGAL APOTEKER</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_klinik_tutup=mysqli_fetch_assoc($hasil_klinik_tutup))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_klinik_tutup++;?></td>
                                <td><?php echo $row_klinik_tutup['sipApoteker'];?></td>
                                <td><?php echo $row_klinik_tutup['namaApoteker'];?></td>
                                <td><?php echo $row_klinik_tutup['alamatApoteker'];?></td>
                                <td><?php echo $row_klinik_tutup['tglApoteker'];?></td>
                                <td><?php echo $row_klinik_tutup['expApoteker'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>
                    

                
                <div id="ass_apoteker" class="collapse">
                        <h2>Daftar Assisten Apoteker</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP Ass Apoteker</th><th>NAMA Ass Apoteker</th><th>ALAMAT Ass Apoteker</th><th>TANGGAL Ass Apoteker</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_ass_apoteker=mysqli_fetch_assoc($hasil_ass_apoteker))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_ass_apoteker++;?></td>
                                <td><?php echo $row_ass_apoteker['sipAssApoteker'];?></td>
                                <td><?php echo $row_ass_apoteker['namaAssApoteker'];?></td>
                                <td><?php echo $row_ass_apoteker['alamatAssApoteker'];?></td>
                                <td><?php echo $row_ass_apoteker['tgcetakAssApoteker'];?></td>
                                <td><?php echo $row_ass_apoteker['expAssApoteker'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>


                    
                    <div id="atlm" class="collapse">
                        <h2>Daftar ATLM</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP ATLM </th><th>NAMA ATLM</th><th>ALAMAT ATLM</th><th>TANGGAL ATLM</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_atlm=mysqli_fetch_assoc($hasil_atlm))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_atlm++;?></td>
                                <td><?php echo $row_atlm['sipAtlm'];?></td>
                                <td><?php echo $row_atlm['namaAtlm'];?></td>
                                <td><?php echo $row_atlm['alamatAtlm'];?></td>
                                <td><?php echo $row_atlm['tgcetakAtlm'];?></td>
                                <td><?php echo $row_atlm['expAtlm'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>          

                                    
                    <div id="bidan" class="collapse">
                        <h2>Daftar Bidan</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP Bidan </th><th>NAMA Bidan</th><th>ALAMAT Bidan</th><th>TANGGAL Bidan</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_bidan=mysqli_fetch_assoc($hasil_bidan))
                                    {
                            ?>
                            <tr>
                                <td><?php echo $no_bidan++;?></td>
                                <td><?php echo $row_bidan['sipBidan'];?></td>
                                <td><?php echo $row_bidan['namaBidan'];?></td>
                                <td><?php echo $row_bidan['alamatBidan'];?></td>
                                <td><?php echo $row_bidan['tglBidan'];?></td>
                                <td><?php echo $row_bidan['expBidan'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    </div>                     
                    
                    <div id="perawat" class="collapse">
                        <h2>Daftar Perawat</h2>
                        <table class="table table-striped table-bordered small">
                            <tr>
                                <th>NO</th><th>SIP Perawat </th><th>NAMA Perawat</th><th>ALAMAT Perawat</th><th>TANGGAL Perawat</th><th>MASA BERLAKU</th>
                            </tr>
                            <?php
                                while($row_perawat=mysqli_fetch_assoc($hasil_perawat))
                                    {   
                            ?>
                            <tr>
                                <td><?php echo $no_perawat++;?></td>
                                <td><?php echo $row_perawat['sipPerawat'];?></td>
                                <td><?php echo $row_perawat['namaPerawat'];?></td>
                                <td><?php echo $row_perawat['alamatPerawat'];?></td>
                                <td><?php echo $row_perawat['tglPerawat'];?></td>
                                <td><?php echo $row_perawat['expPerawat'];?></td>
                                
                            </tr>
                            <?php
                                    }
                            ?>
                        </table>
                    


<?php 
include 'footer.php';

?>