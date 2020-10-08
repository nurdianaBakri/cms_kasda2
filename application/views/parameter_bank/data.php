 <!-- Jquery DataTable Plugin Js -->
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
 

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th width="10%">Kode Bidang</th>
                <th width="25%">Nama Bidang</th>
                <th width="25%">Urusan</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
         <tbody id="tbody-data"> 
            <?php foreach ($data as $data) { ?>
                <tr>
                    <td><?php echo $data->KD_BIDANG; ?> </td> 
                    <td><?php echo $data->NM_BIDANG; ?> </td> 
                    <td><?php  
                        echo $this->MPemeliharaanUrusan->getBy(array('KD_URUSAN' => $data->KD_URUSAN ))['NM_URUSAN'];
                    ?> </td>  
                    <td>
                        <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data->KD_DATA_BIDANG ?>')">
                            Edit
                        </button>
                        <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data->KD_DATA_BIDANG ?>')">Hapus</button>
                    </td>
                </tr>  
            <?php } ?>
            
        </tbody>
    </table>
</div>


     