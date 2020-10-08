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

 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
        <tr>
            <th width="15%">KD Urusan</th>
            <th width="25%">Nama Urusan</th>
            <th width="25%">Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data) { ?>
            <tr>
                <td><?php echo $data->KD_URUSAN; ?> </td> 
                <td><?php echo $data->NM_URUSAN; ?> </td> 
                <td>
                    <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data->KD_URUSAN ?>')">
                        Edit
                    </button>
                    <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data->KD_URUSAN ?>')">Hapus</button>
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table> 


