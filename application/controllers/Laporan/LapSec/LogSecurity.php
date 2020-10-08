<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogSecurity extends CI_Controller {

    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        } 
    }  

    public function  index()
    { 
        $data['title'] = "Daftar User Kasda";
        $data['url'] = "Laporan/lapSec/LogSecurity/";    
        
        $this->load->view('include/header'); 
        $this->load->view('laporan/security/log_security/index',$data);
        $this->load->view('include/footer'); 
    }  

    public function reload_data()
    {     
        $data = $this->get_post_data(); 

        $KD_KASDA = $data['KD_KASDA'];  
        $data['data']= $this->M_daftar_user_kasda->getAll($KD_KASDA);
        $this->load->view('laporan/security/log_security/data',$data);  
    }  

    public function get_form()
    {    
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();   
        $this->load->view('laporan/security/log_security/get_form',$data);  
    } 
     
    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA'); 
        return $data;
    } 

     public function print($KD_KASDA)
    {
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'LAPORAN DAFTAR USER KASDA',0,1,'C');
        $pdf->SetFont('Arial','B',12); 
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(27,6,'ID USER',1,0);
        $pdf->Cell(60,6,'NAMA USER',1,0);
        $pdf->Cell(25,6,'STATUS',1,0);
        $pdf->Cell(40,6,'TANGGAL EXPIRED',1,1);
        $pdf->SetFont('Arial','',10); 

        $data= $this->M_daftar_user_kasda->getAll($KD_KASDA);
        $no=1;
        foreach ($data as $key) {
            $pdf->Cell(10,6,$no++,1,0);
            $pdf->Cell(27,6,$key['USERNAME'],1,0);
            $pdf->Cell(60,6,$key['NM_USER'],1,0);
            $pdf->Cell(25,6,$key['STATUS'],1,0);  
            $pdf->Cell(40,6,$key['PASSWORD_EXPIRED'],1,1); 
        } 
        $pdf->Output();
        
    }

   
}
