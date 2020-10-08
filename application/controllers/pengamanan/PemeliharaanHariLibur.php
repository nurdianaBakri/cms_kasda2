<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanHariLibur extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Hari Libur ";
        $data['url'] = "pengamanan/PemeliharaanHariLibur/";  
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();    

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/PemeliharaanHariLibur/index',$data);
		$this->load->view('include/footer'); 
    }    
   
 
    public function save()
    {      
        $hasil = array();  

        $data = $this->get_post_data(); 
        $where = array('KD_KASDA' =>  $data['KD_KASDA'] );   
        $data2 = $this->M_hariLibur->detail($where);  

        if ($data2->num_rows()>0)
        {  
            $hasil['status'] = $this->M_hariLibur->update($where, $data);  
            if ($hasil['status']==true)
            { 
                $hasil['pesan'] ="Proses ubah hari libur berhasil"; 
            }
            else
            { 
                $hasil['pesan'] ="Proses ubah hari libur gagal";  
            } 
        }
        else{
            $hasil['status'] = $this->M_hariLibur->save($data);  
        }  
        echo json_encode($data);
    }    

    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA');  

        if (isset($_POST['SENIN']))
        {
            $data['SENIN']=$_POST['SENIN'];
        }

        if (isset($_POST['SELASA']))
        {
            $data['SELASA']=$_POST['SELASA'];
        }

        if (isset($_POST['RABU']))
        {
            $data['RABU']=$_POST['RABU'];
        }

        if (isset($_POST['KAMIS']))
        {
            $data['KAMIS']=$_POST['KAMIS'];
        }

        if (isset($_POST['JUMAT']))
        {
            $data['JUMAT']=$_POST['JUMAT'];
        }

        if (isset($_POST['SABTU']))
        {
            $data['SABTU']=$_POST['SABTU'];
        }

        if (isset($_POST['MINGGU']))
        {
            $data['MINGGU']=$_POST['MINGGU'];
        } 
         
        return $data;
    }   

    public function reload_data()
    {     
        $data = $this->get_post_data();

        //get data menu
        //get menu level 1
        $where = array('KD_KASDA' => $data['KD_KASDA'] );
        $data['data'] = $this->M_hariLibur->detail($where)->row_array();   
        $data['KD_KASDA']=$data['KD_KASDA'];

        $this->load->view('pengamanan/PemeliharaanHariLibur/data',$data);  
    } 
}
