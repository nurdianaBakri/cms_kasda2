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
                <table class="table table-hover js-basic-example dataTable"> 
                    <thead>
                        <tr> 
                            <th width="5%">No </th>  
                            <th width="20%">USERNAME</th>  
                            <th width="20%">NAMA USER</th>  
                            <th width="20%">STATUS</th>  
                            <th width="20%">TANGGAL EXPIRED </th>   
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                $no=1;
                foreach ($data as $key  ) { ?>
                   <tr>   
                        <td><?= $no++?></td>    
                        <td><?= $key['USERNAME']?></td>    
                        <td><?= $key['NM_USER']; ?></td>     
                        <td><?= $key['STATUS']; ?></td>     
                        <td><?= $key['PASSWORD_EXPIRED']; ?></td>     
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>    