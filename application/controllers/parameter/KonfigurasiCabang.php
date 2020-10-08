<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfigurasiCabang extends CI_Controller {

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
        $data['title'] = "Konfiigurasi Cabang";
        $data['url'] = base_url()."parameter/KonfigurasiCabang/";
        $this->load->view('include/header'); 
		$this->load->view('parameter/konfigurasi_cabang/index',$data);
        $this->load->view('include/footer');  
	} 

    public function ajax_list()
    {
        $list = $this->MPemeliharaanCabang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->KD_CAB;
            $row[] = $person->ALAMAT_KANTOR;
            $row[] = $person->URAIAN;
            $row[] = $person->KOTA; 
 
            //add html for action
            $row[] = '<a class="btn btn-xs btn-success" href="javascript:void(0)" title="Edit" onclick="edit('."'".$person->KD_CAB."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_('."'".$person->KD_CAB."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MPemeliharaanCabang->count_all(),
                        "recordsFiltered" => $this->MPemeliharaanCabang->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->MPemeliharaanCabang->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'KD_CAB' => $this->input->post('KD_CAB'),
                'ALAMAT_KANTOR' => $this->input->post('ALAMAT_KANTOR'),
                'URAIAN' => $this->input->post('URAIAN'),
                'KOTA' => $this->input->post('KOTA'), 
            );
        $insert = $this->MPemeliharaanCabang->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'KD_CAB' => $this->input->post('KD_CAB'),
                'ALAMAT_KANTOR' => $this->input->post('ALAMAT_KANTOR'),
                'URAIAN' => $this->input->post('URAIAN'),
                'KOTA' => $this->input->post('KOTA'), 
            );
        $this->MPemeliharaanCabang->update(array('KD_CAB' => $this->input->post('KD_CAB_OLD')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete()
    {
        $id =  $this->input->post('KD_CAB_OLD');
        $this->MPemeliharaanCabang->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }  
}