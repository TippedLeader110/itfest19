<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
    <link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/mdb.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/assets/js/addons/datatables.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" crossorigin="anonymous"></script>
    <!-- MDBOOTSTRAP -->
      <link href="<?php echo base_url('/assets/css/addons/datatables.min.css') ?>" rel="stylesheet">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" crossorigin="anonymous">
    <style type="text/css">
        .lodtime
        {
            opacity: 0.1;
        }
    </style>
	<title><?php echo $title ?></title>
</head>
<body style="background: #fafafa;">
	<?php foreach ($dataGet as $key => $value): ?>
	<?php endforeach ?>
	<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><center><img width="100px" src="<?php echo base_url("public/kompetisi/logo/"); echo $value->url_logo; ?>"><br>
            	<h4><?php echo $value->nama_lomba ?></h4>
            	<?php $judul =$value->nama_lomba ?>
            </center></h3>
            <!-- <strong>
            	<img width="40px" src="<?php echo base_url("public/kompetisi/logo/"); echo $value->url_logo; ?>">
            </strong> -->
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#" id="reportSingkat">Laporan Singkat</a>
                    </li>
                    <li>
                        <a href="#" id="reportTahap">Laporan Tahapan</a>
                    </li>
                    <li>
                        <a href="#" id="reportBerkas">Laporan Berkas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pagePesertamenu" data-toggle='collapse' aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-user"></i>
                    Tim
                </a>
                <ul class="collapse list-unstyled" id="pagePesertamenu">
                	<li>
                		<a href="#" id="seleksiBerkas">Seleksi Berkas</a>
                	</li>
                	<li>
                		<a href="#" id="daftarTim">Tim Peserta</a>
                	</li>
                	<li>
                		<a href="#" id="seleksiTim">Seleksi Tim</a>
                	</li>
                </ul>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-copy"></i>
                    Kelolah Kompetisi
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#" id="KelolahTahapan">Kelolah Tahapan</a>
                        <a href="#" id="kelolahPost">Pemberitahuan</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">
        <!-- NAVBAR -->     
       	<?php $this->load->view('panitia/navbar') ?>
        <!-- NAVBAR -->
        <div id="loading" style="position: absolute; top: 50%; left: 5%; height: 100%; width: 100%;display: none">
            <center><img src='<?php echo base_url('assets/file/load.gif') ?>'/></center>
        </div>
        <div id="contentPage" class="shadow-sm p-3 mb-5 bg-white rounded " >
        	
        </div>
    </div>
</div>
</body>
</html>
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/panitia.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/popper.min.js') ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url('/assets/js/mdb.min.js') ?>"></script>
  <!-- Your custom scripts (optional) -->
<script type="text/javascript" src="<?php echo base_url('/assets/js/addons/datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/mmouse.js') ?>"></script>


<script type="text/javascript">
    $(document).ready(function($) {
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>reSingkat',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });   
    });

    $("#KelolahTahapan").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>Tahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });

    $("#reportTahap").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>reTahap',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   
    $("#reportSingkat").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>reSingkat',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });  

    $("#reportBerkas").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>reBerkas',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   

    $("#daftarTim").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>daftarTim',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   

    $("#seleksiBerkas").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>seleksiBerkas',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   
    $("#seleksiTim").click(function(event) {
        event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
        $('#contentPage').load('<?php echo base_url('Panitia/')?>seleksiTim',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });   
  $("#logoout").click(function(event) {
      event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
      $('#contentPage').load('<?php echo base_url('Panitia/')?>logout',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });  

  $("#kelolahPost").click(function(event) {
      event.preventDefault();
        $('#loading').show();
        $('#contentPage').addClass('lodtime');
      $('#contentPage').load('<?php echo base_url('Panitia/')?>Post',function() {
            $('#loading').hide();
            $('#contentPage').removeClass('lodtime');
        });
    });  
</script>