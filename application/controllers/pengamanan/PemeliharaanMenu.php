<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanMenu extends CI_Controller {

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

	public function index()
	{ 
		$data['title'] = "Pemeliharaan Menu";
        $data['url'] = "pengamanan/PemeliharaanMenu/";     
 
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_menu/index',$data);
		$this->load->view('include/footer'); 
	} 
	
	public function reload_data()
    {    
        $data['menu'] = $this->M_pemeliharaanMenu->getAll();   
        $this->load->view('pengamanan/pemeliharaan_menu/data',$data);  
    }

    public function get_form()
    { 
        $this->load->view('pengamanan/pemeliharaan_menu/form');  
    }

    public function get_post_data()
    { 
        // $data['id_menu'] = $this->input->post('id_menu'); 
        $data['class_name'] = $this->input->post('class_name');
        $data['menu_name'] = $this->input->post('menu_name'); 
        $data['level_menu'] = $this->input->post('level_menu');  
        $data['parent_menu'] = $this->input->post('parent_menu');  
        return $data;
    }

    public function detail()
    {
        $where = array('id_menu' => $this->input->post('id_menu') ); 
        $hasil = $this->M_pemeliharaanMenu->detail($where); 
        echo json_encode($hasil->row_array());
    }

    public function get_perent_menu($level_menu, $id_parent)
    {
        $data = array();
        $data['id_parent'] = $id_parent;
        if($level_menu==1)
        {
            //parent menu == null
            $data['data_parent'] = array();
        } 
        else if($level_menu==0){
            $where = array('level_menu !=' => 3 );
            $data['data_parent']= $this->M_pemeliharaanMenu->detail($where)->result_array();
        }
        else{
            $where = array('level_menu' => $level_menu-1 );
            $data['data_parent']= $this->M_pemeliharaanMenu->detail($where)->result_array();
        }
        $this->load->view('pengamanan/pemeliharaan_menu/parent_menu',$data);   
    }

    public function get_level_menu()
    {
        $this->load->view('pengamanan/pemeliharaan_menu/level_menu');   
    }

    public function save()
    {   
        $data = $this->get_post_data(); 
        $hasil = array(); 
        $data['id_menu'] = $this->input->post('id_menu');    
        if ($data['menu_name']=="")
        {
            $hasil['pesan'] ="Silahkan isi form dengan lengkap";  
        }
        else{
            $jenis_aksi = $this->input->post('jenis_aksi');  
            $data['id_menu'] = $this->input->post('id_menu');    
            if($jenis_aksi=="tambah"){   
                $hasil['status'] = $this->M_pemeliharaanMenu->save($data);  
            }   
            else{  
                $where = array('id_menu' => $this->input->post('id_menu_old') );
                
                $data['parent_menu'] = $this->input->post('parent_menu');   
                $hasil['status'] = $this->M_pemeliharaanMenu->update($where, $data);   
            } 

            $hasil['jenis_aksi'] = $jenis_aksi;

            if($hasil['status']==true && $jenis_aksi=="tambah"){
                $hasil['pesan'] ="Proses Tambah menu berhasil";
            }
            else if ($hasil['status']==false && $jenis_aksi=="tambah")
            {
                $hasil['pesan'] ="Proses Tambah menu gagal"; 
            }
            else if ($hasil['status']==true && $jenis_aksi=="update")
            {
                $hasil['pesan'] ="Proses ubah menu berhasil"; 
            }
            else
            {
                $hasil['pesan'] ="Proses ubah menu gagal";  
            } 
        } 

        // $hasil['last_update'] = $this->db->last_query();
        echo json_encode($hasil);
    }   

    public function hapus()
    {
        $hasil = array(); 
        $where = array('id_menu' => $this->input->post('id_menu'));
        $data = $this->M_pemeliharaanMenu->hapus($where);  
        if ($data==true)
        {
            $hasil['pesan'] ="Proses hapus menu berhasil"; 
        }
        else
        {
            $hasil['pesan'] ="Proses hapus  menu gagal";  
        }   
        echo json_encode($hasil);
    }
  
}
