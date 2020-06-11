<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-4">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Laporan Pengunjung</h1>
        </div>
        <!-- <div class="col-lg-4 col-sm-4 col-12 mt-3 mt-lg-0 text-lg-right text-sm-right">
            <div id="laporanRentang" class="ml-lg-2 mt-3 mt-lg-0 btn btn-icon-text p-2 bg-white rounded border">
                <i data-feather="calendar"></i>&nbsp;
                <span class="mx-2"></span> <i data-feather="chevron-down"></i>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg-7 order-lg-1 order-2">
			<?php // dd($data); ?>
            <?php foreach($data as $k_kategori => $v_kategori) : ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="mb-0"><?= $v_kategori->nama_kategori_produk ?></h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-fixed table-bordered table-hover mb-0">
                            <thead class="bg-light">
                                <th class="w-50">Nama Item</th>
								<?php foreach($tujuan as $t) : ?>
									<?php
										$ex = explode(' ', $t->tujuan);
										$inisial_tujuan = '';
										foreach ($ex as $x) {
											$inisial_tujuan .= strtoupper(substr($x, 0, 1));
										}
									?>
									<th><?= $inisial_tujuan ?></th>
								<?php endforeach; ?>
                                <th>Jumlah</th>
                                <th>%</th>
                                <th>Stock</th>
                            </thead>
                            <tbody>
								<?php if(isset($v_kategori->barang)) : ?>
									<?php foreach($v_kategori->barang as $k_barang => $v_barang) : ?>
									<?php $total = 0; ?>
									<tr>
										<td><?= $v_barang['nama_barang']?></td>
										<?php foreach($v_barang['tujuan'] as $k_tujuan => $v_tujuan) : ?>
											<td class="text-center"><?= $v_tujuan->jumlah ?></td>
											<?php $total += $v_tujuan->jumlah; ?>
										<?php endforeach; ?>
										<td class="text-center"><?= $total ?></td>
										<td class="text-center"><?= $total / max($v_barang['stok'], 1) * 100 ?></td>
										<td class="text-center"><?= $v_barang['stok'] ?></td>
									</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="<?= count($tujuan) + 4 ?>" class="text-center text-danger">Tidak Ada Barang</td>
									</tr>
								<?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			<?php endforeach; ?>
        </div>
        <div class="col-lg-5 order-lg-2 order-1">
            <div class="card w-100">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jumlah Pengunjung</h5>
                </div>
                <div class="card-body">
                    <div class="py-2">
                        <div class="chart chart-xs">
                            <div id="diagramPengunjung"></div>
                        </div>
                    </div>
                    <div class="tabler-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Tujuan</th>
                                    <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($data_pengunjung as $k_data_pengunjung => $v_data_pengunjung) : ?>
									<tr>
										<td><span class="py-1 px-2 mr-2 rounded bg-primary"></span> <?= $v_data_pengunjung->tujuan ?></td>
										<td class="text-right"> #<?= $v_data_pengunjung->jumlah ?> </td>
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
<script>
		var data_pengunjung = <?= json_encode($data_pengunjung) ?>;
		var series = [];
		var labels = [];

		data_pengunjung.forEach(e => {
			series.push(e.jumlah);
			labels.push(e.tujuan);
		});

		
		$(function() {
            var options = {
            	chart: {
            		type: 'pie',
            		height: 240
            	},
            	series: series,
            	labels: labels,
            	colors: ['#388BF2', '#FBAF18', '#CF212A', '#6610f2', '#31b057', '#52575c'],
            	maintainAspectRatio: false,
            	legend: {
            		show: false
            	},
            	responsive: [{
            		breakpoint: 480,
            		options: {
            			chart: {
            				width: 200
            			},
            			legend: {
            				display: false
            			}
            		}
            	}]
            };

            var chart = new ApexCharts(document.querySelector("#diagramPengunjung"), options);
            chart.render();
		});
	</script>
<?php $this->load->view('admin/footer'); ?>

