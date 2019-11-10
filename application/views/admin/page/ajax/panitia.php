<div class="row">
	<div class="col-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>No.</th>
					<th>Username</th>
					<th>Cabang Lomba</th>
				</tr>
				<?php $num = 1; ?>
				<?php foreach ($dataLomba as $key => $value): ?>
					<tr>
						<td><?php echo $num ?></td>
						<td><?php echo $value->nama_lomba ?></td>
					</tr>
					<?php $num++; ?>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>

