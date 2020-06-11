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
  	
  
	<!--=== Magnific Popup CSS ===-->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/plugins/magnific-popup.css') ?>">
	<!--=== Main Style CSS ===-->
	<!-- <link rel="stylesheet" href="<?php echo base_url('assets/cardoor/style.css') ?>"> -->
	<!--=== Responsive CSS ===-->
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/owl.carousel.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/owl.theme.default.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/jquery-confirm.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/fontawesome.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/brands.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/fonts/fontawesome-free-5.13.0-web/css/solid.css') ?>"/>
	
	<link rel="stylesheet" href="<?php echo base_url('assets4/css/animate.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/util.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/style_new.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/responsive_new.css') ?>">

	<!-- js -->
	<script src="<?php echo base_url('assets/cardoor/js/jquery-3.2.1.min.js') ?>"></script>
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
					<a class="nav-item nav-link <?=  ($this->uri->segment(2) == '') ? 'active' : '' ; ?>"  href='<?php echo base_url("customer"); ?>'>Home <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link <?=  ($this->uri->segment(2) == 'produk') ? 'active' : '' ; ?>" href='<?php echo base_url("customer/produk"); ?>'>Produk</a>
					<a class="nav-item nav-link <?=  ($this->uri->segment(2) == 'keranjang') ? 'active' : '' ; ?>" href='<?php echo base_url("customer/keranjang"); ?>'>Keranjang</a>
					<span class="nav-item dropdown">
						<a class="nav-link  text-black-100 bg-white dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user-circle"></i>
							<span class="ml-1"><?= $this->session->userdata('nama');?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="<?= base_url('customer/list_order')?>">Order</a>
							<div class="dropdown-divider"></div>
							<div class="dropdown-item text-danger btn-logout" > Logout </div>
						</div>
					</span>
					</div>
				</div>
			</div>
		</nav>
	<!--== Header Area End ==-->
