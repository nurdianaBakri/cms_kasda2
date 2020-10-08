<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

	public function  pm_user()
	{
		$this->load->view('pemeliharaan_user');
	}
	public function pm_wewenang()
	{
		$this->load->view('pemeliharaan_wewenang');
	}

	public function pm_terminal()
	{
		$this->load->view('pemeliharaan_terminal');
	}
	public function pm_menu()
	{
		$this->load->view('pemeliharaan_menu');
	}
	public function pm_wmenu()
	{
		$this->load->view('pemeliharaan_wewenang_menu');
	}
	public function pm_tuser()
	{
		$this->load->view('pemeliharaan_terminal_user');
	}
	public function pm_wuser()
	{
		$this->load->view('pemeliharaan_wewenang_user');
	}
	public function change_password()
	{
		$this->load->view('change_password');
	}
	public function override_password()
	{
		$this->load->view('override_password');
	}
	public function pm_hari_libur()
	{
		$this->load->view('pemeliharaan_hari_libur');
	}
	public function pm_tgl_libur()
	{
		$this->load->view('pemeliharaan_tanggal_libur');
	}
	public function audit_trail()
	{
		$this->load->view('audit_trail');
	}
	public function pembukaan_blokir_user()
	{
		$this->load->view('pembukaan_blokir_user');
	}
	public function app_user_admin()
	{
		$this->load->view('approval_user_admin');
	}
	public function pm_jam_transaksi()
	{
		$this->load->view('pemeliharaan_jam_transaksi');
	}

}
