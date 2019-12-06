<?php foreach ($getTim as $key => $v): ?>
	
<?php endforeach ?>
<div id='loadingmessage' style='display:none;margin-top: 50px;'>
    <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
</div>
<form id="dataTim">
<div class="row" id="data">
	<div class="col-12">
		<div class="table-responsive-lg">
	<table class="table ">
		<tr>
			<td>Nama Tim</td><td> : <?php echo $v->nama_team ?></td>
		</tr>
		<tr>
			<td>Asal Universitas</td><td> : <?php echo $v->asal_univ ?></td>
		</tr>
		<tr>
			<td>Nama Ketua</td><td> : <?php echo $v->nama_peserta ?></td>
		</tr>
		<tr>
			<td>Email</td><td> : <?php echo $v->email ?></td>
		</tr>
		<tr>
			<td>Bukti Pembayaran</td><td> : <a target="_blank" href="<?php echo base_url("public/kompetisi/userdata/buktipembayaran/"); echo $v->url_buktipembayaran ?>" style="text-decoration: underline;">Download</a></td>
		</tr>
		<tr>
			<td>Status Pembayaran</td>
			<td>
				<input type="text" id="id" hidden name="id" value="<?php echo $v->id_tim ?>">
				<select id="select" name="status" class="form-control">
				<?php if ($v->status_pembayaran=='Active'): ?>
						<option value="1">Diterima</option>
						<option value="0">Abaikan</option>
				<?php endif ?>
				<?php if ($v->status_pembayaran!='Active'): ?>
						<option value="0">Abaikan</option>
						<option value="1">Diterima</option>
				<?php endif ?>
				</select>
			</td>
		</tr>
	</table>
</div>
</div>
</div>
</form>
<script type="text/javascript">
	$(document).ajaxStart(function() {
		$('#data').toggleClass('opaci');
		$('#loadingmessage').show();
	});
	
	$('#simpan').click(function(event) {
		$('#dataTim').submit();
	});

	$('#batal').click(function(event) {
		$('#simpan').prop("disabled",true);
	});

	$('#select').change(function(event) {
		$('#simpan').prop("disabled",false);
	});

	$('#dataTim').submit(function(event) {
		event.preventDefault();
		var a = $('#select').val();
		var b = $('#id').val();
		console.log(a);
		$.ajax({
			url: '<?php echo base_url('bendahara/doSimpan') ?>',
			type: 'post',
			data: {sel: a, id : b},
			success: function(event){
				Swal.fire('Berhasil', 'Perubahan tersimpan', 'success');
				$('#modalTim').modal('hide'); 
				$('.modal-backdrop').remove();
				$('#simpan').prop("disabled",false);
				$('#contentPage').load('<?php echo base_url('bendahara/cekBayar') ?>');
			},
			error: function(event){
				Swal.fire('Kesalahan', 'Terjadi kesalahan', 'error');
			}
		})
	});
</script>