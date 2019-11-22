
<div class="col-12">
	
	<?php if (isset($daftarTim)): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>Nama Tim</th><th>Universitas</th><th>Aksi</th>
			</tr>
		<?php foreach ($daftarTim as $key => $dTim): ?>
			<tr>
				<td><?php echo $dTim->nama_team ?></td>
				<td><?php echo $dTim->asal_univ ?></td>
				<td><button class="btn btn-outline-info">Info</button></td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
	<?php echo $this->pagination->create_links(); ?>
	<?php endif ?>
	<?php if (!isset($daftarTim)): ?>
	<center><sub>Nothing to see here.....</sub></center>
	<?php endif ?>
</div>

<script type="text/javascript">
	$("span.page-link a").click(function(e) {
    	e.preventDefault();
    	var href = $(this).attr("href");
    	// console.log(href);
    	<?php if (isset($cari)): ?>
		$('.subContent').load('<?php echo base_url('panitia/subdaftarTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('.subContent').load('<?php echo base_url('panitia/subdaftarTim')?>' + href);
		<?php endif ?>
	});

	$("span.page-link").click(function(e) {
    	e.preventDefault();
    	var href = $(this).find('a').attr("href");
    	// console.log(href);
		<?php if (isset($cari)): ?>
		$('.subContent').load('<?php echo base_url('panitia/subdaftarTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('.subContent').load('<?php echo base_url('panitia/subdaftarTim')?>' + href);
		<?php endif ?>
	});
</script>
