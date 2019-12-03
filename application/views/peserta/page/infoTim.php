		<?php foreach ($dataLomba as $key => $DLomba): ?>
		<?php endforeach ?>
		<?php foreach ($dataTim as $key => $value): ?>			
		<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<div class="card nonround">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Informasi Tim <?php echo $value->nama_team ?> | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>Nama Ketua</th><th>Kompetisi yang diikuti</th><th>Asal Universitas</th>
							</tr>
							<tr>
								<td><?php echo $value->nama_peserta ?></td><td><?php echo $DLomba->nama_lomba ?></td><td><?php echo $value->asal_univ ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card nonround">
						<div class="card-header text-white" style="background-color: #7B8AC8">
							Anggota Tim
						</div>
						<div class="card-body">
							<div class="row">
								<?php $count=1; ?>
								<?php foreach ($dataAnggota as $key => $v2): ?>
									<div class="col-4">
										<div class="card">
											<div class="card-header text-white" style="background-color: #808FCF">
												<center>Anggota #<?php echo $count ?></center>
											</div>
											<div class="card-body">
												<div class="mx-auto d-block">
													<center>
														<img width="200px" src="<?php echo base_url('assets/images/user.png') ?>">
														<h4><?php echo $v2->nama_peserta ?></h4>
														<h5><?php echo $v2->email ?></h5>
														<h5><?php echo $v2->jenis_kelamin ?></h5>
														<h5><?php echo $v2->no_hp ?></h5>
													</center>
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
			
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var ver = "<?php echo $value->status_pembayaran ?>";
	// console.log(ver);
	if (ver!='Active') {
		$('#tahapKompetisi').hide('slow');
	}

</script>