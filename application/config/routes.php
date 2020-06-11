<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']	= 'guest';
$route['404_override']			= '';
$route['translate_uri_dashes']	= FALSE;
// guest
$route['produk']		= 'guest/produk';
$route['detail']		= 'guest/detail';
$route['keranjang']		= 'guest/keranjang';
$route['galery']		= 'guest/galery';
$route['login']			= 'login';
$route['register']		= 'register';
$route['login/auth']	= 'login/auth';
$route['logout']		= 'login/logout';
//admin
$route['admin']										= 'admin/dashboard';
$route['admin/produk'] 								= 'admin/dataProduk';
$route['admin/produk/create'] 						= 'admin/dataProduk/create';
$route['admin/produk/detail/(:num)'] 				= 'admin/dataProduk/detailProduk/$1';
$route['admin/produk/update/(:num)'] 				= 'admin/dataProduk/update/$1';
$route['admin/produk/delete/(:num)'] 				= 'admin/dataProduk/delete/$1';
$route['admin/produk/kategori'] 					= 'admin/dataKategoriProduk';
$route['admin/produk/kategori/create'] 				= 'admin/dataKategoriProduk/create';
$route['admin/produk/kategori/detail/(:num)'] 		= 'admin/dataKategoriProduk/detailProduk/$1';
$route['admin/produk/kategori/update/(:num)'] 		= 'admin/dataKategoriProduk/update/$1';
$route['admin/produk/kategori/delete/(:num)'] 		= 'admin/dataKategoriProduk/delete/$1';
$route['admin/customer'] 							= 'admin/dataCustomer';
$route['admin/customer/create'] 					= 'admin/dataCustomer/create';
$route['admin/customer/update/(:num)'] 				= 'admin/dataCustomer/update/$1';
$route['admin/customer/delete/(:num)'] 				= 'admin/dataCustomer/delete/$1';
$route['admin/tujuan'] 								= 'admin/dataTujuan';
$route['admin/tujuan/create'] 						= 'admin/dataTujuan/create';
$route['admin/tujuan/update/(:num)'] 				= 'admin/dataTujuan/update/$1';
$route['admin/tujuan/delete/(:num)'] 				= 'admin/dataTujuan/delete/$1';
$route['admin/admin'] 								= 'admin/dataAdmin';
$route['admin/admin/create'] 						= 'admin/dataAdmin/create';
$route['admin/admin/update/(:num)'] 				= 'admin/dataAdmin/update/$1';
$route['admin/admin/delete/(:num)'] 				= 'admin/dataAdmin/delete/$1';
$route['admin/maintenance'] 						= 'admin/dataMaintenance';
$route['admin/maintenance/create'] 					= 'admin/dataMaintenance/create';
$route['admin/maintenance/update/(:num)']			= 'admin/dataMaintenance/update/$1';
$route['admin/maintenance/delete/(:num)']			= 'admin/dataMaintenance/delete/$1';
$route['admin/kelola/pembayaran'] 					= 'admin/kelolaPembayaran';
$route['admin/kelola/pembayaran/konfirmasi/(:num)']	= 'admin/kelolaPembayaran/konfirmasi/$1';
$route['admin/kelola/pembayaran/tolak/(:num)']		= 'admin/kelolaPembayaran/tolak/$1';
$route['admin/kelola/pemesanan'] 					= 'admin/kelolaPemesanan';
$route['admin/kelola/pemesanan/siap/(:num)'] 		= 'admin/kelolaPemesanan/siap/$1';
$route['admin/kelola/pemesanan/keluar/(:num)'] 		= 'admin/kelolaPemesanan/keluar/$1';
$route['admin/kelola/pengembalian'] 				= 'admin/kelolaPengembalian';
$route['admin/kelola/pengembalian/kembali']			= 'admin/kelolaPengembalian/kembali';
$route['admin/laporan/barangkeluar'] 				= 'admin/laporanBarangKeluar';
$route['admin/laporan/barangmasuk'] 				= 'admin/laporanBarangMasuk';
$route['admin/laporan/customer'] 					= 'admin/laporanCustomer';
$route['admin/laporan/produk'] 						= 'admin/laporanProduk';
//maintenance
$route['maintenance']										= 'maintenance/dashboard';
$route['maintenance/kelola/barangmasuk']					= 'maintenance/kelolaBarangMasuk';
$route['maintenance/kelola/barangmasuk/perbaiki/(:num)']	= 'maintenance/kelolaBarangMasuk/perbaiki/$1';
$route['maintenance/kelola/barangmasuk/siap/(:num)']		= 'maintenance/kelolaBarangMasuk/siap/$1';
$route['maintenance/kelola/barangmasuk/selesai/(:num)']		= 'maintenance/kelolaBarangMasuk/selesai/$1';
$route['maintenance/laporan/barangmasuk']					= 'maintenance/laporanBarangMasuk';
//customer
$route['customer']						= 'customer/index';
$route['customer/produk']				= 'customer/produk';
$route['customer/produk/(:num)']		= 'customer/produk/$1';
$route['customer/keranjang']			= 'customer/keranjang';
$route['customer/keranjang/delete']		= 'customer/keranjang/delete';
$route['customer/pembayaran']			= 'customer/pembayaran';
$route['customer/list_order/(:num)']	= 'customer/list_order';
$route['customer/pembayaran/(:num)']	= 'customer/pembayaran/$1';
