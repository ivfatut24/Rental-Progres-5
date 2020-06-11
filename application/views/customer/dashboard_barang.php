<section id="service-area" class="section-padding">
	<div class="container">
        <!-- Section Title Start -->
        <h3 class="text-center text-uppercase mb-4">Barang Yang Dapat Di Sewa</h3>
        <!-- Section Title End -->

		<!-- Service Content Start -->
		<div class="row">
			<div class="col-lg-11 m-auto text-center">
				<div class="service-container-wrap dasboard-product">
					<?php
						// dd($list_barang);
						foreach ($list_barang as $key => $barang) :
					?>
						<div class="product-item">
							<a href="<?php echo base_url("customer/produk/".$barang->id_barang) ?>" class="stretched-link"></a>
							<img src="<?php echo base_url('assets/uploads/produk/'.$barang->gambar_barang) ?>">
							<div class="product-title text-truncate" title="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></div>
							<div class="product-price">Rp <?= number_format($barang->harga_sewa, 0, ',', '.') ?>/per day</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- Service Content End -->
	</div>
</section>