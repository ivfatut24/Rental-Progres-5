<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<!--== Login Page Content Start ==-->
<section class="section-padding bg-white">
	<div class="container space-1 space-lg-2">
		<form class="w-md-75 w-lg-40 mx-md-auto card px-lg-6 px-3 py-5 rounded-lg bg-light" action="<?php echo base_url('register')?>" method="post">
			<div class="mb-3 mb-md-5">
				<h1 class="h2 mb-0">Sign Up</h1>
			</div>
			<?php echo $this->session->flashdata('msg');?>

			<div class="form-group">
				<label class="input-label" for="signUpNama">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama" id="signUpNama" placeholder="Nama Lengkap" aria-label="Nama Lengkap" required="" value="<?= @$nama ?>">
			</div>
			<div class="form-group">
				<label class="input-label" for="signUpEmail">Email</label>
				<input type="email" class="form-control" name="email" id="signUpEmail" placeholder="Email" aria-label="Email" required="" value="<?= @$email ?>">
			</div>
			<div class="form-group">
				<label class="input-label" for="signUpTelepon">No. Telepon</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="bg-white border-right-0 input-group-text">+62</span>
					</div>
					<input type="number" class="form-control" name="no_telp" id="signUpTelepon" placeholder="xxx" aria-label="xxx" required="" value="<?= @$no_telp ?>">
				</div>
			</div>
			<hr>
			<div class="form-group">
				<label class="input-label" for="signUpUsername">Username</label>
				<input type="tel" class="form-control" name="username" id="signUpUsername" placeholder="Username" aria-label="Username" required="" value="<?= @$username ?>">
			</div>
			<div class="form-group">
				<label class="input-label" for="signUpPassword">
				<span class="d-flex justify-content-between align-items-center">
					Password
				</span>
				</label>
				<input type="password" class="form-control" name="password" id="signUpPassword" placeholder="********" aria-label="********" required="" value="<?= @$password ?>">
			</div>
			<div class="form-group">
				<label class="input-label" for="signUpKonfirmasiPassword">
				<span class="d-flex justify-content-between align-items-center">
					Konfirmasi Password
				</span>
				</label>
				<input type="password" class="form-control" name="password_konfirmasi" id="signUpKonfirmasiPassword" placeholder="********" aria-label="********" required="">
			</div>

			<div class="row align-items-center mt-2 mb-5">
				<div class="col-sm-6 mb-3 mb-sm-0">
					<span class="font-size-1 text-muted">Sudah punya akun?</span>
					<a class="font-size-1 font-weight-bold" href='<?php echo base_url("login"); ?>'>Log in</a>
				</div>

				<div class="col-sm-6 text-sm-right">
					<button type="submit" class="btn btn-lg btn-primary text-capitalize">Sign up</button>
				</div>
			</div>
		</form>
	</div>
</section>
<!--== Login Page Content End ==-->
<?php $this->load->view('guest/footer'); ?>
