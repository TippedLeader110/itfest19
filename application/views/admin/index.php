<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" crossorigin="anonymous"></script>
    <!-- MDBOOTSTRAP -->
      <link href="<?php echo base_url('/assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" crossorigin="anonymous">
      <!-- Bootstrap core CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>"> -->

    <!-- <link rel="stylesheet" href="<?php echo base_url('/assets/css/mdb.min.css') ?>"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/admin.css') ?>">
	<title><?php echo $title ?></title>
    <style type="text/css">
        .lodtime{
            opacity: 0.2;
        }
    </style>
</head>
<body style="background: #fafafa;">
	<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><center><img width="100px" src="<?=base_url()?>assets/images/logo.png" alt="ITFest 4.0"><br>
            	<h4>Dashboard
            	Admin ITFest4.0</h4>
            </center></h3>
            <!-- <strong>
            	<img width="40px" src="<?=base_url()?>assets/images/logo.png" alt="ITFest 4.0">
            </strong> -->
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li id="reportSingkatSide" class="bawah">
                        <a href="#" id="reSingkat">Laporan Singkat</a>
                    </li>
                    <li>
                        <a href="#" id="reportTeam">Team</a>
                    </li>
                    <li>
                        <a href="#" id="reportBerkas">Seminar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pagePesertamenu" data-toggle='collapse' aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i>
                    Administrasi
                </a>
                <ul class="collapse list-unstyled" id="pagePesertamenu">
                	<li>
                		<a href="#" id="kompetisiPage">Kompetisi</a>
                	</li>
                	<li>
                		<a href="#" id="panitiaPage">Panitia</a>
                	</li>
                	<li>
                		<a href="#" id="logTim">Log Tim</a>
                	</li>
                    <li>
                        <a href="#" id="logPanitia">Log Panitia</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!-- NAVBAR -->     
        <?php $this->load->view('admin/navbar') ?>
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

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url('/assets/js/popper.min.js') ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('/assets/js/mdb.min.js') ?>"></script>
  <!-- Your custom scripts (optional) -->
<script type="text/javascript" src="<?php echo base_url('/assets/js/addons/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/admin.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/mmouse.js') ?>"></script>

<script type="text/javascript">
    $('#contentPage').load('<?php echo base_url('Admin/')?>reSingkat',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
$("#KelolahTahapan").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>Tahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#logoutadmin").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>logout',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#kompetisiPage").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>lomba',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#panitiaPage").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>panitia',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#editAdmin").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>Tahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#reSingkat").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>reSingkat',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$("#reportTeam").click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>tim',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$('#logTim').click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>logTim',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});

$('#logPanitia').click(function(event) {
  event.preventDefault();
	    $('#loading').show();
	    $('#contentPage').addClass('lodtime',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
  $('#contentPage').load('<?php echo base_url('Admin/')?>logPanitia',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
});
</script>