<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h5>HASH Generator | ITFest4.0 Universitas Sumatera Utara</h5>
			<hr>
			
		</div>
	</div>
	<div class="row">
		<input type="text" name="hesh" id="hesh" class="form-control" placeholder="Ketik sesuatu">
		<br>
		<br>
		<p>Hasil : &nbsp;<div id="hasil"></div></p>
	</div>
</div>

<script type="text/javascript">
	$('#hesh').on('click keyup change', function(event) {
		event.preventDefault();
		$.post('<?php echo base_url('Admin/hashg') ?>', {val: $(this).val()}, function(data) {
			$('#hasil').html(data);
		});
	});
</script>
