<div class="row">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>No.</th>
					<th>Username</th>
					<th>Cabang Lomba</th>
				</tr>
				<?php 

				if (isset($num)) {
					$num = $num;
				}
				else{
					$num = 0;
				}

				 ?>

				<?php foreach ($dataPanitia as $key => $value): ?>
					<?php $num++; ?>
					<tr>
						<td><?php echo $num ?></td>
						<td><?php echo $value->username ?></td>
						<td><?php echo $value->nama_lomba ?></td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("span.page-link a").click(function(e) {
    	e.preventDefault();
    	var href = $(this).attr("href");
    	// console.log(href);
    	<?php if (isset($cari)): ?>
		$('.subContent').load('<?php echo base_url('admin/daftarTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('.subContent').load('<?php echo base_url('admin/daftarTim')?>' + href);
		<?php endif ?>
	});

	$("span.page-link").click(function(e) {
    	e.preventDefault();
    	var href = $(this).find('a').attr("href");
    	// console.log(href);
		<?php if (isset($cari)): ?>
		$('.subContent').load('<?php echo base_url('admin/daftarTim'); ?>' + href + '?cari=<?php echo urldecode($cari) ?>');
		<?php endif ?>
		<?php if (!isset($cari)): ?>
    	$('.subContent').load('<?php echo base_url('admin/daftarTim')?>' + href);
		<?php endif ?>
	});
</script>