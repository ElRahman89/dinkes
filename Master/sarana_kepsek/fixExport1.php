<?php
$arrayNamaKlinik = array();
if(isset($_POST['search'])){
    $conn=mysqli_connect("localhost","root","","integrasi");
    $namaKlinik = $_POST['search_text'];
  

    $sql = "SELECT * from masterklinik where pjKlinik like '%$namaKlinik%'";
    $result = mysqli_query($conn,$sql);
    
  };
       ?>

<html>
     <head>
        <title>PENCARIAN DATA SDM</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
        <script src="script/jquery-min.js"></script>
        <script src="script/bootstrap.min.js"></script>
        <script src="script/jquery-ui-min.js"></script>

        <script>
        function showDiv() {
            document.getElementById('search').style.display = "block";
              }

       $(function() {
         $("#search_text").autocomplete({
            source: "search1.php",
              });

          });
       </script>
       
     </head>
     <body background="foto/art.jpeg" style="background-repeat:repeat; background-size: 100%; background-position:auto; ">
     
          
    <div class="navbar navbar-default" style="width=510px; height:70px">
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
				</ul>
			</div>
		</div>
	</div>

        
<div id="search" class="container">
  <h1 style="color:black; font-weight: 750;" align="center">Pencarian Informasi Data SDM</h1><br />
  <br />
    <form name="form_search" action="" method="post" class="form-inline">
      <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <h4 style="color: black; font-weight: 750;">Cari berdasarkan Nama SDM</h4>      
      &nbsp;&nbsp;&nbsp;
        <input style="height: 50px; width:955px" type="text" name="search_text" id="search_text" placeholder="Tuliskan Nama SDM" class="form-control">
        <input style="height: 50px; width:150px" type="submit" name="search" value="Cari" onclick="showdiv()" class="btn btn-default"/>
    <!-- </div> -->
    </form>
</div>
  <br />

  <div id="hasil_search" display:"block" class="container" style="auto: 40px; width:auto; ">
  <?php
  if(isset($_POST['search'])){
  while($row = mysqli_fetch_assoc($result)){
echo  '<div class="panel-group" id="posts">';
echo  ' <div class="panel panel-default">';
echo      '<div class="panel-heading" style="background-color: white" >';
echo   '     <h4 class="panel-tittle" style="color:black;" >';
echo     '       <a href="#'.$row["idKlinik"].'" data-toggle="collapse" style="text-decoration: none; color:black" data-parent="#posts">'.$row["namaKlinik"].'</a>';
echo      '  </h4>';
echo      '</div>';
echo'      <div id='.$row["idKlinik"].' class="panel-collapse collapse">';

// ACCORDION KETERANGAN KLINIK
echo '<div class="panel-body">';
echo '<div class="panel-group" id="accordion1">
  <div class="panel">
     <div class="panel-heading">
<h4 class="panel-title">
  <a data-toggle="collapse" data-parent="#accordion1" style="text-decoration: none" href="#inside1">Keterangan Klinik</a>
</h4>
</div>
<div id="inside1" class="panel-collapse collapse">
      <div class="panel-body">';
        $queryKeterangan = "select Badan_Hukum, No_Notaris_atau_Menteri_Kehakiman, Tempat_Kedudukan, No_IMB , Klinik_Pratama ,
                            Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku ,Tgl_JatuhTempo from sdk.data_pemohon b join integrasi.masterklinik a on
                            b.Klinik_Pratama = a.namaKlinik
                            where Klinik_Pratama like'%$namaKlinik'";
        $resultKeterangan = mysqli_query($conn, $queryKeterangan);
echo '<h4> Informasi Klinik </h4>';
        while ($rowKeterangan=mysqli_fetch_assoc($resultKeterangan)){
           echo '<h5> Badan Hukum : '.$rowKeterangan['Badan_Hukum']; echo '</h5>';
           echo '<h5> No dan Tanggal Akte Notaris : '.$rowKeterangan['No_Notaris_atau_Menteri_Kehakiman'];
           echo '<h5> Tempat Kedudukan : '.$rowKeterangan['Tempat_Kedudukan'];  echo '</h5>';
           echo '<h5> No. Izin Mendirikan Bangunan : '.$rowKeterangan['No_IMB'];  echo '</h5>';
           echo '<h5> Nama Klinik : '.$rowKeterangan['Klinik_Pratama'];  echo '</h5>';
           echo '<h5> Alamat Klinik : '.$rowKeterangan['Alamat_Klinik']; echo '</h5>';
           echo '<h5> Penanggun Jawab Klinik : '.$rowKeterangan['Penanggung_Jawab'];  echo '</h5>';
           echo '<h5> Berlaku : '.$rowKeterangan['Tgl_Berlaku']; echo ' s/d ';  echo $rowKeterangan['Tgl_JatuhTempo'];  echo '</h5>';
        };
echo
    '</div>
    </div>
    </div>
</div>';

// ACCORDION SARANA DAN PRASARANA KLINIK
echo '<div class="panel">
  <div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion1" style="text-decoration: none" href="#inside2">Sarana&Prasarana Klinik</a>
</h4>
</div>
<div id="inside2" class="panel-collapse collapse">
  <div class="panel-body">';
  $querySarana = "select Jenis_Pelayanan from sdk.data_pemohon b join integrasi.masterklinik a on
  b.Klinik_Pratama = a.namaKlinik
  where Klinik_Pratama like'%$namaKlinik'";
$resultSarana = mysqli_query($conn, $querySarana);
echo '<h5> Jenis Pelayanan </h5>';
while ($rowKeterangan=mysqli_fetch_assoc($resultSarana)){
echo $rowKeterangan['Jenis_Pelayanan'];
}; 
 echo 
    '</div>
</div>
</div>';
// ACCORDION SDM Klinik
echo '<div class="panel">
  <div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion1" style="text-decoration: none" href="#inside3">SDM Klinik</a>
</h4>
</div>
<div id="inside3" class="panel-collapse collapse">';
$idk = $row["idKlinik"]
?>
<form action="export_excel2.php" method="POST" target="_BLANK"> 
<button type="submit" value="<?php echo $idk;?>" name="namaklinik" class="btn btn-default btn-md" style="border:0px; margin-left: 90%;"><span class="glyphicon glyphicon-print"></span> Export </button>
</form>
<!-- <button type="button" class="btn btn-default btn-md" style="border:0px; margin-left: 90%;" onclick="tablesToExcel(['tbl1','tbl2','tbl3','tbl4','tbl5','tbl6','tbl7'], ['Data Dokter','Data Dokter Gigi','Data Perawat','Data Bidan','Data Apoteker', 'Data Asisten Apoteker', 'Data ATLM'],'TestBook.xls', 'Excel')">
          <a href="#" style="text-decoration: none;">
          <span class="glyphicon glyphicon-print"></span> Export </a>
</button> -->



<?php

echo '<div class="panel-body">';

                  $conn=mysqli_connect("localhost","root","","integrasi");
                  $queryNamaDokter = "select sipDokter,namaDokter, alamatDokter, tlDokter,DATE_FORMAT(tglDokter,'%d-%m-%Y') as'tglDokter',
                                      DATE_FORMAT(expDokter, '%d-%m-%Y') as expDokter
                                      from masterdokter join masterklinik on masterdokter.idKlinik = masterKlinik.idKlinik
                                      where masterDokter.idKlinik = ".$row["idKlinik"];
                  $resultNamaDokter = mysqli_query($conn, $queryNamaDokter);
  echo '<h4> Data Dokter </h4>';
                  if (mysqli_num_rows($resultNamaDokter) > 0){
                    echo' <table id="tbl1" class="table table-bordered">';
                    echo' <tr>
                              <th class="col-md-2"><small>SIP Dokter</small></th>
                              <th class="col-md-1"><small>Nama Dokter</small></th>
                              <th class="col-md-1"><small>Alamat Dokter</small></th>
                              <th class="col-md-1"><small>TTL Dokter</small></th>
                              <th class="col-md-1"><small>Berlaku Sampai</small></th>
                        </tr>';
                  while ($rowDokter=mysqli_fetch_assoc($resultNamaDokter)){
                     echo '<tr>';
                     echo '<td>'; echo$rowDokter['sipDokter']; echo '</td>';
                     echo '<td>'; echo$rowDokter['namaDokter']; echo '</td>';
                     echo '<td>'; echo$rowDokter['alamatDokter']; echo '</td>';
                     echo '<td>'; echo$rowDokter['tlDokter']; echo ', '; echo $rowDokter['tglDokter'];
                     echo '<td>'; echo$rowDokter['expDokter']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                echo "Tidak Ada Data";
                echo' <table id="tbl1" class="table table-bordered">';
                echo' <tr>
                          <th class="col-md-2"><small>SIP Dokter</small></th>
                          <th class="col-md-1"><small>Nama Dokter</small></th>
                          <th class="col-md-1"><small>Alamat Dokter</small></th>
                          <th class="col-md-1"><small>TTL Dokter</small></th>
                          <th class="col-md-1"><small>Berlaku Sampai</small></th>
                    </tr>';
              };
  echo'        </table>';
  echo '<br/><br/>';

  // TABEL DOKTER GIGI
                  $queryNamaDokterGG = "select sipDokterGG,namaDokterGG, alamatDokterGG, tlDokterGG,
                                        DATE_FORMAT(tglDokterGG, '%d-%m-%Y')as 'tglDokterGG', DATE_FORMAT(expDokterGG, '%d-%m-%Y') as 'expDokterGG'
                                        from masterdoktergg join masterklinik on masterdoktergg.idKlinik = masterKlinik.idKlinik
                                        where masterDoktergg.idKlinik = ".$row["idKlinik"];
                  $resultNamaDokterGG = mysqli_query($conn, $queryNamaDokterGG);
  echo '<h4> Data Dokter Gigi </h4>';
                  if (mysqli_num_rows($resultNamaDokterGG) > 0){
                    echo' <table id="tbl2" class="table table-bordered">';
                    echo' <tr>
                              <th class="col-md-2"><small>SIP Dokter</small></th>
                              <th class="col-md-1"><small>Nama Dokter</small></th>
                              <th class="col-md-1"><small>Alamat Dokter</small></th>
                              <th class="col-md-1"><small>TTL Dokter</small></th>
                              <th class="col-md-1"><small>Berlaku Sampai</small></th>
                        </tr>';
                  while ($rowDokterGG=mysqli_fetch_assoc($resultNamaDokterGG)){
                     echo '<tr>';
                     echo '<td>'; echo$rowDokterGG['sipDokterGG']; echo '</td>';
                     echo '<td>'; echo$rowDokterGG['namaDokterGG']; echo '</td>';
                     echo '<td>'; echo$rowDokterGG['alamatDokterGG']; echo '</td>';
                     echo '<td>'; echo$rowDokterGG['tlDokterGG']; echo ', '; echo $rowDokterGG['tglDokterGG'];
                     echo '<td>'; echo$rowDokterGG['expDokterGG']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                echo "Tidak Ada Data";
                echo' <table id="tbl2" class="table table-bordered">';
                echo' <tr>
                          <th class="col-md-2"><small>SIP Dokter</small></th>
                          <th class="col-md-1"><small>Nama Dokter</small></th>
                          <th class="col-md-1"><small>Alamat Dokter</small></th>
                          <th class="col-md-1"><small>TTL Dokter</small></th>
                          <th class="col-md-1"><small>Berlaku Sampai</small></th>
                    </tr>';
              };
  echo'        </table>';
  echo '<br/><br/>';

  //Tabel Perawat
                  $queryNamaPerawat = "select sipPerawat,namaPerawat, alamatPerawat, tlPerawat,
                                       DATE_FORMAT(tglPerawat,'%d-%m-%Y') AS 'tglPerawat', DATE_FORMAT(expPerawat, '%d-%m-%Y') as 'expPerawat'
                                       from masterperawat join masterklinik on masterperawat.idKlinik = masterKlinik.idKlinik
                                       where masterperawat.idKlinik = ".$row["idKlinik"];
                  $resultNamaPerawat = mysqli_query($conn, $queryNamaPerawat);
  echo '<h4> Data Perawat </h4>';
                  if (mysqli_num_rows($resultNamaPerawat) > 0){
                    echo' <table id="tbl3" class="table table-bordered">';
                    echo' <tr>
                              <th class="col-md-2"><small>SIP Perawat</small></th>
                              <th class="col-md-1"><small>Nama Perawat</small></th>
                              <th class="col-md-1"><small>Alamat Perawat</small></th>
                              <th class="col-md-1"><small>TTL Perawat</small></th>
                              <th class="col-md-1"><small>Berlaku Sampai</small></th>
                        </tr>';
                  while ($rowPerawat=mysqli_fetch_assoc($resultNamaPerawat)){
                     echo '<tr>';
                     echo '<td>'; echo$rowPerawat['sipPerawat']; echo '</td>';
                     echo '<td>'; echo$rowPerawat['namaPerawat']; echo '</td>';
                     echo '<td>'; echo$rowPerawat['alamatPerawat']; echo '</td>';
                     echo '<td>'; echo$rowPerawat['tlPerawat']; echo ', '; echo$rowPerawat['tglPerawat']; echo '</td>';
                     echo '<td>'; echo$rowPerawat['expPerawat']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                  echo "Tidak Ada Data";
                  echo' <table id="tbl3" class="table table-bordered">';
                  echo' <tr>
                            <th class="col-md-2"><small>SIP Perawat</small></th>
                            <th class="col-md-1"><small>Nama Perawat</small></th>
                            <th class="col-md-1"><small>Alamat Perawat</small></th>
                            <th class="col-md-1"><small>TTL Perawat</small></th>
                            <th class="col-md-1"><small>Berlaku Sampai</small></th>
                      </tr>';
                };
  echo'        </table>';
  echo '<br/><br/>';

  //Tabel Bidan
                  $queryNamaBidan = "select sipBidan,namaBidan, alamatBidan, tlBidan,
                                      DATE_FORMAT(tglBidan, '%d-%m-%Y') AS 'tglBidan' , DATE_FORMAT(expBidan, '%d-%m-%Y') as 'expBidan'
                                        from masterbidan join masterklinik on masterbidan.idKlinik = masterKlinik.idKlinik
                                        where masterbidan.idKlinik = ".$row["idKlinik"];
                  $resultNamaBidan = mysqli_query($conn, $queryNamaBidan);
  echo '<h4> Data Bidan </h4>';
                  if (mysqli_num_rows($resultNamaBidan) > 0){
                    echo' <table id="tbl4" class="table table-bordered">';
                    echo' <tr>
                              <th class="col-md-2"><small>SIP Bidan</small></th>
                              <th class="col-md-1"><small>Nama Bidan</small></th>
                              <th class="col-md-1"><small>Alamat Bidan</small></th>
                              <th class="col-md-1"><small>TTL Bidan</small></th>
                              <th class="col-md-1"><small>Berlaku Sampai</small></th>
                        </tr>';
                  while ($rowBidan=mysqli_fetch_assoc($resultNamaBidan)){
                     echo '<tr>';
                     echo '<td>'; echo$rowBidan['sipBidan']; echo '</td>';
                     echo '<td>'; echo$rowBidan['namaBidan']; echo '</td>';
                     echo '<td>'; echo$rowBidan['alamatBidan']; echo '</td>';
                     echo '<td>'; echo$rowBidan['tlBidan']; echo ', ';  echo$rowBidan['tglBidan']; echo '</td>';
                     echo '<td>'; echo$rowBidan['expBidan']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                  echo "Tidak Ada Data";
                  echo' <table id="tbl4" class="table table-bordered">';
                  echo' <tr>
                            <th class="col-md-2"><small>SIP Bidan</small></th>
                            <th class="col-md-1"><small>Nama Bidan</small></th>
                            <th class="col-md-1"><small>Alamat Bidan</small></th>
                            <th class="col-md-1"><small>TTL Bidan</small></th>
                            <th class="col-md-1"><small>Berlaku Sampai</small></th>
                      </tr>';
                };
  echo'        </table>';
  echo '<br/><br/>';

  //Tabel Apoteker
                  $queryNamaApoteker = "select sipApoteker,namaApoteker, alamatApoteker, tlApoteker,
                                        DATE_FORMAT(tglApoteker, '%d-%m-%Y') as 'tglApoteker' , DATE_FORMAT(expApoteker, '%d-%m-%Y') as 'expApoteker'
                                        from masterapoteker join masterklinik on masterapoteker.idKlinik = masterKlinik.idKlinik
                                        where masterapoteker.idKlinik = ".$row["idKlinik"];
                  $resultNamaApoteker = mysqli_query($conn, $queryNamaApoteker);
  echo '<h4> Data Apoteker </h4>';
                  if (mysqli_num_rows($resultNamaApoteker) > 0){
                    echo' <table id="tbl5" class="table table-bordered">';
                    echo' <tr>
                             <th class="col-md-2"><small>SIP Apoteker</small></th>
                             <th class="col-md-1"><small>Nama Apoteker</small></th>
                             <th class="col-md-1"><small>Alamat Apoteker</small></th>
                             <th class="col-md-1"><small>TTL Apoteker</small></th>
                             <th class="col-md-1"><small>Berlaku Sampai</small></th>
                       </tr>';
                  while ($rowApoteker=mysqli_fetch_assoc($resultNamaApoteker)){
                     echo '<tr>';
                     echo '<td>'; echo$rowApoteker['sipApoteker']; echo '</td>';
                     echo '<td>'; echo$rowApoteker['namaApoteker']; echo '</td>';
                     echo '<td>'; echo$rowApoteker['alamatApoteker']; echo '</td>';
                     echo '<td>'; echo$rowApoteker['tlApoteker']; echo ', '; echo$rowApoteker['tglApoteker']; echo '</td>';
                     echo '<td>'; echo$rowApoteker['expApoteker']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                  echo "Tidak Ada Data";
                  echo' <table id="tbl5" class="table table-bordered">';
                  echo' <tr>
                           <th class="col-md-2"><small>SIP Apoteker</small></th>
                           <th class="col-md-1"><small>Nama Apoteker</small></th>
                           <th class="col-md-1"><small>Alamat Apoteker</small></th>
                           <th class="col-md-1"><small>TTL Apoteker</small></th>
                           <th class="col-md-1"><small>Berlaku Sampai</small></th>
                     </tr>';
                };
  echo'        </table>';
  echo '<br/><br/>';

  //Tabel Asisten Apoteker
                  $queryNamaAssApoteker = "select sipAssApoteker,namaAssApoteker, alamatAssApoteker, tlAssApoteker,
                                           DATE_FORMAT(tglAssApoteker, '%d-%m-%Y') AS 'tglAssApoteker', DATE_FORMAT(expAssApoteker, '%d-%m-%Y') AS 'expAssApoteker'
                                           from masterassapoteker join masterklinik on masterassapoteker.idKlinik = masterKlinik.idKlinik
                                           where masterassapoteker.idKlinik = ".$row["idKlinik"];
                  $resultNamaAssApoteker = mysqli_query($conn, $queryNamaAssApoteker);
  echo '<h4> Data A.Apoteker </h4>';
                  if (mysqli_num_rows($resultNamaAssApoteker) > 0){
                    echo' <table id="tbl6" class="table table-bordered">';
                    echo' <tr>
                              <th class="col-md-2"><small>SIP A.Apoteker</small></th>
                              <th class="col-md-1"><small>Nama A.Apoteker</small></th>
                              <th class="col-md-1"><small>Alamat A.Apoteker</small></th>
                              <th class="col-md-1"><small>TTL A.Apoteker</small></th>
                              <th class="col-md-1"><small>Berlaku Sampai</small></th>
                        </tr>';
                  while ($rowAssApoteker=mysqli_fetch_assoc($resultNamaAssApoteker)){
                     echo '<tr>';
                     echo '<td>'; echo$rowAssApoteker['sipAssApoteker']; echo '</td>';
                     echo '<td>'; echo$rowAssApoteker['namaAssApoteker']; echo '</td>';
                     echo '<td>'; echo$rowAssApoteker['alamatAssApoteker']; echo '</td>';
                     echo '<td>'; echo$rowAssApoteker['tlAssApoteker']; echo ', '; echo$rowAssApoteker['tglAssApoteker']; echo '</td>';
                     echo '<td>'; echo$rowAssApoteker['expAssApoteker']; echo '</td>';
                     echo '</tr>';
                  };
                }
                else{
                  echo "Tidak Ada Data";
                  echo' <table id="tbl6" class="table table-bordered">';
                  echo' <tr>
                            <th class="col-md-2"><small>SIP A.Apoteker</small></th>
                            <th class="col-md-1"><small>Nama A.Apoteker</small></th>
                            <th class="col-md-1"><small>Alamat A.Apoteker</small></th>
                            <th class="col-md-1"><small>TTL A.Apoteker</small></th>
                            <th class="col-md-1"><small>Berlaku Sampai</small></th>
                      </tr>';
                };
  echo'        </table>';
  echo '<br/><br/>';

    //Tabel ATLM
    $queryNamaATLM = "select sipAtlm,namaAtlm, alamatAtlm, tlAtlm,
    DATE_FORMAT(tglAtlm, '%d-%m-%Y') AS 'tglAtlm', DATE_FORMAT(expAtlm, '%d-%m-%Y') AS 'expAtlm'
    from masteratlm join masterklinik on masteratlm.idKlinik = masterKlinik.idKlinik
    where masteratlm.idKlinik = ".$row["idKlinik"];
$resultATLM = mysqli_query($conn, $queryNamaATLM);
echo '<h4> Data ATLM </h4>';
if (mysqli_num_rows($resultATLM) > 0){
echo' <table id="tbl7" class="table table-bordered">';
echo' <tr>
<th class="col-md-2"><small>SIP ATLM</small></th>
<th class="col-md-1"><small>Nama ATLM</small></th>
<th class="col-md-1"><small>Alamat ATLM</small></th>
<th class="col-md-1"><small>TTL ATLM</small></th>
<th class="col-md-1"><small>Berlaku Sampai</small></th>
</tr>';
while ($rowATLM=mysqli_fetch_assoc($resultATLM)){
echo '<tr>';
echo '<td>'; echo $rowATLM['sipAtlm']; echo '</td>';
echo '<td>'; echo $rowATLM['namaAtlm']; echo '</td>';
echo '<td>'; echo $rowATLM['alamatAtlm']; echo '</td>';
echo '<td>'; echo $rowATLM['tlAtlm']; echo ', '; echo$rowATLM['tglAtlm']; echo '</td>';
echo '<td>'; echo $rowATLM['expAtlm']; echo '</td>';
echo '</tr>';
};
}
else{
echo "Tidak Ada Data";
echo' <table id="tbl7" class="table table-bordered">';
echo' <tr>
<th class="col-md-2"><small>SIP ATLM</small></th>
<th class="col-md-1"><small>Nama ATLM</small></th>
<th class="col-md-1"><small>Alamat ATLM</small></th>
<th class="col-md-1"><small>TTL ATLM</small></th>
<th class="col-md-1"><small>Berlaku Sampai</small></th>
</tr>';
};
echo'        </table>';
echo '<br/>';
  echo'      </div>';
  echo'    </div>';
  echo'   </div>';
        };
      };
    ?>
</div>
</div>
</div>
</div>
<script type="text/javascript">
       /*var tablesToExcel = (function() {*/
        var tablesToExcel = (function() {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , tmplWorkbookXML = <?php echo '<?xml version="1.0"?>' ; ?><?php echo '<?mso-application progid="Excel.Sheet"?>';?>'<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
          + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>Axel Richter</Author><Created>{created}</Created></DocumentProperties>'
          + '<Styles>'
          + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
          + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
          + '</Styles>'
          + '{worksheets}</Workbook>'
        , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
        , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
        , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
        return function(tables, wsnames, wbname, appname) {
          var ctx = "";
          var workbookXML = "";
          var worksheetsXML = "";
          var rowsXML = "";

          for (var i = 0; i < tables.length; i++) {
            if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
            for (var j = 0; j < tables[i].rows.length; j++) {
              rowsXML += '<Row>'
              for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
                var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
                var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
                var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
                dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
                var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
                dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
                ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                       , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                       , data: (dataFormula)?'':dataValue
                       , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                      };
                rowsXML += format(tmplCellXML, ctx);
              }
              rowsXML += '</Row>'
            }
            ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
            worksheetsXML += format(tmplWorksheetXML, ctx);
            rowsXML = "";
          }

          ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
          workbookXML = format(tmplWorkbookXML, ctx);



          var link = document.createElement("A");
          link.href = uri + base64(workbookXML);
          link.download = wbname || 'Workbook.xls';
          link.target = '_blank';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
        }
      })();
     </script>
