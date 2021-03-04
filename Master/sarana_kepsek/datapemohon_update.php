<?php 
include 'config.php';

	$No=$_GET['No'];

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
	

	  $query = "SELECT * FROM Data_Pemohon WHERE No='".$No."'";
	  $sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
	  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql	
	mysqli_query($conn, "UPDATE Data_Pemohon SET No='$No', Keterangan_Pemohon='$Keterangan_Pemohon', Nomer_Urut='$Nomer_Urut', Badan_Hukum='$Badan_Hukum', Nama_Notaris='$Nama_Notaris', No_Notaris_atau_Menteri_Kehakiman='$No_Notaris_atau_Menteri_Kehakiman', Tempat_Kedudukan='$Tempat_Kedudukan', klasifikasi='$klasifikasi', Jenis_Pelayanan='$Jenis_Pelayanan', Klinik_Pratama='$Klinik_Pratama', Alamat_Klinik='$Alamat_Klinik', Kota_Klinik='$Kota_Klinik', Penanggung_Jawab='$Penanggung_Jawab', Tgl_Berlaku='$Tgl_Berlaku', Tgl_JatuhTempo='$Tgl_JatuhTempo', Tgl_Dikeluarkan='$Tgl_Dikeluarkan', Nama_Pemilik='$Nama_Pemilik', Alamat_Pemilik='$Alamat_Pemilik', No_IMB='$No_IMB', No_IzinLingkungan='$No_IzinLingkungan', Tgl_IzinLingkungan='$Tgl_IzinLingkungan', Status_Izin='$Status_Izin', No_Pemohon='$No_Pemohon', Jabatan_Pemohon='$Jabatan_Pemohon', Tgl_CekLokasi='$Tgl_CekLokasi', Tgl_SuratPemohon='$Tgl_SuratPemohon', Sertifikat='$Sertifikat', Lama_Izin='$Lama_Izin', Layanan_Klinik='$Layanan_Klinik', Telepon='$Telepon', Contact_Person='$Contact_Person', Kelurahan='$Kelurahan', Kecamatan='$Kecamatan', Wilayah='$Wilayah', Keterangan_Perizinan='$Keterangan_Perizinan', Jml_Apoteker='$Jml_Apoteker', Jml_Asisten='$Jml_Asisten', Jml_Dokter='$Jml_Dokter', Jml_Drg='$Jml_Drg', Jml_Analis='$Jml_Analis', Jml_Asisten_Perawat_Gigi='$Jml_Asisten_Perawat_Gigi', Jml_Perawat='$Jml_Perawat', Jml_Bidan='$Jml_Bidan', Jml_Beautician='$Jml_Beautician', Investasi='$Investasi', Email='$Email', Jml_Non_Medis='$Jml_Non_Medis', Keterangan_Tambahan='$Keterangan_Tambahan', status_io='$status_io', status_im='$status_im' WHERE No='$No'");

	header("location:datapemohonasli.php");


?>
