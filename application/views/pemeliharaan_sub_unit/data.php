<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
 
<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script> 

 <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> 
     <thead>
        <tr>   
            <th width="5%">NAMA KASDA</th> 
            <th width="5%">KD URUSAN</th> 
            <th width="5%">KD BIDANG</th> 
            <th width="5%">KD UNIT</th> 
            <th width="5%">SUB UNIT</th>
            <th width="5%">NAMA SUB UNIT</th>
            <th width="10%">Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php  
        foreach ($data as $data) {  
            
            //GET DATA URUSAN 
            /*$this->db->where(array(
                'KD_URUSAN' => $data->KD_URUSAN, 
            ));
            $data_urusan= $this->db->get("ref_urusan")->row_array();  
 
            //GET DATA BIDAGN 
           $this->db->where(array(
                'KD_BIDANG' => $data->KD_BIDANG,
                'KD_URUSAN' => $data->KD_URUSAN,
            ));
            $data_bidang= $this->db->get("ref_bidang")->row_array();  

              //GET DATA BIDAGN 
           $this->db->where(array(
                'KD_BIDANG' => $data->KD_BIDANG,
                'KD_URUSAN' => $data->KD_URUSAN,
                'KD_KASDA' => $data->KD_KASDA,
                'KD_UNIT' => $data->KD_UNIT,
            ));
            $data_unit= $this->db->get("ref_unit")->row_array();   

            //GET DATA KASDA 
            $this->db->where(array('KD_KASDA' => $data->KD_KASDA ));
            $data_kasda= $this->db->get("ref_kasda")->row_array();   */
         ?>
            <tr>      
                <td><?php echo $data->KD_KASDA; ?> </td>  
                <td><?php echo $data->KD_URUSAN; ?> </td> 
                 <td><?php echo $data->KD_BIDANG; ?> </td>  
                <td><?php echo $data->KD_UNIT; ?> </td>  
                <td><?php echo $data->KD_SUB_UNIT; ?> </td> 
                <td><?php echo $data->NM_SUB_UNIT; ?> </td> 
                <td>
                    <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data->KD_DATA_SUB_UNIT ?>')">
                        Edit
                    </button>
                    <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data->KD_DATA_SUB_UNIT ?>')">Hapus</button>
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
