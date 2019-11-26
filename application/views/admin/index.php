<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
    <link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/admin.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url('/assets/js/bootstrap.min.js') ?>"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<title><?php echo $title ?></title>
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
            <strong>
            	<img width="40px" src="<?=base_url()?>assets/images/logo.png" alt="ITFest 4.0">
            </strong>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li id="reportSingkatSide" class="bawah">
                        <a href="#" id="reportSingkat">Laporan Singkat</a>
                    </li>
                    <li>
                        <a href="#" id="reportTahap">Team</a>
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
                		<a href="#" id="seleksiTim">Log Tim</a>
                	</li>
                    <li>
                        <a href="#" id="seleksiTim">Log Panitia</a>
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
        <div id="contentPage" class="shadow-sm p-3 mb-5 bg-white rounded">
        	
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url('/assets/js/admin.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/js/mmouse.js') ?>"></script>

<script type="text/javascript">
	// $('#contentPage').load('reSingkat');
</script>