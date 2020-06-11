<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// dd($keranjang);
	
	$this->load->view('customer/header');
?>
<section class="section-padding width mx-auto mt-64 min-vh-md-100">
    <div class="d-lg-flex justify-content-lg-between align-items-baseline mb-4">
        <div class="d-lg-flex justify-content-start align-items-baseline">
            <h2>Keranjang</h2>
            <?php if ($keranjang['status']) { ?>
            <a href="<?= base_url('customer/produk') ?>" class="ml-3 btn btn-brand btn-sm text-capitalize">Kembali berbelanja</a>
            <?php } ?>
        </div>
        <div class="font-size-1 black-200 align-self-baseline">Total <?=isset($keranjang['result']) ? count($keranjang['result']) : 0?> item</div>
    </div>
    <?php if ($keranjang['status']) { ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card p-4">
                <?php
                    // dd($keranjang);
                    foreach ($keranjang['result'] as $key => $value) {
                ?>
                <div class="card_item">
                    <div class="cart_item_image mr-lg-3">
                        <img src="<?php echo base_url() ?>assets/uploads/produk/<?= $value->gambar_barang ?>" alt="" style="width:80px;" class="img-thumbnail">
                    </div>
                    <div class="cart_item_desc d-lg-flex justify-content-between w-100">
                        <div class="d-lg-flex flex-column w-75 mr-5">
                            <div class="cart_item_text text-uppercase font-primary font-weight-bold">
                                <a href="<?= base_url('customer/produk/'.$value->id_barang) ?>"><?= $value->nama_barang ?></a>
                            </div>
                            <div class="cart_item_text text_price text-black-100 font-weight-500">
                                Rp <?= number_format($value->harga_sewa, 0, ',', '.') ?>
                            </div>
                            <div class="w-25">
                                <div class="input_quantity d-inline-flex mt-3">
                                    <!-- <button class="btn btn-sm btn-control" type="button" data-dir="dwn">
                                        <span class="fas fa-minus"></span>
                                    </button> -->
                                    <input name="jumlah_barang" type="text" max="<?= $value->stok ?>" value="<?= $value->jumlah_barang ?>" class="text-center numberonly" readonly>
                                    <!-- <button class="btn btn-sm btn-control" type="button" data-dir="up">
                                        <span class="fas fa-plus"></span>
                                    </button> -->
                                </div>
                                <div class="text-black-200 font-size-1 font-italic">*Tersisa  <?= $value->stok ?> item</div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-between text-right">
                            <div class="cart_item_text text_price font-weight-500">
                                Rp <?= number_format($value->jumlah_harga_sewa, 0, ',', '.') ?>
                            </div> 
                            <form action="<?= base_url('customer/keranjang/delete') ?>" method="post">
                                <input type="hidden" name="id_temp_detail_transaksi" value="<?= $value->id_temp_detail_transaksi ?>">
                                <button type="submit" class="btn btn-light border text-danger">
                                    <span class="fas fa-trash"></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="position-sticky" style="top:80px;">
                <div class="card border bg-light">
                    <div class="card-body p-4">
                        <div class="pb-0">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th class="font-weight-normal py-2">Subtotal</th>
                                        <td class="text-right py-2">Rp <?= number_format(isset($keranjang['subtotal']) ? $keranjang['subtotal'] : 0, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="border-top">
                                        <th class="pt-3">Total</th>
                                        <td class="font-weight-bold text-right pt-3">
                                            <span>Rp <?= number_format(isset($keranjang['subtotal']) ? $keranjang['subtotal'] : 0, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
               
                <div class="mt-3">
					<form action="<?= base_url('customer/keranjang/checkout_1') ?>" method="post">
						<input type="hidden" name="id_transaksi" value="<?= $keranjang['id_transaksi'] ?>">
						<input type="hidden" name="kode_kendaraan" value="<?= $keranjang['kode_kendaraan'] ?>">
						<input type="hidden" name="subtotal" value="<?= $keranjang['subtotal'] ?>">
						<button type="submit" class="btn btn-lg btn-block btn-brand text-capitalize">
							lanjutkan ke pembayaran
						</button>
					</form>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card space-3">
                <div class="w-40 mx-auto text-center">
                    <h5 class="mb-3">Tidak Ada Produk di Keranjang Anda</h5>
                    <a href="<?= base_url('customer/produk') ?>" class="btn btn-brand btn-sm text-capitalize">Mulai cari produk</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>  
  
<?php $this->load->view("customer/footer.php") ?>

