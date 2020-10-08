 
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
                            <th width="5%">Kode Kasda</th> 
                            <th width="20%">User ID</th>
                            <th width="20%">Nama User</th>   
                            <th width="15%"></th> 
                            <th width="15%"></th>  
                        </tr> 
                    </thead>
                <tbody> 

                <?php     
                    foreach ($data as $key) { ?> 
                    <tr> 
                        <td><?= $key['KD_KASDA']; ?></td>  
                        <td><?= $key['USERNAME']; ?></td> 
                        <td><?= $key['NM_USER']; ?></td>  
                        <td>
                            <button class="btn btn-success btn-xs" onclick="edit('<?= $key['USERNAME']; ?>')"> Detail </button> 
                        </td>  

                         <td>  
                            <button class="btn btn-danger btn-xs" onclick="delete_('<?= $key['USERNAME']; ?>')"> Hapus </button> 
                        </td>  
                    </tr>    
                 <?php } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div> 