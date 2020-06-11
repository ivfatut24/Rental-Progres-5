<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<div class="width mx-auto mt-64 pt-4">

    <!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
    <h2 class="text-uppercase">Produk</h2>
    <!--== Page Title Area End ==-->
    

    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding ">
        <div class="container p-0">
            <div class="popular-cars-wrap">
                <!-- Filtering Menu -->
                <div class="popucar-menu text-center">
                    <a href="#" data-filter="*" class="active">all</a>
                    <a href="#" data-filter=".tenda">Tenda</a>
                    <a href="#" data-filter=".equip">Equipment Rent</a>
                    
                </div>
                <!-- Filtering Menu -->
                <div class="row popular-car-gird">
                <?php
                    // dd($list_barang);
                    foreach ($list_barang as $key => $barang) :
                ?>
                    <!-- Single Popular Car Start -->
                    <div class="col-lg-3 col-md-4 tenda sedan">
                        <div class="product-item">
                            <a href="<?php echo base_url("guest/produk/".$barang->id_barang) ?>" class="stretched-link"></a>
                            <img src="<?php echo base_url('assets/uploads/produk/'.$barang->gambar_barang) ?>">
                            <div class="product-title text-truncate" title="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></div>
                            <div class="product-price">Rp <?= number_format($barang->harga_sewa, 0, ',', '.') ?>/per day</div>
                        </div>
                    </div>
                    <!-- Single Popular Car End -->
                    
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!--== Gallery Page Content End ==-->
</div>   
<?php $this->load->view('guest/footer'); ?>