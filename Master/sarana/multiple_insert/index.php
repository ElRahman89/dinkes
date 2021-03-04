<?php include 'header.php'; ?>
<!--
//index.php
!-->

<html>  
    <head>  
        <title>Data Pengawasan Izin Operasional</title>  
		<link rel="stylesheet" href="jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="jquery.min.js"></script>
		<script src="jquery-ui.js"></script>
		<script src="prmajax.js"></script>
		

		<style>
		fieldset{margin-bottom: 1em;width:300px;}
		input{display: block;margin-bottom: .25em;}
		#suggest{position:absolute;z-index:5;border-left:silver 1px solid;padding:0 0 0 10px;}
		span.pilihan{display:block;cursor:pointer; background-color: white; border-color: black;}
		</style>
    </head>  
    <body>  
        <div class="container">
        	<br />
			
			<h3 align="center">Data Pengawasan Izin Operasional</a></h3><br />
			<br />
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
				<a href="../lihat_data.php"><button data-toggle="modal" class="btn btn-info btn-xs">Lihat Data</button></a>
				
			</div>
			<br />
			<?php
			include '../config.php';
			$No = $_GET['No'];
			$det=mysqli_query($conn, "SELECT Klinik_Pratama FROM Data_Pemohon WHERE No='$No'")OR die(mysqli_error($conn));
			$d=mysqli_fetch_array($det)
			?>
			<form method="post" id="user_form">
				<div class="table-responsive">
					<p>Nama Klinik : <?php echo "$d[0]"; ?></p>
					<table class="table table-striped table-bordered" id="user_data">
						<tr>
							<th>Nama Klinik</th>
					        <th>Poin Pengawasan Yang Belum Sesuai</th>
					        <th>Keterangan</th>
					        <th>Details</th>
					        <th>Remove</th>
						</tr>
					</table>
				</div>
				<div align="center">
					<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				</div>
			</form>
			<br>
			<br>
			<br>
			<br>
			<br>

			<div id="content">
	          <div >
	            <h4>PERATURAN DAN KEBIJAKAN PERIZINAN OPERASIONAL KLINIK</h4>
	            <h5 style="color: red">*Harap diperhatikan</h5>
	            <h5>Dalam proses pengawasan Izin Operasional klinik terdapat beberapa peraturan wajib yang harus diketahui sebelumnya :</h5> <br />
	          </div>
	          
	          
	            <p>1. Klinik wajib memasang nama dan klasifikasi Klinik.<br />
	            2. membuat dan melaporkannya kepada dinas kesehatan daftar tenaga medis dan tenaga kesehatan lain yang bekerja di Klinik dengan menyertakan:<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) nomor Surat Tanda Registrasi (STR) dan Surat Izin Praktik (SIP)
					bagi tenaga medis;<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) nomor surat izin sebagai tanda registrasi atau Surat Tanda
					Registrasi (STR), dan Surat Izin Praktik (SIP) atau Surat Izin Kerja
					(SIK) bagi tenaga kesehatan lain.<br />
	            3. melaksanakan pencatatan untuk penyakit-penyakit tertentu dan  melaporkan kepada dinas kesehatan kabupaten/kota dalam rangka pelaksanaan program pemerintah sesuai ketentuan peraturan perundang-undangan.<br />
	            4. Dalam upaya peningkatan mutu pelayanan Klinik, dilakukan akreditasi secara berkala paling sedikit 3 (tiga) tahun sekali.<br />
	            5. Setiap Klinik yang telah memperoleh izin operasional dan telah beroperasi paling sedikit 2 (dua) tahun wajib mengajukan permohonan akreditasi.<br />
	            6. Akreditasi sebagaimana dimaksud pada no (4) dilakukan oleh lembaga independen pelaksana akreditasi yang membidangi fasilitas pelayanan kesehatan.<br />
	            7. Dalam penyelenggaraan Klinik harus dilakukan audit medis.<br />
	            8. Audit medis internal dilakukan oleh Klinik paling sedikit satu kali dalam setahun.<br />
	            9. Audit medis eksternal dapat dilakukan oleh organisasi profesi.<br />
	            10. Menteri, gubernur, kepala dinas kesehatan provinsi, bupati/walikota, dan kepala dinas kesehatan kabupaten/kota melakukan pembinaan dan pengawasan terhadap penyelenggaraan Klinik.<br />
	            11. Pembinaan dan pengawasan diarahkan untuk meningkatkan mutu pelayanan, keselamatan pasien dan melindungi masyarakat terhadap segala risiko yang dapat menimbulkan bahaya bagi kesehatan atau merugikan masyarakat.<br />
	            12. Pembinaan dan pengawasan berupa pemberian bimbingan, supervisi, konsultasi, penyuluhan kesehatan, pendidikan dan pelatihan.<br />
	            13. Dalam rangka pembinaan dan pengawasan, Menteri, gubernur, kepala dinas kesehatan provinsi, bupati/walikota, dan kepala dinas kesehatan kabupaten/kota sesuai dengan kewenangan masing-masing dapat mengambil tindakan administratif.<br />
	            14. Tindakan administratif sebagaimana dimaksud pada no (13) dilakukan melalui:<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) teguran lisan;<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) teguran tertulis;<br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c) pencabutan izin tenaga kesehatan; dan/atau<br /> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d) pencabutan izin/rekomendasi Klinik.</p><br />
	          </div>
	          
	        </div>

			<br />
        </div>
			
		
		<div id="user_dialog" title="Add Data">
			<?php
			include '../config.php';
			$No = $_GET['No'];
			$det=mysqli_query($conn, "SELECT Klinik_Pratama FROM Data_Pemohon WHERE No='$No'")OR die(mysqli_error($conn));
			$a=mysqli_fetch_array($det)
			?>
			<div class="form-group">
				<label>Nama Klinik</label>
				<input disabled type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $a[0] ?>">
				<span id="error_last_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Poin Yang Belum Sesuai</label>
				<input name="first_name" id="first_name" type="text" onkeypress="suggest(this.value);" class="form-control" placeholder="Tulis nama Poin"><div id="suggest"></div>
				<span id="error_first_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Keterangan</label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" />
				<span id="error_keterangan" class="text-danger"></span>
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
		</div>
		<div id="action_alert" title="Action">

		</div>
    </body>  
</html>  




<script>  
$(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:400
	});
		<?php
			include '../config.php';
			$No = $_GET['No'];
			$det=mysqli_query($conn, "SELECT Klinik_Pratama FROM Data_Pemohon WHERE No='$No'")OR die(mysqli_error($conn));
			$a=mysqli_fetch_array($det)
			?>
	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
		$('#first_name').val('');
		$('#last_name').val('<?php echo $a[0] ?>');
		$('#keterangan').val('');
		$('#error_first_name').text('');
		$('#error_last_name').text('');
		$('#error_keterangan').text('');
		$('#first_name').css('border-color', '');
		$('#last_name').css('border-color', '');
		$('#keterangan').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_first_name = '';
		var error_last_name = '';
		var error_keterangan = '';
		var first_name = '';
		var last_name = '';
		var keterangan = '';
		
		if($('#last_name').val() == '')
		{
			error_last_name = 'Poin Pengawasan Belum Diisikan';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '#cc0000');
			last_name = '';
		}
		else
		{
			error_last_name = '';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '');
			last_name = $('#last_name').val();
		}
		if($('#first_name').val() == '')
		{
			error_first_name = 'Nama Klinik Belum Diisikan';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '#cc0000');
			first_name = '';
		}
		else
		{
			error_first_name = '';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '');
			first_name = $('#first_name').val();
		}	
		
		if($('#keterangan').val() == '')
		{
			error_last_name = 'Poin Pengawasan Belum Diisikan';
			$('#error_keterangan').text(error_keterangan);
			$('#keterangan').css('border-color', '#cc0000');
			keterangan = '';
		}
		else
		{
			error_keterangan = '';
			$('#error_keterangan').text(error_keterangan);
			$('#keterangan').css('border-color', '');
			keterangan = $('#keterangan').val();
		}
		if(error_first_name != '' || error_last_name != '' || error_keterangan !='')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
				output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
				output += '<td>'+keterangan+' <input type="hidden" name="hidden_keterangan[]" id="keterangan'+count+'" value="'+keterangan+'" /></td>';

				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+row_id+'" value="'+last_name+'" /></td>';
				output = '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+row_id+'" class="first_name" value="'+first_name+'" /></td>';
				output += '<td>'+keterangan+' <input type="hidden" name="hidden_keterangan[]" id="keterangan'+row_id+'" value="'+keterangan+'" /></td>';

				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			$('#user_dialog').dialog('close');
		}
	});

	$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr("id");
		var first_name = $('#first_name'+row_id+'').val();
		var last_name = $('#last_name'+row_id+'').val();
		var keterangan = $('#keterangan'+row_id+'').val();
		$('#first_name').val(first_name);
		$('#last_name').val(last_name);
		$('#keterangan').val(keterangan);
		$('#save').text('Edit');
		$('#hidden_row_id').val(row_id);
		$('#user_dialog').dialog('option', 'title', 'Edit Data');
		$('#user_dialog').dialog('open');
	});

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this row data?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
			return false;
		}
	});

	$('#action_alert').dialog({
		autoOpen:false
	});

	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var count_data = 0;
		$('.first_name').each(function(){
			count_data = count_data + 1;
		});
		if(count_data > 0)
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_data').find("tr:gt(0)").remove();
					$('#action_alert').html('<p>Data Inserted Successfully</p>');
					$('#action_alert').dialog('open');
				}
			})
		}
		else
		{
			$('#action_alert').html('<p>Please Add atleast one data</p>');
			$('#action_alert').dialog('open');
		}
	});
	
});  
</script>