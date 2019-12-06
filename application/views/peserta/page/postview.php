<ul class="list-group list-group-flush">
<?php foreach ($post as $key => $dpost): ?>
	<li class="list-group-item"><a href="#" onclick="doPost(<?php echo $dpost->id_post ?>)"><?php echo $dpost->judul ?></a></li>
<?php endforeach ?>
</ul>