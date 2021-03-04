<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SDK - DINKES</title>
</head>
<body>
	<div class="col-lg-8">
		<h1>Silahkan Pilih Kolom yang dibutuhkan :</h1>
		<div class="col-md-4">
			
			<form action="" method="post">
			<input type="checkbox" name="check1" value="Nama_Klinik">Nama_Klinik<br/>
			<input type="checkbox" name="check2" value="Alamat_Klinik">Alamat_Klinik<br/>
			<input type="checkbox" name="check3" value="Penanggung_Jawab">Penanggung_Jawab<br/>
			<input type="checkbox" name="check4" value="Dokter">Dokter<br/>
			
		</div>
		<div class="col-md-4">
			
			<input type="checkbox" name="check1" value="Bidan">Bidan<br/>
			<input type="checkbox" name="check2" value="SIP">SIP<br/>
			<input type="checkbox" name="check3" value="Tgl_Aktif">Tgl_Aktif<br/>
			<input type="checkbox" name="check4" value="Tgl_Mati">Tgl_Mati<br/>
			
		</div>

		<div class="col-md-8">
			<br>
			<br>
					<td><input type="submit" name="lihat" class="btn btn-default" value="Lihat Data"></td>	
					<td>|</td>
					<td><input type="submit" name="cetak_excel" class="btn btn-default" data-target="#klinik_nakal" value="Cetak Exel"></td>		
					<td><input type="submit" name="cetak_pdf" class="btn btn-default" value="Cetak PDF"></td>		
		</div>
		
			</form>
	</div>

			<div class="col-md-9">

				<hr align="right">
				<br>

				<?php  
				 if(isset($_POST['lihat']))  
				 {  
				  echo "Kolom yang dipilih:<br/>";  
				  if (isset($_POST['check1'])) {  
				  echo $_POST['check1']." <br/>";  
				  }  
				  if (isset($_POST['check2'])) {  
				  echo $_POST['check2']." <br/>";  
				  }  
				  if (isset($_POST['check3'])) {  
				  echo $_POST['check3']." <br/>";  
				  }  
				  if (isset($_POST['check4'])) {  
				  echo $_POST['check4']." <br/>";  
				  }  
				 }  
				 ?>
			</div>



		
</body>
</html>