
<div class="container-fluid bg-white" style="padding: 10px 10px 10px 10px;">
	<div style="margin-bottom: 25px;">
		<h4 class="">Dashboard Peserta | ITFest USU 2020</h4>
		<hr>
	</div>
	<div class="row" style="margin-top: 20px; padding: 10px 10px 10px 10px;">
		<?php foreach ($dataLomba as $key => $DLomba): ?>
		<?php endforeach ?>
		<?php foreach ($dataTim as $key => $value): ?>
			
		<?php endforeach ?>
		<div class="col-10" style="width: auto;">
			<table border="0" style="width: 400px; margin-top: 17px;" class="table table-borderless">
				<tr>
					<td>Nama Tim</td>
					<td><?php echo $value->nama_team ?></td>
				</tr>
				<tr>
					<td>Asal Universitas</td>
					<td><?php echo $value->asal_univ ?></td>
				</tr>
				<tr>
					<td>Status Pembayaran</td>
					<td><?php echo $value->status_pembayaran ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="card bg-danger" style="width: auto; margin-top: 10px;">
		  <div class="card-header">
		    <b style="color: white; font-size: 22px;">INFORMASI </b>
		  </div>
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item">Isi informasi dari panitia </li>
		  </ul>
	</div>

	
</div>

<!-- 
<div id="progres-konten">
		
</div>
<div id="home">
	<div class="container border">
 -->
<!-- 		<table class="table table-bordered" style="margin-top: 10px;">  -->
			<!-- Tampilin data --->
<!-- 			<tr>
				<th>Nama Tim</th>
				<th>Anggota Tim</th>
				<th>Lomba</th>
			</tr>		
			<?php foreach ($dataTim as $key => $val): ?>
				<tr>
					<td><?php echo $val->nama_team ?></td>
					<td><?php echo $val->nama_peserta ?></td>
					<td><?php echo $val->nama_lomba ?></td>
				</tr>
			<?php endforeach ?>


		</table>
	</div>
</div> -->

<!-- <script type="text/javascript">
	$('#progres-konten').load('<?php echo base_url('peserta/tahapPeserta') ?>');
</script> -->