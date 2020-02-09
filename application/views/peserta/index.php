<!DOCTYPE html>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/peserta.css') ?>">
	<link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />

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
		.lodtime{
			opacity: 0.2;
		}
	</style>
</head>
<body style="background: #fafafa;">
	<!-- Leftbar -->
	<!-- <?php foreach ($dataGet as $key => $value): ?>
	<?php endforeach ?> -->
	<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>
                <?php foreach ($dataLomba as $key => $DLomba): ?>
                    
                <?php endforeach ?>
                <center>
                    <img width="150px;"  src="<?php 
                    echo base_url('assets/images/');
                    // echo $DLomba->url_logo;
                     ?>logo.png">
                    <!-- <h5><?php echo $DLomba->nama_lomba ?></h5> -->
                </center>
            </h3>
            <!-- <strong>
            	<img width="40px;"  src="<?php 
                    echo base_url('assets/images/');
                    // echo $DLomba->url_logo;
                     ?>logo.png">
            </strong> -->
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#home" id="home"  class="">
                    <i class="fa fa-home"></i>
                    Home
                </a>
                
            </li>
            <li>
                <a href="#infoTim" id="infoTim" class="">
                    <i class="fas fa-info-circle"></i>
                    Info Tim
                </a>
            </li>

            <!-- <li>
                <a href="#tahapKompetisi" id="tahapKompetisi" class="">
                    <i class="fa fa-step-forward" aria-hidden="true"></i>
                    Tahap Kompetisi
                </a>
            </li> -->
        </ul>
    </nav>
	<!-- ----- >

    <!-- Page Content  -->
    <div id="content">
        <!-- NAVBAR -->     
       	<?php $this->load->view('peserta/navbar') ?>
        <!-- NAVBAR -->
        <div id="loading" style="position: absolute; top: 50%; left: 5%; height: 100%; width: 100%;">
            <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
        </div>
        <div id="contentPage" class="shadow-sm p-3 mb-5 bg-white rounded " >
        	
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url('/assets/js/panitia.js') ?>"></script>
<script src="<?php echo base_url('/assets/js/peserta.js') ?>"></script>

<script type="text/javascript">
	    $('#contentPage').load('<?php echo base_url('peserta/kontenHome') ?>');

	$('#home').click(function(event) {
	    event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Peserta/')?>kontenHome',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
	});

	$('#infoTim').click(function(event) {
		event.preventDefault();
		$('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Peserta/')?>informasiTim',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
	});

	$('#tahapKompetisi').click(function(event) {
	    event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Peserta/')?>tahapKompetisi',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
	});
</script>