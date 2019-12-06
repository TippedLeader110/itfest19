
<!DOCTYPE html>
<html>
<head>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <!-- REGISTER CSS -->
        <link rel="icon" href="<?=base_url()?>assets/images/favvicon.png" type="image/png" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/custom/css/style.css">
        
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
	<style type="text/css">
                #my_file {
                display: ;
                font-size: 14px;
                }

                /*#get_file {
                    background: #4D8FAC;
                    color: white;
                    padding: 5px 5px 5px 5px;
                    border-radius: 5px;
                    margin: 3px;
                    cursor: pointer;
                }*/
                [hidden] {
                        display: none !important;
                }
	</style>
</head>

<body class="daftar">
	<nav class="navbar navbar-expand-sm">
		<div class="container">
			<a class="navbar-brand navbar-brand-edit" href="<?=base_url()?>">
				<div class="logo-nav">
          <img src="<?=base_url()?>assets/images/favvicon.png" alt="Beranda" width="50px">
        </div>
			</a>
		</div>
	</nav>
        
        <section id="form-daftar">
		<div class="container">
			<div class="row">

                                <div class="col-md-12 form-title">
                                        <h3>Pendaftaran Peserta Lomba</h3>
                                </div>

                                <div class="col-md-12 col-form">
                                        <form id="form_pendaftaran">
                                                <div class="col-md-6 col-form-2">

                                                        <div>
                                                                <header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white; font-family: JOST_BOLD;">Data Lomba</header>
                                                                <label for="cabang-lomba">&nbsp; Cabang Lomba</label>
                                                                        <div class="form-group pl-3">
                                                                                <select name="cabang_lomba" class="form-control form-block" required>
                                                                                        <option value="" selected disabled>-- Pilih Cabang Lomba --</option>
                                                                                        <!--Nampilin list lomba-->
                                                                                                <?php foreach($data_lomba as $key){?>

                                                                                                <option value="<?php echo $key->id_lomba?>"><?php echo $key->nama_lomba ?></option>


                                                                                                <?php } ?>
                                                                                        <!--/Nampilin list lomba-->
                                                                                </select>	
                                                                        </div>
                                                        </div>

                                                        <div>
                                                                <header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white; font-family: JOST_BOLD;">Data Tim</header>
                                                                <div class="row pl-3">
                                                                        <div class="col-6" style="padding-top: 3px;">
                                                                                <label for="nama-tim">Nama Tim</label>
                                                                                <div class="form-group">
                                                                                        <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" class="form-control form-block" required>	
                                                                                        <i style="color:red; font-size: 12pt;" class="warning" id="nama_tim_warning_red">Nama tim sudah digunakan</i>
                                                                                        <i style="color:green; font-size: 12pt;" class="warning" id="nama_tim_warning_green">Nama tim bisa digunakan</i>
                                                                                </div>
                                                                                <!-- ------------------------------->
                                                                                <label>Username</label>
                                                                                <div class="form-group">
                                                                                                <input type="text" name="username" placeholder="Username Tim" class="form-control required" id = "username_tim" required>
                                                                                
                                                                                <i style="color:red; font-size: 12pt;" class="warning" id="username_warning_red">Username harus terdiri dari 6-12 karakter</i>
                                                                                <i style="color:red; font-size: 12pt;" class="warning" id="username_warning_red_red">Username sudah digunakan</i>		
                                                                                <i style="color:green; font-size: 12pt;" class="warning" id="username_accept">Username dapat digunakan</i>		
                                                                                </div>
                                                                                <!-- -------------------------------- -->
                                                                                <label>Password Tim</label>
                                                                                <div class="form-group">
                                                                                        <input type="password" name="password_tim" id="password_tim" placeholder="Nama Tim" class="form-control" required>	
                                                                                </div>
                                                                        </div>
                                                                        <!-- batas kanan kiri-->
                                                                        <div class="col-6" style="padding-top: 3px;">
                                                                                <label>Asal Universitas</label>
                                                                                <div class="form-group">
                                                                                        <input type="text" name="universitas_tim" id="universitas_tim" placeholder="Asal Universitas" class="form-control" required>	
                                                                                </div>
                                                                                <!-- -------------------------------- -->					
                                                                                <label>Konfirmasi Password Tim</label>
                                                                                <div class="form-group">
                                                                                        <input type="password" name="konfirmasi_password_tim" placeholder="Konfirmasi Password" id="konfirmasi_password_tim" class="form-control" required>	
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <!-- ------------------------------------------------------------ -->
                                                        <div>
                                                                <header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white; font-family: JOST_BOLD;">Ketua Tim</header>
                                                                <div class="row pl-3">
                                                                        <div class="col-6" style="padding-top: 3px;">
                                                                                <label>Nama Ketua</label>
                                                                                        <div class="form-group">
                                                                                                <input type="text" name="nama_ketua" placeholder="Nama Ketua" class="form-control" required>
                                                                                        </div>
                                                                                <!-- -------------------------------- -->
                                                                                <label>No. HP Ketua</label>
                                                                                        <div class="form-group">
                                                                                                <input type="number" name="no_hp_ketua" placeholder="No. HP Ketua" class="form-control" required>
                                                                                        </div>
                                                                        </div>
                                                                        <!-- batas kanan kiri-->
                                                                        <div class="col-6" style="padding-top: 3px;">
                                                                                <label>Jenis Kelamin</label>
                                                                                        <div class="form-group">
                                                                                                <select class="form-control" name="jenis_kelamin_ketua" required>
                                                                                                        <option selected disabled value="">--Pilih Jenis Kelamin--</option>
                                                                                                        <option value="Laki-laki">Laki-laki</option>
                                                                                                        <option value="Perempuan">Perempuan</option>
                                                                                                </select>
                                                                                        </div>

                                                                                <label>Email Ketua</label>
                                                                                        <div class="form-group">
                                                                                                <input type="email" name="email_ketua" placeholder="Email" class="form-control" required>
                                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row ml-3">
                                                                        <label>Upload Berkas Ketua</label>
                                                                        <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                              </div>
                                                              <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_ketua" id="file_ketua" 
                                                                  aria-describedby="inputGroupFileAddon01" required>
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                              </div>
                                                            </div>
                                                            <i style="font-size: 12pt;color:red; line-height: 16px;"><br>Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan KTM yang dicompress menjadi ZIP/RAR/7ZIP (Max Size = 2MB).</i>	
                                                                </div>
                                                        </div>
                                                        <!-- ------------------------------------------------------------ -->
                                                </div>

                                                <!-- Batas Kanan dan kiri -->

                                                <div class="col-md-6 col-form-2 form-anggota"> <!-- bagian kanan -->
                                                        <div>
                                                                <header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white; font-family: JOST_BOLD;">Anggota Tim 1</header>
                                                                <div class="row pl-3">
                                                                        <div class="col-6" >
                                                                                <label style="padding-top: 3px;">Nama Anggota</label>
                                                                                        <div class="form-group">
                                                                                                <input type="text" name="nama_anggota1" placeholder="Nama Anggota" class="form-control">
                                                                                        </div>
                                                                                <!-- -------------------------------- -->
                                                                                <label>No. HP</label>
                                                                                        <div class="form-group">
                                                                                                <input type="number" name="no_hp_anggota1" placeholder="No. HP" class="form-control">
                                                                                        </div>
                                                                                <!-- -------------------------------- -->

                                                                        </div>
                                                                        <!-- batas kanan kiri-->
                                                                        <div class="col-6">
                                                                                <label style="padding-top: 3px;">Jenis Kelamin</label>
                                                                                        <div class="form-group">
                                                                                                <select class="form-control" name="jenis_kelamin1">
                                                                                                        <option selected disabled value="">--Pilih Jenis Kelamin--</option>
                                                                                                        <option value="Laki-laki">Laki-laki</option>
                                                                                                        <option value="Perempuan">Perempuan</option>
                                                                                                </select>
                                                                                        </div>
                                                                                <!-- -------------------------------- -->					
                                                                                <label>Email</label>
                                                                                        <div class="form-group">
                                                                                                <input type="email" name="email_anggota1" placeholder="Email" class="form-control">
                                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                <div class="row ml-3">
                                                                        <label>Upload Berkas Anggota 1</label>
                                                                        <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupFileAddon04">Upload</span>
                                                              </div>
                                                              <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="file_anggota1" id="inputGroupFile04"
                                                                  aria-describedby="inputGroupFileAddon04">
                                                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                              </div>
                                                              <i style="font-size: 12pt;color:red; line-height: 16px;"><br>Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan KTM yang dicompress menjadi ZIP/RAR/7ZIP (Max Size = 2MB).</i>	
                                                            </div>
                                                                </div>




                                                        </div>

                                                        <!-- Tambah Angggota --->
                                                        <div class="row my-5 ml-2">
                                                        <button type="button" class="btn btn-info"  id="addAnggota">Tambah Anggota</button>
                                                    	</div>
                                                        <div class="row my-5 ml-2">
                                                                
                                                                  <div id="demo" class="collapse">
                                                                            <div class="my-2">
                                                                                <header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white; font-family: JOST_BOLD;">Anggota Tim 2</header>
                                                                                <div class="row pl-3">
                                                                                        <div class="col-6">
                                                                                                <label style="padding-top: 3px;">Nama Anggota</label>
                                                                                                        <div class="form-group">
                                                                                                                <input type="text" name="nama_anggota2" placeholder="Nama Anggota" class="form-control">
                                                                                                        </div>
                                                                                                <!-- -------------------------------- -->
                                                                                                <label>No. HP</label>
                                                                                                        <div class="form-group">
                                                                                                                <input type="number" name="no_hp_anggota2" placeholder="No. HP" class="form-control">
                                                                                                        </div>
                                                                                                <!-- -------------------------------- -->

                                                                                        </div>
                                                                                        <!-- batas kanan kiri-->
                                                                                        <div class="col-6">
                                                                                                <label style="padding-top: 3px;">Jenis Kelamin</label>
                                                                                                        <div class="form-group">
                                                                                                                <select class="form-control" name="jenis_kelamin2">
                                                                                                                        <option selected disabled value="">--Pilih Jenis Kelamin--</option>
                                                                                                                        <option value="Laki-laki">Laki-laki</option>
                                                                                                                        <option value="Perempuan">Perempuan</option>
                                                                                                                </select>
                                                                                                        </div>
                                                                                                <!-- -------------------------------- -->					
                                                                                                <label>Email</label>
                                                                                                        <div class="form-group">
                                                                                                                <input type="email" name="email_anggota2" placeholder="Email" class="form-control">
                                                                                                        </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row ml-3">
                                                                                        <label>Upload Berkas Anggota 2</label>
                                                                                        <div class="input-group">
                                                                              <div class="input-group-prepend">
                                                                                <span class="input-group-text" id="inputGroupFileAddon07">Upload</span>
                                                                              </div>
                                                                              <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="inputGroupFile07" name="file_anggota2" 
                                                                                  aria-describedby="inputGroupFileAddon07">
                                                                                <label class="custom-file-label" for="inputGroupFile07">Choose file</label>
                                                                              </div>
                                                                            </div>
                                                                            <i style="font-size: 12pt;color:red; line-height: 16px;"><br>Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan KTM yang dicompress menjadi ZIP/RAR/7ZIP (Max Size = 2MB).</i>	
                                                                                </div>

                                                                        </div>
                                                                  </div>
                                                        </div>
                                                        <!-- -- --->
                                                        <div style="margin-top: 20px;">
                                                                <button type="submit" class="btn btn-submit my-2">Submit</button> <br>
                                                                <a href="<?= base_url();?>" class="btn btn-submit my-2">Beranda</a>
                                                        </div>

                                                </div>

                                        </form>
                                </div>
                        </div>
                </div>
	</section>



        <script src="<?=base_url()?>assets/custom/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/custom/js/popper.min.js"></script>
	<script src="<?=base_url()?>assets/custom/js/bootstrap.min.js"></script>
<script type="text/javascript">
	// Variable untuk pengecekan form
    var valid = true;
    // Inisialisasi untuk mengetahui jumlah anggota anggota
    var jumlah_anggota = 0;
    // Fungsi untuk melakukan pengecekan apakah form kosong atau tidak
    $(document).ready(function(){
    	$('.warning').hide('fast');

    	$('#nama_tim').keyup(function(event) {
    		var nama_tim = $('#nama_tim').val();
    		$.ajax({
					url: '<?php echo base_url('index.php/Pendaftaran/cek_nama_tim') ?>',
					type: 'post',
					data: {nama_tim},
					error: function(data){		
						console.log(data);
					},
					success: function(data){
						if(data == 0){
							$('#nama_tim_warning_red').hide('slow');
							$('#nama_tim_warning_green').show('slow');
							valid = true;
						}
						else{
							$('#nama_tim_warning_green').hide('slow');
							$('#nama_tim_warning_red').show('slow');
							valid = false;
						}
					}
				})
    	});

        $('#username_tim').keyup(function(){
        	var username = $('#username_tim').val();
        	if(username.length == 0 || username.length < 6 || username.length > 12){
        		$('#username_warning_red').show('slow');
        		$('#username_warning_red_red').hide('slow');
        		valid = false;
        	}
        	else{
        		$('#username_warning_red').hide('slow');
        		$.ajax({
        			url: '<?php echo base_url('Pendaftaran/cekUsername') ?>',
        			type: 'POST',
        			data: {username : username},
        			success: function(da)
        			{
        				console.log(da);
	        			if (da!=0) {
	        				valid = false;	
	        				$('#username_warning_red_red').show('slow');
	        			}
	        			else
	        			{
	        				$('#username_warning_red_red').hide('slow');
	        				$('#username_accept').show('slow');
	        				valid = true;
	        			}
        			}
        		})
        	}
        });

		$('#konfirmasi_password_tim').keyup(function(){
        	var password = $('#password_tim').val();
        	var konfirmasi = $('#konfirmasi_password_tim').val();
        	if(password != konfirmasi){
        		$('#password_warning_red').show('slow');
        		valid = false;
        	}
        	else{
        		$('#password_warning_red').hide('slow');
        		valid = true;
        	}
        });

        $('#password_tim').keyup(function(){
        	var password = $('#password_tim').val();
        	var konfirmasi = $('#konfirmasi_password_tim').val();
        	if(password != konfirmasi)
        		$('#password_warning_red').show('slow');
        	else
        		$('#password_warning_red').hide('slow');
        });

        $('#form_pendaftaran').submit(function(event){
        	// Menambah jumlah anggota
        	event.preventDefault();
        	if($('#nama_anggota1').val() != ""){
        		jumlah_anggota++;
        		
        	}
        	//if($('#nama_anggota2').val() != ""){
        	//	jumlah_anggota++;
        	//}

        	
        });

        //Fungsi cek form
        function cek_data_team(){
        	if($('#nama_tim').val() == "" ){
        		valid = false;
        		$('#nama_tim').focus();
        	}
        	else if($('#username_tim').val() == "" || $('#username_tim').val().length < 6 || $('#username_tim').val().length > 12){
        		valid = false;
        		$('#username_tim').focus();
        	}
        	else if($('#password_tim').val() == ""){
        		valid = false;
        		$('#password_tim').focus();	
        	}
        	else if($('#konfirmasi_password_tim').val() == ""){
        		valid = false;
        		$('#konfirmasi_password_tim').focus();	
        	}
        	else if($('#universitas_team').val() == ""){
        		valid = false;
        		$('#universitas_team').focus();	
        	}
        } 

        // Fungsi yang dijalankan jika klik submit
        $('#form_pendaftaran').submit(function(event){
        	if(valid){
	        	event.preventDefault(); 

	        	var data_form = new FormData(this);

	        	data_form.append('jumlah_anggota',jumlah_anggota);

				$.ajax({
					url: '<?php echo base_url('index.php/Pendaftaran/daftar_kompetisi') ?>',
					type: 'POST',
					data:data_form,
		            processData:false,
		            contentType:false,
		            cache:false,
		            async:false,
		            error: function(data){

		            	Swal.fire('Kesalahan!!', 'Gagal menghubungkan ke server !!', 'error')
		            },
		            success: function(data){
		            	console.log(data);
		            	if (data==1) {
		            	Swal.fire('Pendaftaran Berhasil !!', 'Berkas tim akan diverifikasi Panitia !!', 'success')
		            	}
		            	else
		            		Swal.fire('Kesalahan!!', 'Username telah digunakan !!', 'error')
		            }
				})
			}
			else{
				Swal.fire('Kesalahan!!','Harap periksa form anda !!','error')
			}
	});
        
});

$('#addAnggota').click(function(event) {
	$('#demo').toggle('slow');
});

	$('#inputGroupFile07').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
    $('#inputGroupFile01').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
    $('#inputGroupFile04').on('change',function(){
    	var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</body>
</html>