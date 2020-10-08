 

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
            <th>Kode SKPD</th>
            <th>No Rek</th>
            <th>Nama Pemilik</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 
        if (count($data)>0)
        {
            foreach ($data as $data) { ?>
                <tr>  
                    <td><?php echo $data['KD_KASDA']; ?> </td>  
                    <td><?php echo $data['KD_SKPD']; ?> </td>  
                    <td><?php echo $data['NO_REK']; ?> </td>  
                    <td><?php echo $data['NM_PEMILIK']; ?> </td>  
                    <td><?php 
                    if ($data['STATUS']==1)
                    {
                        echo "AKTIF";
                    }
                    else
                    {
                        echo "TIDAK AKTIF"; 
                    } ?> </td>    
                    <td>
                        <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                            Edit
                        </button> 
                    </td>
                </tr>  
            <?php }  
        } ?>
        
    </tbody>
</table>
