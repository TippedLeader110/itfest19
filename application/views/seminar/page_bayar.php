<?php $this->load->view('seminar/seminar_header'); ?>

	<section class="mt-5 pt-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-12 col-acara">
					<center>
                                                <h1 class="h1-kompetisi">Pembayaran</h1>
					        <hr class="hr-kompetisi mb-5">
                                        </center>
                                        
                                        <div class="col-lg-6 col-xs-12 px-5 pb-5 float-left">
                                                <h1><?php echo $judul_seminar; ?></h1>
                                                <p style="font-family: 'Architects Daughter', cursive;" class="text-secondary"><?php echo $nama_pembicara; ?></p>
                                                <br>
                                                <p  style="font-family: 'JOST_LIGHT';" class="text-secondary" align="justify">
                                                        <?php echo $tulisan_seminar; ?>
                                                </p>

                                        </div>

                                        <div class="col-lg-6 col-xs-12 px-5 float-left">
                                                <h2>Pembayaran</h2>
                                                <br>
                                                
                                                <?php if($this->session->flashdata()):?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <?php echo $this->session->flashdata('regis_berhasil'); ?>

                                                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button> -->
                                                        </div>
                                                        <br>
                                                <?php endif; ?>
                                                <h4>Kode Pembayaran anda telah dikirim ke Email <b><?php echo $email; ?></b>.<br><br> Silahkan mengecheck email anda untuk melakukan pembayaran. <br> </h4>
                                                <!-- <p  style="font-family: 'JOST_LIGHT';" class="text-secondary" align="justify">
                                                        Pembayaran dilakukan dengan mentransfer dana sebesar Rp35.000,00- ke rekening bank :
                                                                <h1>BNI 0227457404 </h1>
                                                         a.n. Talitha Azura Putri Aulia
                                                </p> -->
                                                <br>
<!--                                                 
                                                <a href="<?= base_url();?>Seminar/registered?id=<?php echo urlencode($id) ?>" class="btn btn-info btn-block rounded-0">Bayar Sekarang</a> -->
                                                <a href="<?= base_url();?>Seminar" class="btn btn-secondary btn-block rounded-0">Beli Tiket Lagi</a>
                                                <br>


<!--
COBA-COBA QRCODE
<?php $kode_seminar = 'ABC'; ?>                                        
<div style='text-align: center;'>
  <img alt='Barcode'
       src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $kode_seminar; ?>&code=MobileQRCode&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0&eclevel=L'/>
</div>
-->

                                                
                                                
                                        </div>

				</div>
			</div>
		</div>
	</section>

<?php $this->load->view('seminar/seminar_footer'); ?>