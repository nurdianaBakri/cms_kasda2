 
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
            <th>MAP CMS</th>
            <th>MAP SIMDA</th>  
            <th> </th>
            <th> </th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 

        foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['KD_MAP']; ?> </td>  
                <td><?php echo $data['KD_MAP_SIMDA']; ?> </td>   
                <td>
                    <button  class="btn btn-success waves-effect m-r-20 btn-xs" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        <i class="glyphicon glyphicon-pencil"></i> 
                    </button> 
                </td>
                <td>
                    <button  class="btn btn-danger waves-effect m-r-20 btn-xs" onclick="delete_('<?php echo $data['KD_DATA'] ?>')">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
