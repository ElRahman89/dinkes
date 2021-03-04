<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Data</h3>
<a class="btn" href="../sarana_kepsek/datapemohonasli.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);


$det=mysqli_query($conn, "SELECT * from Data_Pemohon where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
	?>
	<table class="table">
		<tr>
			<td>No</td>
			<td><?php echo $d['No'] ?></td>
		</tr>
		<tr>
			<td>Keterangan_Pemohon</td>
			<td><?php echo $d['Keterangan_Pemohon'] ?></td>
		</tr>
		<tr>
			<td>Nomer_Urut</td>
			<td><?php echo $d['Nomer_Urut'] ?></td>
		</tr>
		<tr>
			<td>Badan_Hukum</td>
			<td><?php echo $d['Badan_Hukum'] ?></td>
		</tr>
		<tr>
			<td>Nama_Notaris</td>
			<td><?php echo $d['Nama_Notaris'] ?></td>
		</tr>
		<tr>
			<td>No_Notaris_atau_Menteri_Kehakiman</td>
			<td><?php echo $d['No_Notaris_atau_Menteri_Kehakiman'] ?></td>
		</tr>
		<tr>
			<td>Tempat_Kedudukan</td>
			<td><?php echo $d['Tempat_Kedudukan'] ?></td>
		</tr>
		<tr>
			<td>Klasifikasi</td>
			<td><?php echo $d['klasifikasi'] ?></td>
		</tr>
		<tr>
			<td>Jenis_Pelayanan</td>
			<td><?php echo $d['jenis_pelayanan'] ?></td>
		</tr>
		<tr>
			<td>Klinik_Pratama</td>
			<td><?php echo $d['Klinik_Pratama'] ?></td>
		</tr>
		<tr>
			<td>Alamat_Klinik</td>
			<td><?php echo $d['Alamat_Klinik'] ?></td>
		</tr>
		<tr>
			<td>Kota_Klinik</td>
			<td><?php echo $d['Kota_Klinik'] ?></td>
		</tr>
		<tr>
			<td>Penanggung_Jawab</td>
			<td><?php echo $d['Penanggung_Jawab'] ?></td>
		</tr>
		<tr>
			<td>Tgl_Berlaku</td>
			<td><?php echo $d['Tgl_Berlaku'] ?></td>
		</tr>
		<tr>
			<td>Tgl_JatuhTempo</td>
			<td><?php echo $d['Tgl_JatuhTempo'] ?></td>
		</tr>
		<tr>
			<td>Tgl_Dikeluarkan</td>
			<td><?php echo $d['Tgl_Dikeluarkan'] ?></td>
		</tr>
		<tr>
			<td>Nama_Pemilik</td>
			<td><?php echo $d['Nama_Pemilik'] ?></td>
		</tr>
		<tr>
			<td>Alamat_Pemilik</td>
			<td><?php echo $d['Alamat_Pemilik'] ?></td>
		</tr>
		<tr>
			<td>No_IMB</td>
			<td><?php echo $d['No_IMB'] ?></td>
		</tr>
		<tr>
			<td>No_IzinLingkungan</td>
			<td><?php echo $d['No_IzinLingkungan'] ?></td>
		</tr>
		<tr>
			<td>Tgl_IzinLingkungan</td>
			<td><?php echo $d['Tgl_IzinLingkungan'] ?></td>
		</tr>
		<tr>
			<td>Status_Izin</td>
			<td><?php echo $d['Status_Izin'] ?></td>
		</tr>
		<tr>
			<td>No_Pemohon</td>
			<td><?php echo $d['No_Pemohon'] ?></td>
		</tr>
		<tr>
			<td>Jabatan_Pemohon</td>
			<td><?php echo $d['Jabatan_Pemohon'] ?></td>
		</tr>
		<tr>
			<td>Tgl_CekLokasi</td>
			<td><?php echo $d['Tgl_CekLokasi'] ?></td>
		</tr>
		<tr>
			<td>Tgl_SuratPemohon</td>
			<td><?php echo $d['Tgl_SuratPemohon'] ?></td>
		</tr>
		<tr>
			<td>Sertifikat</td>
			<td><?php echo $d['Sertifikat'] ?></td>
		</tr>
		<tr>
			<td>Lama_Izin</td>
			<td><?php echo $d['Lama_Izin'] ?></td>
		</tr>
		<tr>
			<td>Layanan_Klinik</td>
			<td><?php echo $d['Layanan_Klinik'] ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td><?php echo $d['Telepon'] ?></td>
		</tr>
		<tr>
			<td>Contact_Person</td>
			<td><?php echo $d['Contact_Person'] ?></td>
		</tr>
		<tr>
			<td>Kelurahan</td>
			<td><?php echo $d['Kelurahan'] ?></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td><?php echo $d['Kecamatan'] ?></td>
		</tr>
		<tr>
			<td>Wilayah</td>
			<td><?php echo $d['Wilayah'] ?></td>
		</tr>
		<tr>
			<td>Keterangan_Perizinan</td>
			<td><?php echo $d['Keterangan_Perizinan'] ?></td>
		</tr>
		<tr>
			<td>Jml_Apoteker</td>
			<td><?php echo $d['Jml_Apoteker'] ?></td>
		</tr>
		<tr>
			<td>Jml_Asisten</td>
			<td><?php echo $d['Jml_Asisten'] ?></td>
		</tr>
		<tr>
			<td>Jml_Dokter</td>
			<td><?php echo $d['Jml_Dokter'] ?></td>
		</tr>
		<tr>
			<td>Jml_Drg</td>
			<td><?php echo $d['Jml_Drg'] ?></td>
		</tr>
		<tr>
			<td>Jml_Analis</td>
			<td><?php echo $d['Jml_Analis'] ?></td>
		</tr>
		<tr>
			<td>Jml_Asisten_Perawat_Gigi</td>
			<td><?php echo $d['Jml_Asisten_Perawat_Gigi'] ?></td>
		</tr>
		<tr>
			<td>Jml_Perawat</td>
			<td><?php echo $d['Jml_Perawat'] ?></td>
		</tr>
		<tr>
			<td>Jml_Bidan</td>
			<td><?php echo $d['Jml_Bidan'] ?></td>
		</tr>
		<tr>
			<td>Jml_Beautician</td>
			<td><?php echo $d['Jml_Beautician'] ?></td>
		</tr>
		<tr>
			<td>Jml_Investasi</td>
			<td><?php echo $d['Investasi'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $d['Email'] ?></td>
		</tr>
		<tr>
			<td>Jml_Non_Medis</td>
			<td><?php echo $d['Jml_Non_Medis'] ?></td>
		</tr>
		<tr>
			<td>Keterangan_Tambahan</td>
			<td><?php echo $d['Keterangan_Tambahan'] ?></td>
		</tr>
		<tr>
			<td>status_io</td>
			<td><?php echo $d['status_io'] ?></td>
		</tr>
		<tr>
			<td>status_im</td>
			<td><?php echo $d['status_im'] ?></td>
		</tr>

	</table>
	<?php
}
?>
<?php include 'footer.php'; ?>
