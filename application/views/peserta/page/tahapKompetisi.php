		
<div class="row">
	<div class="col-12">
		<div class="card nonround">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Tahap seleksi Kompetisi | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<?php $count=1; ?>
				<?php foreach ($tahap as $key => $valreTahap): ?>
					<div class="col-12">
						<div class="card text-white mb-3" style="background-color: #7386D5">
				  			<div class="card-header" style="height: 80%;">
				  				<div class="float-left" style="padding-top: 5px;">
					  				<h5 class="">Seleksi ke #<?php echo $count; ?></h5>
				  				</div>
				  				<div class="float-right">
				  					<button onclick="getSeleksi(<?php echo $valreTahap->id_tahap; echo ","; echo $count; ?>)" class="btn btn-outline-light" id='btn<?php echo $count ?>' data-toggle="collapse" data-target="#collapse<?php echo $count ?>" aria-expanded="true" aria-controls="collapse<?php echo $count ?>">
				  						Detail Seleksi
				  					</button>
				  				</div>
				  			</div>
				  			<div class="card-body collapse" id="collapse<?php echo $count ?>">
				  				<div class="row">
				  					<div class="col-12">
					  					<div class="row">
					  						<div class="col-12">
						  						<h5>Deskripsi</h5>
						  						<p style="color: white"><?php echo $valreTahap->deskripsi_tahap; ?></p>
						  					</div>
						  					<div class="col-6">
						  						<h5>File Rule</h5>
						  						<p style="color: white"><a href="<?php echo base_url('public/kompetisi/tahap/'); echo $valreTahap->file_tahap ?>">Download File</a></p>
						  					</div>
						  					<div class="col-6">
						  						<h5>Deadline</h5>
					  							<p style="color: white"><?php echo $valreTahap->deadline; ?></p>
						  					</div>
						  					</div>
					  				</div>
					  				<div class="col-12">
					  					<div id="load<?php echo $valreTahap->id_tahap ?>">
					  					
						  				</div>
					  				</div>
				  				</div>
				  			</div>
						</div>
					</div>				
				<?php $count++; ?>	
				<?php endforeach ?>				
			</div>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function getSeleksi(id,d)
	{
		$('#load'+id).load("<?php echo base_url('peserta/detilTahap/');?>" + id + '?data=' + d);
	}
</script>