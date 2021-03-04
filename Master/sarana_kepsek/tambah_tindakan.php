<?php 
include 'config.php';
if(isset($_POST['ubah_data'])){
    $nama=$_POST['idk'];
    $tgl_tindakan=$_POST['tgl_tindakan'];
    $pemberi=$_POST['pemberi'];
    $penerima=$_POST['penerima'];
    $melalui=$_POST['melalui'];
    $hasil=$_POST['hasil'];
    // $ceknm = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM daftar_klinik WHERE No='$idk'"));
    // $nama = $ceknm['Nama_KlinikPratama'];

    mysqli_query($conn, "UPDATE tindakan_masa_tenggang SET tgl_tindakan_mt = '$tgl_tindakan', pemberi_info_mt = '$pemberi', penerima_info_mt='$penerima', tindakan_melalui_mt = '$melalui', hasil_tindakan_mt = '$hasil' WHERE id_tindakan_mt = '$nama'");

    header("location:tindakan_tenggang.php");
}else{

        $nama=$_POST['idk'];
        $tgl_tindakan=$_POST['tgl_tindakan'];
        $pemberi=$_POST['pemberi'];
        $penerima=$_POST['penerima'];
        $melalui=$_POST['melalui'];
        $hasil=$_POST['hasil'];
    // $ceknm = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM daftar_klinik WHERE No='$idk'"));
    // $nama = $ceknm['Nama_KlinikPratama'];

    mysqli_query($conn, "INSERT into tindakan_masa_tenggang values('','$tgl_tindakan','$nama','$pemberi','$penerima', '$melalui', '$hasil')");

    header("location:tindakan_tenggang.php");
}



 ?>