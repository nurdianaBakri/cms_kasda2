<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends CI_Controller {

	public function pesan_masuk()
	{
		$this->load->view('pesan_masuk');
	}
	public function kirim_pesan()
	{
		$this->load->view('kirim_pesan');
	}
	public function pm_pengumuman()
	{
		$this->load->view('pemeliharaan_pengumuman');
	}
	public function monitoring_saldo()
	{
		$this->load->view('monitoring_saldo');
	}
	public function mng_sp2d()
	{
		$this->load->view('monitoring_sp2d');
	}
}
