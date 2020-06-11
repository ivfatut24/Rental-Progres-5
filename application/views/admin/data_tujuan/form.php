<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container px-0 px-lg-3">
    <div class="mb-3">
		<a href="<?= base_url('admin/tujuan/')?>" class="btn btn-secondary btn-icon-text">
			<i data-feather="arrow-left" class="mr-1"></i>
			<span>Kembali</span>
		</a>
		<div class="float-right">
			<h4 class="m-0 text-black-60 font-weight-normal border-right pr-2" style="border-width:4px!important;"><?php if (isset($data)): ?>Edit<?php else: ?>Tambah<?php endif; ?> Tujuan</h4>
		</div>
    </div>
	<div class="card">
		<div class="card-body">
		<?= form_open_multipart(isset($data)?'admin/tujuan/update/'.$data->id:'admin/tujuan/create'); ?> 

		<?= validation_errors(); ?>
		<?php if (isset($data)): ?>
			<input type="hidden" name="id" value="<?= $data->id; ?>">
		<?php endif ?>
				<div class="form-group row">
					<label class="col-form-label text-sm-right col-sm-2">Nama Produk</label>
					<div class="col-sm-10">
						<input name="tujuan" type="text" id="tujuan" class="form-control" autocomplete="off" placeholder="Tujuan sewa" autocomplete="off" required value="<?= isset($data)?$data->tujuan:''; ?>" />
					</div>
				</div>
				<div class="form-group row mt-lg-5 mt-4">
					<div class="col-sm-10 ml-sm-auto">
						<input type="submit" name="input" value="Simpan" class="btn btn-primary" />&nbsp;
						<a href="<?= base_url('admin/tujuan')?>" class="btn btn-secondary">Batal </a>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?>
