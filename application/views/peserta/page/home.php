		<?php foreach ($dataLomba as $key => $DLomba): ?>
		<?php endforeach ?>
		<?php foreach ($dataTim as $key => $value): ?>			
		<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<div class="card nonround shadow-sm p-3 mb-5 bg-white rounded">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Dashboard Peserta | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12 col-md-4">
					<center>
						<img width="180px;"  src="<?php 
                    echo base_url('public/kompetisi/logo/');
                    echo $DLomba->url_logo;
                     ?>">
                     <h5><?php echo $DLomba->nama_lomba ?></h5>
					</center>
				</div>
				<div class="col-12 col-md-8">
					<div class="card nonround" >
					  	<div class="card-header">
					    	Info Team
					  	</div>
					  	<div class="card-body">
					  		<div>
					  		<div class="col-12 col-md-12">
					  				<div class="table-responsive-lg">
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
					  			<?php if ($value->url_buktipembayaran!=null): ?>
					  			<tr>
					  				<td>Bukti Pembayaran</td><td>&emsp; : &emsp;</td><td><a target="_blank" href="<?php echo base_url('public/kompetisi/userdata/buktipembayaran/'); echo $value->url_buktipembayaran; ?>">Link</a></td>
					  			</tr>
				  				<?php endif ?>
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
								  						<div class="custom-file" style="margin-top: 10px;">
														    <input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
														    <label class="custom-file-label" for="validatedCustomFile">Upload bukti pembayaran</label>
														    <div class="invalid-feedback">Tolong input file</div>
														</div>
								  					<button class="btn btn-primary" id="kirim">Kirim</button>
								  					<button class="btn btn-success" onclick="bayar()">Cara Membayar</button>
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
			</div>
			<div class="row" style="margin-top: 20px">
				<div class="col-12">
					<div class="card nonround">
						<div class="card-header">
							Pemberitahuan
						</div>
						<div class="card-body">
							<div id="bodypost">
								
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<center><h6><a href="#" id="showAll"><i class="fas fa-arrow-down"></i>Lihat Semua<i class="fas fa-arrow-down"></i></a><a href="#" id="hideAll" style="display: none;"><i class="fas fa-arrow-up"></i>Sembunyikan<i class="fas fa-arrow-up"></i></a></h6></center>
								</li>
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
	$('#bodypost').load('<?php echo base_url('Peserta/kontentPost') ?>');
    $('#validatedCustomFile').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

	$('#showAll').click(function(event) {
		event.preventDefault();
		$('#bodypost').load('<?php echo base_url('Peserta/kontentPostAll') ?>');
		$(this).hide();
		$('#hideAll').show();
	});

	$('#hideAll').click(function(event) {
		event.preventDefault();
		$('#bodypost').load('<?php echo base_url('Peserta/kontentPost') ?>');
		$(this).hide();
		$('#showAll').show();
	});

	function bayar()
	{
		Swal.fire(
		{
			title : 'Cara Membayar',
			html:  'Lakukan transkasi sebesar Rp.150.000,- ke rekening <br>1. BNI 0227457404 an Talitha Azura Putri Aulia <br>2. BCA 0222611332 a.n. Tirza Priskila Kinanti Sibuea <br> lalu upload bukti pembayaran.',
			icon:  "info",
			footer: 'Info lebih lanjut hubungi CS: itfestusu@gmail.com'
		})
	}

	function doPost(id)
	{
		$('#contentPage').load("<?php echo base_url('Peserta/post/');?>"+ id);
	}

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