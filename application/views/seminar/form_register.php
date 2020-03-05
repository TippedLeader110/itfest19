<?php $this->load->view('seminar/seminar_header'); ?>

	<section class="mt-5 pt-5">
		<div class="container pt-5">
			<div class="row">
				<div class="col-md-12 col-acara">
					<center>
                                                <h1 class="h1-kompetisi">Daftar Seminar</h1>
					        <hr class="hr-kompetisi mb-5">
                                        </center>
                                        
                                        <div class="col-lg-6 col-xs-12 px-5 pb-5 float-left">
                                                <h1><?php echo $judul_seminar; ?></h1>
                                                <p style="font-family: 'Architects Daughter', cursive;" class="text-secondary"><?php echo $nama_pembicara; ?></p>
                                                <br>
                                                <p  style="font-family: 'JOST_LIGHT';" class="text-secondary" align="left">
                                                        <?php echo $tulisan_seminar; ?>
                                                </p>

                                        </div>
                                        <div class="col-lg-6 col-xs-12 px-5 float-left" id="right1">
                                                <h2>Informasi Personal</h2>
                                                <br>
                                                
                                                <?php if($this->session->flashdata()):?>
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <?php echo $this->session->flashdata('upload_berhasil'); ?>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <br>
                                                <?php endif; ?>
                                                
                                                <form action="register" method="post" id="subdaf">
                                                        <label for="nama" class="fsmall">Nama</label>
                                                                <div class="form-group">
                                                                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control form-blockk rounded-0" required>
                                                                </div>
                                                        <label for="email" class="fsmall">Email</label>
                                                                <div class="form-group">
                                                                <input type="email" name="email" id="email" placeholder="Email" class="form-control form-blockk rounded-0" required>
                                                                </div>
                                                        <label for="telepon" class="fsmall">Telepon</label>
                                                                <div class="form-group">
                                                                <input type="number" name="telepon" id="telepon" placeholder="Telepon" class="form-control form-blockk rounded-0" required>
                                                                </div>
                                                        <label for="identitas" class="fsmall">Nomor Identitas (No.KTP / No.Paspor / NIM) </label>
                                                                <div class="form-group">
                                                                <input type="text" name="identitas" id="identitas" placeholder="Nomor Identitas" class="form-control form-blockk rounded-0" required>
                                                                </div>
                                                        <label for="nama" class="fsmall">Tanggal Lahir</label>
                                                                <div class="form-group">
                                                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-blockk rounded-0" required>
                                                                </div>
                                                        <br>
                                                        <div class="form-group">
                                                                <input type="submit" id="next" name="submit" value="Daftar" class="btn btn-info btn-block" disabled>
                                                                <a href="<?= base_url('seminar/bayar'); ?>" class="btn btn-outline-primary btn-block">Sudah pernah daftar? Konfirmasi pembayaran disini!</a>
                                                        </div>
                                                        
                                                
                                        </div>

                                        <div class="col-lg-6 col-xs-12 px-5 float-left" id="right2" style="display: none;">
                                                <h2>Konfirmasi Informasi Personal</h2>
                                                <table>
                                                        <tr>
                                                                <td>
                                                                        <label class="fsbig">Nama<div ></div></label>
                                                                </td>
                                                                <td>:</td>
                                                                <td><div id="sNama"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <label class="fsbig">Email<div ></div></label>
                                                                </td>
                                                                <td>:</td>
                                                                <td><div id="sEmail"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <label class="fsbig">Telepon<div ></div></label>
                                                                </td>
                                                                <td>:</td>
                                                                <td><div id="sTelepon"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <label class="fsbig">Nomor Identitas<div ></div></label>
                                                                </td>
                                                                <td>:</td>
                                                                <td><div id="sIdentitas"></div></td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                        <label class="fsbig">Tanggal Lahir<div ></div></label>
                                                                </td>
                                                                <td>:</td>
                                                                <td><div id="sLahir"></div></td>
                                                        </tr>

                                                </table>
                                                <div class="form-group">
                                                        <input type="submit" name="submit" id="daft" value="Daftar" class="btn btn-info btn-block">
                                                        <a class="btn btn-outline-primary btn-block" id="batal">Sudah pernah daftar? Konfirmasi pembayaran disini!</a>
                                                </div>
                                        </div>
                                                </form>
                                        <p class="p-judul-kompetisi">
                                                
                                        </p>
                                        
				</div>
			</div>
		</div>
	</section>
<script type="text/javascript">
        var sub = 0;
        var valid = false;
        $('input').on('change input keyup', function(event) {
                
                $('input').each(function() {
                        if ($(this).val().length > 0) {
                                valid = false;
                        }
                        else{
                                valid = true;
                                return false;
                        }
                        console.log(valid);
                });
                $('#next').prop('disabled', valid);
        
                /* Act on the event */
        });

        $('#batal').click(function(event) {
                event.preventDefault();
                sub=0;
                $('#right2').fadeOut(function() {
                        $('#right1').fadeIn(function() {
                                
                        });
                });
        });
        $('#next').click(function(event) {
                if (sub==0) {
                        event.preventDefault();
                        sub++;
                        $('#right1').fadeOut( function() {
                                $('#sNama').html($('#nama').val());
                                $('#sEmail').html($('#email').val());
                                $('#sTelepon').html($('#telepon').val());
                                $('#sIdentitas').html($('#identitas').val());
                                $('#sLahir').html($('#tgl_lahir').val());
                                
                                $('#right2').fadeIn( function() {
                                        
                                });
                        });
                }
                else{
                        console.log('do');
                        $('#subdaf').unbind('submit').submit();
                }
        });
        // $('#daft').click(function(event) {
        //         console.log(1);
        //         CARI REENEABLE PREVENT DEFAULT
        // });
</script>
<?php $this->load->view('seminar/seminar_footer'); ?>

<a href=""></a>