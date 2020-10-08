<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

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
                            <th width="20%">Jam Buka</th>  
                            <th width="20%">Jam Tutup</th>   
                            <th width="20%">Aksi</th>  
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                foreach ($data as $key3  ) { ?>
                   <tr>   
                        <td><?= $key3['KD_KASDA'] ?></td>    
                        <td><?= substr($key3['JAM_BUKA'],0,8); ?></td>    
                        <td><?= substr($key3['JAM_TUTUP'],0,8); ?></td>     
                        <td>
                            <button onclick="detail('<?= $key3['KD_KASDA'] ?>')" class="btn btn-success"> Detail</button>
                        </td>    
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>   