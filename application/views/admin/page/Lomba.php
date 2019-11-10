<div class="row">
	<div class="col-12">
		<h3>Kompetisi</h3>
	</div>
</div>
<div class="subpage">
	<div class="row">
		<div class="col-12">
			<h4>Daftar Kompetisi</h4>
			<hr>
		</div>
	</div>
	<div class="row" style="margin-bottom: 5px">
		<div class="col-12">
			<form action="<?php echo base_url('admin\tambahLomba') ?>">
			<button class="btn btn-primary">Tambah</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>No.</th>
						<th>Nama Kompetisi</th>
						<th>Rulebook</th>
						<th colspan="5">Logo</th>
					</tr>
					<?php $num = 1; ?>
					<?php foreach ($dataLomba as $key => $value): ?>
						<tr>
							<td><?php echo $num ?></td>
							<td><?php echo $value->nama_lomba ?></td>
							<td><a href="<?php echo base_url('public/kompetisi/rule/'); echo $value->rule ?>">Download Rulebook</a></td>
							<td><a href="<?php echo base_url('public/kompetisi/logo/'); echo $value->url_logo ?>">Download Logo</a></td>
							<td><button class="btn btn-danger" id="hps" onclick="deleteLomba(<?php echo $value->id_lomba ?>)">Hapus</button> &nbsp;<button id="ubah" class="btn btn-warning">Ubah</button></td>
						</tr>
						<?php $num++; ?>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function deleteLomba(idLomba){
		console.log(idLomba);
		Swal.fire({
			title: 'Hapus Cabang Kompetisi',
			text: 'Apakah anda yakin ingin menghapus cabang kompetisi ini ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: 'Ya, Hapus!!',
			cancelButtonText: 'Batal',
			cancelButtonColor: 'red'
		}).then(result => {
			if (result.value) {
				$.ajax({
					url: '<?php echo base_url('admin/doHapuslomba') ?>',
					type: 'post',
					data: {idLomba},
					error: function(data){
						Swal.fire('Kesalahan !!','Terjadi kesalahan sistem !!', "error");		
						console.log(data);
					},
					success: function(data){
						console.log(data);
						var delay = 1500; 
						setTimeout(function(){ window.location.reload(1) }, delay);
						Swal.fire('Berhasil !!','Cabang lomba berhasil dihapus !!', "success");		
					}
				})
				
			}
			else
				Swal.fire('Batal !!','Cabang lomba tidak jadi dihapus !!', "error");
		})
	}
</script>