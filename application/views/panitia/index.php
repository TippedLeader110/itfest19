<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/panitia.css') ?>">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title><?php echo $title ?></title>
</head>
<body>
	<header>
		<!-- NAVBAR BOOTSTRAP -->
		<?php $this->load->view('panitia/navbar'); ?>
	</header>
	<div class="mainpage">
		<div class="row" style="margin-right: 0px;">
			<div class="col-3 leftbar">
				<div id="fixed" class="sticky-top">
					<?php $this->load->view('panitia/leftbar') ?>
				</div>
			</div>
			<div class="col-9 rightbar">
				<div class="row">
					<div class="col-8">
						<?php $this->load->view($page); ?>
						<div class="container" style="background: white;border: 1px solid gray">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
					<div class="col-4">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
// $(document).ready(function(e) {
//     var tinggi =  $('header').height();
//     console.log(tinggi);

//     $(window).scroll(function(event) {
//     	var d = $(window).scrollTop();
//     	console.log(d);
//     	if (d>=tinggi) {
//     		$('#fixed').addClass('position-fixed');
//     	}
//     	else{
//     		$('#fixed').removeClass('position-fixed');
//     	}
//     });

// });
</script>