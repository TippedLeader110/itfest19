<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-12">
			<h5>kelolah kompetisi | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
		<div class="container-fluid">
			<button class="btn btn-primary" id="tambahDO">Tambah Lomba</button>
		</div>
	</div>
	<div class="row" style="margin-top: 0px;">
		<?php if (isset($dataLomba)): ?>
			<?php $cout = 1 ?>
			<?php foreach ($dataLomba as $key => $dLomba): ?>
				<div class="col-12 col-md-6" style="margin-top: 20px;">
					<div class="card bg-light">
					    <div class="card-header" id="headingThree">
					      	<div class="text-title">
					      		<h5 class="mb-0">
					      		#<?php echo $cout ?>
					      		<?php $cout++; ?>. <?php echo $dLomba->nama_lomba ?>
					      		</h5>
					      	</div>
						</div>
				    <div class="card-body" style="height: 300px;overflow: auto;
					    	background: url('<?php echo base_url('public/kompetisi/logo/'); echo $dLomba->url_logo ?>');
					    	position: relative;
							display: block;
							background-size: cover;
							background-position: center center;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							padding: 0px 0px 0px 0px;
					    	">
	    				<div style="color: black;background-color: rgba(250,250,250,0.9);min-height: 300px;padding: 20px 20px 20px 20px">
	    					<?php echo $dLomba->deskripsi ?>
	    				</div>
					</div>
					    <ul class="list-group list-group-flush">
					    	<li class="list-group-item">
					    		<center><button class="btn btn-outline-success" onclick="openInNewTab('<?php echo $dLomba->rule ?>');">Rule Book</button>&nbsp;<button onclick="editLomba(<?php echo $dLomba->id_lomba ?>);" class="btn btn-outline-primary">Edit</button>&nbsp;<button onclick="hapusLomba(<?php echo $dLomba->id_lomba ?>)" class="btn btn-outline-danger">Hapus</button></center>	
					    	</li>
					    </ul>
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	$('#tambahDO').click(function(event) {
		$('#contentPage').load('<?php echo base_url("admin/tambahLomba"); ?>');
	});

	function openInNewTab(va) {
		var url = "<?php echo base_url('public/kompetisi/rule/')?>" + va;
	  	var win = window.open(url, '_blank');
	  	win.focus();
	}

	function editLomba(id){
		$('#contentPage').load('<?php echo base_url('admin/editLomba/') ?>'+id);
	}

	function reload(){
		$('#contentPage').load('Tahap');
	}

	function hapusLomba(value){
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
			    	url: '<?php echo base_url('admin/dohapusLomba') ?>',
			    	type: 'post',
			    	data: {value:value},
			    	success: function(er){
							console.log(er);
							Swal.fire(
						      'Terhapus!',
						      'Lomba/Kompetisi dengan id #'+ value +' telah di hapus!!.',
						      'success'
						    );
						    $('#contentPage').load('<?php echo base_url('admin/lomba') ?>');
			    	},
			    	error: function(er){
						console.log(er);
						Swal.fire('Gagal','Terjadi kesalahan', 'error');

			    	}
			    });
			}
			else{
			}
		})
	}


</script>