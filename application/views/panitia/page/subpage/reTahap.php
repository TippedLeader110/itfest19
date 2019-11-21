<?php foreach ($subreTahap as $key => $vasubreTahap): ?>
	
<?php endforeach ?>

<h5>Total Jumlah TIM : <?php echo $vasubreTahap->jumlah ?></h5>
<h5>Total Tim Lulus : <?php echo $vasubreTahap->jumlah-$vasubreTahap->jumlah_gagal ?></h5>
<h5>Total Tim Gagal : <?php echo $vasubreTahap->jumlah_gagal ?></h5>