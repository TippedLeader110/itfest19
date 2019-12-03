		<?php foreach ($dataLomba as $key => $DLomba): ?>
		<?php endforeach ?>
		<?php foreach ($dataTim as $key => $value): ?>			
		<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<div class="card nonround">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Dashboard Peserta | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					<center>
						<img width="180px;"  src="<?php 
                    echo base_url('public/kompetisi/logo/');
                    echo $DLomba->url_logo;
                     ?>">
                     <h5><?php echo $DLomba->nama_lomba ?></h5>
					</center>
				</div>
				<div class="col-8">
					<div class="card nonround" >
					  	<div class="card-header">
					    	Info Team
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
					  			<div class="col-12">
					  				<?php if ($ro!=0): ?>
					  					<div class="alert alert-danger" role="alert">
  										Tim anda tidak dapat melanjutkan kompetisi karena tim anda sudah gugur !!!
										</div>
					  				<?php endif ?>
					  			<table>
					  			<tr>
					  				<td>Nama Tim</td><td>&emsp; : &emsp;</td><td><?php echo $value->nama_team ?></td>
					  			</tr>
					  			<tr>
					  				<td>Asal Universitas</td><td>&emsp; : &emsp;</td><td><?php echo $value->asal_univ ?></td>
					  			</tr>
					  			<tr>
					  				<td>Status Pembayaran</td><td>&emsp; : &emsp;</td>
					  				<td>
					  					<?php if ($value->status_pembayaran=='Active'): ?>
					  					Sudah Bayar
					  					<?php endif ?>
					  					<?php if ($value->status_pembayaran!='Active'): ?>
					  						<?php if ($value->url_buktipembayaran==null): ?>
					  							Belum bayar
					  						<?php endif ?>
					  						<?php if ($value->url_buktipembayaran!=null): ?>
					  							Sedang diverifikasi
					  						<?php endif ?>
					  					<?php endif ?>
					  				</td>
					  			</tr>
					  			<tr>
					  				<td colspan="3">
					  					<div style="text-decoration: underline;">
					  						<!-- <?php echo $value->status_pembayaran ?> -->
					  						<?php if ($value->status_pembayaran=='Active'): ?>
					  						<button class="btn btn-primary" onclick="window.open('<?php echo base_url('public/kompetisi/userdata/buktipembayaran/'); echo $value->url_buktipembayaran; ?>','_blank');">Download Bukti Pembayaran</button>
						  					<?php endif ?>
						  					<?php if ($value->status_pembayaran!='Active'): ?>
						  						<?php if ($value->url_buktipembayaran==null): ?>
						  							<!-- <button class="btn btn-danger" data-toggle='collapse' data-target='#up'>Upload bukti pembayaran</button> -->
						  							<form id="upload">
								  						<div class="custom-file">
														    <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
														    <label class="custom-file-label" for="validatedCustomFile">Upload bukti pembayaran</label>
														    <div class="invalid-feedback">Tolong input file</div>
														</div>
								  					<button class="btn btn-primary" id="kirim">Kirim</button>
								  					</form>
						  						<?php endif ?>
						  						<?php if ($value->url_buktipembayaran!=null): ?>
						  							<button class="btn btn-warning" data-toggle='collapse' data-target='#hide'>Ganti Bukti Pembayaran</button>
						  							<div class="collapse" id="hide" style="margin-top: 10px;">
						  								<form id="upload">
								  						<div class="custom-file">
														    <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
														    <label class="custom-file-label" for="validatedCustomFile">Upload bukti pembayaran</label>
														    <div class="invalid-feedback">Tolong input file</div>
														</div>
								  						<button class="btn btn-primary" id="kirim">Kirim</button>
								  					</form>
						  							</div>
						  						<?php endif ?>
						  					<?php endif ?>
					  					</div>
					  				</td>
					  			</tr>
					  			<!-- <tr>
					  				<td colspan="3">
					  					<div class="collapse" id="up">
					  						
					  					</div>
						  			</td>
					  			</tr> -->
					  		</table>
					  		</div>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 20px">
				<div class="col-12">
					<div class="card nonround">
						<div class="card-header">
							Pemberitahuan
						</div>
						<div class="card-body">
							<ul>
							<?php foreach ($post as $key => $dpost): ?>
								<li><a href="<?php echo base_url('peserta/post/'); echo $dpost->id_post ?>"><?php echo $dpost->judul ?></a></li>
							<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var ver = "<?php echo $value->status_pembayaran ?>";
	// console.log(ver);
	if (ver!='Active') {
		$('#tahapKompetisi').hide('slow');
	}

	$('#kirim').click(function(event) {
		event.preventDefault();
		$('#upload').submit();
	});

	$('#upload').submit(function(event) {
		event.preventDefault();
		console.log(1);
		$.ajax({
			url: '<?php echo base_url('Peserta/uploadBukti') ?>',
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
					  	text: 'Bukti pembayaran berhasil terkirim',
					  	showConfirmButton: false,
					  	timer: 1500
					});
					setTimeout(function(){
					   window.location.reload(1);
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