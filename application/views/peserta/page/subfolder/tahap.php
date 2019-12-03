<?php if ($status==1): ?>
	<h4>Anda lulus seleksi ini</h4>
<?php endif ?>
<?php if ($status==2): ?>
	<?php if ($file==1): ?>
	<h4>File sedang diseleksi</h4>
	<button class="btn btn-primary" data-toggle='collapse' data-target='#col'>Ganti File</button>
	<div class="collapse" id="col">
		<form id="kirim">
		<div class="custom-file">
			<input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
			<label class="custom-file-label" for="validatedCustomFile">Ajukan Jawaban</label>
			<div class="invalid-feedback">Tolong input file</div>
		</div>
		</form>
	</div>
	<?php endif ?>
	<?php if ($file==0): ?>
		<form id="kirim">
		<div class="custom-file">
			<input name="file" type="file" class="custom-file-input" id="validatedCustomFile" required>
			<label class="custom-file-label" for="validatedCustomFile">Ajukan Jawaban</label>
			<div class="invalid-feedback">Tolong input file</div>
		</div>
		</form>
	<?php endif ?>
<?php endif ?>
<?php if ($status==0): ?>
	<h4>Anda gagal di seleksi ini</h4>
<?php endif ?>