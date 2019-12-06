
<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5>Dafftar Tim | ITFest 4.0 Universitas Sumatera Utara</h5>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive-sm">
					<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead class="bg-custom white-text">
						<th>#</th>
                        <th>Nama Tim</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Nama Ketua</th>
                        <th>Bukti Pembayaran</th>
                        <th></th>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php foreach ($dataTim as $key => $value): ?>
								<?php $count++; ?>
								<tr>
									<td><?php echo $count ?></td>
									<td>
										<?php echo $value->nama_team ?>
									</td>
									<td><?php echo $value->email; ?></td>
									<?php if ($value->status_tim==1): ?>
										<td>Sudah Terverifikasi</td>
									<?php endif ?>
									<?php if ($value->status_tim==NULL): ?>
										<td>Belum Terverifikasi</td>
									<?php endif ?>
									<?php if ($value->status_tim=='0'): ?>
										<td>Ditolak</td>
									<?php endif ?>
									<td>
										<?php echo $value->nama_peserta ?>
									</td>
										<?php if ($value->status_pembayaran=='Active'): ?>
											<td>Sudah Terverifikasi</td>
										<?php endif ?>
										<?php if ($value->status_pembayaran=='Non-Active'): ?>
											<td>Belum Melakukan pembayaran</td>
										<?php endif ?>
									<td><a href="">Info</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>