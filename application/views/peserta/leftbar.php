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
                    echo base_url('public/kompetisi/logo/');
                    echo $DLomba->url_logo;
                     ?>">
                    <h5><?php echo $DLomba->nama_lomba ?></h5>
                </center>
            </h3>
            <strong>
            	<!-- <img width="40px" src="<?php echo base_url("public/kompetisi/logo/"); echo $value->url_logo; ?>"> -->
            </strong>
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
                    <i class="fa fa-info"></i>
                    Info Tim
                </a>
            </li>

            <li>
                <a href="#tahapKompetisi" id="tahapKompetisi" class="">
                    <i class="fa fa-step-forward" aria-hidden="true"></i>
                    Tahap Kompetisi
                </a>
            </li>
        </ul>
    </nav>