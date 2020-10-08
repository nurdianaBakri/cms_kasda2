 
<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>      

<div class="panel panel-success">
        <div class="body">  
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr> 
                            <th width="5%">Kode Wewenang</th> 
                            <th width="20%">Nama Weweanang</th>  
                            <th width="15%"></th> 
                            <th width="15%"></th> 
                        </tr> 
                    </thead>
                <tbody> 

                <?php      
                    foreach ($data as $key) { ?> 
                    <tr> 
                        <td><?= $key['kd_wewenang']; ?></td>  
                        <td><?= $key['nama_wewenang']; ?></td>   
                        <td>
                            <button class="btn btn-success btn-xs" onclick="edit('<?= $key['kd_wewenang']; ?>')"> Detail </button>
                        </td>  
                         <td>  

                            <?php 
                            $dissabled = "";
                            $text = "";
                            if ($key['deleted']==1)
                            {
                                $dissabled = "disabled"; 
                                $text = "Terhapus"; 
                            }
                            else
                            {
                                $text = "Hapus";
                                $dissabled = ""; 
                            }   
                            ?>
                            <button class="btn btn-danger btn-xs" onclick="delete_('<?= $key['kd_wewenang']; ?>')" <?= $dissabled ?>> <?= $text ?> </button> 
                        </td>  
                    </tr>    
                 <?php } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div> 