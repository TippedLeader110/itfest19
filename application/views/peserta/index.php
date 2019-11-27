<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/peserta.css') ?>">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/mmouse.js') ?>"></script>
	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/bs-stepper/dist/css/bs-stepper.min.css">
	<script src="https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>
	<title><?php echo $title ?></title>

	<style type="text/css">
		.bulat {
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		}
	</style>
</head>
<body style="background: #fafafa;">
	<!-- Leftbar -->
	<?php $this->load->view('peserta/leftbar') ?>
	<!-- ----- >

    <!-- Page Content  -->
    <div id="content">
        <!-- NAVBAR -->
       	<?php $this->load->view('peserta/navbar') ?>
        <!-- NAVBAR -->

        <div id="contentPage">
        	<!-- <?php $this->load->view($page) ?> -->
        </div>

    </div>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url('/assets/js/panitia.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/peserta.js') ?>"></script>

<script type="text/javascript">
	    $('#contentPage').load('<?php echo base_url('peserta/kontenHome') ?>');
</script>