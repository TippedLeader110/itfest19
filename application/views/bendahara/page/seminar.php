<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>Dashboard Bendahara | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
	</div>
	<div class="row" style="margin-top: 0px;">
		

	<div class="col-12 col-md-4">
		<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    <div class="card-header text-capitalize text-center">Peserta Seminar</div>
		  	<div class="card-body">
		  		<div>
		    		<h1 class="card-title text-center">
						<?php echo $sem ?>
		    		</h1>
	    		</div>
	  		</div>
		</div>
	</div>
	<div class="col-12 col-md-4">
		<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
	  	<div class="card-header text-capitalize text-center">Pembayaran Diterima</div>
	  		<div class="card-body">
	  			<div>
	    			<h1 class="card-title text-center">
						<?php echo $sem2 ?>
	    			</h1>
	    		</div>
	  		</div>
		</div>
	</div>
	<div class="col-12 col-md-4">
		<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
	  	<div class="card-header text-capitalize text-center">Pembayaran belum di cek</div>
	  		<div class="card-body">
	  			<div>
	    			<h1 class="card-title text-center">
						<?php echo $sem3 ?>
	    			</h1>
	    		</div>
	  		</div>
		</div>
	</div>
	
	</div>

	
</div>

<div class="container-fluid" style="margin-top: 20px;">
	<div class="row">
		<div class="col-12">
			<h5>Daftar Peserta Seminar | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
	</div>
	<div class="table-responsive-lg">
		<table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead class="bg-custom white-text">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>No Telp.</th>
                        <th>Email</th>
                        <th>IDENTITAS</th>
                        <th>SENDED</th>
                        <th>Status Pembayaran</th>
                        <th></th>
						</thead>
						<tbody>
							<?php $count=0; ?>
							<?php foreach ($seminardata as $key => $value): ?>
								<?php $count++; ?>
								<tr>
									<td><?php echo $value->kode_seminar ?></td>
									<td>
										<?php echo $value->nama ?>
									</td>
									<td><?php echo $value->telepon; ?></td>
									<td><?php echo $value->email; ?></td>
									<td>
										<?php echo $value->identitas ?>
									</td>
									<td>
										<?php if ($value->sended==1): ?>
											Terkirim Otomatis
										<?php endif ?>
										<?php if ($value->sended==0): ?>
											Belum Terkirim
										<?php endif ?>
										<?php if ($value->sended==3): ?>
											Terkirim Manual
										<?php endif ?>
									</td>
										<?php if ($value->status_pembayaran=='1'): ?>
											<td>Sudah Terverifikasi</td>
										<?php endif ?>
										<?php if ($value->status_pembayaran=='0'): ?>
											<?php if ($value->path_bukti==NULL): ?>
											<td>Belum melakukan pembayaran</td>
											<?php endif ?>
											<?php if ($value->path_bukti!=NULL): ?>
											<td>Belum diverifikasi</td>
											<?php endif ?>
										<?php endif ?>
									<td><a href="#" onclick="bayar('<?php echo $value->kode_seminar ?>')"><i class="fas fa-search"></i>Info</a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
	</div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalTim">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title">Informasi Peserta</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-primary" id="simpan" disabled >Simpan</button>
        		&nbsp;<button type="button" class="btn btn-warning" id="batal" style="display: block;" data-dismiss="modal">Batal</button>
        		&nbsp;<button type="button" class="btn btn-alert" id="peringatan" disabled >Beri Peringatan</button>
      		</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	function bayar(id)
	{
		var id2 = encodeURIComponent(id);
		$('.modal-body').load('<?php echo base_url('bendahara/getPeserta?tim=') ?>' + id2);
		$('#modalTim').modal('toggle');		
	}
</script>