<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>Seleksi Berkas Tim | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
		</div>
		<div class="container-fluid">
			<!-- <button class="btn btn-primary" id="tambahDO">Seleksi Berkas</button> -->
		</div>
	</div>
	<div class="row" style="margin-top: 15px;">
		<div class="col-8">
			<div class="form-group">
				<input type="text" class="form-control" name="car" id="cari" placeholder="Cari Tim" style="max-width: 400px;">
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				<select id="tag" class="custom-select ">
					<option value="1">Tampilkan Semua</option>
					<option value="2">Tampilkan Belum Verifikasi</option>
					<option value="3">Tampilkan Sudah Verifikasi</option>
					<option value="4">Tampilkan Ditolak</option>
				</select>
			</div>
		</div>
		<div class="col-12">
			<div id='loadingmessage' style='display:none;margin-top: 50px;'>
		       <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
			</div>
			<div class="subContent"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var tag = $('#tag').val();
	tag = encodeURIComponent(tag);
	$(".subContent").load('<?php echo base_url('panitia/subseleksiBerkas?tag=') ?>'+ tag);

	var timer = null;
	var encoded = null;
	var send = null;
	$('#cari,#tag').bind("keyup change",function(event) {
		clearTimeout(timer); 
       	timer = setTimeout(getData, 300)
		$('#loadingmessage').show();
		$('.subContent').hide();
		send = $('#cari').val();
		encoded = encodeURIComponent(send);
		console.log(encoded);
		tag = $('#tag').val();
		tag = encodeURIComponent(tag);
	});

	function getData(){
		$('.subContent').show();
		$('.subContent').load('<?php echo base_url('panitia/subseleksiBerkas?cari=') ?>' + encoded + '&tag=' + tag,function() {
			$('#loadingmessage').hide();
		});
	}

	
</script>