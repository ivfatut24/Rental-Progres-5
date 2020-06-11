<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	// dd($pembayaran);
	
	$this->load->view('customer/header');
?>

<div class="width mx-auto mt-64 pt-4">

    <!--== Header Area End ==-->

    <!--== Breadcrumb Start ==-->
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('customer/order') ?>">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nomor transaksi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--== Breadcrumb End ==-->
	<?php
		// dd($barang);
	?>
    <!--== Gallery Page Content Start ==-->
    <section id="gallery-page-content" class="section-padding pt-4">
        <div class="container">
			<div class="row">
               <div class="col-lg-9 mx-auto">
                    <div class="card border-0 px-3 space-1 text-center">
						<?= $this->session->flashdata('msg'); ?>
                        <h5 class="text-capitalize">Mohon segera selesaikan pembayaran</h5>
                        <p>Transfer dana Anda sebelum <span class="text-black font-weight-bold"> <?= idDateFormat($pembayaran->tgl_deadline, true) ?></span></p>
                        <p class="mt-lg-7 mt-5">Sisa waktu pembayaran</p>
                        <div id="countdown" class="d-flex justify-content-center">
                            <div class="mx-2">
                                <h2 id="countdown-h" class="font-secondary">00</h2>
                                <div class="text-uppercase text-black-200">Jam</div>
                            </div>
                            <div class="mx-2">
                                <h2 class="font-secondary">:</h2>
                            </div>
                            <div class="mx-2">
                                <h2 id="countdown-m" class="font-secondary">00</h2>
                                <div class="text-uppercase text-black-200">Menit</div>
                            </div>
                            <div class="mx-2">
                                <h2 class="font-secondary">:</h2>
                            </div>
                            <div class="mx-2">
                                <h2 id="countdown-s" class="font-secondary">00</h2>
                                <div class="text-uppercase text-black-200">Detik</div>
                            </div>
                        </div>
                        <div id="expired" class="d-flex justify-content-center" style="display:none"></div>
                    </div>
                    <div class="card bg-light px-3 space-1 text-center">
                        <p>Jumlah yang harus dibayar</p>
                        <h2 class="text-black-200"><?= idrFormat($pembayaran->total_harga) ?></h2>
                    </div>
                    <hr class="my-4">
                    <p class="text-capitalize">Informasi rekening tujuan</p>
                    <div class="card border-0 p-3 space-2">
						<div class="row mb-3">
							<div class="offset-2 col-3">
								<img src="" class="img-thumbnail" alt="gambar bank">
							</div>
							<!-- <div class="col-7">
                                <p class="text-black">Nama Bank</p>
                                <p>Nomor Rekening: <span class="font-weight-bold text-black">989812312</span></p>
                                <p>Nama Pemilik Rekening : <span>Yang jelas bukan Nama Anda</span></p>
							</div> -->
						</div>
                    </div>
                    <div class="pb-5 text-center">
						<form enctype="multipart/form-data" method="POST" action="<?= base_url('customer/pembayaran/upload') ?>">
							<input type="hidden" name="id_transaksi" value="<?= $pembayaran->id_transaksi ?>">
							<input type="hidden" name="id_pembayaran" value="<?= $pembayaran->id_pembayaran ?>">
							<input type="file" class="btn btn-lg btn-brand" name="bukti_bayar" placeholder="Unggah Bukti Pembayaran" onchange="uploadBuktiBayar();" /><br />
							<input type="submit" id="upload-btn" name="submit" style="display:none;" />
							<script type="text/javascript">
								function uploadBuktiBayar() {
									document.getElementById("upload-btn").click();
								}
							</script>
						</form>
                    </div>
               </div>
            </div>
        </div>
    </section>
    <!--== Gallery Page Content End ==-->
</div>

<?php if(isset($upload_name)) : ?>
	<!-- Modal -->
	<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					<img src="<?= base_url('assets/uploads/bukti bayar/'.$upload_name) ?>" alt="upload bukti bayar">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Upload Lagi</button>
					<form method="POST" action="<?= base_url('customer/pembayaran/send') ?>">
						<input type="hidden" name="id_transaksi" value="<?= $pembayaran->id_transaksi ?>">
						<input type="hidden" name="id_pembayaran" value="<?= $pembayaran->id_pembayaran ?>">
						<input type="hidden" name="bukti_bayar" value="<?= $upload_name ?>">
						<input type="submit" class="btn btn-primary" value="Kirim bukti bayar">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button id="btn-modal" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-upload" style="display: none;" />
	<script>
		$( document ).ready(function() {
			$('#btn-modal').click();
		});
	</script>
<?php endif; ?>

<script>
	// Set the date we're counting down to
	var countDownDate = new Date("<?= $pembayaran->tgl_deadline ?>").getTime();
	var hours		= document.getElementById("countdown-h");
	var minutes 	= document.getElementById("countdown-m");
	var seconds 	= document.getElementById("countdown-s");
	var countdown	= document.getElementById("countdown");
	var expired		= document.getElementById("expired");	

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var tick_hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var tick_minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var tick_seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Display the result in the element with id="demo"
		hours.innerHTML = tick_hours;
		minutes.innerHTML = tick_minutes;
		seconds.innerHTML = tick_seconds;

		// If the count down is finished, write some text
		if (distance < 0) {
			clearInterval(x);
			countdown.style.display = 'none';
			expired.style.display = 'block';
			expired.innerHTML = "EXPIRED";
		}
	}, 1000);
</script>
<?php $this->load->view('customer/footer'); ?>
