<!DOCTYPE html>
<html>
<head>
	<title>GENERATE</title>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-barcode.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jqueryqr.js') ?>"></script>
</head>
<body>
	<div style="width: 500px;">
		<div>
			<div id="qr">
				
			</div>
		</div>
		<script type="text/javascript">
			$('#qr').qrcode({
				render: "canvas",
				width: 290,
				height: 290,
				text: "<?php echo $data ?>"
			});
		</script>
	</div>
</body>
</html>