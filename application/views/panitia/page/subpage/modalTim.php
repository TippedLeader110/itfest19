<!-- <?php echo $tag ?> -->
<?php $count=1; ?>
<?php foreach ($modalTim as $key => $mTim): ?>
<?php endforeach ?>
<div class="row">
	<div class="col-12">
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
				<div id='loadingmessage' style='display:none;margin-top: 50px;'>
		       		<center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
				</div>
				<td>Status Tim</td>
				<td>
					<input type="text" hidden name="idtim" id="idtim" value="<?php echo $mTim->id_tim ?>">
					<select name="status" id="status" class="form-control">
					<?php if ($mTim->status_tim=='0'): ?>
						<option value="0">Ditolak</option>
						<option value="1">Diterima</option>
					<?php endif ?>
					<?php if ($mTim->status_tim==1): ?>
						<option value="1">Diterima</option>
						<option value="0">Ditolak</option>
					<?php endif ?>
					<?php if ($mTim->status_tim==null): ?>
						<option>Belum terVerifikasi</option>
						<option value="1">Diterima</option>
						<option value="0">Ditolak</option>
					<?php endif ?>
					</select>
				</td>
			</tr>
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
<script type="text/javascript">
	
$(document).ajaxStart(function() {
		$('#loadingmessage').show();
	}).ajaxStop((function() {
		$('#loadingmessage').hide();
	}));

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