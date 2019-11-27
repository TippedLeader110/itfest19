<!-- <?php foreach ($dataGet as $key => $value): ?>
	<?php endforeach ?> -->
	<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>
                <center>
                    <h5>Logo IT Fest 2020</h5>
                </center>
            </h3>
            <strong>
            	<!-- <img width="40px" src="<?php echo base_url("public/kompetisi/logo/"); echo $value->url_logo; ?>"> -->
            </strong>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#home" id="home" data-toggle="collapse" aria-expanded="false" class="">
                    <i class="fa fa-home"></i>
                    Home
                </a>
                
            </li>
            <li>
                <a href="#progres" id="progres" data-toggle="collapse" aria-expanded="false" class="">
                    <i class="fa fa-tasks"></i>
                    Progres
                </a>
            </li>

            <li>
                <a href="#uploadSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    Upload Berkas
                </a>
                <ul class="collapse list-unstyled" id="uploadSubmenu">
                    <li>
                        <a href="#" id="uploadBuktiPembayaran">Upload Bukti Pembayaran</a>
                    </li>
                    <li>
                        <a href="#" id="uploadBerkasPendaftaran">Upload Berkas Pendaftaran</a>
                    </li>
                </ul>
            </li>

            <br><br><br><br><br><br><br><br><br>
            <li>
                <a href="<?php echo base_url('index.php/peserta/logout') ?>">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>
        </ul>

    </nav>
<script type="text/javascript">
    $('#contentPage').load('<?php echo base_url('peserta/tahapPeserta') ?>');

    $('#home').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/kontenHome')?>');
    });
    $('#progres').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/tahapPeserta')?>');
    });
    $('#uploadBuktiPembayaran').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/upload_bukti_pembayaran')?>');
    });
    $('#uploadBerkasPendaftaran').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url("peserta/upload_berkas")?>');
    });

    
       $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
</script>