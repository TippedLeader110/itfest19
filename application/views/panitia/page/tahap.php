<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>kelolah jumlah tahapan seleksi kompetisi | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
		<div class="container-fluid">
			<button class="btn btn-primary" id="tambahDO">Tambah</button>
		</div>
	</div>
	<div class="row" style="margin-top: 0px;">
		<?php if (isset($dataTahap)): ?>
			<?php $cout = 1 ?>
			<?php foreach ($dataTahap as $key => $dTahap): ?>
				<div class="col-4" style="margin-top: 20px;">
					<div class="card">
					    <div class="card-header card-header-mod" id="headingThree">
					      	<div class="text-title">
					      		<h5 class="mb-0">
					      		Tahap #<?php echo $cout ?>
					      		<?php $cout++; ?>
					      		</h5>
					      	</div>
						</div>
				    <div class="card-body card-size">
				    	<div class="text-justify text-card">
				    		<?php echo $dTahap->deskripsi_tahap ?>
				    	</div>
				    	<center><button class="btn btn-outline-success" onclick="openInNewTab('<?php echo $dTahap->file_tahap ?>');">Download</button>&nbsp;<button onclick="editTahap(<?php echo $dTahap->id_tahap ?>);" class="btn btn-outline-primary">Edit</button>&nbsp;<button onclick="hapusTahap(<?php echo $dTahap->id_tahap ?>)" class="btn btn-outline-danger">Hapus</button></center>
				    </div>
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	$('#tambahDO').click(function(event) {
		$('#contentPage').load('tambahTahap');
	});

	function openInNewTab(va) {
		var url = "<?php echo base_url('public/kompetisi/tahap/')?>" + va;
	  	var win = window.open(url, '_blank');
	  	win.focus();
	}

	function editTahap(id){
		$('#contentPage').load('<?php echo base_url('panitia/editTahap/') ?>'+id);
	}

	function reload(){
		$('#contentPage').load('Tahap');
	}

	function hapusTahap(value){
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
			    	url: '<?php echo base_url('panitia/hapusTahap') ?>',
			    	type: 'post',
			    	data: {value:value},
			    	success: function(er){
			    		if (er==1) {
							console.log(er);
							Swal.fire(
						      'Terhapus!',
						      'Tahapan seleksi dengan id #'+ value +' telah di hapus!!.',
						      'success'
						    );
						    reload();
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