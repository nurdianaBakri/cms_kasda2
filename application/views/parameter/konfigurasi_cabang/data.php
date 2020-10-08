 

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
            <th width="25%">NAMA KONFIGURASI</th>
            <th width="25%">VALUE</th>  
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 

        foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['NM_KONFIGURASI']; ?> </td>  
                <td><?php echo $data['VALUE']; ?> </td>   
                <td>
                    <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Edit
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
