<?php  
//export.php  
$conn = mysqli_connect("localhost", "root", "", "sdk");
$output = '';
if(isset($_POST["export_tutup"]))
{
 $query = "SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, Keterangan_Pemohon FROM data_pemohon WHERE Keterangan_Pemohon LIKE '%TUTUP%'";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Nama Klinik</th>  
                         <th>Alamat Klinik</th>  
                         <th>Penanggung Jawab</th>  
        				         <th>Tanggal Berlaku</th>
        				         <th>Tanggal Jatuh Tempo</th>
        				         <th>Keterangan Pemohon</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["Klinik_Pratama"].'</td>  
                         <td>'.$row["Alamat_Klinik"].'</td>  
                         <td>'.$row["Penanggung_Jawab"].'</td>  
        				         <td>'.$row["Tgl_Berlaku"].'</td>  
                         <td>'.$row["Tgl_JatuhTempo"].'</td>
        				         <td>'.$row["Keterangan_Pemohon"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  $klinik_tutup = 'Klinik_Tutup_'.date('Y-m-d').'.xls';
  header('Content-Type: application/xls');
  header("Content-Disposition: attachment; filename=$klinik_tutup");
  echo $output;
 }
}
?>