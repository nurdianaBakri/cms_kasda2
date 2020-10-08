<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanInterface extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Interface CMS KASDA";
        $data['url'] = "pengamanan/PemeliharaanInterface/";    
        
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_interface/index',$data);
		$this->load->view('include/footer'); 
    }  

	public function reload_data()
    {     
        $data = $this->get_post_data(); 

        $KD_KASDA = $data['KD_KASDA'];  
        $data['data']= $this->M_interface->getAll($KD_KASDA);
        $this->load->view('pengamanan/pemeliharaan_interface/data',$data);  
    } 
     

     public function get_form()
    {    
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();   
        $this->load->view('pengamanan/pemeliharaan_interface/get_form',$data);  
    } 
     
    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA'); 
        return $data;
    }

    public function detail()
    {
        $where = array('ID_INTERFACE' => $this->input->post('ID_INTERFACE') ); 
        $hasil = $this->M_interface->detail($where)->row_array();  
        echo json_encode($hasil);
    } 
 
    public function save()
    {   
         $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'KD_KASDA' => $this->input->post('KD_KASDA'),
            'USERNAME' => $this->input->post('username'), 
            'DB_NAME' => $this->input->post('db_name'), 
            'PASSWORD' => $this->input->post('password'), 
            'HOST' => $this->input->post('host'),  
        );   
        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="tambah"){
            $hasil['status'] = $this->M_interface->save($data);   
        }   
        else{
            $where = array('ID_INTERFACE' => $this->input->post('id_interface') );
            $hasil['status'] = $this->M_interface->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="tambah"){
            $hasil['pesan'] ="Proses Tambah inteface CMS Kasda berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="tambah")
        {
            $hasil['pesan'] ="Proses Tambah inteface CMS Kasda gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="update")
        {
            $hasil['pesan'] ="Proses ubah inteface CMS Kasda berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah inteface CMS Kasda gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        echo json_encode($hasil);  
    }   

     public function hapus()
    {
        $hasil = array(); 
        $where = array('ID_INTERFACE' => $this->input->post('id_interface'));
        $data = $this->M_interface->hapus($where);  
        if ($data==true)
        {
            $hasil['pesan'] ="Proses hapus inteface CMS Kasda berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses hapus  inteface CMS Kasda gagal";  
        }   
        $hasil['status'] = $data;
        echo json_encode($hasil);
    }
  
}
