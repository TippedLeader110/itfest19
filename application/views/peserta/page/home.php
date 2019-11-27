
<div id="progres-konten">
		
</div>
<div id="home">
	<div class="container border">

		<table class="table table-bordered" style="margin-top: 10px;"> 
			<!-- Tampilin data --->
			<tr>
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
</div>

<script type="text/javascript">
	$('#progres-konten').load('<?php echo base_url('peserta/tahapPeserta') ?>');
</script>