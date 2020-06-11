<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-5">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Laporan penyewaan</h1>
            <span class="text-black-80"> 10 data</span>  
        </div>
        <div class="col-lg-4 col-sm-4 col-12 mt-3 mt-lg-0 text-lg-right text-sm-right">
            <div id="laporanRentang" class="ml-lg-2 mt-3 mt-lg-0 btn btn-icon-text p-2 bg-white rounded border">
                <i data-feather="calendar"></i>&nbsp;
                <span class="mx-2"></span> <i data-feather="chevron-down"></i>
            </div>
        </div>
    </div>
    <?php for($tor = 1; $tor <= 10; $tor++): ?>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                        No. Booking
                    </div>
                    <div class="text-black-100">
                        #<?php echo $tor?>
                    </div>
                    <div class="text-black-60 line-height-26 font-size-sm">
                        15 Mei 2020 00.18
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                                Nama Customer
                            </div>
                            <div class="text-black-100">
                                Retester PSO PT Anugerah Situbolon
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                                Tujuan
                            </div>
                            <div class="text-black-100">
                                Acara Keluarga
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="float-right">
                        <div class="text-black-60 mb-1-4 font-size-tiny text-uppercase">
                            Total Sewa
                        </div>
                        <div class="text-black-100 font-weight-bold">
                            Rp 1.068.000
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endfor; ?>
</div>

<?php $this->load->view('admin/footer'); ?>