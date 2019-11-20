<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Peserta Lomba - ITFest 4.0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<body>

<div class="container border" style="margin-top: 5px; padding: 2px 2px 2px 2px;">
	<h4>Pendaftaran Peserta Lomba - ITFest 4.0</h4>
</div>


<form>
	<div class="container border" style="margin-top: 10px; margin-bottom: 10px;">
	<div class="row">
		<div class="col-6 " style="padding-bottom: 20px; margin-top: 10px; margin-bottom: 10px;"> <!-- bagian kiri -->

			<div class="border" style="padding: 5px 5px 5px 5px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Lomba</b></header>
				<label>Cabang Lomba</label>
					<div class="form-group">
						<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px; max-height: 30px;">
							<option value="" selected disabled>-- Pilih Cabang Lomba --</option>
							<option value="Competitive Programing">Competitive Programing</option>
							<option value="Business IT Case">Business IT Case</option>
							<option value="Application Development">Application Development</option>
							<option value="UI/UX Design">UI/UX Design</option>
						</select>	
					</div>
			</div>

			<div class="border" style="padding: 3px 3px 3px 3px;">
				<header style="padding: 3px 3px 3px 10px; background-color: #3d3b3b; color: white;"><b>Data Tim</b></header>
				<div class="row">
					<div class="col-6" style="padding-top: 3px;">
						<label>Nama Tim</label>
						<div class="form-group">
							<input type="text" name="nama_tim" placeholder="Nama Tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
						</div>
						<!-- -------------------------------- -->
						<label>Password Tim</label>
						<div class="form-group">
							<input type="password" name="password_tim" placeholder="Nama Tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
						</div>
					</div>
					<!-- batas kanan kiri-->
					<div class="col-6" style="padding-top: 3px;">
						<label>Asal Universitas</label>
						<div class="form-group">
							<input type="text" name="universitas" placeholder="Asal Universitas" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
						</div>
						<!-- -------------------------------- -->					
						<label>Konfirmasi Password Tim</label>
						<div class="form-group">
							<input type="password" name="konfirmasi_password_tim" placeholder="Konfirmasi Password" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
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
								<input type="text" name="nama_ketua" placeholder="Nama Ketua" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
						<!-- -------------------------------- -->
						<label>Password Tim</label>
						<div class="form-group">
							<input type="password" name="password_tim" placeholder="Nama Tim" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
						</div>
						<!-- -------------------------------- -->
						<label>No. HP Ketua</label>
							<div class="form-group">
								<input type="number" name="no_hp_ketua" placeholder="Nama Ketua" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
					</div>
					<!-- batas kanan kiri-->
					<div class="col-6" style="padding-top: 3px;">
						<label>Jenis Kelamin</label>
							<div class="form-group">
								<select class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;" name="jenis_kelamin_ketua">
									<option selected disabled value="">--Pilih Jenis Kelamin--</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						<!-- -------------------------------- -->					
						<label>Konfirmasi Password Tim</label>
						<div class="form-group">
							<input type="password" name="konfirmasi_password_tim" placeholder="Konfirmasi Password" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">	
						</div>
						<!-- -------------------------------- -->
						<label>Email Ketua</label>
							<div class="form-group">
								<input type="email" name="email_ketua" placeholder="Email" class="" style="min-width: 230px; max-width: 300px; padding: 2px 2px 2px 2px;">
							</div>
					</div>
				</div>
				<div style="padding-top: 5px;">
					<label>Upload file KTM Ketua</label>
					<div class="input-group">
		              <div class="input-group-prepend">
		                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
		              </div>
		              <div class="custom-file">
		                <input type="file" class="custom-file-input" id="inputGroupFile01"
		                  aria-describedby="inputGroupFileAddon01">
		                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		              </div>
		            </div>
				</div>

				<div style="padding-top: 5px;">
					<label>Upload file Surat Aktif Ketua</label>
					<div class="input-group">
		              <div class="input-group-prepend">
		                <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
		              </div>
		              <div class="custom-file">
		                <input type="file" class="custom-file-input" id="inputGroupFile02"
		                  aria-describedby="inputGroupFileAddon02">
		                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
		              </div>
		            </div>
				</div>

				<div style="padding-top: 5px;">
					<label>Upload file Foto Ketua</label> <br>
					<div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroupFileAddon03">Upload</span>
					  </div>
					  <div class="custom-file">
					    <input type="file" class="custom-file-input" id="inputGroupFile03"
					      aria-describedby="inputGroupFileAddon03">
					    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
					  </div>
					</div>
				</div>

			</div>
			<!-- ------------------------------------------------------------ -->

			
		</div>

		<!-- Batas Kanan dan kiri -->

		<div class="col-6" style="padding-bottom: 20px; margin-top: 10px; margin-bottom: 10px;"> <!-- bagian kanan -->
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

</body>
<script type="text/javascript">
    document.getElementById('my_file').click();
	document.getElementById('get_file').onclick = function() {
};
</script>
</html>