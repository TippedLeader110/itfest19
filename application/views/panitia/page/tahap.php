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
				<div class="col-12 col-md-4" style="margin-top: 20px;">
					<div class="card ">
					    <div class="card-header bg-custom text-white" id="headingThree">
						   	<div class="text-title">
						   		<h5 class="mb-0">
					      		Tahap #<?php echo $cout ?>
					      		<?php $cout++; ?>
					      		</h5>
						   	</div>
						</div>
					  	<img src="<?php echo base_url('public/kompetisi/logo/'); echo $logo ?>" class="card-img" alt="..." style="opacity: 0.2">
						<div class="card-img-overlay overflow-auto" style="margin-bottom: 50px;margin-top: 50px;">
					    	<div>
					    		<?php echo $dTahap->deskripsi_tahap ?>
					    	</div>
						</div>
						<ul class="list-group list-group-flush">
					    	<div style="overflow: auto">
					    		<center><button class="btn btn-outline-success" onclick="openInNewTab('<?php echo $dTahap->file_tahap ?>');">Download</button>&nbsp;<button onclick="editTahap(<?php echo $dTahap->id_tahap ?>);" class="btn btn-outline-primary">Edit</button>&nbsp;<button onclick="hapusTahap(<?php echo $dTahap->id_tahap ?>)" class="btn btn-outline-danger">Hapus</button></center>	
					    	</div>
					    </ul>
					</div>
				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	$('#tambahDO').click(function(event) {
		// $('#contentPage').load('tambahTahap');
		$('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>tambahTahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
	});

	function openInNewTab(va) {
		var url = "<?php echo base_url('public/kompetisi/tahap/')?>" + va;
	  	var win = window.open(url, '_blank');
	  	win.focus();
	}

	function editTahap(id){
		$('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/editTahap/')?>'+id,function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
		// $('#contentPage').load('<?php echo base_url('panitia/editTahap/') ?>'+id);
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
						    $('#loading').show();
	    					$('#contentPage').addClass('lodtime');
		        			$('#contentPage').load('<?php echo base_url('Panitia/')?>Tahap',function() {
		            			$('#loading').hide();
		            			$('#contentPage').removeClass('lodtime');
		        			});   
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