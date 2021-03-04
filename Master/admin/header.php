<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	// include 'Klinik_Pratamacoba/login_act.php';
	include 'config.php';
	?>
	<title>Sistem Informai SDK - DINKES</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="script/jquery-min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>

	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<table border="0">
				<tr>
					<td><a href="index.php"><img width=100 height=70 src='foto/logo.png' /></a></td>
					<td><h5>DINAS KESEHATAN KOTA SURABAYA<br>Jl. Raya Jemursari No.197 <br>Kota Surabaya, Jawa Timur - 60239</h5></td>				
				</tr>
			</table>		
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class="col-md-2">
		<div class="row">
			<?php 
			$use= $_SESSION['username'];
			$fo=mysqli_query($conn,"SELECT foto from Admin where username='$use'");
			while($f=mysqli_fetch_array($fo)){
				?>				

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php 
			}
			?>		
		</div>
		

		<div class="row"></div>
		
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>			
			<!-- <li><a href="fixExport.php" name="cari"><span class="glyphicon glyphicon-search"></span> Pencarian</a></li> -->

			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-search"></span>  Pencarian <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="fixExport.php">Nama Klinik</a></li>
                    <li><a href="fixExport1.php">Nama SDMK</a></li>
                </ul>
            </li>
				
			<li><a href="datapemohonasli.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span> Data Sarana</a></li>
			<li><a href="sdmkPilihan.php" name="penjualan"><span class="glyphicon glyphicon-briefcase"></span> Data SDMK</a></li>
			<li><a href="kecamatan_data.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span>Data Kecamatan</a></li>

			<li><a href="kelurahan_data.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span>Data Kelurahan</a>
			</li>        												
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
		
	</div>
	<div class="col-md-10">