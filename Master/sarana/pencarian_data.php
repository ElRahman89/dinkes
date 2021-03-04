<?php  
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Searching</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap_js/bootstrap.min.css">
<script src="bootstrap_js/jquery.min.js"></script>
<script src="bootstrap_js/bootstrap.min.js"></script>
</head>
<body>

<?php 
include 'config.php';
?>
<div class="container" style="padding-top: 20px; padding-bottom: 20px;">
 <h3>Form Pencarian SDM Klinik</h3>
 <hr>
 <div class="row">
  <div class="col-sm-4">

    <form role="form" action="pencarian_data.php" method="get">
       <div class="form-group">
         <label>Cari :</label>
         <input type="text" name="cari" class="form-control">     
       </div>
       <button type="submit" class="btn btn-info btn-block" value="cari">Search</button>
    </form> 

  </div>
 </div> 
<br>
<br>
 <div class="row">
 	<div class="col-md-6">
 		<div class="col-sm-8">
    
  <table class="table table-striped">

      <tr>
       <th>No</th>
       <th>Klinik</th>
       <th>Dokter</th>
       <th>Dokter Gigi</th>
       <th>Apoteker</th>
       <th>Asisten Apoteker</th>
       <th>Perawat</th>
       <th>Bidan</th>
       <th>Atlm</th>
       <th>Tanggal Berlaku</th>
       <th>Tanggal Jatuh Tempo</th>
      </tr>

      <?php 
        if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($conn, "SELECT * from Klinik_SDM where id_klinik like '%".$cari."%'");    
        }else{
        $data = mysqli_query($conn, "SELECT * from Klinik_SDM");  
        }
        $no = 1;
        while($d = mysqli_fetch_array($data)){
      ?>
      <tr>
       <td><?php echo $no++ ?></td>
       <td><?php echo $d['id_klinik']; ?></td>
       <td><?php echo $d['id_dokter']; ?></td>
       <td><?php echo $d['id_dokterGG']; ?></td>
       <td><?php echo $d['id_apoteker']; ?></td>
       <td><?php echo $d['id_assapoteker']; ?></td>
       <td><?php echo $d['id_perawat']; ?></td>
       <td><?php echo $d['id_bidan']; ?></td>
       <td><?php echo $d['id_atlm']; ?></td>
       <td><?php echo $d['Tgl_Berlaku']; ?></td>
       <td><?php echo $d['Tgl_JatuhTempo']; ?></td>
      </tr>
      <?php } ?>
  </table>   
  </div> 
 	</div>
 </div>  
 </div>  
</body>
</html>