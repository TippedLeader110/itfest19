<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<div class="row">
	<div class="col-12">
		<h5>Seleksi Tim kompetisi | ITFest4.0 Universitas Sumatera Utara</h5>
		<hr>
	</div>
	<div class="container-fluid">
		<button class="btn btn-primary" id="back"  style="margin-bottom: 10px;">Back</button>
	</div>
</div>
<?php $count=1; ?>
<div class="row">
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
	</div>
	<div class="col-12">
		<div id="sub">
			
		</div>
	</div>
</div>
<script type="text/javascript">
	var tag = $('#tag').val();
	tag = encodeURIComponent(tag);
	$("#sub").load('<?php echo base_url('panitia/subTim?tag=') ?>'+ tag + '&id=<?php echo $id ?>');

	// $('#sub').load('<?php echo base_url('panitia/subTim?id='); echo $id ?>')

	var timer = null;
	var encoded = null;
	var send = null;
	$('#cari,#tag').bind("keyup change",function(event) {
		clearTimeout(timer); 
       	if ($('#cari').val()=='') {
       		timer = setTimeout(prosDataE, 300)
       	}
       	else{
       		timer = setTimeout(prosData, 300)
       	}
		$('#loadingmessage').show();
		$('#sub').hide();
		send = $('#cari').val();
		encoded = encodeURIComponent(send);
		console.log(encoded);
		tag = $('#tag').val();
		tag = encodeURIComponent(tag);
	});

	function prosDataE(){
		$('#sub').show();
		$('#sub').load('<?php echo base_url('panitia/subTim?') ?>tag=' +  tag  + '&id=<?php echo $id ?>',function() {
			$('#loadingmessage').hide();
		});
	}

	function prosData(){
		$('#sub').show();
		$('#sub').load('<?php echo base_url('panitia/subTim?cari=') ?>' + encoded + '&tag=' +  tag  + '&id=<?php echo $id ?>',function() {
			$('#loadingmessage').hide();
		});
	}


	$('#back').click(function(event) {
		event.preventDefault();
		$('#contentPage').load('<?php echo base_url('panitia/seleksiTim') ?>');	
	});
</script>

