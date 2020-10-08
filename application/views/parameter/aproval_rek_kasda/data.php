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
            <th>No Rek</th>
            <th>Nama Pemilik</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 

        foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['KD_KASDA']; ?> </td>   
                <td><?php echo $data['KD_SUMBER_DANA']; ?> </td>  
                <td><?php echo $data['NO_REK']; ?> </td>  
                <td><?php echo $data['NM_PEMILIK']; ?> </td>  
                <td> 
                    <?php  
                    if ($data['STATUS']==1)
                    {
                       echo "Setuju";
                    }
                    else
                    {
                        echo "Tidak Setuju";
                    }
                    ?> 
                </td>  
                <td>
                    <button  class="btn btn-xs btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Edit
                    </button> 
                    <button  class="btn btn-xs btn-danger waves-effect m-r-20" onclick="detele_('<?php echo $data['KD_DATA'] ?>')">
                        Hapus
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
