<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<!--== Login Page Content Start ==-->
<section class="section-padding bg-light">
	<div class="container space-1 space-lg-2">
		<form class="w-md-75 w-lg-40 mx-md-auto card px-lg-7 px-4 py-5 rounded-lg" action="<?php echo base_url('login/auth') . '' ?>" method="post">
			<div class="mb-3 mb-md-5">
				<h1 class="h2 mb-0">Log In</h1>
			</div>
			<?= $this->session->flashdata('msg'); ?>
			<div class="form-group">
				<label class="input-label" for="signinEmail">Email or Username</label>
				<input type="text" class="form-control" name="username" id="signinEmail" placeholder="Email or Username" aria-label="Email or Username" required="">
			</div>
			<div class="form-group">
				<label class="input-label" for="signinPassword">
				<span class="d-flex justify-content-between align-items-center">
					Password
				</span>
				</label>
				<input type="password" class="form-control" name="password" id="signinPassword" placeholder="********" aria-label="********" required="">
			</div>

			<div class="row align-items-center mt-2 mb-5">
				<div class="col-sm-8 mb-3 mb-sm-0">
					<span class="font-size-1 text-muted d-lg-block">Tidak memiliki akun?</span>
					<a class="font-size-1 font-weight-bold" href='<?php echo base_url("register"); ?>'>Sign up</a>
				</div>

				<div class="col-sm-4 text-sm-right">
					<button type="submit" class="btn btn-lg btn-primary text-capitalize">Log in</button>
				</div>
			</div>
		</form>
	</div>
</section>
<!--== Login Page Content End ==-->
<?php $this->load->view('guest/footer'); ?>
