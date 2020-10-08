 
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
            <th width="25%">Kode Bank</th>
            <th width="25%">Nama Bank</th> 
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 
        if (count($data)>0)
        {
            foreach ($data as $data) { ?>
                <tr>  
                    <td><?php echo $data['KD_BANK']; ?> </td>  
                    <td><?php echo $data['NM_BANK']; ?> </td>   
                    <td>
                        <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                            Edit
                        </button> 
                        <button  class="btn btn-danger waves-effect m-r-20" onclick="delete_('<?php echo $data['KD_DATA'] ?>')">
                            Hapus
                        </button> 
                    </td>
                </tr>  
            <?php }  
        } ?>
        
    </tbody>
</table>
