<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ITFest 4.0 2019 Universitas Sumatera Utara</title>
	<link rel="icon" href="<?=base_url()?>assets/images/favicon.ico" type="image/ico" />
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

	<section id="kompetisi-section1" class="mt-5">
		<div class="container">
			<?php
				foreach ($kompetisi as $key => $value) {
			?>
			<div class="row">
				<div class="col-md-12 col-kompetisi">
					<center>
						<img src="assets/images/<?=$value->url_logo?>" alt="" style="height: 200px;">
						<h1 class="h1-kompetisi card-title mt-2"><?=$value->nama_lomba?></h1>
						<hr class="hr-kompetisi">
						<font color="black"><p class="p-judul-kompetisi"><?=$value->deskripsi?></p></font><br>
						<?php
							if($value->rule != NULL){
							?>
							<a href="public/kompetisi/rule/<?=$value->rule?>" class="btn btn-primary">Lihat Rulebook</a>
						<?php } ?>
					</center>
				</div>
			</div>
			<?php } ?>
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