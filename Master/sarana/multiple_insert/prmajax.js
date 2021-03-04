//Fungsi untuk autosuggest
function suggest(first_name)
{
	var page    = 'suggest.php';
	if(first_name.length>=0){
		var loading = '<p align="center">Loading ...</p>';
		showStuff('suggest');
		$('#suggest').html(loading);
		$.ajax({
			url: page,
			data : 'first_name='+first_name,
			type: "post", 
			dataType: "html",
			timeout: 10000,
			minLength: 1,
			success: function(response){
				$('#suggest').html(response);
			}
		});
	}
}

//Fungsi untuk memilih deskripsi dan memasukkannya pada input text
function pilih_poin(deskripsi)
{
	$('#first_name').val(deskripsi);
}

//menampilkan form div
function showStuff(id) {
	document.getElementById(id).style.display = 'block';
}
//menyembunyikan form
function hideStuff(id) {
	document.getElementById(id).style.display = 'none';
}