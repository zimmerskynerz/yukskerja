<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/pages_error';
$route['translate_uri_dashes'] = FALSE;

// Menu Login
$route['login']                 = 'HalamanUtama/ControllerLogin/index';
$route['register']              = 'HalamanUtama/ControllerLogin/register';
$route['reset']                 = 'HalamanUtama/ControllerLogin/reset';
$route['logout']                = 'HalamanUtama/ControllerLogin/logout';
// Menu Utama
$route['about']                 = 'HalamanUtama/ControllerAbout/index';
$route['contact']               = 'HalamanUtama/ControllerContact/index';
$route['kategori/(:any)']       = 'HalamanUtama/ControllerKategori/kategori/$1';
$route['produk/detail/(:any)']  = 'HalamanUtama/ControllerProduk/produk_detail/$1';
$route['list-produk']           = 'HalamanUtama/ControllerProduk/index';
$route['produk/snap/token']     = 'HalamanUtama/ControllerProduk/token';
$route['snap/token']            = 'HalamanUtama/ControllerProduk/token';
$route['snap/finish']           = 'HalamanUtama/ControllerProduk/sewa_jasa';
// Menu Midtrans
$route['payment-midtrans']      = 'Notification/index';
$route['notif-midtrans']        = 'Midtrans/ControllerMidtrans/notif';
$route['status-midtrans']       = 'Midtrans/ControllerMidtrans/status';
$route['finish-midtrans']       = 'Midtrans/ControllerMidtrans/finish';
$route['unfinish-midtrans']     = 'Midtrans/ControllerMidtrans/unfinish';
$route['error-midtrans']        = 'Midtrans/ControllerMidtrans/error';
// Cek Data
$route['cek_login']             = 'HalamanUtama/ControllerLogin/cek_login';
$route['cek_register']          = 'HalamanUtama/ControllerLogin/cek_register';
$route['cek_reset']             = 'HalamanUtama/ControllerLogin/cek_reset';
// Aktivasi AKun
$route['aktivasi/(:any)']       = 'HalamanUtama/ControllerLogin/aktivasi/$1';

// Menu Owner
// Menu Beranda
$route['owner']                     = 'Owner/ControllerBeranda/index';
$route['owner/']                    = 'Owner/ControllerBeranda/index';
$route['owner/beranda']             = 'Owner/ControllerBeranda/index';
// Menu Konfigurasi Midtrans
$route['owner/midtrans']            = 'Owner/ControllerMidtrans/index';
$route['owner/midtrans/crud']       = 'Owner/ControllerMidtrans/crud';
// Menu Konfigurasi SMTP
$route['owner/smtp']                = 'Owner/ControllerSMTP/index';
$route['owner/smtp/crud']           = 'Owner/ControllerSMTP/crud';

// Menu User's
// User's Customer Service - Sudah
$route['owner/users/service']                   = 'Owner/ControllerUsersCS/index';
$route['owner/users/service/crud']              = 'Owner/ControllerUsersCS/crud';
// User's Customer - Sudah
$route['owner/users/customer']                  = 'Owner/ControllerUsersCustomer/index';
$route['owner/users/customer/crud']             = 'Owner/ControllerUsersCustomer/crud';
$route['owner/users/customer/detail/(:any)']    = 'Owner/ControllerUsersCustomer/detail/$1';
// User's Freelancer - Sudah
$route['owner/users/freelancer']                = 'Owner/ControllerUsersFreelancer/index';
$route['owner/users/freelancer/crud']           = 'Owner/ControllerUsersFreelancer/crud';
$route['owner/users/freelancer/detail/(:any)']    = 'Owner/ControllerUsersCustomer/detail/$1';

// Menu Hadiah
// Hadiah Kupon - Sudah
$route['owner/hadiah/kupon']                    = 'Owner/ControllerHadiahKupon/index';
$route['owner/hadiah/kupon/crud']               = 'Owner/ControllerHadiahKupon/crud';
// Hadiah Promo - Sudah
$route['owner/hadiah/promo']                    = 'Owner/ControllerHadiahPromo/index';
$route['owner/hadiah/promo/crud']               = 'Owner/ControllerHadiahPromo/crud';

// Menu Settings
// Setting Biaya
$route['owner/settings/biaya']                       = 'Owner/ControllerSettingsBiaya/index';
$route['owner/settings/biaya/crud']                  = 'Owner/ControllerSettingsBiaya/crud';
// Setting SnK
$route['owner/settings/syarat-dan-ketentuan']        = 'Owner/ControllerSettingsBiaya/snk';
$route['owner/settings/syarat-dan-ketentuan/crud']   = 'Owner/ControllerSettingsBiaya/crud';
// 
$route['owner/reports/transaksi']                    = 'Owner/ControllerRepotsTransaksi/index';
$route['owner/transaksi/invoice/(:any)']             = 'Owner/ControllerRepotsTransaksi/invoice/$1';
$route['owner/reports/transaksi/cetak']              = 'Owner/ControllerRepotsTransaksi/cetak';
$route['owner/reports/buku-kas']                     = 'Owner/ControllerRepotsKas/index';
$route['owner/reports/buku-kas/cetak']               = 'Owner/ControllerRepotsKas/cetak';
$route['owner/reports/gaji']                         = 'Owner/ControllerRepotsGaji/index';
$route['owner/reports/gaji/detail/(:any)']           = 'Owner/ControllerRepotsGaji/detail/$1';
$route['owner/reports/gaji/cetak']                   = 'Owner/ControllerRepotsGaji/cetak';
$route['owner/reports/gaji/slip-gaji/(:any)']        = 'Owner/ControllerRepotsGaji/slip-gaji/$1';

// Menu Login Customer
// Menu Beranda customer
$route['customer']                                   = 'Customer/ControllerDashboard/index';
$route['customer/dashboard']                         = 'Customer/ControllerDashboard/index';
// Menu Daftar Freelancer
$route['customer/freelancer']                        = 'Customer/ControllerDaftarFreelance/index';
$route['customer/freelancer/crud']                   = 'Customer/ControllerDaftarFreelance/crud';
// Menu Profile
$route['customer/profile']                           = 'Customer/ControllerProfile/index';
$route['customer/profile/crud']                      = 'Customer/ControllerProfile/crud';
// Menu Transaksi
$route['customer/transaksi/order']                   = 'Customer/ControllerTransaksi/order';
$route['customer/transaksi/proses']                  = 'Customer/ControllerTransaksi/proses';
$route['customer/transaksi/selesai']                 = 'Customer/ControllerTransaksi/selesai';
$route['customer/transaksi/selesai/crud']            = 'Customer/ControllerTransaksi/crud';


// Menu Login Administrasi
// Menu Beranda Admin
$route['admin']                                      = 'Service/ControllerDashboard/index';
$route['admin/dashboard']                            = 'Service/ControllerDashboard/index';
// Menu Kelola Users
// Kelola User's Pelanggan
$route['admin/users/pelanggan']                      = 'Service/ControllerUsersPelanggan/index';
$route['admin/users/pelanggan/crud']                 = 'Service/ControllerUsersPelanggan/crud';
$route['admin/users/pelanggan/detail/(:any)']        = 'Service/ControllerUsersPelanggan/detail/$1';
// kelola User's Konfirmasi Freelance
$route['admin/users/konfirmasi-freelancer']          = 'Service/ControllerUsersFreelance/konfirmasi';
$route['admin/users/konfirmasi-freelancer/crud']     = 'Service/ControllerUsersFreelance/crud';
$route['admin/users/freelance']                      = 'Service/ControllerUsersFreelance/index';
$route['admin/users/freelance/detail/(:any)']        = 'Service/ControllerUsersFreelance/detail/$1';
$route['admin/users/freelance/crud']                 = 'Service/ControllerUsersFreelance/crud';
// Kelola Kategori
$route['admin/kategori']                             = 'Service/ControllerKategori/index';
$route['admin/kategori/crud']                        = 'Service/ControllerKategori/crud';
// Kelola Transaksi
// Menu Order
$route['admin/transaksi/order']                      = 'Service/ControllerTransaksi/order';
$route['admin/transaksi/order/crud']                 = 'Service/ControllerTransaksi/crud';
$route['admin/transaksi/selesai']                    = 'Service/ControllerTransaksi/selesai';
$route['admin/transaksi/invoice/(:any)']             = 'Service/ControllerTransaksi/invoice/$1';
$route['admin/transaksi/komplain']                   = 'Service/ControllerTransaksi/komplain';
// Menu Bendahara
// Menu Withdraw
$route['admin/bendahara/withdraw']                   = 'Service/ControllerBendaharaWD/index';
$route['admin/bendahara/withdraw/crud']              = 'Service/ControllerBendaharaWD/crud';
// Menu Buku Kas
$route['admin/bendahara/buku-besar']                 = 'Service/ControllerBukuBesar/index';
// Menu Operasional
$route['admin/bendahara/operational']                = 'Service/ControllerOperational/index';
$route['admin/bendahara/operational/crud']           = 'Service/ControllerOperational/crud';


// Menu Login Freelance
// Menu Beranda
$route['cust-freelance']                                  = 'Freelance/ControllerDashboard/index';
$route['cust-freelance/dashboard']                        = 'Freelance/ControllerDashboard/index';
// Menu Produk
$route['cust-freelance/produk']                           = 'Freelance/ControllerProduk/index';
$route['cust-freelance/produk/crud']                      = 'Freelance/ControllerProduk/crud';
$route['cust-freelance/produk/portfolio/(:any)']          = 'Freelance/ControllerProduk/portfolio/$1';
// Menu Transaksi
// Transaksi Order
$route['cust-freelance/transaksi/order']                  = 'Freelance/ControllerTransaksi/order';
$route['cust-freelance/transaksi/order/crud']             = 'Freelance/ControllerTransaksi/crud';
$route['cust-freelance/transaksi/proses']                 = 'Freelance/ControllerTransaksi/proses';
$route['cust-freelance/transaksi/proses/crud']            = 'Freelance/ControllerTransaksi/crud';
$route['cust-freelance/transaksi/selesai']                = 'Freelance/ControllerTransaksi/selesai';
$route['cust-freelance/transaksi/invoice/(:any)']         = 'Freelance/ControllerTransaksi/invoice/$1';
// Menu Gaji
$route['cust-freelance/pendapatan']                       = 'Freelance/ControllerGaji/index';
$route['cust-freelance/pendapatan/crud']                  = 'Freelance/ControllerGaji/crud';
// Menu Profile
$route['cust-freelance/profile']                          = 'Freelance/ControllerProfile/index';
$route['cust-freelance/profile/crud']                     = 'Freelance/ControllerProfile/crud';

$route['haking/aktivasi/kode']                            = 'Hacking/ControllerAktivasi/popup';