<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login ITFest 2020</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--===============================================================================================-->
	<link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">
<!--===============================================================================================-->
<!-- Custom -->
<link href="<?=base_url()?>assets/custom/css/custom.css" rel="stylesheet">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<a href="<?=base_url()?>"><div class="login100-pic js-tilt" data-tilt>
					<img src="<?=base_url()?>assets/images/logo.png" alt="ITFest 4.0">
				</div></a>

				<form class="login100-form validate-form" id="login">
					<span class="login100-form-title text-white">
						LOGIN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username_tim" id="username_tim" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-at" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_tim" id="password_tim" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

          <div>
            <center><span style="color:<?=$this->session->flashdata('color')?>;"><?=$this->session->flashdata('message')?></span></center>
          </div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="javascript:void()" onclick="doFo()">
							Password?
						</a>
					</div>
					<div class="text-center p-t-0">
						<span class="txt1">
							Kembali ke
						</span>
						<a class="txt2" href="<?=base_url()?>">
							Beranda
						</a>
					</div>

					<div class="text-center p-t-26">
						<a class="txt2" href="<?=base_url('pendaftaran/')?>">
							Daftar Lomba ITFest 4.0
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/js/main.js"></script>

</body>
</html>

<script type="text/javascript">
	$('#login').submit(function(e) {
		e.preventDefault();
		var user = $('#username_tim').val();
		var pwd = $('#password_tim').val();
		if (user==''&&pwd=='') {
			Swal.fire('Kesalahan', 'Tolong isi kolom username dan password', "error");
		}
		else{
		console.log(user);
		console.log(pwd);
		$.ajax({
			url: '<?php echo base_url('Peserta/login') ?>',
			type: 'post',
			data: {user, pwd},
			error: function(data){
				Swal.fire('Kesalahan', 'Terjadi kesalahan dengan server', "error");
			},
			success: function(data){
				if (data==1) {
					console.log(data);
					Swal.fire(
						{
							title: 'Berhasil',
					 		text: 'Selamat Datang ' + user,
					 		icon: "success",
					 		timer: 2000,
					 		timerProgressBar: true,
					 		confirmButton: false,
					 		onBeforeOpen: () => {
					 			Swal.showLoading()
					 		}
					 	});
					setTimeout(function(){window.open('<?php echo base_url("Peserta/")?>','_self');},1800);
				}
				else if (data=='blm') {
					Swal.fire({
						title : 'Berkas belum diverifikasi',
						text:  'Berkas tim sedang diverifikasi silahkan menunggu sampai berkas diverifikasi oleh panitia.',
						icon:  "info",
						footer: 'Info lebih lanjut hubungi CS: itfestusu@gmail.com'});
				}
				else if (data=='tolak') {
					Swal.fire({
						title: 'Berkas Tim ditolak',
						text: 'Berkas anda tidak memenuhi syarat atau melanggar aturan',
						footer: 'Info lebih lanjut hubungi CS: itfestusu@gmail.com',
						icon: "error"});
				}
				else{
					console.log(data);
					Swal.fire('Kesalahan', 'Username atau Password Salah', "error");
				}

			}
		})
		}
	});

	function doFo()
	{
		Swal.fire({
						title : 'Lupa Password ?',
						text:  'Untuk mengganti password silahkan hubungi CS panitia atau kontak panitia lainnya yang tersedia.',
						icon:  "info",
						footer: 'CS: itfestusu@gmail.com'});
	}
</script>
