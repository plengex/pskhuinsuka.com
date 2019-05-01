<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
git add .
git commit -m ''
git push -u al-vri master
azisalvriyanto
*/

$route["default_controller"]	= "Umum";
$route["404_override"]			= "Galat/_404";
$route["translate_uri_dashes"]	= FALSE;

//umum
$route["beranda"]               = "Umum/index";
$route["kontak"]                = "Umum/kontak";
$route["artikel"]                               = "Umum/artikel";
$route["artikel/(:num)"]                        = "Umum/artikel/$1";
$route["artikel/(:num)/(:num)"]                 = "Umum/artikel/$1/$2";
$route["artikel/(:num)/(:any)/(:num)/(:any)"]   = "Umum/artikel/$1/$2/$3/$4";
$route["berita"]                                = "Umum/berita";
$route["berita/(:num)"]                         = "Umum/berita/$1";
$route["berita/(:num)/(:num)"]                  = "Umum/berita/$1/$2";
$route["berita/(:num)/(:any)/(:num)/(:any)"]    = "Umum/berita/$1/$2/$3/$4";
$route["kegiatan"]              = "Umum/kegiatan";
$route["galeri"]                = "Umum/galeri";
$route["berkas"]                = "Umum/berkas";

//pendaftaran
$route["pendaftaran"]               = "Umum/pendaftaran";

//pengurus
$route["pengurus"]  = "pengurus/C_PMasuk/index";

$route["pengurus/beranda"]  = "pengurus/C_PBeranda/index";

$route["pengurus/organisasi"]   = "pengurus/C_POrganisasi/index";

$route["pengurus/keanggotaan"]          = "pengurus/C_PKeanggotaan/index";
$route["pengurus/keanggotaan/tambah"]   = "pengurus/C_PKeanggotaan/tambah";
$route["pengurus/keanggotaan/(:any)"]   = "pengurus/C_PKeanggotaan/lihat/$1";

$route["pengurus/profil"]               =    "pengurus/C_PProfil/index";

$route["pengurus/keuangan"]                 = "pengurus/C_PKeuangan/index";
$route["pengurus/keuangan/tambah"]          = "pengurus/C_PKeuangan/tambah";
$route["pengurus/keuangan/(:any)"]          = "pengurus/C_PKeuangan/cetak/$1";
$route["pengurus/keuangan/(:any)/(:num)"]   = "pengurus/C_PKeuangan/cetak/$1/$2";

$route["pengurus/kegiatan"] = "pengurus/C_PKegiatan/index";

$route["pengurus/berkas"]   = "pengurus/C_PBerkas/index";

$route["pengurus/artikel"]          = "pengurus/C_PArtikel/index";
$route["pengurus/artikel/tambah"]   = "pengurus/C_PArtikel/tambah";
$route["pengurus/artikel/(:num)"]   = "pengurus/C_PArtikel/perbarui/$1";

$route["pengurus/berita"]           = "pengurus/C_PBerita/index";
$route["pengurus/berita/tambah"]    = "pengurus/C_PBerita/tambah";
$route["pengurus/berita/(:num)"]    = "pengurus/C_PBerita/perbarui/$1";

$route["pengurus/galeri"]       = "pengurus/C_PGaleri/index";

$route["pengurus/pengaturan"]   = "pengurus/C_PPengaturan/index";