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
            <th width="10%">Kode Kasda</th>
            <th width="10%">Kode MAP</th> 
            <th width="15%">No Rekening</th>
            <th width="35%">Nama Pemilik</th>
            <th width="10%">Status</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['KD_KASDA']; ?> </td> 
                <td><?php echo $data['KD_MAP']; ?> </td>     
                <td><?php echo $data['NO_REK']; ?> </td>    
                <td><?php echo $data['NM_PEMILIK']; ?> </td>       
                <td><?php echo $data['STATUS']; ?> </td>       
                <td>
                    <button  class="btn btn-xs btn-success" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Edit
                    </button> 
                </td> 
                 <td> 
                    <button  class="btn btn-xs btn-danger" onclick="delete_('<?php echo $data['KD_DATA'] ?>')">
                        hapus
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
