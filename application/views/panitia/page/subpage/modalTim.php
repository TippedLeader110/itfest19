<?php $count=1; ?>
<?php foreach ($modalTim as $key => $mTim): ?>
<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<table>
			<tr>
				<td>Nama Team</td><td> : <?php echo $mTim->nama_team ?></td>
			</tr>
			<tr>
				<td>Universitas</td><td> : <?php echo $mTim->asal_univ ?></td>
			</tr>
			<tr>
				<?php if ($mTim->status_pembayaran=='Active'): ?>
					<td>Verifikasi Pembayaran</td><td> : Sudah terVerifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_pembayaran!='Active'): ?>
					<td>Verifikasi Pembayaran</td><td> : Belum terVerifikasi</td>
				<?php endif ?>
			</tr>
			<tr>
				<?php if ($mTim->status_tim=='1'): ?>
					<td>Verifikasi Berkas</td><td> : Sudah terVerifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_tim==null): ?>
					<td>Verifikasi Berkas</td><td> : Belum terVerifikasi</td>
				<?php endif ?>
				<?php if ($mTim->status_tim==0): ?>
					<td>Verifikasi Berkas</td><td> : Ditolak</td>
				<?php endif ?>
			</tr>
		</table>
	</div>
	<div class="col-12" style="margin-top: 10px;">
		<h5>Anggota Team</h5>
		<hr>
		<table class="table">
			<?php foreach ($modalTim as $key => $mTim2): ?>
				<tr>
					<td colspan="2" style="text-decoration: underline;">Anggota #<?php echo $count ?></td>
				</tr>
				<tr>
					<td>Nama Anggota</td><td> : <?php echo $mTim2->nama_peserta ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td><td> : <?php echo $mTim2->jenis_kelamin ?></td>
				</tr>
				<tr>
					<td>No.HP</td><td> : <?php echo $mTim2->no_hp ?></td>
				</tr>
				<tr>
					<td>Email</td><td> : <?php echo $mTim2->email ?></td>
				</tr>
				<?php $count++; ?>
			<?php endforeach ?>
		</table>
	</div>
</div>
	