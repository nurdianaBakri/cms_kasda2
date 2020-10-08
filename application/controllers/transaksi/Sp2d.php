<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sp2d extends CI_Controller {


	public function  verifikasi_sp2d()
	{
		$this->load->view('verifikasi_sp2d');
	}
	public function  koreksi_ver_sp2d()
	{
		$this->load->view('koreksi_verifikasi_sp2d');
	}
	public function  hapus_sp2d()
	{
		$this->load->view('hapus_sp2d');
	}

	public function  pencarian_sp2d()
	{
		$this->load->view('pencarian_sp2d');
	}
	public function  pembukaan_sp2d()
	{
		$this->load->view('pembukaan_sp2d');
	}
	public function  gateway_server()
	{
		$this->load->view('gateway_server');
	}

}
