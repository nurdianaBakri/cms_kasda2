<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_security extends CI_Controller {

	public function  lap_log_security()
	{
		$this->load->view('laporan_log_security');
	}
	public function  lap_log_parameter()
	{
		$this->load->view('laporan_log_parameter');
	}
	public function  lap_log_activity()
	{
		$this->load->view('laporan_log_activity');
	}
	public function  daftar_terminal()
	{
		$this->load->view('daftar_terminal');
	}
	public function  daftar_user_kasda()
	{
		$this->load->view('daftar_user_kasda');
	}
}