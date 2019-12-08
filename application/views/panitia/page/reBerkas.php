<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>Laporan berkas peserta | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
		</div>
		<div class="container-fluid">
			<button class="btn btn-primary" id="seleksiB">Seleksi Berkas</button>
		</div>
	</div>
	<?php foreach ($reBerkas as $key => $Berkas): ?>
	<?php endforeach ?>
	<?php foreach ($reSingkat as $key => $Singkat): ?>
	<?php endforeach ?>
	<div class="row" style="margin-top: 15px;">
		<div class="col-12 col-md-6">
			<div class="card " style="background-color: #7386D5">
			<div class="card-header text-white">
				Laporan Berkas
			</div>
			<ul class="list-group list-group-flush justify-content-between">
			    <li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah berkas belum seleksi
				    <span class="badge badge-primary badge-pill"><?php echo $Berkas->jumlah_new ?></span>
				</li>
			    <li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah berkas diterima
				    <span class="badge badge-primary badge-pill"><?php echo $Berkas->jumlah_lulus ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah berkas ditolak
				    <span class="badge badge-primary badge-pill"><?php echo $Berkas->jumlah_fail ?></span>
				</li>
			</ul>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card " style="background-color: #7386D5">
			<div class="card-header text-white">
				Laporan Tim
			</div>
			<ul class="list-group list-group-flush justify-content-between">
			    <li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah Tim mendaftar
				    <span class="badge badge-primary badge-pill"><?php echo $Berkas->jumlah ?></span>
				</li>
			    <li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah Tim sudah verifikasi pembayaran
				    <span class="badge badge-primary badge-pill"><?php echo $Singkat->jumlah_bayar ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
				    Jumlah Tim belum verifikasi pembayaran
				    <span class="badge badge-primary badge-pill"><?php echo $Berkas->jumlah-$Singkat->jumlah_bayar ?></span>
				</li>
			</ul>
			</div>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	$("#seleksiB").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>seleksiBerkas',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   
</script>