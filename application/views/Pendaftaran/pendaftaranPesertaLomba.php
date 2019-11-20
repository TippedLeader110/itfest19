<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
					<div style="padding-left: 5px; margin-top: 5px;">
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
					</div>
					
				</div>
				<div class="border" style="margin-top: 20px;">
					<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Tim</b></header>
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Nama Tim</label>
						<div class="form-group">
							<input type="text" name="nama_tim" placeholder="Nama Tim" class="form-control">	
						</div>
					</div>
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Password Tim</label>
						<div class="form-group">
							<input type="password" name="password_tim" placeholder="Nama Tim" class="form-control">	
						</div>
					</div>
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Konfirmasi Password Tim</label>
						<div class="form-group">
							<input type="password" name="konfirmasi_password_tim" placeholder="Konfirmasi Password" class="form-control">	
						</div>
					</div>
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Asal Universitas</label>
						<div class="form-group">
							<input type="text" name="universitas" placeholder="Asal Universitas" class="form-control">	
						</div>
					</div>
					<!-- ------------------------------->
					<div style="padding-left: 5px; margin-top: 5px;">
						<label>Asal Fakultas</label>
						<div class="form-group">
							<input type="text" name="tim_fakultas" placeholder="Asal Universitas" class="form-control">	
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
								<input type="text" name="nama_ketua" placeholder="Nama Ketua" class="form-control">
							</div>
							<!-- --------------------------------------->
							<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control" name="jenis_kelamin_ketua">
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<!-- --------------------------------------->
							<label>No. HP Ketua</label>
							<div class="form-group">
								<input type="number" name="no_hp_ketua" placeholder="Nama Ketua" class="form-control">
							</div>
							<!-- --------------------------------------->
							<label>Email Ketua</label>
							<div class="form-group">
								<input type="email" name="email_ketua" placeholder="Email" class="form-control">
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File KTM Ketua</label>
								<div class="form-group">
									<input type="file" id="my_file" name="ktm_ketua">
								</div>	
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Surat Aktif Ketua</label>
								<div class="form-group">
									<input type="file" id="my_file" name="surat_aktif_ketua">
								</div>
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Foto</label>
								<div class="form-group">
									<input type="file" id="my_file" name="foto_ketua">
								</div>	
							</div>
							
						</div>
					</div>
					<!-- batas data ketua-->

					<div style="padding-left: 5px; margin-top: 5px;">
						<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;">Anggota Tim</header>
						<div class="border" style="padding: 3px 3px 3px 10px;">
							
							
							<label>Nama Anggota</label>
							<div class="form-group">
								<input type="text" name="nama_anggota1" placeholder="Nama Anggota" class="form-control">
							</div>
							<!-- --------------------------------------->
							<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="form-control" name="jenis_kelamin1">
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<!-- --------------------------------------->
							<label>No. HP</label>
							<div class="form-group">
								<input type="number" name="no_hp_anggota1" placeholder="No. HP" class="form-control">
							</div>
							<!-- --------------------------------------->
							<label>Email</label>
							<div class="form-group">
								<input type="email" name="email_anggota1" placeholder="Email" class="form-control">
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File KTM</label>
								<div class="form-group">
									<input type="file" id="my_file" name="ktm_anggota1">
								</div>	
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Surat Aktif</label>
								<div class="form-group">
									<input type="file" id="my_file" name="surat_aktif_anggota1">
								</div>
							</div>
							<!-- --------------------------------------->
							<div class="border" style="padding: 5px 5px 5px 5px; margin-top: 5px;">
								<label>Upload File Foto</label>
								<div class="form-group">
									<input type="file" id="my_file" name="foto_anggota1">
								</div>	
							</div>
							
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
	<br>
	<br>
	<br>
<script type="text/javascript">
    document.getElementById('my_file').click();
	document.getElementById('get_file').onclick = function() {
};
</script>
</body>
</html>