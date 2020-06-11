<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Data Pemesanan</h1>
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
                                   <th class="text-right">Metode Pengambilan</th>
                                   <th class="text-center">Status</th>
                                   <th class="nosort"></th>
                               </tr>
                           </thead>

                       </tbody>
                       <?php $no=1; ?>
                       <?php
								// dd($pemesanan);
                       foreach ($pemesanan as $key => $value):
									// status transaksi  => 1 = belum siap 2 = sudah siap 3 = keluar 4 = kembali
                           switch ($value->status_transaksi) {
                              case 1:
                              $val_status = '<span class="badge badge-danger">Belum Siap</span>';
                              break;
                              case 2:
                              $val_status = '<span class="badge badge-success">Sudah Siap</span>';
                              break;
                              case 3:
                              $val_status = '<span class="badge badge-secondary">Barang Keluar</span>';
                              break;
                              case 4:
                              $val_status = '<span class="badge badge-primary">Barang Kembali</span>';
                              break;

                              default:
                              $val_status = '';
                              break;
                          }
                          ?>
                          <tr>
                            <td class="font-size-lg font-weight-bold text-center">
                                <a class="font-weight-bold text-underline text-tertiary btn-detail" data-id="<?= $value->id_transaksi ?>" data-toggle="modal" data-target="#modalDetailPesanan">
                                   <?php echo '#'.$value->id_transaksi ?>
                               </a>
                           </td>
                           <td class="font-size-lg font-weight-bold text-center">
                            <?php echo $value->nama ?>
                        </a>
                    </td>
                    <!-- <td class="font-size-lg"></td> -->
                    <td class="font-size-lg text-center"><?php echo idDateFormat($value->tgl_sewa) ?></td>
                    <td class="font-size-lg text-center"><?php echo idDateFormat($value->tgl_pengembalian) ?></td>
                    <td class="font-size-lg text-right">Rp <?= number_format($value->total_harga, 0, ',', '.') ?></td>
                    <td class="font-size-lg text-center"><?php echo ($value->metode_pengambilan) ?></td>
                    <td class="font-size-lg text-center"><?= $val_status ?></td>

                    <td class="align-top text-center">
                       <?php if($value->status_transaksi == 1) : ?>
                           <a href="<?= base_url('admin/kelola/pemesanan/siap/'.$value->id_transaksi) ?>" class="btn btn-success">Barang Siap</a>
                       <?php endif; ?>
                       <?php if($value->status_transaksi == 2) : ?>
                           <a href="<?= base_url('admin/kelola/pemesanan/keluar/'.$value->id_transaksi) ?>" class="btn btn-primary">Tandai Barang Keluar</a>
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
<!-- modal1 -->
<div class="modal fade" id="modalDetailPesanan" tabindex="-1" role="dialog" aria-labelledby="modalDetailPesananTitle"
aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
  <div class="modal-content">
    <div class="modal-header border-0">
        <h4 class="modal-title text-center w-100" id="modalDetailPesananTitle">Detail Pesanan</h4>
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
                        #0
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3 col-6">
                    <div class="text-black-60 font-size-tiny text-uppercase">
                     Nama Customer
                 </div>
                 <div id="nama" class="font-size-lg text-black-100 line-height-26">
                    Retester PSO PT Anugerah Situbolon
                </div>
            </div>
            <div class="col-lg-3 col-6">
                    <div class="text-black-60 font-size-tiny text-uppercase">
                     Tujuan
                 </div>
                 <div id="tujuan" class="font-size-lg text-black-100 line-height-26">
                   event
                </div>
            </div>
            <div class="col-lg-3 col-6">
                    <div class="text-black-60 font-size-tiny text-uppercase">
                     nomor Telepon
                 </div>
                 <div id="signUpTelepon" class="font-size-lg text-black-100 line-height-26">
                   event
                </div>
            </div>
             <div class="col-lg-3 col-6">
                    <div class="text-black-60 font-size-tiny text-uppercase">
                     No Identitas
                 </div>
                 <div id="noidentitasLabel" class="font-size-lg text-black-100 line-height-26">
                   event
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-5">
                <div class="text-black-60 font-size-tiny text-uppercase">
                    Jaminan
                </div>
                <div id="jaminan" class="font-size-lg text-black-100 line-height-26">
                    jaminan
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
            <div class="col-lg-3 col-6">
                <div class="text-black-60 font-size-tiny text-uppercase">
                    Alamat
                    <div id="alamatTujuanLabel" class="font-size-lg text-black-100 line-height-26">

                    </div>

                </div>
            </div>
        </div>
        <hr class="my-4">
        <!-- Daftar produk -->
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <th class="border-0 py-0">Daftar produk</th>
                    <th class="border-0 py-0">harga Sewa</th>
                </thead>
                <tbody id="daftar-produk">
                </tbody>
            </table>
        </div>

         <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <th class="border-0 py-0">Jaminan</th>
                </thead>
                <tbody id="foto-jaminan">
                </tbody>
            </table>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    $(function () {
      var arr_pemesanan = <?= json_encode($pemesanan) ?>;

      $(".btn-detail").click(function() {
         var pemesanan = arr_pemesanan.find(a => a.id_transaksi === $(this).data("id") + '');
         $("#id-transaksi").val(pemesanan.id_transaksi)
         $("#no-booking").text("#" + pemesanan.id_transaksi)
         $("#nama").text(pemesanan.nama)
         $("#tujuan").text(pemesanan.tujuan)
         $("#tgl-sewa").text(pemesanan.tgl_sewa)
         $("#tgl-kembali").text(pemesanan.tgl_pengembalian)
         $("#jaminan").text(pemesanan.jaminan)
         $("#signUpTelepon").text(pemesanan.no_telp)
          $("#noidentitasLabel").text(pemesanan.no_identitas)
         
         $("#alamatTujuanLabel").text(pemesanan.alamat_pengiriman)
         $row = '';
         pemesanan.detail_transaksi.forEach(e => {
            $row += '<tr><td class="border-0"><div class="row"><div class="col-auto"><img src="<?= base_url('assets/uploads/produk/') ?>'+e.gambar_barang+'" alt="gambar produk " style="width:80px" class="img-thumbnail" /></div><div class="col-auto"><h4 class="m-0">'+e.nama_barang+'</h4><div class="mt-2"><span class="text-black-60">Ukuran:</span><span class="text-black-80 ml-1 font-weight-bold text-uppercase">'+e.ukuran+'</span></div></div></div></td><td class="border-0 align-top text-black-100 font-size-lg font-weight-bold">Rp '+e.harga_sewa+'</td>>Rp <?= number_format($value->total_harga, 0, ',', '.') ?></tr>';
        });
         $("#daftar-produk").html($row)

          $row = '';
         pemesanan.transaksi.forEach(f => {
            $row += '<tr><td class="border-0"><div class="row"><div class="col-auto"><img src="<?= base_url('assets/uploads/produk/') ?>'+f.foto_jaminan+'" alt="foto_jaminan" style="width:80px" class="img-thumbnail" /></div><div class="col-auto"><h4 class="m-0">'+f.total_harga;
        });
         $("#foto-jaminan").html($row)

     });
  });
</script>




<?php $this->load->view('admin/footer'); ?>
