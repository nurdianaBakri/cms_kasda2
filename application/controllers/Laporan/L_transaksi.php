<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_transaksi extends CI_Controller {

 
	public function  cetak_ulang()
	{
		$this->load->view('cetak_ulang');
	}
	public function lap_rekkoran()
	{
		$this->load->view('laporan_rek_koran');
	}
	public function sp2d_sudahcair()
	{
		$this->load->view('daftar_sp2d_sudah_cair');
	}
	public function sp2d_belumcair()
	{
		$this->load->view('daftar_sp2d_belum_cair');
	}
	public function lap_status_per_sp2d()
	{
		$this->load->view('laporan_status_per_sp2d');
	}
	public function lap_kor_ver_sp2d()
	{
		$this->load->view('laporan_koreksi_verifikasi_sp2d');
	}
	public function rekap_pembukaan_sp2d()
	{
		$this->load->view('rekap_pembukaan_sp2d');
	}
	public function rekap_verifikasi_sp2d()
	{
		$this->load->view('rekap_verifikasi_sp2d');
	}
	public function daftar_status_sp2d()
	{
		$this->load->view('daftar_status_sp2d');
	}
	public function lap_sp2d_gagal_import()
	{
		$this->load->view('laporan_sp2d_gagal_import');
	}
	public function lap_sp2d_berhasil_import()
	{
		$this->load->view('laporan_sp2d_berhasil_import');
	}
}
