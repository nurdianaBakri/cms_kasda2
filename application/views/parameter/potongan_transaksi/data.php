 
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
            <th width="25%">Range</th>
            <th width="25%">Potongan</th>  
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 

        foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo number_format($data['BATAS_BAWAH'],2)." - ".number_format($data['BATAS_ATAS'],2); ?> </td>  
                <td><?php echo number_format($data['POTONGAN'],2) ; ?> </td>   
                <td>
                    <button  class="btn btn-xs btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Ubah
                    </button> 
                    <button  class="btn btn-xs btn-danger waves-effect m-r-20" onclick="delete_('<?php echo $data['KD_DATA'] ?>')">
                        Hapus
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
