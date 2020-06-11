<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('maintenance/header');
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
				<div class="col-sm-4">
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
											<h3 class="d-flex align-items-center mb-0 font-weight-light"><?= $count_barang_masuk ?></h3>
										</div>
										<div class="col-5 text-right">
											<!-- This Month -->
											<div><?= ''//$user['percentage'] ?></div>
										</div>
									</div>
									<div class="mb-4">Jumlah barang masuk</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3 position-relative">
									<i data-feather="package" class="feather-lg text-orange"></i>
									<i data-feather="settings" class="feather text-orange bg-white rounded-circle position-absolute bottom-right"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light text-danger"><?= $count_barang_perawatan ?></h3>
										</div>
									</div>
									<div class="mb-4"> Barang yang masih dalam perawatan</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card flex-fill">
						<div class="card-body pt-4 pb-3">
							<div class="media">
								<div class="d-inline-block mt-2 mr-3 position-relative">
									<i data-feather="package" class="feather-lg text-success"></i>
									<i data-feather="check-circle" class="feather text-success bg-white rounded-circle position-absolute bottom-right"></i>
								</div>
								<div class="media-body">
									<div class="row mb-2 d-flex align-items-center">
										<div class="col-7">
											Total
											<h3 class="d-flex align-items-center mb-0 font-weight-light text-success"><?= $count_barang_selesai ?></h3>
										</div>
									</div>
									<div class="mb-4"> Barang yang sudah selesai</div>
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
<?php $this->load->view('maintenance/footer'); ?>
