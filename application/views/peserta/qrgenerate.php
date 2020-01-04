<!DOCTYPE html>
<html>
<head>
	<title>GENERATE</title>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-barcode.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jqueryqr.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<div style="width: 500px;">
		<div class="row">
			<div class="col-md-8 offset-md-1 col-12">
				Jika QR tidak muncul tolong matikan fitur LITE dari Google Chrome <br>
				<button onClick="window.print()" class="btn btn-primary">Page to PDF</button>
				<div id="qr" style="margin-top: 10px;">
					
				</div>
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