<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	// dd($transaksi);
	// dd($detail_transaksi);
	
	$this->load->view('customer/header');
?>
<div class="progress rounded-0 sticky-top" style="height: 8px; top: 68px;">
	<div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
		aria-valuemax="100"></div>
</div>

<!--== Header Hero ==-->
<section class="section-padding width mx-auto mt-64 min-vh-md-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-no-gutter">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('produk') ?>">transaksi</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= 'no pemesanan' ?></li>
					</ol>
				</nav>
				<h1 class="h2 mb-5"> <span class="font-weight-bold">Detail Pesanan</span><span
						class="text-muted float-right">Step 2</span> </h1>
				<div class="text-block">
					<div class="row mb-3">
						<div class="col-md-6 mb-3 mb-md-0">
							<label>Tanggal sewa</label>
							<div class="font-size-1-4 mb-0 black-100"><?= idDateFormat($transaksi['tgl_sewa']) ?></div>
						</div>
						<div class="col-md-6">
							<label>Tanggal pengembalian</label>
							<div class="font-size-1-4 mb-0 black-100"><?= idDateFormat($transaksi['tgl_pengembalian']) ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>Tujuan</label>
							<div class="font-size-1-4 mb-0 black-100"><?= strtoupper($transaksi['tujuan']) ?></div>
						</div>
					</div>
				</div>
				<div class="text-block">
					<h5 class="mb-4">Produk</h5>
					<div class="row mb-3">
						<div class="col-12">
					<?php
						// dd($detail_transaksi);
						foreach ($detail_transaksi['result'] as $key => $value) {
					?>
						<div class="card_item">
							<div class="cart_item_image mr-lg-3">
								<img src="<?php echo base_url() ?>assets/uploads/produk/<?= $value->gambar_barang ?>" alt="" style="width:80px;" class="img-thumbnail">
							</div>
							<div class="cart_item_desc d-lg-flex justify-content-between w-100">
								<div class="d-lg-flex flex-column w-75 mr-5">
									<div class="cart_item_text text-uppercase font-primary font-weight-bold">
										<?= $value->nama_barang ?>
									</div>
									<div class="cart_item_text text_price text-black-100 font-weight-500">
										Rp <?= number_format($value->harga_sewa, 0, ',', '.') ?>
									</div>
									<div class="w-25">
										<label class="form-control"><?= $value->jumlah_barang ?></label>
										<div class="text-black-200 font-size-1 font-italic">Ukuran: <?= $value->ukuran ?></div>
									</div>
								</div>
								<div class="d-flex flex-column justify-content-between text-right">
									<div class="cart_item_text text_price font-weight-500">
										Rp <?= number_format($value->jumlah_harga_sewa, 0, ',', '.') ?>
									</div> 
								</div>
							</div>
						</div>
						<?php
						}
						?>
						</div>
					</div>
				</div>
				<div class="text-block">
					<h6 class="mb-4">Pengiriman</h6>
					<div class="row">
						<div class="col-6">
							<label class="input-label mb-1">Metode Pengambilan</label>
							<div class="font-size-1 badge badge-primary">
								<span><?= $transaksi['metode_pengambilan'] ?></span>
							</div>
						</div>
						<div class="col-6">
						<?php if(isset($transaksi['alamat_pengiriman'])) { ?>
							<div>
								<label class="input-label mb-1">Alamat</label>
								<div class="font-size-1-4">
									<span class="text-black-100"><?= $transaksi['alamat_pengiriman'] ?> </span>
									<span class="text-black-200">(<?= !empty(@$transaksi['jarak']) ? @$transaksi['jarak'] : 0 ?> KM)</span>
								</div>
							</div>
						<?php }else{ ?>
							<div>
								<label class="input-label mb-1">Alamat</label>
								<div class="font-size-1-4 black-100 mb-3">
									JL.Ciliwung, No.76<br>
									Malang, East Java, Indonesia
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="text-block">
					<h5 class="mb-4">Jaminan</h5>
					<div class="card p-3 bg-light">
						<div class="row mb-3">
							<div class="col-3">
								<img src="<?php echo base_url() ?>assets/uploads/jaminan/<?=$transaksi['foto_jaminan']?>" class="img-thumbnail" alt="">
							</div>
							<div class="col-9">
								<div>
									<label class="input-label mb-1">jaminan yang diberikan</label>
									<div class="font-size-1-4 mb-3">
										<span class="text-black-100 font-weight-500 line-height-1"> <?=@$transaksi['jaminan']?> </span>
										<span class="text-black-200">(<?=@$transaksi['no_identitas']?>)</span>
									</div>
								</div>
								<div>
									<label class="input-label mb-1">No. telp</label>
									<div class="font-size-1-4 black-100 font-weight-500 line-height-1">
										+62<?=@$transaksi['no_telp']?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 pl-xl-5">
				<div class="card bg-light">
					<div class="card-header bg-black">
						<h5 class="m-0 text-white">Ringkasan pesanan</h5>
					</div>
					<div class="card-body p-4">
						<div class="pb-0">
							<table class="w-100">
								<tbody>
									<tr>
										<th class="font-weight-normal py-2">Subtotal</th>
										<td class="text-right py-2"><?= idrFormat(@$transaksi['subtotal']) ?></td>
									</tr>
									<tr>
										<th class="font-weight-normal py-2 text-info">Biaya Pengiriman</th>
										<td class="text-right py-2 text-info"><?= idrFormat(@$transaksi['biaya_pengiriman']) ?></td>
									</tr>
									<?php if(isset($transaksi['alamat_pengiriman'])) { ?>
									<tr>
										<td colspan="2">
											<div class="collapse" id="collapseLinkExample">
												<table class="w-100">
													<tbody>
														<tr>
															<th class="font-weight-normal py-1">Jarak</th>
															<td class="text-right py-1"><?= @$transaksi['jarak'] ?> KM</td>
														</tr>
														<tr>
															<th class="font-weight-normal py-1">Kendaraan</th>
															<td class="text-right py-1"><?= @$transaksi['kendaraan'][0] ?> - <?= idrFormat(@$transaksi['kendaraan'][1]) . "/KM" ?></td>
														</tr>
													</tbody>
												</table>
											</div>
		
											<a class="link-collapse mb-3" data-toggle="collapse" href="#collapseLinkExample" role="button" aria-expanded="false" aria-controls="collapseLinkExample">
												<span class="link-collapse-default">Rincian <i class="fa fa-caret-down"></i> </span>
												<span class="link-collapse-active">Rincian <i class="fa fa-caret-up"></i></span>
											</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr class="border-top">
										<th class="pt-3">Total</th>
										<td class="font-weight-bold text-right pt-3"><?= idrFormat(@$transaksi['total_harga']) ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<form action="<?= base_url('customer/keranjang/bayar') ?>" method="post">
					<input type="hidden" name="id_transaksi" value="<?= @$transaksi['id_transaksi'] ?>">
					<button type="submit" class="mt-3 btn btn-lg btn-block btn-brand text-capitalize">Bayar</button>
				</form>
			</div>
		</div>
	</div>
</section>


<!--== Header Hero ==-->

<script >
    $(function () {
        $('label[for="alamatTujuanLabel"], #alamatTujuanLabel').hide();
    })
    $('.custom-radio').on('checked', '[name="tipePenghantaran"]', function () {
        $('label[for="alamatTujuanLabel"], #alamatTujuanLabel').show();
    })
</script>
<?php $this->load->view("customer/footer.php") ?>
