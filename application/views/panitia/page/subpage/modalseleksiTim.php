<?php $count=1; ?>
<?php foreach ($modalTim as $key => $mTim): ?>
<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<table>
			<tr>
				<td>Nama Team</td><td> : <?php echo $mTim->nama_team ?></td>
			</tr>
			<tr>
				<td>Universitas</td><td> : <?php echo $mTim->asal_univ ?></td>
			</tr>
			<tr>
				<td>
					File Tim
				</td>
				<td>
					 : <a target="_blank" href="<?php echo base_url('public/kompetisi/userdata/tahap_tim/'); echo $mTim->file;  ?>" style="text-decoration: underline;">DOWNLOAD</a>
				</td>
			</tr>
			<tr>
				<td>
					Status Tim
					<!-- <?php echo $mTim->status_tim ?> -->
				</td>
				<td>
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
			<input hidden type="text" name="tahap" id="tahap" value="<?php echo $mTim->id_tahap ?>">
			<input hidden type="text" name="tim" id="tim" value="<?php echo $mTim->id_tim ?>">
		</table>
		<div id='loadingmessage' style='display:none;margin-top: 50px;'>
		       <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
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
		console.log(value);
		var tim = $('#tim').val();
		console.log(tim);
		var tahap = $('#tahap').val();
		console.log(tahap);
		$.ajax({
			url: '<?php echo base_url('panitia/saveStatus') ?>',
			type: 'post',
			data: {value: value,tim:tim,tahap:tahap},
			success: function(er){
				console.log(er);
				$('#modalTim').modal('hide'); $('.modal-backdrop').remove();
				$('#sub').load('<?php echo base_url('panitia/subTim?id='); echo $mTim->id_tahap ?>');		
				Swal.fire('Sukses','Perubahan disimpan','success');
			},
			error: function(er){
				console.log(er);
				Swal.fire('Kesalahan','Terjadi kesalahan pada sistem','error');
			}
		})
	});
</script>
