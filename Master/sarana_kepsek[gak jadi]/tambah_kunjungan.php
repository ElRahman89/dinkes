<?php 
include 'config.php';

		$nama_klinik=$_POST['nama_klinik'];
		$tgl_kunjungan=$_POST['tgl_kunjungan'];
		$status=$_POST['status'];
		$pengawas=$_POST['pengawas'];
		$penanggung=$_POST['penanggung'];


//script validasi data
 	function compress_image($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
    if ($info['mime'] == 'image/jpeg')
    $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif')
    $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png')
    $image = imagecreatefrompng($source_url);
    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
    }
	    $uri = $_FILES['bukti']['tmp_name'];
	    compress_image($_FILES['bukti']['tmp_name'], $uri, 80); //compress 80% dari asli 
	    $fp1 = fopen($uri, 'r'); // open file (read-only, binary)
	    $foto = fread($fp1, filesize($uri)) or die("Tidak dapat membaca source file1"); // read file
	    $foto1 = mysqli_real_escape_string($conn, $foto) or die("Tidak dapat membaca source file2"); // parse image ke string
	    fclose($fp1); // tuptup file
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kunjungan WHERE Nama_KlinikPratama='$nama_klinik'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='kunjungansarana.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into kunjungan values('','$nama_klinik','$tgl_kunjungan','$pengawas','$penanggung', '$status', '$foto1')");

	header("location:kunjungansarana.php");
    }
    



 ?>