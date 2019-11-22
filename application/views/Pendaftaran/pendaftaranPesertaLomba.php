
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
<body>

<div class="container border" style="margin-top: 5px; padding: 2px 2px 2px 2px;">
	<h3>Pendaftaran Peserta Lomba</h3>
</div>


<form>
	<div class="container border" style="margin-top: 10px; margin-bottom: 10px;">
	<div class="row">
		<div class="col-6 border" style="padding-bottom: 20px;"> <!-- bagian kiri -->

			<div class="border" style="padding: 5px 5px 5px 5px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Lomba</b></header>
				<label>Cabang Lomba</label>
					<div class="form-group">
						<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px; max-height: 30px;">
							<option value="" selected disabled>-- Pilih Cabang Lomba --</option>
							<!--Nampilin list lomba-->
								<?php foreach($data_lomba as $key){?>

								<option value="<?php echo $key->id_lomba?>"><?php echo $key->nama_lomba ?></option>


								<?php } ?>
							<!--/Nampilin list lomba-->
						</select>	
					</div>
			</div>

			<div class="border" style="padding: 3px 3px 3px 3px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Tim</b></header>
				<div class="row">
					<div class="col-6" style="padding-top: 3px;">
						<label>Nama Tim</label>
						<div class="form-group">
							<input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>	
							<i style="color:red" class="warning" id="nama_tim_warning_red">nama tim sudah digunakan</i>
							<i style="color:green" class="warning" id="nama_tim_warning_green">nama tim bisa digunakan</i>
						</div>
						<!-- ------------------------------->
						<label>Username</label>
						<div class="form-group">
								<input type="text" name="username" placeholder="Username Tim" class="form-control required" id = "username_tim" required>
						</div>
						<i style="color:red" class="warning" id="username_warning_red">username harus terdiri dari 6-12 karakter</i>	
						<!-- -------------------------------- -->
						<label>Password Tim</label>
						<div class="form-group">
							<input type="password" name="password_tim" id="password_tim" placeholder="Nama Tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>	
						</div>
					</div>
					<!-- batas kanan kiri-->
					<div class="col-6" style="padding-top: 3px;">
						<label>Asal Universitas</label>
						<div class="form-group">
							<input type="text" name="universitas_tim" id="universitas_tim" placeholder="Asal Universitas" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>	
						</div>
						<!-- -------------------------------- -->					
						<label>Konfirmasi Password Tim</label>
						<div class="form-group">
							<input type="password" name="konfirmasi_password_tim" placeholder="Konfirmasi Password" id="konfirmasi_password_tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>	
						</div>
					</div>
				</div>
			</div>
			<!-- ------------------------------------------------------------ -->
			<div class="border" style="padding: 3px 3px 3px 3px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Ketua Tim</b></header>
				<div class="row">
					<div class="col-6" style="padding-top: 3px;">
						<label>Nama Ketua</label>
							<div class="form-group">
								<input type="text" name="nama_ketua" placeholder="Nama Ketua" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>
							</div>
						<!-- -------------------------------- -->
						<label>No. HP Ketua</label>
							<div class="form-group">
								<input type="number" name="no_hp_ketua" placeholder="Nama Ketua" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>
							</div>
					</div>
					<!-- batas kanan kiri-->
					<div class="col-6" style="padding-top: 3px;">
						<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" name="jenis_kelamin_ketua" required>
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						
						<label>Email Ketua</label>
							<div class="form-group">
								<input type="email" name="email_ketua" placeholder="Email" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" required>
							</div>
					</div>
				</div>
				<div style="padding-top: 5px;">
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
		            <i style="font-size: 14px;color:red;">Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan ktm yang dimasukkan ke dalam ZIP</i>	
				</div>

			</div>
			<!-- ------------------------------------------------------------ -->

			
		</div>

		<!-- Batas Kanan dan kiri -->

		<div class="col-6 border" style="padding-bottom: 20px;"> <!-- bagian kanan -->
			<div class="border" style="padding: 3px 3px 3px 3px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Anggota Tim 1</b></header>
				<div class="row">
					<div class="col-6" >
						<label style="padding-top: 3px;">Nama Anggota</label>
							<div class="form-group">
								<input type="text" name="nama_anggota1" placeholder="Nama Anggota" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
						<!-- -------------------------------- -->
						<label>No. HP</label>
							<div class="form-group">
								<input type="number" name="no_hp_anggota1" placeholder="No. HP" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
						<!-- -------------------------------- -->

					</div>
					<!-- batas kanan kiri-->
					<div class="col-6">
						<label style="padding-top: 3px;">Jenis Kelamin</label>
							<div class="form-group">
								<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" name="jenis_kelamin1">
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						<!-- -------------------------------- -->					
						<label>Email</label>
							<div class="form-group">
								<input type="email" name="email_anggota1" placeholder="Email" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
					</div>
				</div>
				<div style="padding-top: 5px;">
					<label>Upload file KTM Anggota 1</label>
					<div class="input-group">
		              <div class="input-group-prepend">
		                <span class="input-group-text" id="inputGroupFileAddon04">Upload</span>
		              </div>
		              <div class="custom-file">
		                <input type="file" class="custom-file-input" id="inputGroupFile04"
		                  aria-describedby="inputGroupFileAddon04">
		                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
		              </div>
		            </div>
				</div>

				<div style="padding-top: 5px;">
					<label>Upload file Surat Aktif Anggota 1</label>
					<div class="input-group">
		              <div class="input-group-prepend">
		                <span class="input-group-text" id="inputGroupFileAddon05">Upload</span>
		              </div>
		              <div class="custom-file">
		                <input type="file" class="custom-file-input" id="inputGroupFile05"
		                  aria-describedby="inputGroupFileAddon05">
		                <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
		              </div>
		            </div>
				</div>

				<div style="padding-top: 5px;">
					<label>Upload file Foto Anggota 1</label> <br>
					<div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroupFileAddon06">Upload</span>
					  </div>
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputGroupFile06"
					      aria-describedby="inputGroupFileAddon06">
					    <label class="custom-file-label" for="inputGroupFile06">Choose file</label>
					  </div>
					</div>
				</div>
			</div>

			<!-- Tambah Angggota --->
			<div style="margin-top: 10px; margin-bottom: 5px;">
				<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Tambah Angggota</button>
				  <div id="demo" class="collapse">
				    <div class="border" style="padding: 3px 3px 3px 3px; margin-top: 5px;">
					<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Anggota Tim 2</b></header>
					<div class="row">
						<div class="col-6">
							<label style="padding-top: 3px;">Nama Anggota</label>
								<div class="form-group">
									<input type="text" name="nama_anggota2" placeholder="Nama Anggota" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
								</div>
							<!-- -------------------------------- -->
							<label>No. HP</label>
								<div class="form-group">
									<input type="number" name="no_hp_anggota2" placeholder="No. HP" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
								</div>
							<!-- -------------------------------- -->

						</div>
						<!-- batas kanan kiri-->
						<div class="col-6">
							<label style="padding-top: 3px;">Jenis Kelamin</label>
								<div class="form-group">
									<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" name="jenis_kelamin2">
										<option selected disabled value="">--Pilih Jenis Kelamin--</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							<!-- -------------------------------- -->					
							<label>Email</label>
								<div class="form-group">
									<input type="email" name="email_anggota2" placeholder="Email" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
								</div>
						</div>
					</div>
					<div style="padding-top: 5px;">
						<label>Upload file KTM Anggota 1</label>
						<div class="input-group">
			              <div class="input-group-prepend">
			                <span class="input-group-text" id="inputGroupFileAddon07">Upload</span>
			              </div>
			              <div class="custom-file">
			                <input type="file" class="custom-file-input" id="inputGroupFile07"
			                  aria-describedby="inputGroupFileAddon07">
			                <label class="custom-file-label" for="inputGroupFile07">Choose file</label>
			              </div>
			            </div>
					</div>

					<div style="padding-top: 5px;">
						<label>Upload file Surat Aktif Anggota 1</label>
						<div class="input-group">
			              <div class="input-group-prepend">
			                <span class="input-group-text" id="inputGroupFileAddon08">Upload</span>
			              </div>
			              <div class="custom-file">
			                <input type="file" class="custom-file-input" id="inputGroupFile08"
			                  aria-describedby="inputGroupFileAddon08">
			                <label class="custom-file-label" for="inputGroupFile08">Choose file</label>
			              </div>
			            </div>
					</div>

					<div style="padding-top: 5px;">
						<label>Upload file Foto Anggota 1</label> <br>
						<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroupFileAddon09">Upload</span>
						  </div>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="inputGroupFile09"
						      aria-describedby="inputGroupFileAddon09">
						    <label class="custom-file-label" for="inputGroupFile09">Choose file</label>
						  </div>
						</div>
					</div>
				</div>
				  </div>
			</div>
		  	<!-- -- --->
		<div style="margin-top: 20px;">
			<button type="submit" class="btn btn-block btn-primary">Submit</button>
		</div>

		</div>
	</div>
</div>

</form>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

        $('#username').keyup(function(){
        	var username = $('#username_tim').val();
        	if(username.length() == 0 || username.length < 6 || username.length() > 12){
        		$('#username_warning_red').show('slow');
        		valid = false;
        	}
        	else{
        		$('#username_warning_red').hide('slow');
        		valid = true;
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
        	else if($('#username_tim').val() == "" || $('#username_tim').val().length() < 6 || $('#username_tim').val().length() > 12){
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
		            	Swal.fire('Berhasil !!', 'Panitia berhasil ditambahkan !!', 'success')
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

</script>
</body>
</html>