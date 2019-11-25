<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
            <strong>
            	<img width="40px" src="<?php echo base_url("public/kompetisi/logo/"); echo $value->url_logo; ?>">
            </strong>
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
                    Tahapan Kompetisi
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#" id="KelolahTahapan">Kelolah Tahapan</a>
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
        <div id="contentPage">
        	
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url('/assets/js/panitia.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/mmouse.js') ?>"></script>

<script type="text/javascript">
	$('#contentPage').load('reSingkat');
</script>