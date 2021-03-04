<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang.php" name="back"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$No=mysqli_real_escape_string($conn, $_GET['No']);
$det=mysqli_query($conn, "SELECT * from Data_Pemohon where No='$No'")or die(mysqli_error($conn));
while($d=mysqli_fetch_array($det)){
?>		

<script>
            function validasi_edit(){
                var nama = document.getElementById('nama');
                var jenis = document.getElementById('jenis');
                var suplier = document.getElementById('suplier');
                var modal = document.getElementById('modal');
                var harga = document.getElementById('harga');
                var jumlah = document.getElementById('jumlah');
 
                if (harusDiisi(nama, "Nama Barang anda kosong, silahkan isi dulu !")) {
                    if (harusDiisi(jenis, "jenis anda kosong, silahkan isi dulu !")) {
                        if (harusDiisi(suplier, "suplier anda kosong, silahkan isi dulu !")) {
                            if (harusDiisi(modal, "harga modal anda kosong, silahkan isi dulu !")) {
                            	if (harusDiisi(harga, "harga jual anda kosong, silahkan isi dulu !")) {
                            		if (harusDiisi(jumlah, "jumlah anda kosong, silahkan isi dulu !")) {
                            			return true;
                        			};
                        		};
                        	};
                        };
                    };
                };
                return false;
            }
 
            function harusDiisi(att, msg){
                if (att.value.length == 0) {
                    alert(msg);
                    att.focus();
                    return false;
                }
 
                return true;
            }
</script>

	<form onsubmit="return validasi_edit()" action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td><input type="text" class="form-control" id="jenis" name="jenis" value="<?php echo $d['jenis'] ?>"></td>
			</tr>
			<tr>
				<td>Suplier</td>
				<td><input type="text" class="form-control" id="suplier" name="suplier" value="<?php echo $d['suplier'] ?>"></td>
			</tr>
			<tr>
				<td>Modal</td>
				<td><input type="text" class="form-control" id="modal" name="modal" value="<?php echo $d['modal'] ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" id="harga" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit2" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>