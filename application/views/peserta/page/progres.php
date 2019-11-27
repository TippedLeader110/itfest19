<div style="margin-top:; margin-bottom: 20px;">

    <?php foreach ($tahapPeserta as $key => $value): ?>
    <?php endforeach ?>
  <div class="container" style="background: #ffffff <?php //echo $bgcolor; ?>; ">
    <?php if ($value->status_tim==1): ?>
      <div class="alert alert-success" role="alert" style="padding: 10px 10px 10px 10px;">
      <h4>Selamat! Anda telah LULUS proses seleksi berkas!</h4>
      <p>Silahkan lakukan pembayaran dan upload bukti pembayaran</p>
    </div>
    <?php endif ?>
    <?php if ($value->status_tim==NULL): ?>
      <div id="status" style="padding: 10px 10px 10px 10px;">
      <h4>Seleksi berkas</h4>
      <p>Silahkan menunggu proses seleksi berkas selesai</p>
    <?php endif ?>
    <?php if ($value->status_tim=='0'): ?>
      <div id="status" style="padding: 10px 10px 10px 10px;">
      <h4>Maaf, Anda TIDAK LULUS pada proses seleksi berkas</h4>
      <p>Berkas Anda tidak valid atau tidak memenuhi standar ketentuan.</p>
      <p>Tetap semangat, dan silahkan mendaftar lagi pada ITFest USU tahun mendatang</p>

    <?php endif ?>
  </div>
</div>
