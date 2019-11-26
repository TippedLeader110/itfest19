<?php $this->load->view('peserta/page/progres') ?>
<div id="home">
	<div class="container border">

		<table class="table table-bordered" style="margin-top: 10px;"> 
			<!-- Tampilin data --->
			<tr>
				<th>Nama Tim</th>
				<th>Anggota Tim</th>
				<th>Lomba</th>
			</tr>
			<?php foreach($data_tim as $key){?>
			<tr>
				<td><?php echo $key->nama_team ?></td>
				<td><?php echo $key->nama_peserta ?></td>
				<td><?php echo $key->nama_lomba ?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
</div>
