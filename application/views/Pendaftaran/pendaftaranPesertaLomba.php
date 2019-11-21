<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
	</style>
</head>
<body>
	<!-- container title -->
	<div class="container border" style="margin-top: 20px; margin-bottom: 10px; ">
		<h2>Title</h2>

	</div>

	<!-- container konten -->
	<div class="container border">
		<div class="row">
			<div class="col-6"> <!-- kiri -->
				<div class="border">
					<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Lomba</b></header>

					<!--Form-->
					<form id="form_pendaftaran">
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Cabang Lomba</label>
						<div class="form-group">
							<select class="form-control required" name="cabang_lomba" required = true>
								<option value="" selected disabled>-- Pilih Cabang Lomba --</option>

								<!--Nampilin list lomba-->
								<?php foreach($data_lomba as $key){?>

								<option value="<?php echo $key->id_lomba?>"><?php echo $key->nama_lomba ?></option>


								<?php } ?>
								<!--/Nampilin list lomba-->

							</select>	
						</div>
					</div>
					
				</div>
				<div class="border" style="margin-top: 20px;">
					<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Tim</b></header>
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Nama Tim</label>
						<div class="form-group">
							<input type="text" name="nama_team" placeholder="Nama Tim" class="form-control required">	
						</div>
					</div>

					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Username</label>
						<div class="form-group">
							<input type="text" name="username" placeholder="Username Tim" class="form-control required" id = "username_tim">
						</div>
						<i style="color:red" class="warning" id="username_warning_red">username harus terdiri dari 6-12 karakter</i>	
					</div>
					<!-- ------------------------------->

					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Password Tim</label>
						<div class="form-group">
							<input type="password" name="password" id ="password_tim" placeholder="Nama Tim" class="form-control required">	
						</div>
					</div>
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Konfirmasi Password Tim</label>
						<div class="form-group">
							<input type="password" id="konfirmasi_password_tim" placeholder="Konfirmasi Password" class="form-control">	
						</div>
						<i style="color:red" class="warning" id="password_warning_red">password yang anda ketik tidak sesuai</i>
					</div>
					
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Asal Universitas</label>
						<div class="form-group">
							<input type="text" name="universitas_team" placeholder="Asal Universitas" class="form-control required" required>	
						</div>
					</div>
				</div>
			</div>
			<!-- -->


			<div class="col-6"> <!-- kanan -->
				<div class="border">
					<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Keanggotaan Tim</b></header>
					<div style="padding-left: 5px; margin-top: 5px;">
						<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;">Ketua Tim</header>
						<div class="border" style="padding: 3px 3px 3px 10px;">
							
							
							<label>Nama Ketua</label>
							<div class="form-group">
								<input type="text" name="nama_ketua" placeholder="Nama Ketua" class="form-control required" required>
							</div>
							<!-- --------------------------------------->
							<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control required" name="jenis_kelamin_ketua" required>
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<!-- --------------------------------------->
							<label>No. HP Ketua</label>
							<div class="form-group">
								<input type="number" name="no_hp_ketua" placeholder="Nama Ketua" class="form-control required" required>
							</div>
							<!-- --------------------------------------->
							<label>Email Ketua</label>
							<div class="form-group">
								<input type="email" name="email_ketua" placeholder="Email" class="form-control required" required>
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Data Pribadi</label>
								<div class="form-group">
									<input type="file" id="file_ketua" name="file_ketua" required>
								</div>
								<p style="font-size: 14px;color:red;">Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan ktm yang dimasukkan ke dalam ZIP</p>	
							</div>
							
						</div>
					</div>
					<!-- batas data ketua-->

					<div style="padding-left: 5px; margin-top: 5px;">
						<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;">Anggota Tim</header>
						<div class="border" style="padding: 3px 3px 3px 10px;">
							
							<!--Data anggota 1-->
							<label>Nama Anggota</label>
							<div class="form-group">
								<input type="text" name="nama_anggota1" id="nama_anggota1" placeholder="Nama Anggota" class="form-control">
							</div>
							<!-- --------------------------------------->
							<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control" name="jenis_kelamin_anggota1" id="jenis_kelamin_anggota1">
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<!-- --------------------------------------->
							<label>No. HP</label>
							<div class="form-group">
								<input type="number" name="no_hp_anggota1" placeholder="No. HP" class="form-control" id="no_hp_anggota1">
							</div>
							<!-- --------------------------------------->
							<label>Email</label>
							<div class="form-group">
								<input type="email" name="email_anggota1" placeholder="Email" class="form-control" id="email_anggota1">
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Data Pribadi</label>
								<div class="form-group">
									<input type="file" id="file_anggota1" name="file_anggota1">
								</div>	
								<p style="font-size: 14px;color:red;">Data pribadi berupa pas foto, surat keterangan aktif kuliah dan scan ktm yang dimasukkan ke dalam ZIP</p>	
							</div>
							<!--/Data anggota 1-->
						</div>
					</div>
					<button type="submit">Submit</button>
				</div>

			</div>

		</div>
	</div>
	</form>
	<br>
	<br>
	<br>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	// Variable untuk pengecekan form
    var valid = true;
    // Inisialisasi untuk mengetahui jumlah anggota anggota
    var jumlah_anggota = 0;
    // Fungsi untuk melakukan pengecekan apakah form kosong atau tidak
    $(document).ready(function(){
    	$('.warning').hide();

        $('#username').keyup(function(){
        	var username = $('#username_tim').val();
        	if(username.length() == 0 || username.length < 6 || username.length() > 12)
        		$('#username_warning_red').show('slow');
        	else
        		$('#username_warning_red').hide('slow');
        });

		$('#konfirmasi_password_tim').keyup(function(){
        	var password = $('#password_tim').val();
        	var konfirmasi = $('#konfirmasi_password_tim').val();
        	if(password != konfirmasi)
        		$('#password_warning_red').show('slow');
        	else
        		$('#password_warning_red').hide('slow');
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
        		$('#nama_anggota1').setAttribute('required','true');
        		$('#jenis_kelamin_anggota1').setAttribute('required','true');
        		$('#no_hp_anggota1').setAttribute('required','true');
        		$('#email_anggota1').setAttribute('required','true');
        		$('file_anggota1').setAttribute('required','true');
        	}
        	//if($('#nama_anggota2').val() != ""){
        	//	jumlah_anggota++;
        	//}

        	
        });

        $('#form_pendaftaran').submit(function(event) {
        	event.preventDefault(); 
			$.ajax({
			url: '<?php echo base_url('index.php/Pendaftaran/daftar_kompetisi') ?>',
			type: 'POST',
			data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            error: function(data){

            	Swal.fire('Kesalahan!!', 'Gagal menghubungkan ke server !!', 'error')
            },
            success: function(data){
            	if (data==1) {
            	Swal.fire('Berhasil !!', 'Panitia berhasil ditambahkan !!', 'success')
            	}
            	else
            		Swal.fire('Kesalahan!!', 'Username telah digunakan !!', 'error')
            }
		})
        });
    });

</script>
</body>
</html>