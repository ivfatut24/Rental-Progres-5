<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--=== Favicon ===-->
	<link rel="shortcut icon"  href="<?php echo base_url('assets/cardoor/img/favicon.ico') ?>"  type="image/x-icon" />

	<title>Ciliwung Camp</title>

	<!--=== Bootstrap CSS ===-->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/bootstrap.min.css') ?>">
  	<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
  
	<!--=== Slicknav CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/plugins/slicknav.min.css') ?>"> -->
	<!--=== Magnific Popup CSS ===-->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/plugins/magnific-popup.css') ?>">
	<!--=== Owl Carousel CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/plugins/owl.carousel.min.css') ?>"> -->
	<!--=== Gijgo CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/plugins/gijgo.css') ?>"> -->
	<!--=== FontAwesome CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/font-awesome.css') ?>"> -->
	<!--=== Theme Reset CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/reset.css') ?>"> -->
	<!--=== Main Style CSS ===-->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/style.css') ?>">
	<!--=== Responsive CSS ===-->
	<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/cardoor/css/responsive.css') ?>"> -->
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/owl.carousel.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/owl.theme.default.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/jquery-confirm.min.css') ?>">
	
    <!-- <link rel="stylesheet" href="<?php //echo base_url() ?>assets4/css/bootstrap.min.css"/> -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url() ?>assets4/css/font-awesome.min.css"/> -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url() ?>assets4/css/owl.carousel.css"/> -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url() ?>assets4/css/style.css"/> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/fontawesome.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/brands.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/solid.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets4/css/animate.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/util.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/style_new.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/responsive_new.css') ?>">
</head>
<body class="loader-active">
	<!--== Header Area Start ==-->
		<nav class="fixed-top navbar navbar-expand-lg bg-black ">
	<div class="container mx-auto width">
			<a class="navbar-brand" href="<?php echo base_url() ?>">
				<img src="<?php echo base_url() ?>assets/cardoor/img/logo-v2-putih.png" alt="Logo">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigaTion" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse mt-4 mt-lg-0" id="navigaTion">
				<div class="nav navbar-nav ml-auto">
					<a class="nav-item nav-link <?= ($this->uri->segment(1) == '' ?'active':'') ?>"  href='<?php echo base_url(); ?>'>Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link <?= ($this->uri->segment(1) == 'produk' ?'active':'') ?>" href='<?php echo base_url("produk"); ?>'>Produk</a>
					<a class="nav-item nav-link <?= ($this->uri->segment(1) == 'keranjang' ?'active':'') ?>" href='<?php echo base_url("keranjang"); ?>'>Keranjang</a>
					<a class="nav-item nav-link <?= ($this->uri->segment(1) == 'login' ?'active':'') ?>" href='<?php echo base_url("login"); ?>'>Login</a>
				</div>
			</div>
	</div>
		</nav>
	<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse show" id="navbarNav" style="">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav> -->
	<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?php echo base_url() ?>">
				<img src="<?php echo base_url() ?>assets/cardoor/img/logo-v2-putih.png" alt="Logo">
			</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav> -->
	<!--== Header Area End ==-->
