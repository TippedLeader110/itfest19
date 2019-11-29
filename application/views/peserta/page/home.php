		<?php foreach ($dataLomba as $key => $DLomba): ?>
		<?php endforeach ?>
		<?php foreach ($dataTim as $key => $value): ?>			
		<?php endforeach ?>
<div class="row">
	<div class="col-12">
		<div class="card nonround">
	  	<div class="card-header bg-custom text-white">
		    <h4 class="">Dashboard Peserta | ITFest USU 2020</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-4">
					
				</div>
				<div class="col-8">
					<div class="card nonround" >
					  	<div class="card-header">
					    	Info Team
					  	</div>
					  	<div class="card-body">
					  		<div class="row">
					  			<div class="col-6">
					  			<table>
					  			<tr>
					  				<td>Nama Tim</td><td> : </td><td><?php echo $value->nama_team ?></td>
					  			</tr>
					  			<tr>
					  				<td>Asal Universitas</td><td> : </td><td><?php echo $value->asal_univ ?></td>
					  			</tr>
					  			<tr>
					  				<td>Status Pembayaran</td><td> : </td>
					  				<td>
					  					<?php if ($value->status_pembayaran=='Active'): ?>
					  					Sudah Bayar
					  					<?php endif ?>
					  					<?php if ($value->status_pembayaran!='Active'): ?>
					  						Belum bayar
					  					<?php endif ?>
					  				</td>
					  			</tr>
					  		</table>
					  		</div>
					  		<div class="col-6">
					  			<table>
					  			<tr>
					  				<td>Jumlah Anggota</td><td> : </td><td><?php echo $value->nama_team ?></td>
					  			</tr>
					  			<tr>
					  				<td>Status Tim</td><td> : </td><td><?php echo $value->asal_univ ?></td>
					  			</tr>
					  			<tr>
					  				<td colspan="2">
					  					<div style="text-decoration: underline;">
					  						<?php if ($value->status_pembayaran=='Active'): ?>
					  						<a href="">Download Bukti Pembayaran</a>
						  					<?php endif ?>
						  					<?php if ($value->status_pembayaran!='Active'): ?>
						  						<a href="">Lakukan Pembayaran/Ganti Bukti Pembayaran</a>
						  					<?php endif ?>
					  					</div>
					  				</td>
					  			</tr>
					  		</table>
					  		</div>
					  		</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
