<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	// include 'cek.php';
	include '../config.php';
	?>
	<title>Sistem Informai SDK - DINKES</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery-ui/jquery-ui.js"></script>
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">SDK - DINKES</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Assalamualaikum , <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-2">
		<div class="row">
			<?php
			$use=$_SESSION['username'];
			$fo=mysqli_query($conn,"SELECT foto from Admin where Username='$use'");
			while($f=mysqli_fetch_array($fo)){
				?>

				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="../foto/<?php echo $f['foto']; ?>">
					</a>
				</div>
				<?php
			}
			?>
		</div>

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			
			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-search"></span>  Pencarian <b class="caret"></b></a>
                	<ul class="dropdown-menu">
                    <li><a href="../fixExport.php">Nama Klinik</a></li>
                    <li><a href="../fixExport1.php">Nama SDMK</a></li>
                </ul>
            </li>

			<li><a href="../datapemohonasli.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span>Data Sarana</a></li>

			<li><a href="../kecamatan_data.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span>Data Kecamatan</a></li>

			<li><a href="../kelurahan_data.php" name="databarang"><span class="glyphicon glyphicon-briefcase"></span>Data Kelurahan</a>
			</li>
			

			<!-- <li><a href="pengawasan.php" name="penjualan"><span class="glyphicon glyphicon-print"></span>Pengawasan</a></li> -->

			<!-- <li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li> -->

			<li><a href="../ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>

			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
	<div class="col-md-10">
