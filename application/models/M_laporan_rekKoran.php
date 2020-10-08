<?php 

class M_laporan_rekKoran extends CI_Model{	
 
	public function get_rekening_kasda($where)
	{ 
        $this->db->select('NM_PEMILIK, NO_REK');
		$this->db->where($where);
		$hasil = $this->db->get('ref_rek_kasda');
		return $hasil;
	} 

	public function get_kasda()
	{ 
        $this->db->select('KD_KASDA, NM_KASDA');
		$hasil = $this->db->get('ref_kasda')->result();
		return $hasil;
	} 

	function getRekSumberByKdKasda($KD_KASDA)
	{ 
		$where = array('KD_KASDA' => $KD_KASDA );   
		$this->db->select('NM_PEMILIK,NO_REK');
        $this->db->where($where);
		$hsl= $this->db->get("ref_rek_kasda")->result_array(); 
        return $hsl;
    }
 

}