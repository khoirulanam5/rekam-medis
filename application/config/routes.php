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
|	https://codeigniter.com/userguide3/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']            = 'Auth';
$route['register']                      = 'AuthPasien/registerForm';
$route['register/store']                = 'AuthPasien/register';
$route['pasien/logout']                 = 'AuthPasien/logout';
$route['internal']                      = 'Auth';
$route['internal/logout']               = 'Auth/logout';

//Aktor Pasien
$route['pasien/dashboard']                      = 'Pasien/DashboardController/index';
//antrian
$route['pasien/antrian']                        = 'Pasien/AntrianController/index';
$route['pasien/antrian/ambil']                  = 'Pasien/AntrianController/ambilAntrian';
//riwayat_pemeriksaan
$route['pasien/riwayat_pemeriksaan']             = 'Pasien/RiwayatPemeriksaanController/index';

//Aktor resepsionis
$route['resepsionis/dashboard']                 = 'Resepsionis/DashboardController/index';
//verifikasi
$route['resepsionis/verifikasi']                = 'Resepsionis/VerifikasiController/index';
$route['resepsionis/verifikasi/setujui/(:any)'] = 'Resepsionis/VerifikasiController/setujui/$1';
$route['resepsionis/verifikasi/tolak/(:any)']   = 'Resepsionis/VerifikasiController/tolak/$1';
//antrian
$route['resepsionis/antrian']                   = 'Resepsionis/AntrianController/index';
$route['resepsionis/antrian/create']            = 'Resepsionis/AntrianController/create';
$route['resepsionis/antrian/store']             = 'Resepsionis/AntrianController/store';
$route['resepsionis/antrian/destroy/(:any)']    = 'Resepsionis/AntrianController/destroy/$1';
$route['resepsionis/antrian/destroy_all']       = 'Resepsionis/AntrianController/destroyAll';
//pasien
$route['resepsionis/pasien']                    = 'Resepsionis/PasienController/index';
$route['resepsionis/pasien/create']             = 'Resepsionis/PasienController/create';
$route['resepsionis/pasien/store']              = 'Resepsionis/PasienController/store';
$route['resepsionis/pasien/edit/(:any)']        = 'Resepsionis/PasienController/edit/$1';
$route['resepsionis/pasien/update']             = 'Resepsionis/PasienController/update';
$route['resepsionis/pasien/delete/(:any)']      = 'Resepsionis/PasienController/delete/$1';
//user
$route['resepsionis/user']                    = 'Resepsionis/UserController/index';
$route['resepsionis/user/create']             = 'Resepsionis/UserController/create';
$route['resepsionis/user/store']              = 'Resepsionis/UserController/store';
$route['resepsionis/user/edit/(:any)']        = 'Resepsionis/UserController/edit/$1';
$route['resepsionis/user/update']             = 'Resepsionis/UserController/update';
$route['resepsionis/user/delete/(:any)']      = 'Resepsionis/UserController/delete/$1';
//rawat_jalan
$route['resepsionis/rawat_jalan']               = 'Resepsionis/RawatJalanController/index';

//Aktor Asdok
$route['asdok/dashboard']                       = 'Asdok/DashboardController/index';
//antrian
$route['asdok/antrian']                         = 'Asdok/AntrianController/index';
$route['asdok/antrian/panggil/(:any)']          = 'Asdok/AntrianController/panggil/$1';
//detail pasien
$route['asdok/detail/create/(:any)']       = 'Asdok/DetailController/create/$1';
$route['asdok/detail/store']               = 'Asdok/DetailController/store';
$route['asdok/detail/detail/(:any)']       = 'Asdok/DetailController/detail/$1';
//pasien
$route['asdok/pasien']                          = 'Asdok/PasienController/index';
$route['asdok/pasien/keluhan/store']            = 'Asdok/PasienController/keluhanStore';
$route['asdok/pasien/keluhan/(:any)']           = 'Asdok/PasienController/keluhan/$1';
$route['asdok/pasien/keluhan/create/(:any)']    = 'Asdok/PasienController/keluhanCreate/$1';
//pemeriksaan
$route['asdok/pemeriksaan']                     = 'Asdok/PemeriksaanController/index';
$route['asdok/pemeriksaan/create']              = 'Asdok/PemeriksaanController/create';
$route['asdok/pemeriksaan/store']               = 'Asdok/PemeriksaanController/store';
//surat rujukan
$route['asdok/surat_rujukan']                   = 'Asdok/SuratRujukanController/index';
$route['asdok/surat_rujukan/create/(:any)']     = 'Asdok/SuratRujukanController/create/$1';
$route['asdok/surat_rujukan/store']             = 'Asdok/SuratRujukanController/store';
$route['asdok/surat_rujukan/print/(:any)']      = 'Asdok/SuratRujukanController/print/$1';
//obat
$route['asdok/obat']                            = 'Asdok/ObatController/index';
$route['asdok/obat/create']                     = 'Asdok/ObatController/create';
$route['asdok/obat/store']                      = 'Asdok/ObatController/store';
//rekam_medis
$route['asdok/rekam_medis']                     = 'Asdok/RekamMedisController/index';
$route['asdok/rekam_medis/detail/(:any)']       = 'Asdok/RekamMedisController/detail/$1';
$route['asdok/rekam_medis/cetak/(:any)']        = 'Asdok/RekamMedisController/cetak/$1';
//harga_dokter
$route['asdok/harga_dokter']                    = 'Asdok/HargaDokterController/index';
$route['asdok/harga_dokter/update']             = 'Asdok/HargaDokterController/update';

//apoteker
$route['apoteker/dashboard']                    = 'Apoteker/DashboardController/index';
//kategori
$route['apoteker/kategori']                     = 'Apoteker/KategoriController/index';
$route['apoteker/kategori/create']              = 'Apoteker/KategoriController/create';
$route['apoteker/kategori/store']               = 'Apoteker/KategoriController/store';
$route['apoteker/kategori/edit/(:any)']         = 'Apoteker/KategoriController/edit/$1';
$route['apoteker/kategori/update']              = 'Apoteker/KategoriController/update';
$route['apoteker/kategori/delete/(:any)']       = 'Apoteker/KategoriController/delete/$1';
//obat
$route['apoteker/obat']                         = 'Apoteker/ObatController/index';
$route['apoteker/obat/create']                  = 'Apoteker/ObatController/create';
$route['apoteker/obat/store']                   = 'Apoteker/ObatController/store';
$route['apoteker/obat/edit/(:any)']             = 'Apoteker/ObatController/edit/$1';
$route['apoteker/obat/update']                  = 'Apoteker/ObatController/update';
$route['apoteker/obat/delete/(:any)']           = 'Apoteker/ObatController/delete/$1';
//obat keluar
$route['apoteker/obat_keluar']                  = 'Apoteker/ObatKeluarController/index';
//pembayaran
$route['apoteker/pembayaran']                   = 'Apoteker/PembayaranController/index';
$route['apoteker/pembayaran/detail/(:any)']     = 'Apoteker/PembayaranController/detail/$1';
$route['apoteker/pembayaran/store']             = 'Apoteker/PembayaranController/store';
//riwayat_pembayaran
$route['apoteker/riwayat_pembayaran']           = 'Apoteker/RiwayatPembayaranController/index';
$route['apoteker/riwayat_pembayaran/cetak/(:any)'] = 'Apoteker/RiwayatPembayaranController/cetak/$1';

//dokter
$route['dokter/dashboard']                      = 'Dokter/DashboardController/index';
//pemeriksaan
$route['dokter/pemeriksaan']                    = 'Dokter/PemeriksaanController/index';
//rekam_medis
$route['dokter/rekam_medis']                    = 'Dokter/RekamMedisController/index';
$route['dokter/rekam_medis/detail/(:any)']      = 'Dokter/RekamMedisController/detail/$1';
$route['dokter/rekam_medis/cetak/(:any)']       = 'Dokter/RekamMedisController/cetak/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
