<?php foreach ($post as $key => $value): ?>
	
<?php endforeach ?>
		
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card nonround">
	  	<div class="card-header bg-custom text-white">
		    <button type="button" class="btn btn-secondary" id="back">Kembali</button>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12 col-md-12 antiblacktext">
					<h3 class=""><?php echo $value->judul ?></h3>
					<hr>
					<?php echo $value->isi ?>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#back').click(function(event) {
		event.preventDefault();
		$('#contentPage').load('<?php echo base_url('peserta/kontenHome') ?>');
	});
</script>