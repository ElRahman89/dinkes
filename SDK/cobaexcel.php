<?php
/* 
-- --------------------------------------------------------
-- --------------------------------------------------------
-- Nama File : cetak-laporan.php  
-- Author    : Fitri Ariyanto 
-- Email     : seorang.fitri@gmail.com
-- Website   : http://usersonly.wordpress.com/ || http://phpbejo.blogspot.com 
-- Copyright [c] 2017 Fitri Ariyanto 
-- --------------------------------------------------------
*/
 
//  header("Content-Type: application/force-download");
//  header("Cache-Control: no-cache, must-revalidate");
//  header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
//  header("content-disposition: attachment;filename=laporan_pengguna_login".date('dmY').".xls");

$arrayNamaKlinik = array();
if(isset($_POST['search'])){
    $conn=mysqli_connect("localhost","root","","integrasi");
    $namaKlinik = $_POST['search_text'];
    $sql = "select * from masterklinik where namaKlinik like '%$namaKlinik%'";
} else {
  $queryKeterangan = "select Badan_Hukum, No_Notaris_atau_Menteri_Kehakiman, Tempat_Kedudukan, No_IMB , Klinik_Pratama ,
  Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku ,Tgl_JatuhTempo from sdk.data_pemohon b join integrasi.masterklinik a on
  b.Klinik_Pratama = a.namaKlinik
  where Klinik_Pratama like'%$namaKlinik%'";
$resultKeterangan = mysqli_query($conn, $queryKeterangan);
}

    $result = mysqli_query($conn,$sql);

  echo '<table border="1" align="center">
 <tr>
  <td style="background:#EEE;font-weight:bold;">No.</td>
  <td style="background:#EEE;font-weight:bold;">User</td>
  <td style="background:#EEE;font-weight:bold;">Hak Akses</td>
  <td style="background:#EEE;font-weight:bold;">Password</td>
 </tr>';

 $no = 1;
  while ($rowKeterangan=mysqli_fetch_assoc($resultKeterangan)){
  echo '
   <tr>
    <td>' . $no++ . '.</td>
    <td>' . $data['Badan_Hukum'] . '</td>
    <td>' . $data['No_Notaris_atau_Menteri_Kehakiman'] . '</td>
    <td>' . $data['Tempat_Kedudukan'] . '</td>
   </tr>';
 }
 echo '</table>';




