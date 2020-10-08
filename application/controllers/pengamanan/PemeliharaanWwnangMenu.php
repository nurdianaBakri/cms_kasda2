<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanWwnangMenu extends CI_Controller {

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
            $class_menu = $this->session->userdata('class_menu');  
            $accesable="false";
            $data = uri_string();  
            $uri = substr($data, strpos($data, "cms_kasda") );  
            $accesable=$this->M_login->cekMenu002($uri, $class_menu);  
        }
    }  

	public function  index()
	{ 
		$data['title'] = "Pemeliharaan Wewenang";
        $data['url'] = "pengamanan/PemeliharaanWwnangMenu/";   
        
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_wewenang_menu/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {     
        $kd_wewenang = $this->get_post_data();

        //get data menu
        //get menu level 1
        $where = array('level_menu' => 1 );
        $data['menu1'] = $this->M_pemeliharaanMenu->detail($where)->result_array(); 
        $data['kd_wewenang'] = $kd_wewenang['kd_wewenang'];   

        $where = array('kd_wewenang' => $kd_wewenang['kd_wewenang'] );
        $data['data'] = $this->M_pemeliharaanWwnangMenu->detail($where)->row_array();

        $this->load->view('pengamanan/pemeliharaan_wewenang_menu/data',$data);  
    } 

    public function get_form()
    { 
        $cek = $this->M_pemeliharaanWwnangMenu->getAll();
        $data['data'] = $cek ; 
        $this->load->view('pengamanan/pemeliharaan_wewenang_menu/form', $data);  
    } 
     
    public function get_post_data()
    {  
        $data['kd_wewenang'] = $this->input->post('kd_wewenang'); 
        return $data;
    }  
 
    public function save()
    {   
        $data['kd_wewenang'] =$this->input->post('kd_wewenang');    
        $id_menu = $this->input->post('id_menu'); 
        $data_id_menu = implode(",",$id_menu); 
        $data['id_menu'] = $data_id_menu; 

        $hasil = array();  
        $jenis_aksi = ""; 
        //cek apakah kode wewenang if extisting  
        $this->db->where('kd_wewenang', $data['kd_wewenang']);
        $cek = $this->db->get('ref_wewenang_menu');
        if ($cek->num_rows()>0)
        {
            # code...
            //update data ref_weewnag menu
            $where = array('kd_wewenang' =>  $data['kd_wewenang'] ); 
            $hasil['status'] = $this->M_pemeliharaanWwnangMenu->update($where, $data);  
            $jenis_aksi="ubah";
        }
        else{
            $hasil['status'] = $this->M_pemeliharaanWwnangMenu->save($data);   
            $jenis_aksi="tambah"; 
        }

         if($hasil['status']==true && $jenis_aksi=="tambah"){
             $hasil['pesan'] ="Proses Tambah wewenang berhasil";
         }
         else if ($hasil['status']==false && $jenis_aksi=="tambah")
         {
             $hasil['pesan'] ="Proses Tambah wewenang gagal"; 
         }
         else if ($hasil['status']==true && $jenis_aksi=="ubah")
         {
             $hasil['pesan'] ="Proses ubah wewenang berhasil"; 
         }
         else
         {
             $hasil['pesan'] ="Proses ubah wewenang gagal";  
         } 
        echo json_encode($hasil);
    }   

    public function insert()
    { 
        $key2 = array();
        $this->db->select('id_menu');
        $menu = $this->db->get('ref_menu')->result_array(); 
        foreach ($menu as $key ) {
            $key2[] = $key['id_menu'];
        }

        $data['id_menu'] = implode(",",$key2);

        $this->db->where('kd_wewenang',05);
        $this->db->update('ref_wewenang_menu', $data);
    }
  
}
