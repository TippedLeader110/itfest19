<?php foreach ($dataTim as $key => $val1): ?>
	
<?php endforeach ?>
<div class="bg-white" style="padding: 15px 15px 15px 15px;">
	<h4 class="">Informasi Tim</h4>
	<div class="container-fluid" style="margin-top: 20px;">
		<table class="table table-borderless">
			<tr>
				<td>Nama Tim</td>
				<td> <?php echo $val1->nama_team ?></td>
			</tr>
			<tr>
				<td>Kompetisi yang diikuti</td>
				<td><?php echo $val1->nama_lomba ?></td>
			</tr>
			<tr>
				<td>Asal Universitas</td>
				<td><?php echo $val1->asal_univ ?></td>
			</tr>
		</table>
	</div>
	<br>

<?php $x = 1; ?>
	<h5 class="">Anggota Tim</h5>
	<div class="container-fluid">
		<table class="table table-sm" style="">
<?php foreach ($dataAnggota as $key => $val2): ?>

			<tr>
				<th style="background-color: #3479B8;"colspan="2"><h5>Anggota <?php echo $x; ?></h5></th>
			</tr>
			<tr>
				<th>Nama Peserta</th>
				<td><?php echo $val2->nama_peserta ?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td><?php echo $val2->jenis_kelamin ?></td>
			</tr>
			<tr>
				<th>No.HP</th>
				<td><?php echo $val2->no_hp ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $val2->email ?></td>
			</tr>
<?php $x++; ?>
<?php endforeach ?>
		</table>
	</div>
</div>

