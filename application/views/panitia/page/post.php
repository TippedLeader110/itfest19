<link href="<?php echo base_url('/assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
<!-- <link rel="stylesheet" href="<?php echo base_url('/assets/css/mdb.min.css') ?>"> -->

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>kelolah Pemberitahuan kompetisi | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
		<div class="container-fluid">
			<button class="btn btn-primary" id="tambahDO">Tambah</button>
		</div>
	</div>
	<div class="row" style="margin-top: 0px;">
		<div class="col-12">
			<div class="container-fluid">
				<div class="table-responsive">
					<table id="dtBasicExample" class="table table-borderless" cellspacing="0" width="100%">
						<thead>
							<th></th>
						</thead>
						<?php $count=1; ?>
						<tbody>
						<?php foreach ($post as $key => $var): ?>
								<tr>
									<td>
										<div class="card">
											<div class="card-header d-flex justify-content-between bg-custom text-white" >
												<span style="overflow: hidden;"><h5><?php echo $var->judul ?></h5></span>
												<span><button class="btn btn-light" data-toggle='collapse' data-target='#cbody<?php echo $count ?>' aria-expanded='false'>Isi</button>&nbsp;<button class="btn btn-danger" onclick="hapusPost(<?php echo $var->id_post ?>)">Hapus</button>&nbsp;<button class="btn btn-warning" onclick="editPost(<?php echo $var->id_post ?>)">Ubah</button></span>
											</div>
											<div class="card-body collapse" id="cbody<?php echo $count ?>" >
												<div class="antiblacktext"><?php echo $var->isi ?></div>
											</div>
										</div>
									</td>
								</tr>
							<?php $count++ ?>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$('#tambahDO').click(function(event) {
		$('#contentPage').load('tambahPost');
	});

	$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	function openInNewTab(va) {
		var url = "<?php echo base_url('public/kompetisi/tahap/')?>" + va;
	  	var win = window.open(url, '_blank');
	  	win.focus();
	}

	function editPost(id){
		$('#contentPage').load('<?php echo base_url('panitia/editPost/') ?>'+id);
	}

	function hapusPost(value){
		console.log(value);
		Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Perubahan tidak dapat diundurkan!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya, Hapus!!',
		cancelButtonText: 'Mungkin tidak'
		}).then((result) => {
			if (result.value) {
			    $.ajax({
			    	url: '<?php echo base_url('panitia/hapusPost') ?>',
			    	type: 'post',
			    	data: {value:value},
			    	success: function(er){
			    		if (er==1) {
							console.log(er);
							Swal.fire(
						      'Terhapus!',
						      'Pemberitahuan dengan id #'+ value +' telah di hapus!!.',
						      'success'
						    );
						    $('#contentPage').load('Post');
						}
						else{
							console.log(er);
							Swal.fire('Gagal','Terjadi kesalahan', 'error');
						}

			    		
			    	},
			    	error: function(er){

			    	}
			    });
			}
			else{
			}
		})
	}


</script>