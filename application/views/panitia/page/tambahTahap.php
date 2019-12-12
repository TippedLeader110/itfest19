<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5>Tahapan seleksi kompetisi ITFest 4.0 Universitas Sumatera Utara</h5>
				<hr>
			</div>
		</div>
		<form id="formTahap">
		<div class="row">
			<div class="col-12 col-md-12">
				<div class="row">
					<div class="col-12 col-md-12">
						<div class="form-group">
							<input type="text" hidden name="id" value="<?php echo $this->session->userdata('panitia-id'); ?>">
							<label class="form-control-label" for="deskripsiSeleksi">Deskripsi Tahapan Seleksi</label>
							<textarea name="deskripsi" class="form-control" id="deskripsiSeleksi"></textarea>
								<div class="invalid-feedback">Tolong Deskripsi</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-4">
						<label class="form-control-label" for="e">Deadline</label>
						<input class="form-control" type="date" name="deadline">
					</div>
					<div class="col-12 col-md-8">
							<label class="form-control-label" for="validatedCustomFile">File Rule Kompetisi</label>
						<div class="custom-file">
						    <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
						    <label class="custom-file-label" for="validatedCustomFile">Upload File...</label>
						    <div class="invalid-feedback">Tolong input file</div>
						</div>
					</div>
					<div class="col-12" style="margin-top: 20px;">
						<button class="btn btn-outline-primary">Tambah</button>&nbsp;<button class="btn btn-outline-warning" id="return">Kembali</button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">

    $('#validatedCustomFile').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

	$('#return').click(function(event) {
		event.preventDefault();
		$('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>Tahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
	});

	$('#formTahap').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: '<?php echo base_url('panitia/doTambahtahap') ?>',
			type: 'post',
			data:new FormData(this),
			processData:false,
            contentType:false,
            cache:false,
			success: function(er){
				if (er==1) {
					console.log(er);
					Swal.fire('Berhasil','Tahapan seleksi berhasil ditambahkan', 'success');
					$('#loading').show();
	    			$('#contentPage').addClass('lodtime');
        			$('#contentPage').load('<?php echo base_url('Panitia/')?>Tahap',function() {
            			$('#loading').hide();
            			$('#contentPage').removeClass('lodtime');
        			});   
				}
				else{
					console.log(er);
					Swal.fire('Terjadi kesalahan',er, 'error');
				}

			},
			error: function(er){
				console.log(er);
				Swal.fire('Terjadi kesalahan',er, 'error');
			}
		});
		
	});
</script>