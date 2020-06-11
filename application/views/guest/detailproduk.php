<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<div class="width mx-auto mt-64 pt-4">

    <!--== Header Area End ==-->

    <!--== Breadcrumb Start ==-->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('produk') ?>">Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $barang->nama_barang ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--== Breadcrumb End ==-->
    

    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding pt-4">
        <div class="container">
			<div class="row">
                <div class="col-lg-4">
                    <img src="<?php echo base_url() ?>assets/uploads/produk/<?= $barang->gambar_barang ?>">
                </div>
                <div class="offset-lg-1 col-lg-7">
                    <h2 class="text-bold text-uppercase mb-2"><?= $barang->nama_barang ?></h2>
                    <h4 class="text-black-100 font-weight-normal font-secondary">Rp <?= number_format($barang->harga_sewa, 0, ',', '.') ?>/per day</h4>
                    <div class="py-64">
                        <h5 class="font-secondary text-black-200 font-weight-normal mb-2"> Description</h5>
                        <p class="text-black-200 m-0">
                        <?= $barang->deskripsi ?><br>
						Ukuran : <?= $barang->ukuran ?><br>
                        </p>
                    </div>
                    <?php if($barang->stok > 0): ?>
                    <div class="row">
                        <div class="col-12">
                            <a class="btn btn-brand btn-lg text-capitalize" href="<?php echo base_url("login"); ?>">Log in untuk sewa produk</a>
                        </div>
                        <div class="col-12">
                            <div class="text-black-200 font-size-1 font-italic mt-2">
                                *Tersisa <?= $barang->stok ?> item
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <div class="font-italic">
                            <h4 class="text-danger font-weight-400 mb-2">Out of stock</h4>
                            <p>Stock untuk saat ini tidak tersedia</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--== Gallery Page Content End ==-->
</div>   
<?php $this->load->view('guest/footer'); ?>