<?php 
	$cur = date("Y-m-d");
	$now  = strtotime($cur);
	$dead  = strtotime($date);
 ?>
	<?php if ($status==1): ?>
	<h4>Status : Tim anda lulus seleksi ini</h4>
<?php endif ?>
<?php if ($status==2): ?>
	<?php if ($file==1): ?>
	
	<div class="row">
		<div class="col-12 col-md-12">
			<h4>Status : File sedang diseleksi - <a target="_blank" href="<?php echo base_url('public/kompetisi/userdata/tahap_tim/'); echo $url ?>" style="text-decoration: underline;">Download File</a></h4> 
			
		</div>
		<?php if ($now < $dead): ?>
			<div class="col-12 col-md-2">
				<button class="btn btn-light" data-toggle='collapse' data-target='#col'>Ganti File</button>
			</div>
		<?php endif ?>
		<?php if ($now > $dead): ?>
			<div class="col-12 col-md-10">
				<h2>Masa seleksi ini sudah habis.</h2>
			</div>
		<?php endif ?>
		<div class="col-12 col-md-10">
			<div class="collapse" id="col">
			<form id="gantifile">
			<div class="row">
				<div class="col-12 col-md-10">
					
				<input type="text" hidden name="id" value="<?php echo $id_tahap ?>">
				<div class="custom-file">
				<input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
				<label class="custom-file-label" for="validatedCustomFile">Kirim File</label>
				<div class="invalid-feedback">Tolong input file</div>
			</div>
			</div>
			<div class="col-12 col-md-2">
				<button class="btn btn-light" id="gantifilekirim<?php echo $id ?>">Kirim</button>
			</div>
			</div>
			</form>
		</div>
		</div>
	</div>
	<?php endif ?>
	<?php if ($file==0): ?>
		
		<form id="upload">
		<div class="row">
			<div class="col-12 col-md-12">
				<h4>Status : Belum mengirim</h4>
			</div>
			<?php if ($now < $dead): ?>
				<div class="col-12 col-md-10">
			<input type="text" hidden name="id" value="<?php echo $id_tahap ?>">
			<div class="custom-file">
			<input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
			<label class="custom-file-label" for="validatedCustomFile">Kirim File</label>
			<div class="invalid-feedback">Tolong input file</div>
		</div>
		</div>
			<?php endif ?>
			<?php if ($now > $dead): ?>
				<div class="col-12 col-md-10">
					<h2>Masa seleksi ini sudah habis.</h2>
				</div>
			<?php endif ?>
		<div class="col-12 col-md-2">
			<?php if ($now < $dead): ?>
				<button class="btn btn-light" id="kirim<?php echo $id ?>">Kirim</button>
			<?php endif ?>
			
		</div>
		</div>
		</form>
	<?php endif ?>
<?php endif ?>
<?php if ($status==0): ?>
	<h4>Status : Tim anda gagal di seleksi ini</h4>
	
<?php endif ?>


<script type="text/javascript">
	$('#validatedCustomFile').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

    $('#kirim<?php echo $id ?>').click(function(event) {
		event.preventDefault();
		$('#upload').submit();
	});

	$('#gantifilekirim<?php echo $id ?>').click(function(event) {
		event.preventDefault();
		$('#gantifile').submit();
	});

	$('#upload').submit(function(event) {
		event.preventDefault();
		console.log(1);
		$.ajax({
			url: '<?php echo base_url('Peserta/uploadTahap') ?>',
			type: 'post',
			data:new FormData(this),
			processData:false,
            contentType:false,
            cache:false,
			success: function(ev)
			{
				console.log(ev);
				if (ev==1) {
					Swal.fire({
						icon: 'success',
					  	title: 'Berhasil !!',
					  	text: 'File berhasil terkirim',
					  	showConfirmButton: false,
					  	timer: 1500
					});
					setTimeout(function(){
					   $('#contentPage').load('<?php echo base_url('peserta/tahapKompetisi') ?>');
					}, 1500);
				}
				else{
					Swal.fire('File gagal dikirim ', 'File terlalu besar atau format tidak didukung', 'error');
				}
			},
			error: function(ev)
			{
				Swal.fire('Kesalahan',"Terjadi kesalahan", 'error');
			}
		})
	});

	$('#gantifile').submit(function(event) {
		event.preventDefault();
		console.log(1);
		$.ajax({
			url: '<?php echo base_url('Peserta/gantiTahap') ?>',
			type: 'post',
			data:new FormData(this),
			processData:false,
            contentType:false,
            cache:false,
			success: function(ev)
			{
				console.log(ev);
				if (ev!='') {
					Swal.fire({
						icon: 'success',
					  	title: 'Berhasil !!',
					  	text: 'File berhasil diganti',
					  	showConfirmButton: false,
					  	timer: 1500
					});
					setTimeout(function(){
					   $('#contentPage').load('<?php echo base_url('peserta/tahapKompetisi') ?>');
					}, 1500);
				}
				else{
					Swal.fire('File gagal dikirim ', 'File terlalu besar atau format tidak didukung', 'error');
				}
			},
			error: function(ev)
			{
				Swal.fire('Kesalahan',"Terjadi kesalahan", 'error');
			}
		})
	});
</script>