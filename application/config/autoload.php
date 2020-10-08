<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database', 'session','FungsiTerbilang','pdf','form_validation');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
    'MPemeliharaanKasda',
    'MPemeliharaanUrusan',
    'MPemeliharaanBidang',
    'MPemeliharaanUnit',
    'MPemeliharaanSubUnit',
    'MImpoertSKPD',
    'MPemeliharaanCabang',
    'MPemeliharaanMap',
    'MRekeningPotongan',
    'MRekeningSumber',
    'MRekeningKasda',
    'MRekeningSkpd',
    'M_SKPD', 
    'MPemeliharaanBank',
    'MPemeliharaanJenisSPM',
    'MAproval_rek_kasda', 
    'MMapping_Map',
    'MKonfigurasi_kasda', 
    'MPotongan_transaksi',
    'MUserSystem',
    'MPemeliharaanAksesRekKoran',
    'M_TrxSP2D',
    'M_login',
    'M_TrxSP2D_Potongan', 
    'M_Koreksi_verifikasi_sp2d',
    'M_interface',
    'M_laporan_rekKoran', 
    'M_laporan_SP2D_sudah_cair',
    'M_rekeningMaster',
    'M_pemeliharaanMenu',
    'M_pemeliharaanUser', 
    'M_pemeliharaanWwnangMenu',
    'M_pemeliharaanWwnangUser',
    'M_pemeliharaanTerminal',
    'M_changePassword',
    'M_hariLibur',
    'M_tanggalLibur',
    'M_pemeliharaanJamTransaksi',
    'M_log',
    'M_history_print',
    'M_TrxSPM',
    'M_temp_penguji',
    'M_PemeliharaanValidasiInterface',
    'M_API_core_banking',
    'M_daftar_user_kasda',
    'MRekeningPotongan_ajax',
    'M_vUser'
);
