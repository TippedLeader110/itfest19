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
                <a href="#infoTim" id="infoTim" data-toggle="collapse" aria-expanded="false" class="">
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
<script type="text/javascript">


    $('#home').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/kontenHome')?>');
    });
    $('#infoTim').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/informasiTim')?>');
    });
    $('#uploadBuktiPembayaran').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url('peserta/upload_bukti_pembayaran')?>');
    });
    $('#tahapKompetisi').click(function(event) {
        console.log('log');
        $('#contentPage').load('<?php echo base_url("peserta/tahapKompetisi")?>');
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