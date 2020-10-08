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
            <th>Kode Kasda</th>
            <th>Kode Sumber Dana</th>
            <th>Nama Sumber Dana</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data2) { ?>
            <tr>  
                <td><?php echo $data2['KD_KASDA']; ?> </td>  
                <td><?php echo $data2['KD_SUMBER_DANA']; ?> </td>  
                <td><?php echo $data2['NM_SUMBER_DANA']; ?> </td>  
                <td>
                    <button  class="btn btn-success btn-xs waves-effect m-r-20" onclick="edit('<?php echo $data2['KD_DATA'] ?>')">
                        Edit
                    </button>  
                </td>
                 <td> 
                     <button  class="btn btn-xs btn-danger" onclick="delete_('<?php echo $data2['KD_DATA'] ?>')">
                        hapus
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
