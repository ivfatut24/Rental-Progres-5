<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-lg-8 col-sm-8 col-12 d-lg-flex">
			<h1 class=" m-0 font-weight-light">Laporan barang masuk</h1>
			<div id="laporanRentang" class="ml-lg-2 mt-3 mt-lg-0 btn btn-icon-text p-2 bg-white rounded border">
				<i data-feather="calendar"></i>&nbsp;
				<span class="mx-2"></span> <i data-feather="chevron-down"></i>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-12 mt-3 mt-lg-0 text-lg-right text-sm-right">

			<a href="<?php echo '#'?>" class="btn-icon-text btn btn-brand">
				<i data-feather="file-text" class="align-middle"></i>
				<span class="ml-1 align-middle">Export Excel</span>
			</a>
		</div>
	</div>
	<div class="row mb-5">
		<div class="col-12">
			<span class="text-black-80"> 10 data</span>
		</div>
	</div>
        <?php for($tor = 1; $tor <= 10; $tor++): ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-auto">
                                <img src="<?= base_url('assets/uploads/produk/').'05e2c3fc81212290a46d9062bce7dbf3.jpg' ?>" alt="gambar produk " style="width:80px" class="img-thumbnail" />
                            </div>
                            <div class="col-auto">
                                <h4 class="m-0">
                                    Bestway Monodome Pavilio X2
                                </h4>
                                <div class="mt-2">
                                    <span class="text-black-60">Ukuran:</span>
                                    <span class="text-black-80 ml-1 font-weight-bold text-uppercase">Besar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                                    Kondisi
                                </div>
                                <div class="badge font-size-lg badge-primary">
                                    Baik
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                                    Keterangan
                                </div>
                                <div class="text-black-80">
                                    Ready
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endfor; ?>
</div>
<?php $this->load->view('admin/footer'); ?>

 <!-- <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Kelola barang masuk</h1>
            <span class="text-black-80"> <?= count($list_maintenance)?> data</span>
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
                                    <th class="text-left">Nama Barang</th>
                                    <th class="text-left">Tanggal Masuk</th>
                                    <th class="text-center">Status</th>
                                    <th class="nosort"></th>
                                </tr>
                            </thead>

                            </tbody>
                            <?php
                                // dd($list_maintenance);
                                foreach ($list_maintenance as $key => $value):
                                // status maintenance diperbaiki/belum diperbaiki/ready default belum diperbaiki *jika rusak
                            ?>
                            <tr>
                                <td class="font-size-lg font-weight-bold text-left">
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="<?= base_url('assets/uploads/produk/').$value->gambar_barang ?>" alt="gambar produk " style="width:80px" class="img-thumbnail" />
                                        </div>
                                        <div class="col-auto">
                                            <h4 class="m-0">
                                                <?= $value->nama_barang ?>
                                            </h4>
                                            <div class="mt-2">
                                                <span class="text-black-60">Jumlah:</span>
                                                <span class="text-black-80 ml-1 font-weight-bold text-uppercase"><?= $value->jumlah_barang ?></span>
                                            </div>
                                            <div class="mt-2">
                                                <span class="text-black-60">Ukuran:</span>
                                                <span class="text-black-80 ml-1 font-weight-bold text-uppercase"><?= $value->ukuran ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-size-lg text-left align-top"><?= idDateFormat($value->tgl_masuk_maintenance, true) ?></td>
                                <td class="font-size-lg text-center align-top">
                                    <?php if($value->status_barang == 0) : ?>
                                        <div class="badge badge-danger">
                                            Belum diperbaiki
                                        </div>
                                    <?php endif; ?>
                                    <?php if($value->status_barang == 1) : ?>
                                        <div class="badge badge-secondary">
                                            Sedang diperbaiki
                                        </div>
                                    <?php endif; ?>
                                    <?php if($value->status_barang == 2) : ?>
                                        <div class="badge badge-success">
                                            Ready
                                        </div>
                                    <?php endif; ?>
                                    <?php if($value->status_barang == 3) : ?>
                                        <div class="badge badge-success">
                                            Maintenance Selesai
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td class="align-top text-center align-top">
                                    <?php if($value->status_barang == 0) : ?>
                                        <a href="<?= base_url('maintenance/kelola/barangmasuk/perbaiki/').$value->id_maintenance ?>" class="btn btn-outline-primary btn-icon-text">
                                            <i data-feather="settings" class="mr-1"></i>
                                            Perbaiki barang
                                        </a>
                                    <?php endif; ?>
                                    <?php if($value->status_barang == 1) : ?>
                                        <a href="<?= base_url('maintenance/kelola/barangmasuk/siap/').$value->id_maintenance ?>" class="btn btn-outline-success btn-icon-text">
                                            <i data-feather="check" class="mr-1"></i>
                                            Tandai barang sudah diperbaiki
                                        </a>
                                    <?php endif; ?>
                                    <?php if($value->status_barang == 2) : ?>
                                        <a href="<?= base_url('maintenance/kelola/barangmasuk/perbaiki/').$value->id_maintenance ?>" class="btn btn-outline-secondary btn-icon-text">
                                            <i data-feather="settings" class="mr-1"></i>
                                            Tandai barang masih perlu perbaikan
                                        </a>
                                        <hr>
                                        <a href="<?= base_url('maintenance/kelola/barangmasuk/selesai/').$value->id_maintenance ?>" class="btn btn-outline-success btn-icon-text">
                                            <i data-feather="check" class="mr-1"></i>
                                            Tandai barang dapat digunakan kembali
                                        </a>
                                    <?php endif; ?>
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

 -->