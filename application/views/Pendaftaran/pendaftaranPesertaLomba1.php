<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<!-- container title -->
	<div class="container border" style="margin-top: 20px; margin-bottom: 10px; ">
		<h2>Title</h2>

	</div>

	<!-- container konten -->
	<div class="container border">
		<div class="row">
			<div class="col-6 border"> <!-- konten bagian kiri -->
				<header><b>Data Lomba</b></header>

				<label>Cabang Lomba</label>
				<div class="form-group">
					<select class="form-control">
						<option value="" selected disabled>-- Pilih Cabang Lomba --</option>
						<option value="Competitive Programing">Competitive Programing</option>
						<option value="Business IT Case">Business IT Case</option>
						<option value="Application Development">Application Development</option>
						<option value="UI/UX Design">UI/UX Design</option>
					</select>	
				</div>
				<br>
				<header><b>Data Tim</b></header>
				<div class="form-group">
					<label>Nama Tim</label>
					<input type="text" name="nama_tim" placeholder="Nama Tim.." class="form-control">
				</div>

			<!-- -->	
				<div class="row"> <!-- row kanan 1 -->
					<div class="col-6 border">
						<label>Universitas</label>
							<div class="form-group">
								<input type="text" name="universitas" placeholder="Universitas" class="form-control">
							</div>
					</div>
					<div class="col-6 border">
						<label>Fakultas</label>
							<div class="form-group">
								<input type="text" name="fakultas" placeholder="Fakultas" class="form-control">
							</div>
					</div>
				</div>
			<!-- -->
			</div>
			<div class="col-6"> <!-- konten bagian kanan -->
				<header>Anggota 1</header>

					<div class="row"> <!-- row kiri 1 -->
						<div class="col-6 border">
							<label>Nama</label>
							<div class="form-group">
								<input type="text" name="namaAnggota1" placeholder="Nama" class="form-control">
							</div>
						</div>
						<div class="col-6 border">
							<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control">
									<option value="" selected disabled>--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row"> <!-- row kiri 2-->
						<div class="col-6 border">
							<label>No. HP</label>
							<div class="form-group">
								<input type="text" name="no_hp" placeholder="No. HP" class="form-control">
							</div>
						</div>
						<div class="col-6 border">
							<label>Fakultas</label>
							<div class="form-group">
								<input type="text" name="fakultas" placeholder="Fakultas" class="form-control">
							</div>
						</div>
					</div>
					<div class="row"> <!-- row kiri 2-->
						<div class="col-6 border">
							<label>Email</label>
							<div class="form-group">
								<input type="email" name="no_hp" placeholder="Email" class="form-control">
							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
</body>
</html>