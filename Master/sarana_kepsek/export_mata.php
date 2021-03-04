<?php  
//export.php  
$conn = mysqli_connect("localhost", "root", "", "sdk");
$output = '';
if(isset($_POST["export_mata"]))
{
 $query = "SELECT Klinik_Pratama, Alamat_Klinik, Penanggung_Jawab, Tgl_Berlaku, Tgl_JatuhTempo, Keterangan_Pemohon, status_io, status_im FROM Data_Pemohon where klasifikasi Like '%mata%'";
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
        				         <th>Status Izin Operasional</th>
        				         <th>Status Izin Mendirikan</th>
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
        				         <td>'.$row["status_io"].'</td>
        				         <td>'.$row["status_im"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  $klinik_mata = 'Klinik_Mata_'.date('Y-m-d').'.xls';
  header('Content-Type: application/xls');
  header("Content-Disposition: attachment; filename=$klinik_mata");
  echo $output;
 }
}
?>