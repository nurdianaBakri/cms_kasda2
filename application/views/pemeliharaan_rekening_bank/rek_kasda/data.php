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
            <th  >Kode Kasda</th> 
            <th width="5%">Kode Sumber Dana</th>
            <th width="15%">No Rek</th>
            <th >Nama Pemilik</th>
            <th width="5%">Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data) { ?>
            <tr>  
                <td><?= $data['KD_KASDA']; ?> </td>   
                <td><?= $data['KD_SUMBER_DANA']; ?> </td>  
                <td><?= $data['NO_REK']; ?> </td>  
                <td><?= $data['NM_PEMILIK']; ?> </td>  
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
                    <button  class="btn btn-success btn-xs waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')"> Edit
                    </button> 
                      <button  class="btn btn-danger btn-xs waves-effect m-r-20" onclick="delete_('<?php echo $data['KD_DATA'] ?>')">
                        hapus
                    </button>
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>
