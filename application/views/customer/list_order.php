<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// dd($list_transaksi);
$this->load->view('customer/header');

?>
<div class="width mx-auto mt-64 pt-4 min-vh-100">

    <!--== Header Area End ==-->

    <!--== Breadcrumb Start ==-->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= base_url('customer/order') ?>">Order</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--== Breadcrumb End ==-->
	<?php
		// dd($barang);
	?>
    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding pt-4">
        <div class="container">
			<div class="row">
                <div class="col-lg-9 mx-auto">
					<?= $this->session->flashdata('msg'); ?>					
                    <h2 class="mb-3">List Order</h2>
                    <?php foreach($list_transaksi as $key => $transaksi) : ?>
						<div class="card mb-lg-6 mb-3">
							<div class="card-header bg-light d-lg-flex justify-content-between">
								<div class="d-flex">
									<div class="mr-lg-7 mr-2">
										<div class="font-size-1 text-black-200">Tanggal order</div>
										<div class="font-size-1 text-black-100"><?= idDateFormat($transaksi['tgl_pemesanan'], true) ?></div>
									</div>
									<div>
										<div class="font-size-1 text-black-200">Status Tagihan</div>
										<!-- 
											status :
												0 => belum dibayar
												1 => sudah dibayar
												2 => gagal / expired
												2 => ditolak
											-->
										<?php if($transaksi['status'] == 0): ?>
											<span class="badge badge-warning">Belum Dibayar</span>
										<?php elseif($transaksi['status'] == 1) : ?>
											<span class="badge badge-primary">Sudah Dibayar</span>
											<?= $transaksi['is_verified'] ? '<span class="badge badge-success">Sudah dikonfirmasi Admin</span>' : '<span class="badge badge-warning">Menunggu konfirmasi Admin</span>' ?>
										<?php elseif($transaksi['status'] == 2) : ?>
											<span class="badge badge-danger">Expired</span>
										<?php elseif($transaksi['status'] == 3) : ?>
											<span class="badge badge-danger">Ditolak</span>
										<?php endif; ?>
									</div>
								</div>
								<div class="text-lg-right mt-lg-0 mt-3">
									<div class="font-size-1 text-black-200">Total Tagihan</div>
									<div class="font-size-1-2 text-black-100 font-weight-500"><?= idrFormat($transaksi['total_harga']) ?></div>
								</div>
							</div>
							<div class="card-body">
								<div class="card_item">
									<div class="cart_item_desc d-lg-flex justify-content-between w-100">
										<div class="d-lg-flex w-75 mr-5">
											<div>											
												<?php if(count($transaksi['detail transaksi']) > 1): ?>
													<?php foreach($transaksi['detail transaksi'] as $k => $detail) : ?>
													<?php if($k == 0): ?>
														<div class="d-flex mb-3">
															<div class="cart_item_image">
																<img src="<?php echo base_url() ?>assets/uploads/produk/<?= $detail['gambar_barang'] ?>" alt="" class="img-thumbnail h-100">
															</div>
															<div class="">
																<div class="cart_item_text text-uppercase font-primary font-weight-bold">
																	<?= $detail['nama_barang'] ?>
																</div>
																<div class="cart_item_text text_price text-black-100 font-weight-500">
																	Rp <?= number_format($detail['harga_sewa'], 0, ',', '.') ?>
																</div>
																<div class="text-black-200">
																	Jumlah : <?= $detail['jumlah_barang']  ?>
																</div>
															</div>
														</div>
													<?php else: ?>
														<div class="collapse" id="collapse<?= $transaksi['id_transaksi'] ?>">
															<div class="d-flex mb-3">
																<div class="cart_item_image">
																	<img src="<?php echo base_url() ?>assets/uploads/produk/<?= $detail['gambar_barang'] ?>" alt="" class="img-thumbnail h-100">
																</div>
																<div class="">
																	<div class="cart_item_text text-uppercase font-primary font-weight-bold">
																		<?= $detail['nama_barang'] ?>
																	</div>
																	<div class="cart_item_text text_price text-black-100 font-weight-500">
																		Rp <?= number_format($detail['harga_sewa'], 0, ',', '.') ?>
																	</div>
																	<div class="text-black-200">
																		Jumlah : <?= $detail['jumlah_barang']  ?>
																	</div>
																</div>
															</div>
														</div>
													<?php endif; ?>
													<?php endforeach; ?>
													
													<a class="link-collapse link-underline mb-3" data-toggle="collapse" href="#collapse<?= $transaksi['id_transaksi'] ?>" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
														<span class="link-collapse-default">Lihat pesanan lainnya <i class="fa fa-caret-down"></i> </span>
														<span class="link-collapse-active">Tutup pesanan lainnya <i class="fa fa-caret-up"></i></span>
													</a>
												<?php else : ?>
													<?php foreach($transaksi['detail transaksi'] as $k => $detail) : ?>
														<div class="d-flex mb-3">
															<div class="cart_item_image">
																<img src="<?php echo base_url() ?>assets/uploads/produk/<?= $detail['gambar_barang'] ?>" alt="" class="img-thumbnail h-100">
															</div>
															<div class="">
																<div class="cart_item_text text-uppercase font-primary font-weight-bold">
																	<?= $detail['nama_barang'] ?>
																</div>
																<div class="cart_item_text text_price text-black-100 font-weight-500">
																	Rp <?= number_format($detail['harga_sewa'], 0, ',', '.') ?>
																</div>
																<div class="text-black-200">
																	Jumlah : <?= $detail['jumlah_barang']  ?>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
										</div>
										<?php if($transaksi['status'] == 0): ?>
										<div class="d-flex flex-column justify-content-between text-right">
											<form action="<?= base_url('customer/pembayaran') ?>" method="post">
												<input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi'] ?>">
												<button type="submit" class="btn btn-brand">Bayar</button>
											</form>
										</div>
										<?php endif; ?>
										<?php if($transaksi['status'] == 2 || $transaksi['status'] == 3): ?>
										<div class="d-flex flex-column justify-content-between text-right">
											<span class="alert alert-danger">Gagal</span>
										</div>
										<?php endif; ?>
										<?php if($transaksi['status_transaksi'] == 2): ?>
										<div class="d-flex flex-column justify-content-between text-right">
											<span class="alert alert-warning"><?= $transaksi['metode_pengambilan'] == 'Diambil' ? 'Siap untuk '.$transaksi['metode_pengambilan'] : 'Telah '.$transaksi['metode_pengambilan'] ?></span>
										</div>
										<?php endif; ?>
										<?php if($transaksi['status_transaksi'] == 3): ?>
										<div class="d-flex flex-column justify-content-between text-right">
											<span class="alert alert-primary">Barang Disewa</span>
										</div>
										<?php endif; ?>
										<?php if($transaksi['status_transaksi'] == 4): ?>
										<div class="d-flex flex-column justify-content-between text-right">
											<span class="alert alert-success">Selesai</span>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<p><?= $links; ?></p>
               </div>
            </div>
        </div>
    </section>
    <!--== Gallery Page Content End ==-->
</div>   
<?php $this->load->view('customer/footer'); ?>
