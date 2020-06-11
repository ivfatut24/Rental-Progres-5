<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container px-0 px-lg-3">
    <div class="mb-3">
		<a href="<?php echo base_url('admin/maintenance/')?>" class="btn btn-secondary btn-icon-text">
			<i data-feather="arrow-left" class="mr-1"></i>
			<span>Kembali</span>
		</a>
		<div class="float-right">
			<h4 class="m-0 text-black-60 font-weight-normal border-right pr-2" style="border-width:4px!important;"><?php if (isset($data)): ?>Edit<?php else: ?>Tambah<?php endif; ?> maintenance</h4>
		</div>
    </div>
	<div class="card">
		<div class="card-body">
		<?php echo form_open(isset($data)?'admin/maintenance/update/'.$data->id_user:'admin/maintenance/create'); ?> 
		<?php echo validation_errors(); ?>
		<?php if (isset($data)): ?>
			<input type="hidden" name="id_user" value="<?= $data->id_user; ?>">
		<?php endif ?>
			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">Nama</label>
				<div class="col-sm-10">
					<input name="nama" type="text" id="nama" class="form-control" autocomplete="off" placeholder="Nama Maintenance" required value="<?= isset($data)?$data->nama:''; ?>" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">Alamat</label>
				<div class="col-sm-10">
					<input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" placeholder="Alamat" required value="<?= isset($data)?$data->alamat:''; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">No Telp</label>
				<div class="col-sm-10">
					<input name="no_telp" type="number" id="no_telp" class="form-control" autocomplete="off" placeholder="No Telp" required value="<?= isset($data)?$data->no_telp:''; ?>"/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">Email</label>
				<div class="col-sm-10">
					<input name="email" type="email" id="email" class="form-control" placeholder="Email" autocomplete="off" required value="<?= isset($data)?$data->email:''; ?>" />
				</div>
			</div>
			<hr class="my-4">
			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">Username</label>
				<div class="col-auto">
					<input name="username" type="text" id="username" class="form-control" autocomplete="off" placeholder="Username" required value="<?= isset($data)?$data->username:''; ?>" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 text-sm-right col-form-label">Password</label>
				<div class="col-auto">
					<input name="password" type="text" id="password" class="form-control" autocomplete="off" placeholder="Password" required value="<?= isset($data)?$data->password:''; ?>" />
				</div>
			</div>
			<div class="form-group row mt-lg-5 mt-4">
				<div class="col-sm-10 ml-sm-auto">
					<input type="submit" name="input" value="Simpan" class="btn btn-primary" />&nbsp;
					<a href="<?php echo base_url('admin/maintenance')?>" class="btn btn-danger">Batal </a>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?>
