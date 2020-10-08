<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class L_parameter extends CI_Controller {

	public function  daftar_skpd()
	{
		$this->load->view('daftar_skpd');
	}
	public function  daftar_rek_kasda()
	{
		$this->load->view('daftar_rekening_kasda');
	}
	public function  daftar_kasda()
	{
		$this->load->view('daftar_kasda');
	}
}