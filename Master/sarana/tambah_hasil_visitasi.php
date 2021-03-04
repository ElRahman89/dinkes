<?php 
include 'config.php';
if(isset($_POST['ubah'])){
        $idhv=$_POST['idhv'];
        $tgl_tindakan=$_POST['tgl_tindakan'];
        $pemberi_info=$_POST['pemberi_info'];
        $penerima_info=$_POST['penerima_info'];
        $tindakan_melalui=$_POST['tindakan_melalui'];
        $hasil_visitasi=$_POST['hasil_visitasi'];
    // $ceknm = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM daftar_klinik WHERE No='$idk'"));
    // $nama = $ceknm['Nama_KlinikPratama'];

    mysqli_query($conn, "UPDATE tindakan_hasil_visitasi SET pemberi_info_hv = '$pemberi_info', penerima_info_hv = '$penerima_info', tgl_tindakan_hv = '$tgl_tindakan', tindakan_melalui_hv = '$tindakan_melalui', hasil_tindakan_hv = '$hasil_visitasi' WHERE idtindakanhv = '$idhv'");

    header("location:hasil_visitasi.php");
}else{

        $nama_klinik=$_POST['nama_klinik'];
        $tgl_tindakan=$_POST['tgl_tindakan'];
        $pemberi_info=$_POST['pemberi_info'];
        $penerima_info=$_POST['penerima_info'];
        $tindakan_melalui=$_POST['tindakan_melalui'];
        $hasil_visitasi=$_POST['hasil_visitasi'];
    // $ceknm = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM daftar_klinik WHERE No='$idk'"));
    // $nama = $ceknm['Nama_KlinikPratama'];

    mysqli_query($conn, "INSERT into tindakan_hasil_visitasi values('','$nama_klinik','$tgl_tindakan','$pemberi_info','$penerima_info','$tindakan_melalui', '$hasil_visitasi')");

    header("location:hasil_visitasi.php");
}



 ?>