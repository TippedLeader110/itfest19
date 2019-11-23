<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ITFest 3.0 2019 Universitas Sumatera Utara</title>
	<link rel="icon" href="<?=base_url()?>public/images/favicon.ico" type="image/ico" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url()?>public/bootstrap/bs4/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>public/custom/css/style.css">
	<script src="<?=base_url()?>public/custom/js/jquery-3.3.1.js"></script>
</head>
<body class="daftar">
	<nav class="navbar navbar-expand-sm">
		<div class="container">
			<a class="navbar-brand navbar-brand-edit" href="<?=base_url()?>">
				<div class="logo-nav">
          <img src="<?=base_url()?>public/images/logo-itfest-white-edit.png" alt="Beranda" width="50px">
        </div>
			</a>
		</div>
	</nav>

	<section id="form-daftar">
		<div class="container">
			<div class="row">
				<div class="col-md-12 form-title">
					<h3>Registrasi Tim Lomba ITFest 3.0</h3>
				</div>
				<div class="col-md-12 col-form">
					<form action="" method="post" enctype="multipart/form-data">
  					<div class="col-md-6 col-form-2">
  						<!-- KETUA -->
						<label for="" class="label-judul">Data Tim dan Ketua</label>
						<div class="form-group">
							<label for="cabang-lomba">Cabang Lomba</label>
							<select class="form-control form-block" id="" name="cabangLomba" required>
								<option value="" selected disabled>-- Pilih Cabang Lomba --</option>
								<option value="1">Competitive Programming</option>
                <option value="2">Bussiness IT Case</option>
                <option value="3">Application Development</option>
                <option value="4">UI/UX Design</option>
							</select>
						</div>
						<div class="form-group">
							<label for="nama-tim">Nama Tim</label>
							<input type="text" id="nama-tim" class="form-control form-block" required name="namaTim" placeholder="Nama Tim">
						</div>
						<div class="form-group form-2-tabel">
							<label for="univ">Universitas</label>
							<input type="text" id="univ" class="form-control" required name="universitas" placeholder="Universitas">
						</div>
						<div class="form-group form-2-tabel">
							<label for="fakultas">Fakultas</label>
							<input type="text" required name="fakultas[]" placeholder="Fakultas" class="form-control" id="fakultas">
						</div>
						<div class="form-group form-2-tabel">
							<label for="nama">Nama Ketua</label>
							<input type="text" id="nama" class="form-control" required name="nama[]" placeholder="Nama Ketua">
						</div>
						<div class="form-group">
							<label for="jenis-kelamin">Jenis Kelamin</label>
							<select name="jenisKelamin[]" class="form-control" required>
                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
						</div>
						<div class="form-group">
							<label for="noHP">No. HP Ketua</label>
							<input type="text" id="noHP" class="form-control" required name="noHP[]" placeholder="No HP">
						</div>
						<div class="form-group form-2-tabel">
							<label for="email">Email Ketua</label>
							<input type="email" class="form-control" id="email" required name="email[]" placeholder="Email Ketua">
						</div>
						<div class="form-group">
							<label for="password">Password Tim</label>
							<input type="password" class="form-control" id="password" required name="password" placeholder="Password Tim">
						</div>
						<div class="form-group form-2-tabel">
							<label for="fileKTM">Upload File KTM</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" class="form-control" id="fileKTM" name="fileKTM[]" accept="application/pdf, image/*" required>
						</div>
						<div class="form-group">
							<label for="fileSuratAktif">Upload File Surat Aktif</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" class="form-control" id="fileSuratAktif" name="fileSuratAktif[]" accept="application/pdf, image/*" required>
						</div>
						<div class="form-group">
							<label for="fileFoto">Upload File Foto</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" class="form-control" id="fileFoto" name="fileFoto[]" accept="image/*" required>
						</div>
  					</div>
  					<div class="col-md-6 col-form-2 form-anggota">
  						<!-- ANGGOTA -->
						<label for="" style="width: 100%;" class="label-judul">Anggota 1</label>
						<div class="form-group form-2-tabel">
							<label for="nama">Nama</label>
							<input type="text" id="nama" required class="form-control" name="nama[]" placeholder="Nama">
						</div>
						<div class="form-group">
							<label for="cabang-lomba">Jenis Kelamin</label>
							<select name="jenisKelamin[]" required class="form-control">
                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
						</div>
						<div class="form-group form-2-tabel">
							<label for="noHP">No. HP</label>
							<input type="text" id="noHP" required class="form-control" name="noHP[]" placeholder="No HP">
						</div>
						<div class="form-group form-mobile">
							<label for="fakultas">Fakultas</label>
							<input type="text" required name="fakultas[]" placeholder="Fakultas" class="form-control" id="fakultas">
						</div>
						<div class="form-group form-mobile">
							<label for="email">Email</label>
							<input type="email" required class="form-control" id="email" name="email[]" placeholder="Email">
						</div>
						<div class="form-group form-2-tabel">
							<label for="fileKTM">Upload File KTM</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" required class="form-control" id="fileKTM" name="fileKTM[]" accept="application/pdf, image/*">
						</div>
						<div class="form-group">
							<label for="fileSuratAktif">Upload File Surat Aktif</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" required class="form-control" id="fileSuratAktif" name="fileSuratAktif[]" accept="application/pdf, image/*">
						</div>
						<div class="form-group">
							<label for="fileFoto">Upload File Foto</label>
							<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
							<input type="file" required class="form-control" id="fileFoto" name="fileFoto[]" accept="image/*">
						</div>

						<button type="button" class="btn btn-primary btn-tambah" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-plus"></span> Tambah Anggota</button>
  						<div id="demo" class="collapse">
  							<label for="" style="width: 100%;" class="label-judul">Anggota 2</label>
							<div class="form-group form-2-tabel">
								<label for="nama">Nama</label>
								<input type="text" id="nama" class="form-control" name="nama[]" placeholder="Nama">
							</div>
							<div class="form-group">
								<label for="jenisKelamin">Jenis Kelamin</label>
								<select name="jenisKelamin[]" class="form-control">
	                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
	                <option value="Pria">Pria</option>
	                <option value="Wanita">Wanita</option>
	              </select>
							</div>
							<div class="form-group form-2-tabel">
								<label for="noHP">No. HP</label>
								<input type="text" id="noHP" class="form-control" name="noHP[]" placeholder="No HP">
							</div>
							<div class="form-group form-mobile">
								<label for="fakultas">Fakultas</label>
								<input type="text" name="fakultas[]" placeholder="Fakultas" class="form-control" id="fakultas">
							</div>
							<div class="form-group form-mobile">
								<label for="email">Email</label>
								<input type="email" class="form-control form-block" id="email" name="email[]" placeholder="Email">
							</div>
							<div class="form-group form-2-tabel">
								<label for="fileKTM">Upload File KTM</label>
								<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
								<input type="file" class="form-control" id="fileKTM" name="fileKTM[]" accept="application/pdf, image/*">
							</div>
							<div class="form-group">
								<label for="fileSuratAktif">Upload File Surat Aktif</label>
								<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
								<input type="file" class="form-control" id="fileSuratAktif" name="fileSuratAktif[]" accept="application/pdf, image/*">
							</div>
							<div class="form-group">
								<label for="fileFoto">Upload File Foto</label>
								<h5 style="color:red;font-size:12px;">*Ukuran File tidak lebih dari 2 MB</h5>
								<input type="file" class="form-control" id="fileFoto" name="fileFoto[]" accept="image/*">
							</div>
						</div>
  					<input type="submit" value="Registrasi" class="btn btn-submit">
            <a href="<?=base_url()?>"><button type="button" class="btn btn-submit" style="margin-top:10px;">Beranda</button></a>
  					</div>

				</form>
				</div>
			</div>
		</div>
	</section>

	<script src="<?=base_url()?>public/custom/js/jquery.min.js"></script>
	<script src="<?=base_url()?>public/custom/js/popper.min.js"></script>
	<script src="<?=base_url()?>public/custom/js/bootstrap.min.js"></script>
</body>
</html>
