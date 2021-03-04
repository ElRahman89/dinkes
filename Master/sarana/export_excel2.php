<?php 

$nm = $_POST['namaklinik'];
$conn=mysqli_connect("localhost","root","","integrasi");
$sql = mysqli_query($conn, "SELECT * FROM masterklinik WHERE idKlinik = '$nm'");
$qwr = mysqli_fetch_array($sql);
$nama = $qwr['namaKlinik'];
$queryNamaDokter = "SELECT sipDokter,namaDokter, alamatDokter, tlDokter,DATE_FORMAT(tglDokter,'%d-%m-%Y') as'tglDokter',
                  DATE_FORMAT(expDokter, '%d-%m-%Y') as expDokter
                  from masterdokter join masterklinik on masterdokter.idKlinik = masterKlinik.idKlinik
                  where masterDokter.idKlinik = '$nm'";
$resultNamaDokter = mysqli_query($conn, $queryNamaDokter);
$queryNamaDokterGG = "SELECT sipDokterGG,namaDokterGG, alamatDokterGG, tlDokterGG,
                    DATE_FORMAT(tglDokterGG, '%d-%m-%Y')as 'tglDokterGG', DATE_FORMAT(expDokterGG, '%d-%m-%Y') as 'expDokterGG'
                    from masterdoktergg join masterklinik on masterdoktergg.idKlinik = masterKlinik.idKlinik
                    where masterDoktergg.idKlinik = '$nm'";
$resultNamaDokterGG = mysqli_query($conn, $queryNamaDokterGG);
$queryNamaPerawat = "SELECT sipPerawat,namaPerawat, alamatPerawat, tlPerawat,
                   DATE_FORMAT(tglPerawat,'%d-%m-%Y') AS 'tglPerawat', DATE_FORMAT(expPerawat, '%d-%m-%Y') as 'expPerawat'
                   from masterperawat join masterklinik on masterperawat.idKlinik = masterKlinik.idKlinik
                   where masterperawat.idKlinik = '$nm'";
$resultNamaPerawat = mysqli_query($conn, $queryNamaPerawat);
$queryNamaBidan = "SELECT sipBidan,namaBidan, alamatBidan, tlBidan,
                  DATE_FORMAT(tglBidan, '%d-%m-%Y') AS 'tglBidan' , DATE_FORMAT(expBidan, '%d-%m-%Y') as 'expBidan'
                    from masterbidan join masterklinik on masterbidan.idKlinik = masterKlinik.idKlinik
                    where masterbidan.idKlinik = '$nm'";
$resultNamaBidan = mysqli_query($conn, $queryNamaBidan);
$queryNamaApoteker = "SELECT sipApoteker,namaApoteker, alamatApoteker, tlApoteker,
                    DATE_FORMAT(tglApoteker, '%d-%m-%Y') as 'tglApoteker' , DATE_FORMAT(expApoteker, '%d-%m-%Y') as 'expApoteker'
                    from masterapoteker join masterklinik on masterapoteker.idKlinik = masterKlinik.idKlinik
                    where masterapoteker.idKlinik = '$nm'";
$resultNamaApoteker = mysqli_query($conn, $queryNamaApoteker);
$queryNamaAssApoteker = "SELECT sipAssApoteker,namaAssApoteker, alamatAssApoteker, tlAssApoteker,
                       DATE_FORMAT(tglAssApoteker, '%d-%m-%Y') AS 'tglAssApoteker', DATE_FORMAT(expAssApoteker, '%d-%m-%Y') AS 'expAssApoteker'
                       from masterassapoteker join masterklinik on masterassapoteker.idKlinik = masterKlinik.idKlinik
                       where masterassapoteker.idKlinik = '$nm'";
$resultNamaAssApoteker = mysqli_query($conn, $queryNamaAssApoteker);
$queryNamaATLM = "SELECT sipAtlm,namaAtlm, alamatAtlm, tlAtlm,
    DATE_FORMAT(tglAtlm, '%d-%m-%Y') AS 'tglAtlm', DATE_FORMAT(expAtlm, '%d-%m-%Y') AS 'expAtlm'
    from masteratlm join masterklinik on masteratlm.idKlinik = masterKlinik.idKlinik
    where masteratlm.idKlinik = '$nm'";
$resultATLM = mysqli_query($conn, $queryNamaATLM);
//Dokter
$output1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Dokter</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Dokter</th>
			<th>Alamat Dokter</th>
			<th>TTL Dokter</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
';
	if(mysqli_num_rows($resultNamaDokter) > 0){
	while($row=mysqli_fetch_array($resultNamaDokter)){
		$output[]='
			<tr>
				<td>'.$row["sipDokter"].'</td>
				<td>'.$row["namaDokter"].'</td>
				<td>'.$row["alamatDokter"].'</td>
				<td>'.$row["tlDokter"].'</td>
				<td>'.$row["tglDokter"].'/'.$row["expDokter"].'</td>
			</tr>
	';
	}}else{
	$output[]='
		<tr>
			<th>-</th>
			<th>-</th>
			<th>-</th>
			<th>-</th>
			<th>-</th>
		</tr>
	';
	}
	$output2='
	</table>
	';
//Dokter Gigi
	$outputg1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Dokter Gigi</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Dokter</th>
			<th>Alamat Dokter</th>
			<th>TTL Dokter</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
';
	if(mysqli_num_rows($resultNamaDokterGG) > 0){
	while($rowg=mysqli_fetch_array($resultNamaDokterGG)){
		$outputg[]='
			<tr>
				<td>'.$rowg["sipDokterGG"].'</td>
				<td>'.$rowg["namaDokterGG"].'</td>
				<td>'.$rowg["alamatDokterGG"].'</td>
				<td>'.$rowg["tlDokterGG"].'</td>
				<td>'.$rowg["tglDokterGG"].'/'.$rowg["expDokterGG"].'</td>
			</tr>
	';
	}}else{
		$outputg[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputg2='
	</table>
	';

	//Perawat
	$outputp1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Perawat</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Perawat</th>
			<th>Alamat Perawat</th>
			<th>TTL Perawat</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
	';
	if(mysqli_num_rows($resultNamaPerawat) > 0){

	while($rowp=mysqli_fetch_array($resultNamaPerawat)){
		$outputp[]='
			<tr>
				<td>'.$rowp["sipPerawat"].'</td>
				<td>'.$rowp["namaPerawat"].'</td>
				<td>'.$rowp["alamatPerawat"].'</td>
				<td>'.$rowp["tlPerawat"].'</td>
				<td>'.$rowp["tglPerawat"].'/'.$rowp["expPerawat"].'</td>
			</tr>
	';
	}
	}else{
		$outputp[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputp2='
	</table>
	';

	//Bidan
	$outputb1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Bidan</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Bidan</th>
			<th>Alamat Bidan</th>
			<th>TTL Bidan</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
	';
	if(mysqli_num_rows($resultNamaBidan) > 0){

	while($rowb=mysqli_fetch_array($resultNamaBidan)){
		$outputb[]='
			<tr>
				<td>'.$rowb["sipBidan"].'</td>
				<td>'.$rowb["namaBidan"].'</td>
				<td>'.$rowb["alamatBidan"].'</td>
				<td>'.$rowb["tlBidan"].'</td>
				<td>'.$rowb["tglBidan"].'/'.$rowb["expBidan"].'</td>
			</tr>
	';
	}
	}else{
		$outputb[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputb2='
	</table>
	';

	//Apoteker
	$outputap1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Apoteker</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Apoteker</th>
			<th>Alamat Apoteker</th>
			<th>TTL Apoteker</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
	';
	if(mysqli_num_rows($resultNamaApoteker) > 0){

	while($rowap=mysqli_fetch_array($resultNamaApoteker)){
		$outputap[]='
			<tr>
				<td>'.$rowap["sipApoteker"].'</td>
				<td>'.$rowap["namaApoteker"].'</td>
				<td>'.$rowap["alamatApoteker"].'</td>
				<td>'.$rowap["tlApoteker"].'</td>
				<td>'.$rowap["tglApoteker"].'/'.$rowap["expApoteker"].'</td>
			</tr>
	';
	}
	}else{
		$outputap[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputap2='
	</table>
	';

	//AssApoteker
	$outputasp1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Asisten Apoteker</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama AssApoteker</th>
			<th>Alamat AssApoteker</th>
			<th>TTL AssApoteker</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
	';
	if(mysqli_num_rows($resultNamaAssApoteker) > 0){

	while($rowasp=mysqli_fetch_array($resultNamaAssApoteker)){
		$outputasp[]='
			<tr>
				<td>'.$rowasp["sipAssApoteker"].'</td>
				<td>'.$rowasp["namaAssApoteker"].'</td>
				<td>'.$rowasp["alamatAssApoteker"].'</td>
				<td>'.$rowasp["tlAssApoteker"].'</td>
				<td>'.$rowasp["tglAssApoteker"].'/'.$rowasp["expAssApoteker"].'</td>
			</tr>
	';
	}
	}else{
		$outputasp[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputasp2='
	</table>
	';

	//Atlm
	$outputatlm1='
	<br>
	<table border="1">
		<thead>
		<tr>
			<th colspan="5">Tabel Atlm</th>
		</tr>
		<tr>
			<th>SIP</th>
			<th>Nama Atlm</th>
			<th>Alamat Atlm</th>
			<th>TTL Atlm</th>
			<th>Berlaku Sampai</th>
		</tr>
		</thead>
	';
	if(mysqli_num_rows($resultATLM) > 0){

	while($rowatlm=mysqli_fetch_array($resultATLM)){
		$outputatlm[]='
			<tr>
				<td>'.$rowatlm["sipAtlm"].'</td>
				<td>'.$rowatlm["namaAtlm"].'</td>
				<td>'.$rowatlm["alamatAtlm"].'</td>
				<td>'.$rowatlm["tlAtlm"].'</td>
				<td>'.$rowatlm["tglAtlm"].'/'.$rowatlm["expAtlm"].'</td>
			</tr>
	';
	}
	}else{
		$outputatlm[]='
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
			</tr>
	';
	}
	$outputatlm2='
	</table>
	';

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=Data SDM ".$nama.".xls");
	echo $output1;
	$jml = sizeof($output);
	for($i=0; $i<$jml; $i++){
		echo $output[$i];
	}
	echo $output2;
	
	echo $outputg1;
	$jmlg = sizeof($outputg);
	for($ig=0; $ig<$jmlg; $ig++){
		echo $outputg[$ig];
	}
	echo $outputg2;

	echo $outputp1;
	$jmlp = sizeof($outputp);
	for($ip=0; $ip<$jmlp; $ip++){
		echo $outputp[$ip];
	}
	echo $outputp2;

	echo $outputb1;
	$jmlb = sizeof($outputb);
	for($ib=0; $ib<$jmlb; $ib++){
		echo $outputb[$ib];
	}
	echo $outputb2;

	echo $outputap1;
	$jmlap = sizeof($outputap);
	for($iap=0; $iap<$jmlap; $iap++){
		echo $outputap[$iap];
	}
	echo $outputap2;

	echo $outputasp1;
	$jmlasp = sizeof($outputasp);
	for($iasp=0; $iasp<$jmlasp; $iasp++){
		echo $outputasp[$iasp];
	}
	echo $outputasp2;

	echo $outputatlm1;
	$jmlatlm = sizeof($outputatlm);
	for($iatlm=0; $iatlm<$jmlatlm; $iatlm++){
		echo $outputatlm[$iatlm];
	}
	echo $outputatlm2;

?>