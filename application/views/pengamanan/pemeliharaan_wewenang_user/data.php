 

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
                <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                    <thead>
                        <tr> 
                            <th width="5%">Kode Kasda</th>  
                            <th width="20%">User ID</th>  
                            <th width="20%">Wewenang </th>  
                            <!-- <th width="20%">Cabang</th>   -->
                            <th width="20%"></th>  
                            <th width="20%"></th>  
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                foreach ($data as $key3  ) { ?>
                   <tr>   
                        <td><?= $key3['KD_KASDA'] ?></td>    
                        <td><?= $key3['USERNAME']." - ".$key3['NM_USER'] ?></td>    
                        <td><?= $key3['LEVEL_USER']." - ".$key3['nama_wewenang'] ?></td>    
                        <!-- <td> </td>    -->
                        <td>    
                            <button class="btn btn-success btn-xs" onclick="edit('<?= $key3['USERNAME']; ?>')">Ubah </button> 
                        </td>  
                        <td>   
                            <?php 
                            if (strpos($key3['nama_wewenang'], "Approval") === FALSE) {  }
                            else
                            {  ?>
                                <button class="btn btn-warning btn-xs" onclick="reset_pinPencairan('<?= $key3['USERNAME']; ?>')"> Update PIN pencairan </button>
                            <?php  }   ?> 
                        </td> 
                       
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>    