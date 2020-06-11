<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// dd($pembayaran);
	$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Pembayaran</h1>
            <span class="text-black-80"> <?= count($pembayaran)?> pembayaran</span>
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
                                    <th class="text-center">Tgl Deadline</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Tgl Bayar</th>
                                    <th class="text-center">Bukti Bayar</th>
                                    <th class="text-center">Konfirmasi</th>
									<th class="nosort"></th>
								</tr>
                            </thead>

							</tbody>
                            <?php foreach ($pembayaran as $key => $val): ?>
								<?php
									switch ($val->status) {
										case 0:
											$status = '<div class="badge badge-warning">Belum dibayar</div>';
											break;
										case 1:
											$status = '<div class="badge badge-success">Sudah dibayar</div>';
											break;
										case 2:
											$status = '<div class="badge badge-secondary">Expired</div>';
											break;
										case 3:
											$status = '<div class="badge badge-danger">Ditolak</div>';
											break;
										
										default:
											$status = '';
											break;
									}
								?>
								<tr>
									<td class="text-center"><?php echo '#'.$val->id_transaksi ?></td>
									<td class="text-center"><?php echo idDateFormat($val->tgl_deadline, TRUE) ?></td>
									<td class="text-center"><?= $status ?></td>
									<td class="text-center"><?php echo $val->tgl_bayar ? idDateFormat($val->tgl_bayar, TRUE) : '-' ?></td>
									<td class="text-center">
										<?php if($val->bukti_bayar) : ?>
											<a href="#" class="bukti-bayar text-tertiary font-weight-bold" data-src="<?= base_url('assets/uploads/bukti bayar/').$val->bukti_bayar ?>">
												<i data-feather="file"></i>
												Bukti bayar <?php echo '#'.$val->id_transaksi ?>
											</a>
										<?php else : ?>
											-
										<?php endif; ?>
									</td>
									<td class="text-center"><?php echo $val->is_verified ? '<span class="badge badge-success">Sudah</span>' : '<span class="badge badge-warning">Belum</span>' ?></td>
									<td class="align-top text-center">
										<?php if($val->status == 1 && !$val->is_verified) : ?>
											<a href="<?php echo base_url('admin/kelola/pembayaran/konfirmasi/'.$val->id_pembayaran)?>" class="btn btn-sm btn-primary">Konfirmasi</a>
											<a class="btn btn-sm btn-outline-danger btn-link" href="#"
												data-content="Yakin tolak <b>Bukti bayar <?php echo '#'.$val->id_transaksi ?></b>?" data-cancel="tidak" data-confirm="Ya"
												data-link="<?php echo base_url('admin/kelola/pembayaran/tolak/'.$val->id_pembayaran)?>">Tolak</a>
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
<!-- Modal -->
<div class="modal fade" id="modalBuktiBayar" tabindex="-1" role="dialog" aria-labelledby="modalBuktiBayarLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="imgBuktiBayar"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function () {
	$('#table tbody').on('click', '.bukti-bayar', function() {
		var data = $(this).data('src'); 
		$('.imgBuktiBayar').html(
		'<img src="'+data+'" class="w-100" />'
		);
		$('#modalBuktiBayar').modal('show');
	});
});
</script>
<?php $this->load->view('admin/footer'); ?>
