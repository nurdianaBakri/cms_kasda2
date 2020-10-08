<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemeliharaanAPICore extends CI_Controller {

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
		$data['title'] = "Pemeliharaan API Core Banking";
        $data['url'] = "pengamanan/pemeliharaanAPICore/";    
        
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_API_core/index',$data);
		$this->load->view('include/footer'); 
    }  

	public function reload_data()
    {      
        $data['data']= $this->M_API_core_banking->getAll();
        $this->load->view('pengamanan/pemeliharaan_API_core/data',$data);  
    }  

    public function get_form()
    {     
        $this->load->view('pengamanan/pemeliharaan_API_core/get_form');  
    } 
     
    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA'); 
        return $data;
    }

    public function detail()
    {
        $where = array('id' => $this->input->post('id') ); 
        $hasil = $this->M_API_core_banking->detail($where)->row_array();  
        echo json_encode($hasil);
    } 
 
    public function save()
    {   
         $jenis_aksi = $this->input->post('jenis_aksi'); 
        $data = array( 
            'name_api' => $this->input->post('name_api'),
            'api_url' => $this->input->post('api_url'),  
        );   
        // aksi Tambah 
        $hasil = array();
        if($jenis_aksi=="tambah"){
            $hasil['status'] = $this->M_API_core_banking->save($data);   
        }   
        else{
            $where = array('id' => $this->input->post('id') );
            $hasil['status'] = $this->M_API_core_banking->update($where, $data);   
        } 

        if($hasil['status']==true && $jenis_aksi=="tambah"){
            $hasil['pesan'] ="Proses Tambah API Core Banking berhasil";
        }
        else if ($hasil['status']==false && $jenis_aksi=="tambah")
        {
            $hasil['pesan'] ="Proses Tambah API Core Banking gagal"; 
        }
        else if ($hasil['status']==true && $jenis_aksi=="update")
        {
            $hasil['pesan'] ="Proses ubah API Core Banking berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses ubah API Core Banking gagal";  
        }  

        $hasil['data'] = $data; 
        $hasil['jenis_aksi']=$jenis_aksi; 
        $hasil['id']=$this->input->post('id'); 
        echo json_encode($hasil);  
    }   

     public function hapus()
    {
        $hasil = array(); 
        $where = array('id' => $this->input->post('id'));
        $data = $this->M_API_core_banking->hapus($where);  
        if ($data==true)
        {
            $hasil['pesan'] ="Proses hapus inteface berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses hapus  inteface gagal";  
        }   
        $hasil['status'] = $data;
        echo json_encode($hasil);
    }
  
}
