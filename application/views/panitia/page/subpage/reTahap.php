<?php foreach ($subreTahap as $key => $vasubreTahap): ?>
	
<?php endforeach ?>

<table>
	<tr>
		<td><h6>Jumlah Tim yang mengikuti Seleksi </h6></td><td><h6> : <?php echo $vasubreTahap->jumlah ?></h6></td>
	</tr>
	<tr>
		<td><h6>Total Tim Lulus Seleksi </h6></td><td><h6> : <?php echo $vasubreTahap->jumlah-$vasubreTahap->jumlah_gagal ?></h6></td>
	</tr>
	<tr>
		<td><h6>Total Tim Gagal Seleksi </h6></td><td><h6> : <?php echo $vasubreTahap->jumlah_gagal ?></h6></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><button class="btn btn-light">Seleksi Tim</button></td>
	</tr>
</table>