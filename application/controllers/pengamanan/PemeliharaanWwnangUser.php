<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemeliharaanWwnangUser extends CI_Controller {

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
		$data['title'] = "Pemeliharaan Wewenang User";
        $data['url'] = base_url()."pengamanan/PemeliharaanWwnangUser/";    
        $data['kasda']= $this->M_laporan_rekKoran->get_kasda();  

		$this->load->view('include/header'); 
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/index',$data);
		$this->load->view('include/footer'); 
    } 

    public function reset_pinPencairan()
    {
        $where = array('USERNAME' => $this->input->post('KD_DATA') ); 
        $data['data'] = $this->M_pemeliharaanUser->detail($where)->row_array();  
        $data['url'] = base_url()."pengamanan/PemeliharaanWwnangUser/";    
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/reset_pinPencairan',$data); 
    } 
    
    public function get_user_by_kd_kasda()
    {
        $where = array(
            'KD_KASDA' => $this->input->post('KD_KASDA'),
            // 'LEVEL_USER' => NULL,
         ); 
        $data['data'] = $this->MUserSystem->getResult($where);   
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/user',$data); 
    }  

    public function get_wewenang($username)
    { 
        $where = array('USERNAME' => $username );
        $data['kd_wewenang'] = $this->MUserSystem->getBy($where)['LEVEL_USER'];  
        $data['wewenang'] = $this->M_pemeliharaanWwnangUser->getAll();    
        
        // var_dump($data['wewenang']);
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/kd_wewenang',$data); 
    }
	
	public function reload_data()
    {     
        $data = $this->get_post_data();

        //get data menu
        //get menu level 1    
        $KD_KASDA = $data['KD_KASDA'];  
        $data2['data'] = $this->db->query("SELECT KD_KASDA, NM_USER, USERNAME, LEVEL_USER, nama_wewenang from v_user where KD_KASDA='$KD_KASDA'")->result_array(); 
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/data',$data2);  
    } 
     
    public function get_post_data()
    {  
        $data['KD_KASDA'] = $this->input->post('KD_KASDA'); 
        return $data;
    }

    public function detail()
    {
        $where = array('USERNAME' => $this->input->post('KD_DATA') ); 
        $data['data'] = $this->M_vUser->detail($where)->row_array(); 
        $data['wewenang'] = $this->M_pemeliharaanWwnangMenu->getAll(); 
        $data['url'] = base_url()."pengamanan/PemeliharaanWwnangUser/";  
        $data['jenis_aksi']= "update";
        $this->load->view('pengamanan/pemeliharaan_wewenang_user/form',$data);  
    } 
 
    public function ajax_add()
    {    
    $pin_db = ""; 
         //cek jenis aksi, jika update wewenang 
        if ($this->input->post('jenis_aksi') == "update")
        {
            $where = array(
                'KD_KASDA' => $this->input->post('KD_KASDA'),  
                'USERNAME' => $this->input->post('USERNAME'), 
            ); 
     
            //update data ref_weewnag menu 
            $data = array(
                'LEVEL_USER' => $this->input->post('LEVEL_USER'), 
            ); 

            $hasil['status'] = $this->MUserSystem->update($where, $data);   
            if($hasil['status']==true )
            {
                $hasil['pesan'] ="Proses update wewenang user berhasil";
            }
            else  
            {
                $hasil['pesan'] ="Proses update wewenang user gagal"; 
            }  
            echo json_encode($hasil);   
        }
        //jika aksinya update PIN
        else
        {
            $PIN_BARU = $this->input->post('PIN_BARU');
            $CONF_PIN_BARU = $this->input->post('CONF_PIN_BARU');

            $hasil = array();
            $where = array(
                // 'KD_KASDA' => $this->input->post('KD_KASDA'),  
                'USERNAME' => $this->input->post('USERNAME'), 
            ); 
            // $PIN_LAMA =  password_hash($this->input->post('PIN_LAMA'), PASSWORD_DEFAULT);

            $check = $this->MUserSystem->getBy($where);  
            $pin_db = $check['PIN'];

            $key = "CMSk45d@$2020";
            $PIN_DEFAULT = $this->input->post('PIN_LAMA');
            $PINplusKey = $PIN_DEFAULT.$key; 
            $pin_input = sha1($PINplusKey);  
            //check pin lama dengan pin baru   
            if($pin_db==$pin_input) 
            {
                // If the password inputs matched the hashed password in the database
                // Do something, you know... log them in.

                //check apakah passwod baru dan verifie sama  
                if ($PIN_BARU == $CONF_PIN_BARU)
                {  
                    /*$data = array(
                        'PIN' => $this->input->post('PIN_LAMA'), 
                        'PIN_CHANGED' =>1, 
                    ); 

                    if($hasil['status']==true )
                    {
                        //kirim SMS 
                        $hasil['status']=true; 

                        //kirim SMS
                        $hasil['pesan'] ="Proses update PIN pencairan berhasil";
                    }
                    else  
                    { 
                        $hasil['status']=false; 
                        $hasil['pesan'] ="Proses update PIN pencairan gagal, PIN dan konfimasi PIN tidak cocok"; 
                    }  */

                    $hasil['status']=false; 
                    $hasil['pesan'] ="PIN DAN KONFIMASI PIN COCOK";  
                }
                else
                {
                    $hasil['status']=false; 
                    $hasil['pesan'] ="PIN DAN KONFIMASI PIN TIDAK COCOK"; 
                    //tolak
                }  
            } 
            else
            {
                $hasil['status']=false;
                $hasil['pesan'] ="Proses update PIN pencairan gagal, PIN lama tidak sesuai";  
            } 
            echo json_encode($hasil);   
        }  
    }  
 
}
