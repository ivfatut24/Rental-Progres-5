
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('guest/header');
?>
<section class="section-padding">
    <div class="container space-2 space-lg-3">
        <h2 class="mb-3">Keranjang</h2>
        <div class="w-50">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-brand btn-lg text-capitalize" href="<?php echo base_url("login"); ?>">Log in untuk sewa produk</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("guest/footer.php") ?>

