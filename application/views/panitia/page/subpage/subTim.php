<?php if (isset($seleksiTim)): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>Nama Tim</th><th>Universitas</th><th>Status Tim</th><th>Aksi</th>
			</tr>
		<?php foreach ($seleksiTim as $key => $dTim): ?>
			<tr>
				<td><?php echo $dTim->nama_team ?></td>
				<td><?php echo $dTim->asal_univ ?></td>

				<?php if ($dTim->status_tim==1): ?>
					<td>Sudah Terverifikasi</td>
				<?php endif ?>
				<?php if ($dTim->status_tim==NULL): ?>
					<td>Belum Terverifikasi</td>
				<?php endif ?>
				<?php if ($dTim->status_tim=='0'): ?>
					<td>Ditolak</td>
				<?php endif ?>

				<td><button class="btn btn-outline-info" onclick="timInfo(<?php echo $dTim->id_tim ?>)">Seleksi</button></td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
	<?php endif ?>
	<?php if (!isset($seleksiTim)): ?>
		<center><sub>Nothing to see here.....</sub></center>
	<?php endif ?>

	<?php echo $this->pagination->create_links(); ?>

<div class="modal" tabindex="-1" role="dialog" id="modalTim">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Informasi Detail Tim</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      		</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">

	$("span.page-link a").click(function(e) {
    	e.preventDefault();
    	var href = $(this).attr("href");
    	console.log(href);
    	tag = $('#tag').val();
		tag = encodeURIComponent(tag);
    	<?php if (isset($cari)): ?>
		$('#sub').load('<?php echo base_url('panitia/subTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>'+ '&id=<?php echo $id ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('#sub').load('<?php echo base_url('panitia/subTim')?>' + href + '?id=<?php echo $id ?>');
		<?php endif ?>
	});

	$("span.page-link").click(function(e) {
		// console.log('2');
    	e.preventDefault();
    	var href = $(this).find('a').attr("href");
    	console.log(href);
    	tag = $('#tag').val();
		tag = encodeURIComponent(tag);
		<?php if (isset($cari)): ?>
		$('#sub').load('<?php echo base_url('panitia/subTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>'+ '&id=<?php echo $id ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('#sub').load('<?php echo base_url('panitia/subTim')?>' + href + '?id=<?php echo $id ?>');
		<?php endif ?>
	});

	// console.log(1);
	function timInfo(id)
	{
		console.log(id);
		$('.modal-body').load('<?php echo base_url('panitia/modalTimseleksi?tim=') ?>' + id + '&id=<?php echo $id ?>');
		$('#modalTim').modal('toggle');
	}


</script>