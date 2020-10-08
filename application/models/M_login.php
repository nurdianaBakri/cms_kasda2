<?php 

class M_login extends CI_Model{	
	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function update($where, $data)
	{
		$this->db->where($where);
		$hasil = $this->db->update('user_system',$data);
		return $hasil;
	}

	public function cek_userIsLogedIn()
	{
    	$this->secure_header();
		if($this->session->userdata('is_logedin')==TRUE)
	    {
	      return TRUE;
	    }  
	    else
	    {
	      return FALSE;
	    }
	}	

    public function secure_header()
    {
     	// Prevent some security threats, per Kevin
		// Turn on IE8-IE9 XSS prevention tools
		$this->output->set_header('X-XSS-Protection: 1; mode=block');
		// Don't allow any pages to be framed - Defends against CSRF
		$this->output->set_header('X-Frame-Options: DENY');
		// prevent mime based attacks
    	$this->output->set_header('X-Content-Type-Options: nosniff');
	}
	
	public function get_menu_level2($id_level1)
	{
		// $this->db->where('level_menu',2);
		$this->db->where('parent_menu',$id_level1);
		$menu1 = $this->db->get('ref_menu'); 
		return $menu1;
	} 

	public function get_menu($level_user)
	{ 
		$user = $this->db->get('user_system');
		foreach ($user as $key ) {
			
		}
		$this->db->select('id_menu');
		$this->db->where('kd_wewenang', $level_user);
		$wewenang = $this->db->get('ref_wewenang_menu');
		return $wewenang;
	}


  public function cekMenu002($uri, $class_menu)
  {     
  	// var_dump($class_menu);
    $accesable="false"; 
	foreach ($class_menu as $key) {

        // var_dump($key);
        // var_dump($uri."==". $key)."<br>";

        //if (strstr($string, $url)) { // mine version
        if (stripos($uri, $key) !== FALSE) { // Yoshi version 
            $accesable= "true";
            break;
        } 
        // echo $uri,"<br>"; 
    }

    if ($accesable=="false")
    {
       	redirect('Home/invalidPage');
    }   

 //    $balikan=  false;
	// if(in_array($uri, $class_menu))
	// {
	//     $balikan = true;   
	// }
	// else
	// { 
	//     $balikan =false;
	// }  
 //    return $balikan; 
	}
}