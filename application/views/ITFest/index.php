<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ITFest 2020 Universitas Sumatera Utara</title>
	<link rel="icon" href="<?=base_url()?>assets/images/favico.png" type="image/ico" />
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="<?=base_url()?>assets/custom/js/jquery-3.3.1.js"></script>
	<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body id="itfest">
	<nav class="navbar navbar-expand-sm fixed-top">
		<div class="container">
			<a href="<?=base_url()?>" class="navbar-brand navbar-brand-edit" onclick="$('body').animatescroll();">
				<div class="logo-nav"></div>
			</a>
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#mynavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="mynavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#about-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">TENTANG
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#seminar-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">SEMINAR
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#kompetisi-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">KOMPETISI
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#acara-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">ACARA
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#timeline-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">TIMELINE
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-edit" onclick="$('#kontak-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">KONTAK
							<div class="garis" id="br"></div>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('Home/signin')?>"><button class="btn px-5 signup">DAFTAR/MASUK</button></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<header id="about">
		<div class="container">
			<div class="row">
				<div class="col col-header">
					<!-- <div class="logo-head">
						<img src="./img/logo-itfest-white2.png" alt="" style="max-height: 250px;">
					</div> -->
<<<<<<< HEAD
					<h3 class="head">INTEGRATED CREATION<br>FOR SOCIETY</h3>
					<h4 class="head-2">ITFEST 2020	</h4>
=======
                                        <h3 class="head">SOCIAL CULTURE AWARENESS <br> THROUGH TECHNOLOGY <br> FOR MILLENIALS</h3>
					<h4 class="head-2">ITFEST 4.0 2020</h4>
>>>>>>> desain-utama
					<div class="row row2">
						<div class="col">
							<img src="<?=base_url()?>assets/images/usu_4x.png" alt="" style="max-height: 100px; margin-right: 30px;">
							<img src="<?=base_url()?>assets/images/himatif_4x.png" alt="" style="max-height: 100px; ">
						</div>
					</div>
					<button class="btn head1" onclick="$('#about-section').animatescroll({scrollSpeed:1500,easing:'easeInOutBack'});">Tentang</button>
					<a href="<?=base_url('ITFest/signin')?>"><button class="btn head2">Daftar/Masuk</button></a>
				</div>
			</div>
		</div>
	</header>

	<section id="seminar-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-kompetisi">
					<center><h1 class="h1-kompetisi text-white">Seminar & Talkshow</h1>
					<hr class="hr-kompetisi"><br></center>
				</div>
				<div class="col-md-6 col-timeline">
					<center><img src="<?=base_url()?>assets/images/poster-seminar.jpg" alt="Seminar & Talkshow ITFest 3.0" width="70%"></center>
				</div>
				<div class="col-md-6 col-timeline">
					<div class="text-timeline" style="margin-top:20%;">
						<center><h3 class="h1-timeline">Dapatkan Tiketmu Segera!</h3>
						<p><b><a href="https://tiket.itfestusu.id/"><button class="btn px-5 daftar h1-timeline">DAFTAR SEMINAR</button></a></b></p>
						<h3 class="h1-timeline">GRATIS!</h3></center>
						<p>Untuk <b>anak putus sekolah</b> mendapatkan tiket <b>GRATIS</b>. Syarat dan ketentuan hubungi ke <b>+6285216011504</b></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="about-section">
		<div class="container">
			<div class="row">
				<!-- <div class="col-md-12">
					<center><h1 class="about2">Tentang ITFest 2019</h1>
					<hr class="hr-about"></center>
				</div> -->
				<div class="col-md-7 col-test">
					<img class="col-test-img" src="<?=base_url()?>assets/images/about-2.png" alt="">
				</div>
				<div class="col-md-5 col-about-2">
					<div class="garis-text d-none d-lg-block"></div>
					<h2 class="about2">Tentang ITFest 3.0 2019</h2>
					ITFEST 2019 adalah kompetisi bidang Teknologi Informasi dan Komunikasi tingkat mahasiswa se-Indonesia yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HIMATIF) Universitas Sumatera Utara, sebagai upaya untuk membangkitkan semangat para mahasiswa/i Indonesia untuk berinovasi menciptakan solusi dari masalah-masalah yang dialami bangsa ini serta mampu ambil bagian sebagai agen perubahan dalam memajukan Teknologi Informasi dan Komunikasi serta pemanfaaaannya di Indonesia.<br><br>ITFEST 2019 memiliki tema “Integrated Creation For Society”. Rangkaian kegiatan ITFEST 2019 terdiri dari kompetisi tingkat mahasiswa se-Indonesia, pameran hasil karya finalis kompetisi, seminar tentang topik-topik terkini di bidang TIK, dan hiburan.
				</div>
				<!-- <button class="btn px-4 btn-primary btn-about">DAFTAR SEMINAR DISINI</button> -->
			</div>
		</div>
	</section>

	<section id="kompetisi-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-kompetisi">
					<center><h1 class="h1-kompetisi">Kompetisi</h1>
					<hr class="hr-kompetisi">
					<p class="p-judul-kompetisi">Bangunlah negeri dengan berinovasi melalui kompetisi</p><br></center>
				</div>
				<div class="card-columns">
					<!-- <?php
					foreach ($kompetisi as $key => $value) {
						?>
						<div class="card">
							<div class="card-body text-center">
								<img src="<?=$value->urlLogo?>" alt="" style="max-height: 100px;">
								<h4 class="card-title"><?=$value->namaLomba?></h4>
								<a href="<?=base_url('ITFest/kompetisi')?>?k=<?=$value->namaLomba?>"><button class="btn btn-light btn-kompetisi">Read More...</button></a>
							</div>
						</div>
						<?php
					}
					 ?> -->
				</div>
			</div>
		</div>
	</section>

	<section id="acara-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-acara">
					<center><h1 class="h1-kompetisi">Video Teaser</h1>
					<hr class="hr-kompetisi">
					<p class="p-judul-kompetisi">Lihat keseruan dan acara apa saja yang akan hadir di ITFest 2019</p><br></center>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="video-content">
						<!-- Start Video Review Content -->
            			<iframe width="100%" height="500" style="border-radius: 50" src="https://www.youtube.com/embed/UlKURHcbAu8" frameborder="0" allowfullscreen></iframe>
						<!-- End Video Review Content -->
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</section>

	<section id="timeline-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6 col-timeline">
					<div class="col-timeline">
						<h1 class="h1-timeline">Timeline</h1>
						<p><b>Persiapkan dirimu untuk mengikuti rangkaian acara di ITFest</b></p>
						<hr class="hr-timeline"><br>
					</div>
					<div class="text-timeline">
						<p><b>25 November 2018 – 31 Desember 2018</b> Registrasi Kompetisi</p>
						<p><b>7 Januari 2019 – 31 Januari 2019</b> Penyisihan I</p>
						<p><b>1 Februari 2019 – 7 Februari 2019</b> Penjurian & Pengumuman I</p>
						<p><b>8 Februari 2019 – 22 Februari 2019</b> Penyisihan II</p>
						<p><b>23 Februari 2019 – 28 Februari 2019</b> Penjurian & Pengumuman II</p>
						<p><b>1 Maret 2019 – 8 Maret 2019</b> Rentang waktu peserta sampai ke final</p>
						<p><b>9 Maret 2019 – 10 Maret 2019</b> Final Kompetisi & Acara Puncak</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="kontak-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-map">
					<!-- Start Google Map -->
					<section id="mu-google-map">
			      	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31856.86587941303!2d98.64235253955077!3d3.5625472000000107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30313020778f7f61%3A0xf6f49ab3d64d60ff!2sFakultas+Ilmu+Komputer+dan+Teknologi+Informasi+-+USU!5e0!3m2!1sid!2sid!4v1510683287147" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
					</section>
					<!-- End Google Map -->
				</div>
				<div class="col-md-12 col-img-kontak">
					<hr><br>
					<a href="#"><img class="img-kontak" src="<?=base_url()?>assets/images/sosmed/warna/fb.png" alt="" width="30px"></a>
					<a href="https://www.instagram.com/itfestusu/"><img class="img-kontak" src="<?=base_url()?>assets/images/sosmed/warna/ig.png" alt="" width="30px"></a>
					<a href="#"><img class="img-kontak" src="<?=base_url()?>assets/images/sosmed/warna/twit.png" alt="" width="30px"></a>
					<a href="mailto:itfestusuhimatif@gmail.com"><img class="img-kontak" src="<?=base_url()?>assets/images/sosmed/warna/gplus.png" alt="" width="30px"></a>
					<p class="p-footer">© ITFest USU - Universitas Sumatera Utara.</p>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		// Scrolling Effect
	  $(window).on("scroll", function() {
	        if($(window).scrollTop()) {
	              $('nav').addClass('black');
	              $('.logo-nav').addClass('logo-nav-white');
	        }

	        else {
	              $('nav').removeClass('black');
	              $('.logo-nav').removeClass('logo-nav-white');
	        }
	  })
	</script>

	<script src="<?=base_url()?>assets/custom/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/custom/js/popper.min.js"></script>
	<script src="<?=base_url()?>assets/custom/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/custom/js/animatescroll.js"></script>
    <script>
		window.sr = ScrollReveal({reset:true});
		sr.reveal('.col-header', {
			duration: 2000,
			origin:'left',
			distance:'200px'
		});
		sr.reveal('.col-test', {
			duration: 2000,
			origin:'left',
			distance:'200px'
		});
		sr.reveal('.col-about-2', {
			duration: 2000,
			delay:500,
			origin:'bottom',
			distance:'200px'
		});
		sr.reveal('.col-kompetisi', {
			duration: 2000,
			origin:'left',
			distance:'200px'
		});
		sr.reveal('.card-columns', {
			duration: 2000,
			delay:500,
			origin:'bottom',
			distance:'100px'
		});
		sr.reveal('.col-acara', {
			duration: 2000,
			origin:'left',
			distance:'200px'
		});
		sr.reveal('.video-content', {
			duration: 2000,
			delay:500,
			origin:'bottom',
			distance:'200px'
		});
		sr.reveal('.col-timeline', {
			duration: 2000,
			origin:'top',
			distance:'100px'
		});
		sr.reveal('.text-timeline', {
			duration: 2000,
			delay:500,
			origin:'left',
			distance:'100px'
		});
	</script>
</body>
</html>
