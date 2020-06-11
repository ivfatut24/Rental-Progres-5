<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Produk</h1>
            <span class="text-black-80"> <?=count($data)?> Produk</span>
        </div>
        <div class="col-lg-4 col-sm-4 col-12 mt-3 mt-lg-0 text-lg-right text-sm-right">
            <a href="<?php echo base_url('admin/produk/create/')?>" class="btn-icon-text btn btn-brand">
                <i data-feather="plus" class="align-middle"></i>
                <span class="ml-1 align-middle">Tambah Produk</span>
            </a>
           <a href="<?php echo base_url('admin/produk/kategori/create/');?>" class="btn-icon-text btn btn-brand">
                <i data-feather="plus" class="align-middle"></i>
                <span class="ml-1 align-middle">Tambah Kategori</span>
            </a>

        </div>


    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Kategori</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-right">Harga Sewa</th>
                                    <th class="text-center nosort"></th>
                                </tr>
                            </thead>

                            </tbody>
                            <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="<?= base_url('assets/uploads/produk/').$value->gambar_barang ?>" alt="gambar produk <?php echo $value->nama_barang ?>" style="width:80px" class="img-thumbnail" />
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="m-0">
                                                <a class="font-weight-bold text-underline" href="<?php echo base_url('admin/produk/detail/'.$value->id_barang)?>">
                                                <?php echo $value->nama_barang ?>
                                                </a>
                                            </h4>
                                            <div class="mt-2">
                                                <span class="text-black-60">Ukuran:</span>
                                                <span class="text-black-80 ml-1 font-weight-bold text-uppercase"><?php echo $value->ukuran ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-top">
                                    <div class="font-size-lg font-weight-bold">
                                        <?php echo $value->nama_kategori_produk ?>
                                    </div>
                                </td>
                                <td class="align-top text-center">
                                    <div class="font-size-lg font-weight-bold">
                                        <?php echo $value->stok ?> item
                                    </div>
                                    <?php if($value->stok > 0): ?>
                                    <?php else: ?>
                                        <span class="text-black-60">(Tidak tersedia)</span>
                                    <?php endif; ?>
                                </td>
                                <td class="align-top text-right">
                                    <div class="font-size-lg">
                                        <span class="text-black-80 font-weight-bold">
                                            Rp <?= number_format($value->harga_sewa, 0, ',', '.') ?>
                                        </span>
                                        <span class="text-black-60">/hari</span>
                                    </div>
                                </td>

                                <td class="align-top text-center">
                                    <!-- <a class="btn btn-sm btn-primary" data-placement="bottom"
                                            data-toggle="tooltip" title="Edit Produk"
                                            href="<?php echo base_url('admin/produk/update/'.$value->id_barang)?>">
                                        <span data-feather="edit"></span>
                                    </a>
                                    <a onclick="return confirm ('Yakin hapus <?php echo $value->nama_barang ?>');"
                                        class="btn btn-sm btn-danger tooltips" data-placement="bottom"
                                        data-toggle="tooltip" title="Hapus Produk"
                                        href="<?php echo base_url('admin/produk/delete/'.$value->id_barang)?>">
                                        <span data-feather="trash-2"></span>
                                    </a> -->
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static" class="btn btn-outline-secondary btn-sm">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item d-flex align-items-center" 
                                            href="<?php echo base_url('admin/produk/update/'.$value->id_barang)?>"
                                            >
                                                <span data-feather="edit" class="mr-1"></span><span>Edit produk</span>
                                        </a>
                                            <a class="dropdown-item d-flex align-items-center text-danger btn-link" href="#"
                                            data-content="Yakin hapus <b><?php echo $value->nama_barang ?></b>?" data-cancel="tidak" data-confirm="Ya"
                                            data-link="<?php echo base_url('admin/produk/delete/'.$value->id_barang)?>"
                                            >
                                                <span data-feather="trash-2" class="mr-1"></span><span>Hapus</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer'); ?>
