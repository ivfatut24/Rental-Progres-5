<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	// dd($pembayaran_belum_konfirmasi);

	$this->load->view('admin/header');
?>
<div class="container-fluid p-0">

<div class="row mb-2 mb-xl-4">
	<div class="col-auto d-none d-sm-block">
		<h3 class="d-inline-block">Dashboard</h3>
		<h5 class="d-inline-block text-black-60 ml-2 m-0"><?php echo idDateFormat(date("Y-m-d")) ?></h5>
	</div>
</div>
<div class="row">
	<div class="col-12 d-flex">
		<div class="w-100">
			<div class="row">
				<div class="col-sm-6">
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i data-feather="users" class="feather-lg text-tertiary"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light"><?= $user['length'] ?></h3>
										</div>
										<div class="col-5 text-right">
											This Month
											<div><?= $user['percentage'] ?></div>
										</div>
									</div>
									<div class="mb-4">Customer</div>
									<a href="<?= base_url('admin/customer') ?>">Lihat semua <span data-feather="chevron-right"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i data-feather="package" class="feather-lg text-primary"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light"><?= $product['length'] ?></h3>
										</div>
										<div class="col-5 text-right">
											This Month
											<div><?= $product['percentage'] ?></div>
										</div>
									</div>
									<div class="mb-4">Produk</div>
									<a href="<?= base_url('admin/produk') ?>">Lihat semua <span data-feather="chevron-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i data-feather="shopping-bag" class="feather-lg text-warning"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light"><?= $pemesanan['length'] ?></h3>
										</div>
										<div class="col-5 text-right">
											This Month
											<div><?= $pemesanan['percentage'] ?></div>
										</div>
									</div>
									<div class="mb-4"> Pesanan</div>
									<a href="<?= base_url('admin/kelola/pemesanan') ?>">Lihat semua <span data-feather="chevron-right"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3">
									<i data-feather="shopping-bag" class="feather-lg text-green"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light"><?= $pembayaran_berhasil['length'] ?></h3>
										</div>
										<div class="col-5 text-right">
											This Month
											<div><?= $pembayaran_berhasil['percentage'] ?></div>
										</div>
									</div>
									<div class="mb-4">Pesanan Berhasil</div>
									<a href="<?= base_url('admin/kelola/pembayaran') ?>">Lihat semua <span data-feather="chevron-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<?php $this->load->view('admin/footer'); ?>

