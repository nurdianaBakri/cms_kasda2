<?php
class M_TrxSP2D extends CI_Model{ 

    private $table = "TrxSP2D";

    function getAll(){
        $hasil=$this->db->get($this->table);
        return $hasil->result();
    }
 
    function save($data){
        $hasil=$this->db->insert($this->table, $data);
        return $hasil;
    }
 
    function row_array($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table)->row_array(); 
        return $hsl;
    }

    function detail($where){  
        $this->db->where($where);
        $hsl= $this->db->get($this->table); 
        return $hsl;
    }

    function detail_beetwen($SEARCH_DARI, $SEARCH_SAMPAI, $KD_KASDA, $STATUS, $STATUS_1){   
        $hsl= $this->db->query("SELECT * FROM TrxSP2D WHERE (Tgl_SP2D BETWEEN '$SEARCH_DARI 00:00:00' AND '$SEARCH_SAMPAI 23:59:59') AND KD_KASDA='$KD_KASDA' AND STATUS IN ($STATUS, $STATUS_1)"); 
        return $hsl;
    }
 
    function update($where,$data){
       $this->db->where($where);
       return $this->db->update($this->table, $data);
    }
 
    function hapus($where){
        $this->db->where($where);
       return $this->db->delete($this->table);
    }

    public function get_last_dateAndTime()
    {
        $data = array();
        $hsl= $this->db->query("SELECT max(DateCreate) as DateCreate  from TrxSP2D");
        if ($hsl->num_rows()>0)
        {
            $data['DateCreate'] = $hsl->row_array()['DateCreate'];
        }
        else
        {
            $data['DateCreate'] ="";
        } 
        return $data['DateCreate'];
    }

    public function cari_sp2d($no_sp2d, $kd_kasda)
    {
        // $hasil = "SELECT * from TrxSP2D where No_SP2D like '%$no_sp2d%' and KD_KASDA='$kd_kasda'";
        $hasil= $this->db->query("SELECT * from TrxSP2D where No_SP2D like '%$no_sp2d%' and KD_KASDA='$kd_kasda'"); 
        return $hasil;
    }

    public function get_limit_import()
    {
        return $this->db->query("SELECT * FROM pemeliharaan_konfigurasi  WHERE NAMA_KONFIGURASI = 'INTERVAL_SIMDA'")->row_array();
    }

    public function get_interval_simda()
    {
        return $this->db->query("SELECT * FROM pemeliharaan_konfigurasi  WHERE NAMA_KONFIGURASI = 'LIMIT_IMPORT'")->row_array();
    }

}