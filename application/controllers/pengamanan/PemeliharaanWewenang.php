<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanWewenang extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Wewenang";
        $data['url'] = base_url()."pengamanan/PemeliharaanWewenang/";    
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_wewenang/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {     
        $data['data'] = $this->M_pemeliharaanWwnangMenu->getAll();
        $this->load->view('pengamanan/pemeliharaan_wewenang/data',$data);  
    }

    public function get_post_data()
    {  
        $data['kd_wewenang'] = $this->input->post('kd_wewenang');
        $data['nama_wewenang'] = $this->input->post('nama_wewenang');  
        $data['jenis_aksi'] = $this->input->post('jenis_aksi');  
         
        if ($data['kd_wewenang']=="" || $data['nama_wewenang']=="")
        {
            $data['status']= false;
            $data['pesan'] ="Silahkan isi form dengan lengkap";  
        }  
        else
        {  
            $this->db->where('kd_wewenang', $data['kd_wewenang']);  
            $check = $this->db->get("ref_wewenang_menu");   
            if ($check->row_array()>0 && $data['jenis_aksi']=="update")
            {
                $data['status'] = false;
                $data['pesan'] = "Kode wewenang sudah ada, silahkan masukkan Kode wewenang yang lain"; 
                // $data['pesan'] =  $this->db->last_query();  
            }
            if ($check->row_array()>0 && $data['jenis_aksi']=="tambah")
            {
                $data['status'] = false;
                $data['pesan'] = "Kode wewenang sudah ada, silahkan masukkan Kode wewenang yang lain"; 
                // $data['pesan'] =  $this->db->last_query();  
            }
            else
            {
                $data['status'] = true; 
                $data['pesan'] =  "silahkna lanjutkan memasukkan data"; 
            } 
            // $data['query'] = $this->db->last_query();    
        }  
        return $data;
    }

    public function detail()
    {
        $where = array('kd_wewenang' => $this->input->post('KD_DATA') ); 
        $hasil = $this->M_pemeliharaanWwnangMenu->detail($where)->row_array();  

        $data['jenis_aksi'] = "update";
        $data['kd_wewenang_old'] = $hasil['kd_wewenang'];
        $data['kd_wewenang'] = $hasil['kd_wewenang'];
        $data['nama_wewenang'] = $hasil['nama_wewenang'];
        $this->load->view('pengamanan/pemeliharaan_wewenang/form',$data); 
    }       

    public function ajax_delete()
    { 
        $data2 = array( );
        $where = array(
            'kd_wewenang' => $this->input->post('KD_DATA'),  
        );
        $hasil['status'] = $this->M_pemeliharaanWwnangMenu->hapus($where);  

        if ($hasil['status']==true)
        {
            $data2 = array(
                'status' => $hasil['status'], 
                'pesan' => "Proses hapus wewenang ".$where['kd_wewenang']." berhasil", 
            );
        }
        else{
            $data2 = array(
                'status' => $hasil['status'], 
                'pesan' => "Proses hapus wewenang ".$where['kd_wewenang']." gagal", 
            );
        } 
        echo json_encode ($data2); 
    }

    public function get_form()
    {      
        $data['url'] = "PemeliharaanUser/";    
        $data['jenis_aksi'] ="tambah"; 
        $data['kd_wewenang']=NULL;   
        $data['nama_wewenang']=NULL;    
        $this->load->view('pengamanan/pemeliharaan_wewenang/form',$data);
    }  

 
    public function ajax_add()
    {   
        $data = $this->get_post_data(); 
         $status =  $data['status'];
         $pesan =  $data['pesan'];
        $hasil = array();     
        if ($data['status']==false)
        {
            $hasil['pesan'] = $data['pesan'];  
        }
        else
        { 
            //remove indes status 
            unset($data['status']);  
            unset($data['pesan']);  
            unset($data['jenis_aksi']);  

            $jenis_aksi = $this->input->post('jenis_aksi');    
            if($jenis_aksi=="tambah")
            {   
                $hasil['status'] = $this->M_pemeliharaanWwnangMenu->save($data);  
            }   
            else{  
                $where = array('kd_wewenang' => $this->input->post('kd_wewenang_old') ); 
                $hasil['status'] = $this->M_pemeliharaanWwnangMenu->update($where, $data);   
            } 

            if($hasil['status']==true && $jenis_aksi=="tambah"){
                $hasil['pesan'] ="Proses Tambah wewenang berhasil";
            }
            else if ($hasil['status']==false && $jenis_aksi=="tambah")
            {
                $hasil['pesan'] ="Proses Tambah wewenang gagal"; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="update")
            {
                $hasil['pesan'] ="Proses ubah wewenang berhasil"; 
            }
            else
            {
                $hasil['pesan'] ="Proses ubah wewenang gagal";  
            } 
        }  
        echo json_encode($hasil);
    }   
  
}
