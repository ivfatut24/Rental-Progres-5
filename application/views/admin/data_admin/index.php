<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/header');
?>
<div class="container-fluid p-0">
    <div class="row mb-3">
        <div class="col-lg-8 col-sm-8 col-12">
            <h1 class=" m-0 font-weight-light">Admin</h1>
            <span class="text-black-80"> <?=count($data)?> Admin</span>
        </div>
        <div class="col-lg-4 col-sm-4 col-12 mt-3 mt-lg-0 text-lg-right text-sm-right">
            <a href="<?php echo base_url('admin/admin/create/')?>" class="btn-icon-text btn btn-brand">
                <i data-feather="plus" class="align-middle"></i>
                <span class="ml-1 align-middle">Tambah Admin</span>
            </a>
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
									<th>Nama Admin </i></th>
									<th class="text-center">Username</th>
									<th class="nosort"></th>
								</tr>
                            </thead>

                            </tbody>
                            <?php foreach ($data as $key => $value): ?>
                            <tr>
								<td class="font-size-lg font-weight-bold"><?php echo $value->nama ?></td>
								<td class="font-size-lg text-center"><?php echo $value->username ?></td>
                                <td class="align-top text-center">
                                    <div class="dropdown show">
                                        <a href="#" data-toggle="dropdown" data-display="static" class="btn btn-outline-secondary btn-sm">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item d-flex align-items-center" 
                                            href="<?php echo base_url('admin/admin/update/'.$value->id_user)?>"
                                            >
                                                <span data-feather="edit" class="mr-1"></span><span>Edit admin</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center text-danger btn-link" href="#"
                                        data-content="Yakin hapus <?php echo $value->nama ?>?" data-cancel="tidak" data-confirm="Ya"
                                        data-link="<?php echo base_url('admin/admin/delete/'.$value->id_user)?>"
                                        >
                                            <span data-feather="trash-2" class="mr-1"></span><span>Hapus</span>
                                        </a>
                                        </div>
                                    </div>
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
<?php $this->load->view('admin/footer'); ?>
