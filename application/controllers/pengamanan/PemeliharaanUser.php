<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanUser extends CI_Controller {

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
		$data['title'] ="Pemeliharaan User";
        $data['url'] = "PemeliharaanUser/";   

        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();  
		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_user/index',$data);
		$this->load->view('include/footer'); 
	}  

      public function reload_data()
    {     
        $where = array('KD_KASDA' => $this->input->post('KD_KASDA')); 
        $data['data'] = $this->M_pemeliharaanUser->detail($where)->result_array();    
        $this->load->view('pengamanan/pemeliharaan_user/data',$data);     
    } 

    public function ajax_delete()
    {     
        $where = array('USERNAME' => $this->input->post('KD_DATA') );
        $hapus= $this->M_pemeliharaanUser->hapus($where);
        $data = array( );
        if ($hapus==true)
        {
             $data['pesan'] = "Proses hapus user berhasil";
        }  
        else
        {
            $data['pesan'] = "Proses hapus user gagal";
        }
        $data['status'] = $hapus; 
        // $data['last_query'] = $this->db->last_query();   
        echo json_encode($data);
    }

    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA');
        $data['USERNAME'] = $this->input->post('USERNAME'); 
        $data['MAX_ERROR_LOGIN'] = $this->input->post('max_error_login');  
        $data['NM_USER'] = $this->input->post('NM_USER');    
        $data['STATUS'] = $this->input->post('status_user');  
        $data['PASSWORD_EXPIRED'] = $this->input->post('password_expired');  
        $data['USER_INPUT'] = $this->input->post('USER_INPUT');  
        $data['STATUS_LOGIN'] = $this->input->post('status_login');   
        $data['NO_HP'] = $this->input->post('NO_HP');  
        $jenis_aksi = $this->input->post('jenis_aksi');  

        if ($data['USERNAME']=="" || $data['NM_USER']=="" || $data['MAX_ERROR_LOGIN']=="")
        {
            $data['status']= false;
            $data['pesan'] ="Silahkan isi form dengan lengkap";  
        }
        else
        {
            $data['status'] = true;
                
        } 
        return $data;
    }


    
    public function detail()
    {
        $where = array('USERNAME' => $this->input->post('KD_DATA') ); 
        $hasil = $this->M_pemeliharaanUser->detail($where)->row_array(); 

        $s = $hasil['PASSWORD_EXPIRED'];
        $dt = new DateTime($s); 
        $date = $dt->format('Y-m-d'); 

        $data['PASSWORD_EXPIRED'] = $date;

        $data['kasda'] = $this->MPemeliharaanKasda->getAll();     
        $data['url'] = "PemeliharaanUser/";   
        $data['status_login'] = 1;
        $data['status_user'] = 1;
        $data['jenis_aksi'] ="ubah";    
        $data['KD_KASDA']=$hasil['KD_KASDA'];  
        $data['NM_USER']=$hasil['NM_USER'];  
        $data['USERNAME']=$hasil['USERNAME'];  
        $data['old_username']=$hasil['USERNAME'];  
        $data['MAX_ERROR_LOGIN']=$hasil['MAX_ERROR_LOGIN'];   
        $data['NO_HP']=$hasil['NO_HP'];   
        $this->load->view('pengamanan/pemeliharaan_user/form',$data); 
    }   

    public function get_status_login($status)
    {
        $data['status_login'] = $status;
        $this->load->view('pengamanan/pemeliharaan_user/status_login', $data);   
    }

    public function get_status_user($status)
    {
        $data['status_user'] = $status;
        $this->load->view('pengamanan/pemeliharaan_user/get_status_user', $data);   
    }

    public function get_form()
    {  
        $data['kasda'] = $this->MPemeliharaanKasda->getAll();     
        $data['url'] = "PemeliharaanUser/";   
        $data['status_login'] = 1;
        $data['status_user'] = 1;
        $data['jenis_aksi'] ="tambah"; 
        $data['KD_KASDA']=NULL;   
        $data['NM_USER']=NULL;  
        $data['USERNAME']=NULL;  
        $data['MAX_ERROR_LOGIN']=NULL;      
        $data['PASSWORD_EXPIRED'] = NULL; 
        $data['old_username'] = NULL; 
        $data['NO_HP'] = NULL; 

        $this->load->view('pengamanan/pemeliharaan_user/form',$data);
    }  


    public function ajax_add()
    {   
        $data = $this->get_post_data(); 
        $hasil = array(); 
        $where = array(); 

        if ($data['status']==false)
        {
            $hasil['pesan'] =$data['pesan'];  
        }
        else
        {  
            //check duplicate data or not
            $this->db->where('USERNAME', $data['USERNAME']);
            $check  = $this->db->get('user_system'); 

            //remove indes status 
            unset($data['status']);  
            $jenis_aksi = $this->input->post('jenis_aksi');    
            if($jenis_aksi=="tambah")
            {     
                if ($check->row_array()>0)
                {
                    $hasil['status'] = false;
                    $hasil['pesan'] = "Username sudah ada, silahkan masukkan username yang lain"; 
                }
                else
                {
                    $key = "CMSk45d@$2020";
                    $PIN_DEFAULT  = "128202";
                    $PINplusKey =  $PIN_DEFAULT.$key;

                    $data['PASSWORD'] = md5($data['USERNAME']);
                    $data['CHANGE_PASS'] = 0;   
                    $data['PIN_CHANGED'] = 0; 
                    $data['PIN'] =sha1($PINplusKey); 
      
                    $hasil['status'] = $this->M_pemeliharaanUser->save($data);  

                    if($hasil['status']==true)
                    {
                        $hasil['pesan'] ="Proses Tambah user berhasil";
                    }
                    else if ($hasil['status']==false)
                    {
                        $hasil['pesan'] ="Proses Tambah user gagal"; 
                    } 
                }   

                echo json_encode($hasil);

            }   
            else{   
                $where = array('USERNAME' => $this->input->post('username_old') );  
                
                // $hasil['pesan'] ="Proses ubah user gagal". $check->num_rows();  

                if ($check->num_rows()==0)
                {   
                    //check apakah username ada yang sama apa tidak 
                    $hasil['status'] = $this->M_pemeliharaanUser->update($where, $data);  
                    if ($hasil['status']==true)
                    {
                        $hasil['pesan'] ="Proses ubah user berhasil"; 
                    }
                    else
                    {
                        $hasil['pesan'] ="Proses ubah user gagal";  
                    }   
                }
                else
                {
                    $hasil['status'] = false;
                    $hasil['pesan'] = "Username sudah ada, silahkan masukkan username yang lain";
                } 
                echo json_encode($hasil);  
            } 

            
               
        }   
    }   

  
}
