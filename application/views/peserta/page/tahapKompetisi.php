		
<div class="row">
	<div class="col-12 col-md-12">
		<div class="card nonround shadow-sm p-3 mb-5 bg-white rounded">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Tahap seleksi Kompetisi | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<?php 
					$count=1;
				 ?>		 
				<?php foreach ($tahap as $key => $valreTahap): ?>
					<div class="col-12 col-md-12">
						<div class="card text-white mb-3" style="background-color: #7386D5">
				  			<div class="card-header" style="height: 80%;">
				  				<div class="float-left" style="padding-top: 5px;">
					  				<h5 class="">Seleksi ke #<?php echo $count; ?></h5>
				  				</div>
				  						<input type="text" name="text" id="temp<?php echo $count ?>" hidden>
				  				<?php if ($count==1): ?>
				  						<div class="float-right">
				  						<button onclick="getSeleksi(<?php echo $valreTahap->id_tahap; echo ","; echo $count; ?>)" class="btn btn-outline-light" id='btn<?php echo $count ?>' data-toggle="collapse" data-target="#collapse<?php echo $count ?>" aria-expanded="true" aria-controls="collapse<?php echo $count ?>">
				  						Detail Seleksi
				  						</button>
				  						</div>
				  						<script type="text/javascript">
					  					$.post('<?php echo base_url('Peserta/getTahap') ?>', {tahap: '<?php echo $valreTahap->id_tahap ?>'}, function(data) {
					  						// console.log(data);
					  						$('#temp<?php echo $count ?>').val(data);
					  						// console.log($('#temp<?php echo $count ?>').val());
					  					});
					  					</script>
				  					<?php endif ?>

				  					<?php if ($count!=1): ?>
				  						<div class="float-right" id="message<?php echo $count ?>">
				  						<button onclick="getSeleksi(<?php echo $valreTahap->id_tahap; echo ","; echo $count; ?>)" class="btn btn-outline-light" id='btn<?php echo $count ?>' data-toggle="collapse" data-target="#collapse<?php echo $count ?>" aria-expanded="true" aria-controls="collapse<?php echo $count ?>" style=''>
				  						Detail Seleksi
				  						</button>
				  						</div>

				  						<script type="text/javascript">
				  						console.log($('#temp1').val());
				  						$(document).ajaxStop((function() {
				  							console.log($('#temp<?php echo $count-1 ?>').val());
				  						
				  						if ($('#temp<?php echo $count-1 ?>').val()==1) {
				  							$('#message<?php echo $count ?>').show();
				  						}
				  						else{
				  							$('#message<?php echo $count ?>').hide();	
				  						}
				  						}));
					  					$.post('<?php echo base_url('Peserta/getTahap') ?>', {tahap: '<?php echo $valreTahap->id_tahap ?>'}, function(data) {
					  						// console.log(data);
					  						$('#temp<?php echo $count ?>').val(data);
					  					});
				  						</script>
				  					<?php endif ?>
				  			</div>
				  			<div class="card-body collapse" id="collapse<?php echo $count ?>">
				  				<div class="row">
				  					<div class="col-12 col-md-12">
					  					<div class="row">
					  						<div class="col-12 col-md-12">
						  						<h5>Deskripsi</h5>
						  						<p style="color: white"><?php echo $valreTahap->deskripsi_tahap; ?></p>
						  					</div>
						  					<div class="col-12 col-md-6">
						  						<h5>File Rule</h5>
						  						<p style="color: white"><a target="_blank" style="text-decoration: underline;" href="<?php echo base_url('public/kompetisi/tahap/'); echo $valreTahap->file_tahap ?>">Download File</a></p>
						  					</div>
						  					<div class="col-12 col-md-6">
						  						<h5>Deadline</h5>
					  							<p style="color: white"><?php echo $valreTahap->deadline; ?></p>
						  					</div>
						  					</div>
					  				</div>
					  				<div class="col-12 col-md-12">
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