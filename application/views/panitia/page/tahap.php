	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/admin.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<button id="tambahTahap" class="btn">Tambah</button>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div id="tambahShow">
					<input type="text" class="form-control " name="judul" id="judul" placeholder="Judul Tahap">
					<textarea class="form-control" name="deskripsi" placeholder="Deskripsi"></textarea>
					<input type="file" name="file">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(e) {
		$('#tambahShow').hide('fast');
	});

	$('#tambahTahap').click(function(e) {
		e.preventDefault();
		// Swal.fire('TEST','TEST','error');
		$('#tambahShow').toggle('fast');
		$('#tambahTahap').toggleClass('btn-primary');
		var ali;
		ali = $('#judul').val();
		console.log(ali);
	});

	$('#judul').keyup(function(event) {
		var ali;
		ali = $('#judul').val();
		console.log(ali);
	});
</script>