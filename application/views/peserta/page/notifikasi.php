<?php foreach ($notifikasi as $key => $value): ?>
<?php endforeach ?>

    <?php if ($value->status_tim==1): ?>
      <div class="container-fluid bg-success">
        <h4>Selamat! Anda telah LULUS proses seleksi berkas!</h4>
        <p>Silahkan lakukan pembayaran dan upload bukti pembayaran</p>
      </div>
    <?php endif ?>

    <?php if ($value->status_tim==NULL): ?>
      <div class="container-fluid bg-warning">
        <h4>Seleksi berkas</h4>
        <p>Silahkan menunggu proses seleksi berkas selesai</p>
      </div>
    <?php endif ?>

    <?php if ($value->status_tim=='0'): ?>
      <div class="container-fluid bg-danger">
        <h4>Maaf, Anda TIDAK LULUS pada proses seleksi berkas</h4>
        <p>Berkas Anda tidak valid atau tidak memenuhi standar ketentuan.</p>
        <p>Tetap semangat, dan silahkan mendaftar lagi pada ITFest USU tahun mendatang</p>
      </div>
    <?php endif ?>