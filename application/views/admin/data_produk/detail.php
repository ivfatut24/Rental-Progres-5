<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <a href="<?php echo base_url('admin/produk/')?>" class="btn btn-secondary btn-icon-text">
                <i data-feather="arrow-left" class="mr-1"></i>
                <span>Kembali</span>
            </a>
            <a class="btn btn-light btn-icon-text float-right text-tertiary" 
                href="<?php echo base_url('admin/produk/update/'.$data->id_barang)?>">
                <span data-feather="edit" class="mr-1"></span><span>Edit barang</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 order-lg-1 order-2">
                            <h3 class="mb-4 px-lg-4 mt-3">
                                <?= $data->nama_barang ?>
                            </h3>
                            <div class="p-lg-4 p-3 border rounded">

                                <div class="row pb-4">
                                    <div class="text-black-60 col-lg-2 mb-lg-0 mb-2">
                                        Stok
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="font-size-lg">
                                            <?= $data->stok ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-4">
                                    <div class="text-black-60 col-lg-2 mb-lg-0 mb-2">
                                        Ukuran
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="font-size-lg">
                                            <?= $data->ukuran ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pb-4">
                                    <div class="text-black-60 col-lg-2 mb-lg-0 mb-2">
                                        Harga
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="font-size-lg">
                                            <?= $data->harga_sewa ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-black-60 col-lg-2 mb-lg-0 mb-2">
                                        Keterangan
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="font-size-lg">
                                            <?= $data->deskripsi ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-2 order-1">
                            <img src="<?php echo base_url('assets/uploads/produk/'.$data->gambar_barang) ?>" class="img-rounded img-thumbnail"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer'); ?>
