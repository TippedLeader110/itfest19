<div class="table-responsive-lg">
		<table id="dtBasicExample" class="table table-striped table-bordered white-text" cellspacing="0" width="100%">
			<thead class="bg-custom text-white">
				<th>No.</th>
                <th>Nama Tim</th>
                <th>Universitas</th>
                <th>Status</th>
                <th></th>
			</thead>
			<tbody>
				<?php $count=1; ?>
				<?php foreach ($seleksiTim as $key => $dTim): ?>
					<tr>
						<td><?php echo $count ?></td>
						<td><?php echo $dTim->nama_team ?></td>
						<td><?php echo $dTim->asal_univ ?></td>

						<?php if ($dTim->status_tim>=1): ?>
							<td>Sudah Terverifikasi</td>
						<?php endif ?>
						<?php if ($dTim->status_tim==NULL): ?>
							<?php if ($dTim->j!=0): ?>
								<td>Belum Terverifikasi</td>
							<?php endif ?>
							<?php if ($dTim->j==0): ?>
								<td>Belum Mengirim</td>
							<?php endif ?>
						<?php endif ?>
						<?php if ($dTim->status_tim=='0'): ?>
							<td>Ditolak</td>
						<?php endif ?>
						<?php if ($dTim->id!=''): ?>
							<td><a href="#" onclick="timInfo(<?php echo $dTim->id ?>)"><i class="fas fa-search"></i>Seleksi</a></td>
						<?php endif ?>
						<?php if ($dTim->id==''): ?>
							<td><a href="#" onclick="timNotsend(<?php echo $lomba; echo ","; echo $tahap; echo ","; echo $dTim->id_tim; ?>)"><i class="fas fa-plus"></i><span class="text-danger">Luluskan</span></a></td>
						<?php endif ?>
					</tr>
				<?php $count++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

<div class="modal" tabindex="-1" role="dialog" id="modalTim">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Informasi Detail Tim</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      		</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">

	$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	function timInfo(id)
	{
		console.log(id);
		$('.modal-body').load('<?php echo base_url('panitia/modalTimseleksi?tim=') ?>' + id);
		$('#modalTim').modal('toggle');
	}

	function timNotsend(lomba, tahap, tim){
		// console.log(lomba);
		// console.log(tahap);
		// console.log(tim);
		Swal.fire({
			title: 'Tunggu Dulu !!',
			text: "Apakah anda yakin ingin meluluskan tim ini ?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, tentu saja !!',
			cancelButtonText: 'Mungkin lain kali'
			}).then((result) => {
				if (result.value) {
				    $.ajax({
				    	url: '<?php echo base_url('panitia/manual') ?>',
				    	type: 'post',
				    	data: {tim:tim, lomba:lomba, tahap: tahap},
				    	success: function(er){
								console.log(er);
								if (er==1) {
									Swal.fire(
								      'Berhasil!!',
								      'Tim berhasil diluluskan !!.',
								      'success'
							    	);
							    	doReload();
								}else{
									Swal.fire(
								      'Gagal !!',
								      'Gagal, terjadi kesalahan dengan server !!!',
								      'success'
							    	);
								}
				    	},
				    	error: function(er){
							console.log(er);
							Swal.fire('Gagal','Terjadi kesalahan', 'error');

				    	}
				    });
				}
				else{
				}
			});
	}


</script>