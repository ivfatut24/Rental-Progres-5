<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Maintenance</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/adminltew/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/cardoor/css/jquery-confirm.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminltew/css/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminltew/css/grid.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/adminltew/css/style.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/jquery-3.4.1.slim.min.js') ?>"></script>
</head>

<body class="skin-blue">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar sidebar-sticky">
            <div class="sidebar-content skin-blue">
                <a class="sidebar-brand" href="<?php echo base_url('maintenance') ?>">
                    <span class="align-middle logo">Maintenance</span>
                </a>

                <ul class="sidebar-nav">
                    <li <?= $this->session->flashdata('menu')=="dashboard"?"class=\"sidebar-item active\"":"class=\"sidebar-item\"" ?>>
                        <a href="<?php echo base_url('maintenance') ?>" class="sidebar-link">
                            <i class="align-middle" data-feather="grid"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>
					<li <?= $this->session->flashdata('menu')=="kelola-barangmasuk"?"class=\"sidebar-item active\"":"class=\"sidebar-item\"" ?>>
						<a href='<?php echo base_url("maintenance/kelola/barangmasuk"); ?>' class="sidebar-link">
							<i class="align-middle" data-feather="package"></i>
							<span class="align-middle">Kelola barang masuk</span>
                        </a>
					</li>
					<!-- <li <?= $this->session->flashdata('menu')=="laporan-barangmasuk"?"class=\"sidebar-item active\"":"class=\"sidebar-item\"" ?>>
						<a href='<?php echo base_url("maintenance/laporan/barangmasuk"); ?>' class="sidebar-link">
							<i class="align-middle" data-feather="bar-chart-2"></i>
							<span class="align-middle">Laporan barang masuk</span>
                        </a>
					</li> -->
                </ul>
            </div>
        </nav>
		<div class="main">
            <nav class="navbar navbar-expand navbar-light bg-white sticky-top">
                <a class="sidebar-toggle d-flex mr-2">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                                data-toggle="dropdown">
                                <i class="align-middle" data-feather="user"></i>
                                <span class="text-dark">Hi, <?= $this->session->userdata('nama');?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item btn-logout" href="<?= base_url('logout')?>" >Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
			<main class="content">
