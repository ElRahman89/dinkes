<?php 
include 'config.php';

		$Keterangan_Pemohon=$_POST['Keterangan_Pemohon'];
		$Nomer_Urut=$_POST['Nomer_Urut'];
		$Badan_Hukum=$_POST['Badan_Hukum'];
		$Nama_Notaris=$_POST['Nama_Notaris'];
		$No_Notaris_atau_Menteri_Kehakiman=$_POST['No_Notaris_atau_Menteri_Kehakiman'];
		$Tempat_Kedudukan=$_POST['Tempat_Kedudukan'];
		$klasifikasi=$_POST['klasifikasi'];
		$Jenis_Pelayanan=$_POST['Jenis_Pelayanan'];
		$Klinik_Pratama=$_POST['Klinik_Pratama'];
		$Alamat_Klinik=$_POST['Alamat_Klinik'];
		$Kota_Klinik=$_POST['Kota_Klinik'];
		$Penanggung_Jawab=$_POST['Penanggung_Jawab'];
		$Tgl_Berlaku=$_POST['Tgl_Berlaku'];
		$Tgl_JatuhTempo=$_POST['Tgl_JatuhTempo'];
		$Tgl_Dikeluarkan=$_POST['Tgl_Dikeluarkan'];
		$Nama_Pemilik=$_POST['Nama_Pemilik'];
		$Alamat_Pemilik=$_POST['Alamat_Pemilik'];
		$No_IMB=$_POST['No_IMB'];
		$No_IzinLingkungan=$_POST['No_IzinLingkungan'];
		$Tgl_IzinLingkungan=$_POST['Tgl_IzinLingkungan'];
		$Status_Izin=$_POST['Status_Izin'];
		$No_Pemohon=$_POST['No_Pemohon'];
		$Jabatan_Pemohon=$_POST['Jabatan_Pemohon'];
		$Tgl_CekLokasi=$_POST['Tgl_CekLokasi'];
		$Tgl_SuratPemohon=$_POST['Tgl_SuratPemohon'];
		$Sertifikat=$_POST['Sertifikat'];
		$Lama_Izin=$_POST['Lama_Izin'];
		$Layanan_Klinik=$_POST['Layanan_Klinik'];
		$Telepon=$_POST['Telepon'];
		$Contact_Person=$_POST['Contact_Person'];
		$Kelurahan=$_POST['Kelurahan'];
		$Kecamatan=$_POST['Kecamatan'];
		$Wilayah=$_POST['Wilayah'];
		$Keterangan_Perizinan=$_POST['Keterangan_Perizinan'];
		$Jml_Apoteker=$_POST['Jml_Apoteker'];
		$Jml_Asisten=$_POST['Jml_Asisten'];
		$Jml_Dokter=$_POST['Jml_Dokter'];
		$Jml_Drg=$_POST['Jml_Drg'];
		$Jml_Analis=$_POST['Jml_Analis'];
		$Jml_Asisten_Perawat_Gigi=$_POST['Jml_Asisten_Perawat_Gigi'];
		$Jml_Perawat=$_POST['Jml_Perawat'];
		$Jml_Bidan=$_POST['Jml_Bidan'];
		$Jml_Beautician=$_POST['Jml_Beautician'];
		$Investasi=$_POST['Investasi'];
		$Email=$_POST['Email'];
		$Jml_Non_Medis=$_POST['Jml_Non_Medis'];
		$Keterangan_Tambahan=$_POST['Keterangan_Tambahan'];
		$status_io=$_POST['status_io'];
		$status_im=$_POST['status_im'];



//script validasi data
 
    $cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Data_Pemohon WHERE Klinik_Pratama='$Klinik_Pratama'"));
    if ($cek > 0){
    echo "<script>window.alert(' Data yang anda masukan sudah ada !')
    window.location='Master/Admin/index.php'</script>";
    }else {
    mysqli_query($conn, "INSERT into Data_Pemohon values('','$Keterangan_Pemohon','$Nomer_Urut','$Badan_Hukum','$Nama_Notaris','$No_Notaris_atau_Menteri_Kehakiman','$Tempat_Kedudukan', '$klasifikasi', '$Jenis_Pelayanan', '$Klinik_Pratama','$Alamat_Klinik','$Kota_Klinik','$Penanggung_Jawab','$Tgl_Berlaku','$Tgl_JatuhTempo','$Tgl_Dikeluarkan','$Nama_Pemilik','$Alamat_Pemilik','$No_IMB','$No_IzinLingkungan','$Tgl_IzinLingkungan','$Status_Izin','$No_Pemohon','$Jabatan_Pemohon','$Tgl_CekLokasi','$Tgl_SuratPemohon','$Sertifikat','$Lama_Izin','$Layanan_Klinik','$Telepon','$Contact_Person','$Kelurahan','$Kecamatan','$Wilayah','$Keterangan_Perizinan', '$Jml_Apoteker','$Jml_Dokter','$Jml_Dokter','$Jml_Drg','$Jml_Analis','$Jml_Asisten_Perawat_Gigi','$Jml_Perawat','$Jml_Bidan','$Jml_Beautician','$Investasi','$Email','$Jml_Non_Medis','$Keterangan_Tambahan','$status_io','$status_im')");

	header("location:datapemohonasli.php");
    }
    



 ?>