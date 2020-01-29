<!-- <?php echo $tag ?> -->
<?php $count=1; ?>
<?php foreach ($modalTim as $key => $mTim): ?>
<?php endforeach ?>
<div id='loadingmessage' style='display:none;margin-top: 50px;'>
    <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
</div>
<div id="wo">
	<div class="row">
	<div class="col-12">
		<button class="btn btn-outline-warning" onclick="$('#pass').toggle('fast')">Ganti Password</button>
		<br>
		<div id="pass" style="margin-top: 15px;display: none">
			<input type="text" id="p1" class="form-control" placeholder="Password baru" style="margin-top: 10px;">
			<input type="text" id="p2" class="form-control" placeholder="Konfirmasi baru" style="margin-top: 10px;">
			<script type="text/javascript">
				
				$('#p1, #p2').on('click keyup change', function(event) {
					var p1 = $('#p1').val();
					var p2 = $('#p2').val();
					// console.log(p1);
					// console.log(p2);
					event.preventDefault();
					if (p1!=p2) {
						$('#ok').prop('disabled', true);
					}
					else if (p1=='' || p2=='') {
						$('#ok').prop('disabled', true);
					}
					else{
						$('#ok').prop('disabled', false);
					}
				});
			</script>
			<button id="ok" disabled class="btn btn-danger" onclick="ganti(<?php echo $mTim->id_tim ?>)"style="margin-top: 10px;">Kirim</button>
		</div>
		<div class="table-responsive">
			<table class="table table-borderless">
			<tr>
				<td>Nama Team</td><td> : <?php echo $mTim->nama_team ?></td>
			</tr>
			<tr>
				<td>Universitas</td><td> : <?php echo $mTim->asal_univ ?></td>
			</tr>
			<tr>
				<?php if ($mTim->status_pembayaran=='Active'): ?>
					<td>Verifikasi Pembayaran</td><td> : Sudah terverifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_pembayaran!='Active'): ?>
					<td>Verifikasi Pembayaran</td><td> : Belum terverifikasi</td>
				<?php endif ?>
			</tr>
			<!-- <tr>
				<?php if ($mTim->status_tim=='1'): ?>
					<td>Verifikasi Berkas</td><td> : Sudah terverifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_tim==null): ?>
					<td>Verifikasi Berkas</td><td> : Belum terverifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_tim==0): ?>
					<td>Verifikasi Berkas</td><td> : Ditolak</td>
				<?php endif ?>
			</tr> -->
			<tr>
		</table>
		</div>
	</div>
	<div class="col-12" style="margin-top: 10px;">
		<h5>Anggota Team</h5>
		<hr>
		<div class="table-responsive">
			<table class="table">
			<?php foreach ($modalTim as $key => $mTim2): ?>
				<tr>
					<td  style="text-decoration: underline;">Anggota #<?php echo $count ?></td>
					<td>Berkas Anggota <a style="text-decoration: underline;" target="_blank" href="<?php echo base_url('public/kompetisi/file_pendaftaran/'); echo $mTim2->url_berkas;?>">Download</a></td>
				</tr>
				<tr>
					<td>Nama Anggota</td><td> : <?php echo $mTim2->nama_peserta ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td><td> : <?php echo $mTim2->jenis_kelamin ?></td>
				</tr>
				<tr>
					<td>No.HP</td><td> : <?php echo $mTim2->no_hp ?></td>
				</tr>
				<tr>
					<td>Email</td><td> : <?php echo $mTim2->email ?></td>
				</tr>
				<?php $count++; ?>
			<?php endforeach ?>
		</table>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	
	$(document).ajaxStart(function() {
		// console.log(1);
		$('#wo').addClass('opaci');
		$('#loadingmessage').show();
	}).ajaxStop((function() {
		$('#wo').removeClass('opaci');
		$('#loadingmessage').hide();
	}));


	function ganti(id)
	{
		var tim = $('#p2').val();
		Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Perubahan tidak dapat diundurkan!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Ganti!!',
		cancelButtonText: 'Mungkin tidak'
		}).then((result) => {
			if (result.value) {
			    $.ajax({
			    	url: '<?php echo base_url('Admin/gpass') ?>',
			    	type: 'post',
			    	data: {val:id, tim:tim},
			    	success: function(er){
							console.log(er);
							Swal.fire(
						      'Berhasil!!',
						      'Password Tim dengan id #'+ id +' telah diganti!!.',
						      'success'
						    );
			    	},
			    	error: function(er){
						console.log(er);
						Swal.fire('Gagal','Terjadi kesalahan', 'error');

			    	}
			    });
			}
			else{
			}
		})
	}


	$('#status').change(function(event) {
		var value = $(this).val();
		var tim = $('#idtim').val();
		$.ajax({
			url: '<?php echo base_url('panitia/saveBerkas') ?>',
			type: 'post',
			data: {value: value,tim:tim},
			success: function(er){
				console.log(er);
				$('#modalTim').modal('hide'); $('.modal-backdrop').remove();
				var tag = '<?php echo $tag ?>';
				tag = encodeURIComponent(tag);
				$(".subContent").load('<?php echo base_url('panitia/subseleksiBerkas?tag=') ?>'+ tag);
				Swal.fire('Sukses','Perubahan disimpan','success');
			},
			error: function(er){
				console.log(er);
				Swal.fire('Kesalahan','Terjadi kesalahan pada sistem','error');
			}
		})
	});
</script>