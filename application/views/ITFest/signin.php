<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login ITFest 4.0</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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

				<form class="login100-form validate-form" method="POST" action="<?=base_url('Auth/login')?>">
					<span class="login100-form-title text-white">
						LOGIN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" name="username_tim" id="username_tim" placeholder="Email">
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
						<a class="txt2" href="<?=base_url('Home/forgotPassword')?>">
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
		var showName = "<?php echo $this->session->userdata('nama_tim') ?>";
		var user = $('#username_tim').val();
		var pwd = $('#password_tim').val();
		$.ajax({
			url: '<?php echo base_url('Peserta/login') ?>',
			type: 'post',
			data: {user, pwd},
			error: function(data){
				// Swal.fire('Login Gagal')
			},
			success: function(data){
				if (data==1) {
					console.log(data);
					Swal.fire('Berhasil', 'Selamat Datang ' + showName, "success");
					setTimeout(function(){window.open('<?php echo base_url("index.php/Peserta/")?>','_self');},2000);
				}
				else if (data==null) {
					Swal.fire('Berkas belum diverifikasi', 'Berkas anda belum diverifikasi oleh pihak panitia', "info");
				}
				else if (data=='0') {
					Swal.fire('Berkas Tim ditolak', 'Berkas anda tidak memenuhi syarat atau melanggar aturan', "error");
				}
				else{
					console.log(data);
					Swal.fire('Kesalahan', 'Username atau Password Salah', "error");
				}

			}
		})
	});

</script>
