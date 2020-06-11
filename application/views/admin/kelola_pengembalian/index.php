<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Data Pengembalian</h1>
            <span class="text-black-80"> <?= count($pemesanan)?> data</span>
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
									<th class="text-center">No Booking</th>
									<th class="text-left">Nama Pemesan</th>
									<th class="text-center">Tgl Pemesanan</th>
									<th class="text-center">Tgl Pengembalian</th>
									<th class="text-right">Total Sewa</th>
									<th class="nosort"></th>
								</tr>
                            </thead>

							</tbody>
							<?php $no=1; ?>
							<?php
								// dd($pemesanan);
								foreach ($pemesanan as $key => $value):
							?>
								<tr>
									<td class="font-size-lg font-weight-bold text-center">
										<a class="font-weight-bold text-underline text-tertiary"  data-toggle="modal" data-target="#modalDetailPesanan">
											<?php echo '#'.$value->id_transaksi ?>
										</a>
									</td>
									<td class="font-size-lg"><?php echo $value->nama ?></td>
									<td class="font-size-lg text-center"><?php echo idDateFormat($value->tgl_pemesanan) ?></td>
									<td class="font-size-lg text-center"><?php echo idDateFormat($value->tgl_pengembalian) ?></td>
									<td class="font-size-lg text-right">Rp <?= number_format($value->total_harga, 0, ',', '.') ?></td>

									<td class="align-top text-center">
										<?php if($value->status_transaksi == 4) : ?>
											<span class="badge badge-success">Selesai</span>
										<?php else : ?>
											<a data-toggle="modal" data-id="<?= $value->id_transaksi ?>" data-target="#modalKonfirmasiKembali" href="#" class="btn-konfirmasi btn btn-outline-primary">Konfirmasi</a>
										<?php endif; ?>
										
									</td>
								</tr>
								<?php $no++ ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalKonfirmasiKembali" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasiKembaliLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<form action="<?= base_url('admin/kelola/pengembalian/kembali') ?>" method="post" class="modal-content">
			<input type="hidden" name="id_transaksi" id="id-transaksi" value="">
			<div class="modal-header border-0">
                <h4 class="modal-title text-center w-100">Form Kondisi Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<div class="modal-body">
				<div class="px-3">
					<div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="text-black-60 font-size-tiny text-uppercase">
                                No. Booking
                            </div>
                            <div id="no-booking" class="font-size-lg text-black-100 line-height-26">
                                #1
                            </div>
                        </div>
                    </div>
					<div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="text-black-60 font-size-tiny text-uppercase">
                               Nama Customer
                            </div>
                            <div id="nama" class="font-size-lg text-black-100 line-height-26">
                                Dummy
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5">
                            <div class="text-black-60 font-size-tiny text-uppercase">
                                Tujuan
                            </div>
                            <div id="tujuan" class="font-size-lg text-black-100 line-height-26">
                                Event
                            </div>
                        </div>
                    </div>
					<div class="row mb-3">
                        <div class="col-lg-3 col-6">
                            <div class="text-black-60 font-size-tiny text-uppercase">
                                Tanggal Pesan
                            </div>
                            <div id="tgl-sewa" class="font-size-lg text-black-100 line-height-26">
                                <?php echo idDateFormat(date("Y-m-d")) ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-black-60 font-size-tiny text-uppercase">
                                Tanggal Kembali
                            </div>
                            <div id="tgl-kembali" class="font-size-lg text-black-100 line-height-26">
                                <?php echo idDateFormat(date("Y-m-d")) ?>
                            </div>
                        </div>
                    </div>
				</div>
				<hr class="my-4">
				<div class="px-3">
					<h4>Pengembalian</h4>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="">Kondisi Barang</label>
								<div class="custom-controls-stacked pt-2">
									<label class="custom-control custom-radio custom-control-inline">
										<input value="baik" name="kondisi_barang" type="radio" class="custom-control-input" checked>
										<span class="custom-control-label">Baik</span>
									</label>
									<label class="custom-control custom-radio custom-control-inline">
										<input value="rusak" name="kondisi_barang" type="radio" class="custom-control-input">
										<span class="custom-control-label">Rusak</span>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="kena-denda">
								<hr style="border-style: dashed" class="my-2">
								<h5 class="mt-2 mb-3">Denda </h5>
								<div class="form-group">
									<label for="">Jumlah denda</label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-white">Rp</span>
										</div>
										<input id="denda" type="number" name="denda" class="form-control border-left-0" aria-label="Jumlah (dalam rupiah)" min="0" value="0">
									</div>
								</div>
								<div class="form-group">
									<label for="">Keterangan</label>
									<textarea id="keterangan" name="keterangan" placeholder="Keterangan denda" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function () {
		var arr_pemesanan = <?= json_encode($pemesanan) ?>;
		
		$(".kena-denda").hide();
		$(".custom-control-input").on("change", function(){
			if($(this).val() == 'rusak'){
				$(".kena-denda").show();
			}else{
				$("#denda").val(0)
				$("#keterangan").val('')
				$(".kena-denda").hide();
			}
		});

		$(".btn-konfirmasi").click(function() {
			var pemesanan = arr_pemesanan.find(a => a.id_transaksi === $(this).data("id") + '');
			$("#id-transaksi").val(pemesanan.id_transaksi)
			$("#no-booking").text("#" + pemesanan.id_transaksi)
			$("#nama").text(pemesanan.nama)
			$("#tujuan").text(pemesanan.tujuan)
			$("#tgl-sewa").text(pemesanan.tgl_sewa)
			$("#tgl-kembali").text(pemesanan.tgl_pengembalian)
			console.log(pemesanan);
			
		});
    });
</script>
<?php $this->load->view('admin/footer'); ?>
