<div>
	<h3>Upload Berkas Pendaftaran</h3>
	<br>
	<div style="background: #ecf0f5; height: ; max-width:500px;">
		<div class="custom-file">
			<form>
				<input id="logo" type="file" class="custom-file-input">
				<label for="logo" class="custom-file-label text-truncate">Pilih file...</label>

					<button type="submit" class="btn btn-primary">Upload</button>
			</form>
		   
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$('.custom-file-input').on('change', function() { 
	   let fileName = $(this).val().split('\\').pop(); 
	   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
	});
</script>
