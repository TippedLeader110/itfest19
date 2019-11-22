<!DOCTYPE html>
<html>
<head>
	<title>Login Panitia</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/login.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body class="body">
	<div class="col-10 offset-1 loginframe">
		<div class="row">
			<div class="col-6">
				<h1><b>LOGO ITFEST</b></h1>
			</div>
			<div class="col-6">
				<form method="post" name="login" id="login">
					<div class="col-12">
						<div class="row">
							<h3>Login Panitia Kompetisi</h3>
						</div>
						<div class="row">
							<input class="form-control" type="text" id="username" name="username" placeholder="Username">
						</div>
						<div class="row">
							<input class="form-control" type="password" id="password" name="password" placeholder="Password">
						</div>
						<div class="row">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</form>	
			</div>
		</div>			
	</div>
</body>
<!-- <script type="text/javascript" src="ajax/login.js"></script> -->
<script type="text/javascript">
	$('#login').submit(function(e) {
		e.preventDefault();
		var showName = "<?php echo $this->session->userdata('name') ?>";
		var user = $('#username').val();
		var pwd = $('#password').val();
		$.ajax({
			url: '<?php echo base_url('panitia/doLogin') ?>',
			type: 'post',
			data: {user, pwd},
			error: function(data){
				// Swal.fire('Login Gagal')
			},
			success: function(data){
				if (data==1) {
					console.log(data);
					Swal.fire('Berhasil', 'Selamat Datang ' + showName, "success");
				}
				else{
					console.log(data);
					Swal.fire('Kesalahan', 'Username atau Password Salah', "error");
				}

			}
		})
	});

</script>
</html>
