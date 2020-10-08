<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreksi_verifikasi extends CI_Controller {   
    
    public function __construct()
    {
        parent ::__construct();
        $cek = $this->M_login->cek_userIsLogedIn();
        if ($cek==FALSE)
        {
            $this->session->set_flashdata('pesan',"Anda harus login jika ingin mengakses halaman lain");
            redirect('Login');
        }
        else
        {    

        }
    } 

    public function  index()
    {  
        $data['title'] = "Koreksi Verifikasi SP2D";
        $data['url'] = "transaksi/Koreksi_verifikasi/"; 

        $this->load->view('include/header'); 
        $this->load->view('transaksi/koreksi_verifikasi/index',$data);
        $this->load->view('include/footer');  
    }   

    public function get_verified_sp2d()
    {
        $KD_KASDA=  "99999";
        $data['data'] = $this->M_Koreksi_verifikasi_sp2d->getAll($KD_KASDA); 
        $this->load->view('transaksi/koreksi_verifikasi/data',$data);  
    }   

    public function form_no_sp2d()
    { 
        $where = array(
            'KD_KASDA' => $this->input->post('KD_KASDA'), 
            'STATUS' =>2, 
        );
        $data['data'] = $this->M_TrxSP2D->detail($where); 
        $this->load->view('transaksi/koreksi_verifikasi/form_no_sp2d',$data);  
    }  

    public function inquery()
    {
        $KD_KASDA=  $this->input->post('KD_KASDA');
        $data['data'] = $this->M_Koreksi_verifikasi_sp2d->getAll($KD_KASDA); 
        $this->load->view('transaksi/koreksi_verifikasi/inquiry',$data);  
    }
    
    public function get_form()
    {   
        $dt = new DateTime();
        $date =  $dt->format('Y-m-d'); 
        $data['alasan'] =null; 
        $data['tanggal'] =$date;     
        $data['url_inquery']="transaksi/Koreksi_verifikasi/inquery"; 
        $this->load->view('transaksi/koreksi_verifikasi/form2',$data);
    } 

    public function save()
    {    
        $No_SP2D = $this->input->post('No_SP2D');  
        $data = array(     
            'alasan'=>$this->input->post('alasan'), 
            'tanggal'=>$this->input->post('tanggal'), 
            'No_SP2D'=>$No_SP2D, 
            'KD_KASDA'=>$this->input->post('KD_KASDA'), 
            'kd_user'=>$this->input->post('username'), 
        );
 
        // // aksi update data menjadi verifikasi  
        $hasil['status'] = $this->M_Koreksi_verifikasi_sp2d->save($data); 


        $where = array(      
            'No_SP2D'=>$No_SP2D, 
            'KD_KASDA'=>$this->input->post('KD_KASDA'), 
        );

        //update status di tabel trx_sp2d
        $hasil['status'] = $this->M_TrxSP2D->update( $where,  array('STATUS' => 1 ));  

        if($hasil['status']==true){
            $hasil['pesan'] ="<div class='alert alert-success'>
                              <strong>Sukses!</strong> Proses Koreksi Verifikasi SP2D berhasil.
                            </div>";
        }
        else if ($hasil['status']==false)
        {
            $hasil['pesan'] ="<div class='alert alert-danger'>
                              <strong>Gagal!</strong> Proses Koreksi Verifikasi SP2D gagal, silahkan coba lagi.
                            </div>"; 
        } 
        // $this->session->set_flashdata('pesan',$hasil['pesan']);
        // redirect('transaksi/Koreksi_verifikasi');  
        echo json_encode($hasil);
    }

     public function detail()
    { 
        $No_SP2D = $this->input->post('No_SP2D'); 
        $where = array('No_SP2D' => $No_SP2D );
        $data['data']=$this->MMapping_Map->getBy($where);             
        $data['url_inquery']="parameter/Koreksi_verifikasi/inquery";    
        echo json_encode($data);
    }
  
}