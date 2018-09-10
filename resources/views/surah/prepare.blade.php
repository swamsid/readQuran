<html>
	<head>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Tambah Surah</title>
	</head>

	<body>
		<form id="formku" action="{{ route('surah.save') }}" method="post" target="_blank">

			<input type="hidden" name="_token" value="{{ csrf_token() }}" readonly>
			<input type="text" name="surah" placeholder="surah Ke" id="surah" required>
			<input type="text" placeholder="Input Sampai Ayat Ke" id="jumlah_sum" required>

			<button type="button" id="proses"> Buka Form Inputan Per Ayat </button>

			<button id="submit">Simpan Surah</button>
			

			<div id="surah-wrap" style="margin-top: 0px; padding: 20px;">
				
			</div>

		</form>

		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#proses").click(function(evt){
					evt.preventDefault();
					var jumlah_ayat = $('#jumlah_sum').val();
					var html = '';

					axios.get('{{ url('/') }}/surah_insert?surah='+$('#surah').val())
							.then((response) => {
								//console.log(response.data);
								for(var i = (response.data+1); i <= jumlah_ayat; i++){
									html = html+'<div style="margin-top: 20px">'+
													'<input type="text" name="ayat[]" style="padding: 5px;" value="'+i+'" readonly> <br>'+
													'<textarea name="text[]" style="margin-top: 10px;resize: none; text-align: right;padding: 10px;" rows="5" cols="60" required></textarea>'+
												'</div>';
								}


								$('#surah-wrap').html(html);
							})
				})

				$("#submit").click(function(evt){
					// evt.preventDefault();
					$("#formku").submit();
				})
			})
		</script>
	</body>
</html>