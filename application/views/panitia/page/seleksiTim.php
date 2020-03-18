<div class="row">
		<div class="col-12">
			<h5>Seleksi Tahap Tim kompetisi | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
		</div>
		<!-- <div class="container-fluid">
			<button class="btn btn-primary" id="tambahDO">Kelolah Tahapan Seleksi</button>
		</div> -->
	</div>
<?php $count=1; ?>
<div class="row">
<?php foreach ($seleksiTim as $key => $sTim): ?>
	<div class="col-12 col-md-6">
		<div class="card text-white mb-3" style="background-color: #7386D5">
		  	<div class="card-header" style="height: 80%;">
	  			<div class="float-left" style="padding-top: 5px;">
	  				<h5 class="">Tahapan Seleksi ke #<?php echo $count; ?></h5>
				</div>
				<div class="float-right">
					<button onclick="getList(<?php echo $sTim->id_tahap ?>)" class="btn btn-outline-light">Lihat Tim</button>
				</div>
			</div>
		</div>
	</div>
<?php $count++ ?>
<?php endforeach ?>
</div>

<script type="text/javascript">
	function getList(id)
	{
		console.log(id);
		$('#contentPage').load('<?php echo base_url('panitia/subseleksiTim/') ?>'+ id);
	}
</script>
