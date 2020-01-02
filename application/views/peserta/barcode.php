<!DOCTYPE html>
<html>
<head>
	<title>Barcode</title>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-barcode.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jqueryqr.js') ?>"></script>
</head>
<body>
	<div style="width: 500px;">
		<?php $var=1 ?>
		<?php foreach ($data as $key => $value): ?>
			<?php 
			echo $value->id_peserta.date('dd'),"----",$value->nama_peserta,"----","<br>";			
			 ?>

			<div id="bar<?php echo $var?>">
				
			</div>
			<div id="qr<?php echo $var?>">
				
			</div>

			<script type="text/javascript">
				var bar = <?php echo $value->id_peserta.date('dd'); ?>;
				console.log(bar);
				$('#bar<?php echo $var ?>').barcode("<?php echo $value->id_peserta ?>", "codabar",{barWidth:2, barHeight:30});
				// $('#bar<?php echo $var ?>').qrcode(bar);
				$('#qr<?php echo $var ?>').qrcode({
					render: "canvas",
					width: 164,
					height: 164,
					text: "<?php echo $value->id_peserta.date('dd') ?>"
				});
			</script>

			<?php $var++; ?>
		
		<?php endforeach ?>
	</div>
</body>
</html>