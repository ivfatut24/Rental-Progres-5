<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container px-0 px-lg-3">
    <div class="mb-3">
		<a href="<?php echo base_url('admin/produk/')?>" class="btn btn-secondary btn-icon-text">
			<i data-feather="arrow-left" class="mr-1"></i>
			<span>Kembali</span>
		</a>
		<div class="float-right">
			<h4 class="m-0 text-black-60 font-weight-normal border-right pr-2" style="border-width:4px!important;"><?php if (isset($data)): ?>Edit<?php else: ?>Tambah<?php endif; ?> produk</h4>
		</div>
    </div>
	<div class="card">
		<div class="card-body">
		<?php echo form_open_multipart(isset($data)?'admin/produk/update/'.$data->id_barang:'admin/produk/create'); ?> 

		<?php echo validation_errors(); ?>
		<?php if (isset($data)): ?>
			<input type="hidden" name="id_barang" value="<?= $data->id_barang; ?>">
		<?php endif ?>
				<div class="form-group row">
					<label class="col-form-label text-sm-right col-sm-2">Nama Produk</label>
					<div class="col-sm-10">
						<input name="nama_barang" type="text" id="nama_barang" class="form-control" autocomplete="off" placeholder="Nama Produk" autocomplete="off" required value="<?= isset($data)?$data->nama_barang:''; ?>" />
					</div>
				</div>
				<div class="form-group row">
					<label class="text-sm-right col-sm-2 control-label">Harga Sewa</label>
					<div class="col-auto">
						<input name="harga_sewa" type="number" id="harga_sewa" class="form-control" autocomplete="off" placeholder="Harga Produk" autocomplete="off" required value="<?= isset($data)?$data->harga_sewa:''; ?>" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label text-sm-right col-sm-2">Keterangan Produk</label>
					<div class="col-sm-10">
						<textarea rows="3" name="deskripsi" type="text" id="deskripsi" class="form-control" autocomplete="off" placeholder="Keterangan Produk" autocomplete="off" required><?= isset($data)?$data->deskripsi:''; ?></textarea>
					</div>
				</div>
				<hr class="my-4">
				<div class="form-group row">
					<label class="text-sm-right col-sm-2 control-label">Kategori Produk</label>
					<div class="col-auto">
						<select name="id_kategori_produk" id="id_kategori_produk" class="form-control" required >
							<?php foreach ($kategori_produk as $key => $value) : ?>
								<option value="<?= $value->id_kategori_produk ?>" <?php isset($data)? $value->id_kategori_produk == $data->id_kategori_produk ? 'selected' : '' : '' ?>><?= $value->nama_kategori_produk ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<fieldset class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<div class="row">
								<label class="col-form-label text-sm-right col-sm-6">Stok Produk</label>
								<div class="col-6">
									<input name="stok" type="number" id="stok" class="form-control" autocomplete="off" placeholder="Stok Produk" autocomplete="off" required value="<?= isset($data)?$data->stok:''; ?>"/>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="row">
								<label class="col-form-label text-sm-right col-sm-2">Ukuran</label>
								<div class="col-sm-8">
									<div class="custom-controls-stacked pt-2">
										<label class="custom-control custom-radio custom-control-inline">
											<input value="kecil" name="ukuran" type="radio" class="custom-control-input" <?= isset($data) && $data->ukuran == "kecil"? 'checked':''; ?>>
											<span class="custom-control-label">Kecil</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input value="sedang" name="ukuran" type="radio" class="custom-control-input" <?= isset($data) && $data->ukuran == "sedang"? 'checked':''; ?>>
											<span class="custom-control-label">Sedang</span>
										</label>
										<label class="custom-control custom-radio custom-control-inline">
											<input value="besar" name="ukuran" type="radio" class="custom-control-input" <?= isset($data) && $data->ukuran == "besar"? 'checked':''; ?>>
											<span class="custom-control-label">Besar</span>
										</label>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</fieldset>
				<?php if (isset($data)): ?>
					<div class="form-group row">
						<label class="col-sm-2 text-sm-right col-form-label">Gambar Sebelumnya</label>
						<div class="col-sm-10">
							<img class="img-thumbnail" src="<?= base_url('assets/uploads/produk/'.$data->gambar_barang)?>" style="width: 100px;height: 100px">
						</div>
					</div>
				<?php endif ?>
				<div class="form-group row mt-3">
					<label class="col-sm-2 col-form-label text-sm-right">Gambar Produk</label>
					<div class="col-sm-10">
						<input name="userfile" type="file" class="form-control"/>
					</div>
				</div>
				<div class="form-group row mt-lg-5 mt-4">
					<div class="col-sm-10 ml-sm-auto">
						<input type="submit" name="input" value="Simpan" class="btn btn-primary" />&nbsp;
						<a href="<?php echo base_url('admin/produk')?>" class="btn btn-secondary">Batal </a>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php $this->load->view('admin/footer'); ?>
