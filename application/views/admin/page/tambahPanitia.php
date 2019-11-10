<div class="row">
	<div class="col-12">
		<h3>Panitia</h3>
	</div>
</div>
<div class="subpage">
	<div class="row">
		<div class="col-12">
			<h4>Tambah Panitia</h4>
			<hr>
			Menambahkan hak akses untuk panitia cabang kompetisi baru ITFest 4.0 Universitas Sumatera Utara
		</div>
	</div>
	<!-- <form id="datalomba" action="<?php echo base_url('admin\DoTambahlomba') ?>" method="post"> -->
	<form id="form">
	<div class="row">
		<div class="col-12">
			<div class="table-responsive">
				<table class="table table-borderless">
					<tr>
						<td>
							Username*
						</td>
						<td>
							<input type="input" name="nama">
						</td>
					</tr>
					<tr>
						<td>
							Password*
						</td>
						<td>
							<input type="" name="">
						</td>
					</tr>
					<tr>
						<td>Cabang Kompetisi*</td>
						<td>
							<select id="optionKompetisi">
									<option name="null">----- Pilih cabang kompetisi -----</option>
								<?php foreach ($dataLomba as $key => $value): ?>
									<option name="<?php echo $value->id_lomba ?>"><?php echo $value->nama_lomba ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				</table>	
				<hr>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<button class="btn btn-primary">Tambah</button>&nbsp;
			</form>
			<form action="<?php echo base_url('admin\panitia') ?>">
			<button class="btn btn-danger">Batal</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#form').submit(function(event) {
		event.preventDefault(); 
		$.ajax({
			url: '<?php echo base_url('admin/DoTambahlomba') ?>',
			type: 'POST',
			data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            error: function(data){

            	Swal.fire('Kesalahan!!', 'Gagal menghubungkan ke server !!', 'error')
            },
            success: function(data){
            	if (data==1) {
            	Swal.fire('Berhasil !!', 'Kompetisi berhasil ditambahkan !!', 'success')
            	}
            	else
            		Swal.fire('Kesalahan!!', 'Gagal upload !!', 'error')
            }
		})
	});
</script>