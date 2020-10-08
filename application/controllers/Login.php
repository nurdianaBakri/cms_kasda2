<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		 
	}

	function index(){    
		$this->load->view('login/login');
	}

	function aksi_login(){  

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'USERNAME' => $username,
			'PASSWORD' => md5($password)
		);
		$cek = $this->M_login->cek_login("v_user",$where);

		// var_dump($where); 
		if($cek->num_rows()  > 0)
		{ 
			//update flag status login
			$this->M_login->update(array('USERNAME' => $username ), array('STATUS_LOGIN' => 1 ));
			$cek = $cek->row_array();

			//get menu 
			$wewenang_user = explode(',',$cek['wewenang']);
			
			$menu1 = array();
			$menu2 = array();
			$menu3 = array(); 
			$class_menu = array( ); 

			// var_dump($wewenang_user);
			
			//get menu level 1
			foreach ($wewenang_user as $key2 ) {
				$this->db->where('id_menu', $key2);
				$menu11 = $this->db->get('ref_menu')->row_array();
				if ($menu11['level_menu']==3) {
					# get level 2
					// $menu22 =  $menu11['parent_menu'] ; 

					// //get menu level 1
					// $this->db->where('id_menu', $menu22);
					// $menu1[] = $this->db->get('ref_menu')->row_array()['parent_menu']; 

					// $menu2[] = $menu11['parent_menu'];
					$menu3[] = $key2;
				}
				else  if ($menu11['level_menu']==2)
				{ 
					//get menu level 1
					// $this->db->where('id_menu', $key2);
					// $menu1[] = $this->db->get('ref_menu')->row_array()['parent_menu']; 

					$menu2[] = $key2; 
				}
				else{
					$menu1[] = $key2;
				}

				$class_menu[] = $menu11['class_name'];
			}     

			$is_verifikator =  FALSE; 
			$is_data_entry =  FALSE; 
			$is_super_admin =  FALSE;  
			 
			if (stripos($cek['nama_wewenang'], 'super') !== false) {
				$is_super_admin =  TRUE;
			}
			else if (stripos($cek['nama_wewenang'], 'Checker') !== false) 
			{
				$is_verifikator =  TRUE;
			}
			else if (stripos($cek['nama_wewenang'], 'data entry') !== false) 
			{
				$is_data_entry =  TRUE;
			}
			else{}    
 
 
			$data_session = array(
				'nama' => $cek['NM_USER'],
				'KD_KASDA' => $cek['KD_KASDA'],
				'NM_KASDA' => $cek['NM_KASDA'],
				'username' => $cek['USERNAME'], 
				// 'menu' => $wewenang_user, 
				'menu1' => $menu1, 
				'menu2' => $menu2, 
				'menu3' => $menu3, 
				'LEVEL_USER' => $cek['LEVEL_USER'],
				'status' => "login",
				'is_logedin' => TRUE,
				'is_super_admin' => $is_super_admin,
				'is_data_entry' => $is_data_entry,
				'is_verifikator' => $is_verifikator, 
				'nama_wewenang' => $cek['nama_wewenang'],
				'class_menu' => $class_menu,

				//set data database simda 
				// 'username_db' => $cek['USERNAME_DB'],
				// 'pass_db' => $cek['PASSWORD_DB'],
				// 'host_db' => $cek['HOST_DB'],
			); 
			$this->session->set_userdata($data_session);  

			//check apakah user sudah ubah password 
			if ($cek['CHANGE_PASS']==0)
			{
				redirect(base_url("Login/change_pass")); 
			}
			else
			{  
				redirect(base_url("Home"));
			}

		}else{
			$data_session = array( 
				'is_logedin' => FALSE,
			);
			$this->session->set_flashdata('pesan', "Username dan password salah !");
			redirect('Login');
		}
	} 

	function logout(){ 
		//update flag
		$username = $this->session->userdata('username');
		$this->M_login->update(array('USERNAME' => $username ), array('STATUS_LOGIN' => 0 ));
		
		$this->session->sess_destroy();
		redirect(base_url('Login'));
	}

	function change_pass(){    
		$data['title'] ="Ubah password";
        $data['url'] = "pengamanan/PemeliharaanUser/";   

        $this->load->view('include/header_change_pass');  
		$this->load->view('login/change_pass', $data);
		$this->load->view('include/footer'); 

	}

	public function do_change_pass()
    {      
        $hasil = array();    
        $where = array('USERNAME' =>  $this->input->post('USERNAME') );   
        $data = $this->M_changePassword->detail($where);  

        if ($data->num_rows()>0)
        {
            $data_db = $data->row_array(); 
            $pass_lama1  = $this->input->post('PASSWORD_LAMA');
            $pass_lama = md5($pass_lama1);

            $pass_baru1  = $this->input->post('PASSWORD_BARU');
            $pass_baru = md5($pass_baru1); 

            $KONFIRMASI_PASSWORD_BARU  = md5($this->input->post('KONFIRMASI_PASSWORD_BARU')); 

            //cek if password di db sama dengan password inputan 
            if ($pass_lama!=$data_db['PASSWORD'])
            {   
            	$pesan = "<div class='alert alert-info' role='alert'>
				  Password lama ".$this->session->userdata('nama')." tidak tidak cocok
				</div>"; 

                $this->session->set_flashdata('pesan', $pesan);
            	redirect(base_url('Login/change_pass'));  
            }
            else
            { 
            	if ($pass_baru==$KONFIRMASI_PASSWORD_BARU)
            	{
            		$data2 = array(
	                    'PASSWORD' => $pass_baru, 
	                    'CHANGE_PASS' => 1, 
	                );
	                $hasil['status'] = $this->M_changePassword->update($where, $data2);  
	                if ($hasil['status']==true)
	                {  
	                	$pesan = "<div class='alert alert-info' role='alert'>Proses ubah password user berhasil
						</div>"; 

	                    $this->session->set_flashdata('pesan',$pesan); 
						redirect(base_url("Home")); 
	                }
	                else
	                {  
	                	$pesan = "<div class='alert alert-info' role='alert'>Proses ubah password user gagal
						</div>"; 
	                    $this->session->set_flashdata('pesan',$pesan);
	            		redirect(base_url('Login/change_pass'));  
                	}  
            	}

            	//jika pass dan konfirmasi password tidak sama
            	else
            	{
            		$hasil['status']=false; 
            		$pesan = "<div class='alert alert-info' role='alert'>
					  Konfirmasi password ".$this->session->userdata('nama')." tidak tidak cocok
					</div>";   
 
	                $this->session->set_flashdata('pesan',$pesan);
	            	redirect(base_url('Login/change_pass'));   
            	}    
            } 
        }
        else{ 
            $this->session->set_flashdata('pesan',"data username ".$this->input->post('USERNAME')." tidak di temukan"); 
            redirect(base_url('Login/change_pass')); 
        } 

    }   
}