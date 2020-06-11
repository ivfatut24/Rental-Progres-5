<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-lg-8 col-sm-8 col-12 d-lg-flex">
			<h1 class=" m-0 font-weight-light">Laporan barang keluar</h1>
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
                                    tanggal sewa
                                </div>
                                <div class="text-black-80">
                                    15 Mei 2020
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                                    Pemesan
                                </div>
                                <div class="text-black-80">
                                    Alfred
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
