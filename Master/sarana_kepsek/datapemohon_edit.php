<?php 
include 'header.php';

?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Data Pemohon</h3>
<a class="btn" href="datapemohonasli.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No = $_GET['No'];
$det=mysqli_query($conn, "SELECT * FROM Data_Pemohon WHERE No='$No'")OR die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>	

	<form action="datapemohon_update.php?No=<?php echo $No; ?>" method="post">
		<table class="table">
			<tr>
				<td>Keterangan_Pemohon</td>
				<td><input type="text" class="form-control" name="Keterangan_Pemohon" value="<?php echo $d['Keterangan_Pemohon'] ?>"></td>
			</tr>

			<tr>
				<td>Nomer_Urut</td>
				<td><input type="text" class="form-control" id="Nomer_Urut" name="Nomer_Urut" value="<?php echo $d['Nomer_Urut'] ?>"></td>
			</tr>
			<tr>
				<td>Badan_Hukum</td>
				<td><input type="text" class="form-control" id="Badan_Hukum" name="Badan_Hukum" value="<?php echo $d['Badan_Hukum'] ?>"></td>
			</tr>
			<tr>
				<td>Nama_Notaris</td>
				<td><input type="text" class="form-control" id="Nama_Notaris" name="Nama_Notaris" value="<?php echo $d['Nama_Notaris'] ?>"></td>
			</tr>
			<tr>
				<td>No_Notaris_atau_Menteri_Kehakiman</td>
				<td><input type="text" class="form-control" id="No_Notaris_atau_Menteri_Kehakiman" name="No_Notaris_atau_Menteri_Kehakiman" value="<?php echo $d['No_Notaris_atau_Menteri_Kehakiman'] ?>"></td>
			</tr>
			<tr>
				<td>Tempat_Kedudukan</td>
				<td><input type="text" class="form-control" id="Tempat_Kedudukan" name="Tempat_Kedudukan" value="<?php echo $d['Tempat_Kedudukan'] ?>"></td>
			</tr>
			<tr>
				<td>Klasifikasi</td>
				<td><input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value="<?php echo $d['klasifikasi'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis_Pelayanan</td>
				<td><input type="text" class="form-control" id="Jenis_Pelayanan" name="Jenis_Pelayanan" value="<?php echo $d['jenis_pelayanan'] ?>"></td>
			</tr>
			<tr>
				<td>Klinik_Pratama</td>
				<td><input type="text" class="form-control" id="Klinik_Pratama" name="Klinik_Pratama" value="<?php echo $d['Klinik_Pratama'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat_Klinik</td>
				<td><input type="text" class="form-control" id="Alamat_Klinik" name="Alamat_Klinik" value="<?php echo $d['Alamat_Klinik'] ?>"></td>
			</tr>
			<tr>
				<td>Kota_Klinik</td>
				<td><input type="text" class="form-control" id="Kota_Klinik" name="Kota_Klinik" value="<?php echo $d['Kota_Klinik'] ?>"></td>
			</tr>
			<tr>
				<td>Penanggung_Jawab</td>
				<td><input type="text" class="form-control" id="Penanggung_Jawab" name="Penanggung_Jawab" value="<?php echo $d['Penanggung_Jawab'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_Berlaku</td>
				<td><input type="date" class="form-control" id="Tgl_Berlaku" name="Tgl_Berlaku" value="<?php echo $d['Tgl_Berlaku'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_JatuhTempo</td>
				<td><input type="date" class="form-control" id="Tgl_JatuhTempo" name="Tgl_JatuhTempo" value="<?php echo $d['Tgl_JatuhTempo'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_Dikeluarkan</td>
				<td><input type="date" class="form-control" id="Tgl_Dikeluarkan" name="Tgl_Dikeluarkan" value="<?php echo $d['Tgl_Dikeluarkan'] ?>"></td>
			</tr>
			<tr>
				<td>Nama_Pemilik</td>
				<td><input type="text" class="form-control" id="Nama_Pemilik" name="Nama_Pemilik" value="<?php echo $d['Nama_Pemilik'] ?>"></td>
			</tr>
			<tr>
				<td>Alamat_Pemilik</td>
				<td><input type="text" class="form-control" id="Alamat_Pemilik" name="Alamat_Pemilik" value="<?php echo $d['Alamat_Pemilik'] ?>"></td>
			</tr>
			<tr>
				<td>No_IMB</td>
				<td><input type="text" class="form-control" id="No_IMB" name="No_IMB" value="<?php echo $d['No_IMB'] ?>"></td>
			</tr>
			<tr>
				<td>No_IzinLingkungan</td>
				<td><input type="text" class="form-control" id="No_IzinLingkungan" name="No_IzinLingkungan" value="<?php echo $d['No_IzinLingkungan'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_IzinLingkungan</td>
				<td><input type="date" class="form-control" id="Tgl_IzinLingkungan" name="Tgl_IzinLingkungan" value="<?php echo $d['Tgl_IzinLingkungan'] ?>"></td>
			</tr>
			<tr>
				<td>Status_Izin</td>
				<td><input type="text" class="form-control" id="Status_Izin" name="Status_Izin" value="<?php echo $d['Status_Izin'] ?>"></td>
			</tr>
			<tr>
				<td>No_Pemohon</td>
				<td><input type="text" class="form-control" id="No_Pemohon" name="No_Pemohon" value="<?php echo $d['No_Pemohon'] ?>"></td>
			</tr>
			<tr>
				<td>Jabatan_Pemohon</td>
				<td><input type="text" class="form-control" id="Jabatan_Pemohon" name="Jabatan_Pemohon" value="<?php echo $d['Jabatan_Pemohon'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_CekLokasi</td>
				<td><input type="date" class="form-control" id="Tgl_CekLokasi" name="Tgl_CekLokasi" value="<?php echo $d['Tgl_CekLokasi'] ?>"></td>
			</tr>
			<tr>
				<td>Tgl_SuratPemohon</td>
				<td><input type="date" class="form-control" id="Tgl_SuratPemohon" name="Tgl_SuratPemohon" value="<?php echo $d['Tgl_SuratPemohon'] ?>"></td>
			</tr>
			<tr>
				<td>Sertifikat</td>
				<td><input type="text" class="form-control" id="Sertifikat" name="Sertifikat" value="<?php echo $d['Sertifikat'] ?>"></td>
			</tr>
			<tr>
				<td>Lama_Izin</td>
				<td><input type="text" class="form-control" id="Lama_Izin" name="Lama_Izin" value="<?php echo $d['Lama_Izin'] ?>"></td>
			</tr>
			<tr>
				<td>Layanan_Klinik</td>
				<td><input type="text" class="form-control" id="Layanan_Klinik" name="Layanan_Klinik" value="<?php echo $d['Layanan_Klinik'] ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" class="form-control" id="Telepon" name="Telepon" value="<?php echo $d['Telepon'] ?>"></td>
			</tr>
			<tr>
				<td>Contact_Person</td>
				<td><input type="text" class="form-control" id="Contact_Person" name="Contact_Person" value="<?php echo $d['Contact_Person'] ?>"></td>
			</tr>
			<tr>
				<td>Kelurahan</td>
				<td><input type="text" class="form-control" id="Kelurahan" name="Kelurahan" value="<?php echo $d['Kelurahan'] ?>"></td>
			</tr>


			<tr>
				<td>Kecamatan</td>
				<td><input type="text" class="form-control" id="Kecamatan" name="Kecamatan" value="<?php echo $d['Kecamatan'] ?>"></td>
			</tr>

			<tr>
				<td>Wilayah</td>
				<td><input type="text" class="form-control" id="Wilayah" name="Wilayah" value="<?php echo $d['Wilayah'] ?>"></td>
			</tr>
			<tr>
				<td>Keterangan_Perizinan</td>
				<td><input type="text" class="form-control" id="Keterangan_Perizinan" name="Keterangan_Perizinan" value="<?php echo $d['Keterangan_Perizinan'] ?>"></td>
			</tr>
			
			<tr>
				<td>Jml_Apoteker</td>
				<td><input type="text" class="form-control" id="Jml_Apoteker" name="Jml_Apoteker" value="<?php echo $d['Jml_Apoteker'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Asisten</td>
				<td><input type="text" class="form-control" id="Jml_Asisten" name="Jml_Asisten" value="<?php echo $d['Jml_Asisten'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Dokter</td>
				<td><input type="text" class="form-control" id="Jml_Dokter" name="Jml_Dokter" value="<?php echo $d['Jml_Dokter'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Drg</td>
				<td><input type="text" class="form-control" id="Jml_Drg" name="Jml_Drg" value="<?php echo $d['Jml_Drg'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Analis</td>
				<td><input type="text" class="form-control" id="Jml_Analis" name="Jml_Analis" value="<?php echo $d['Jml_Analis'] ?>"></td>
			</tr>

			<tr>
				<td>Jml_Asisten_Perawat_Gigi</td>
				<td><input type="text" class="form-control" id="Jml_Asisten_Perawat_Gigi" name="Jml_Asisten_Perawat_Gigi" value="<?php echo $d['Jml_Asisten_Perawat_Gigi'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Perawat</td>
				<td><input type="text" class="form-control" id="Jml_Perawat" name="Jml_Perawat" value="<?php echo $d['Jml_Perawat'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Bidan</td>
				<td><input type="text" class="form-control" id="Jml_Bidan" name="Jml_Bidan" value="<?php echo $d['Jml_Bidan'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Beautician</td>
				<td><input type="text" class="form-control" id="Jml_Beautician" name="Jml_Beautician" value="<?php echo $d['Jml_Beautician'] ?>"></td>
			</tr>
			<tr>
				<td>Investasi</td>
				<td><input type="text" class="form-control" id="Investasi" name="Investasi" value="<?php echo $d['Investasi'] ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" class="form-control" id="Email" name="Email" value="<?php echo $d['Email'] ?>"></td>
			</tr>
			<tr>
				<td>Jml_Non_Medis</td>
				<td><input type="text" class="form-control" id="Jml_Non_Medis" name="Jml_Non_Medis" value="<?php echo $d['Jml_Non_Medis'] ?>"></td>
			</tr>
			<tr>
				<td>Keterangan_Tambahan</td>
				<td><input type="text" class="form-control" id="Keterangan_Tambahan" name="Keterangan_Tambahan" value="<?php echo $d['Keterangan_Tambahan'] ?>"></td>
			</tr>
			<tr>
				<td>Status Izin Operasional</td>
				<td><input type="text" class="form-control" id="status_io" name="status_io" value="<?php echo $d['status_io'] ?>"></td>
			</tr>
			<tr>
				<td>Status Izin Mendirikan</td>
				<td><input type="text" class="form-control" id="status_im" name="status_im" value="<?php echo $d['status_im'] ?>"></td>
			</tr>



			

			<tr>
				<td></td>
				<td><input type="submit" name="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>