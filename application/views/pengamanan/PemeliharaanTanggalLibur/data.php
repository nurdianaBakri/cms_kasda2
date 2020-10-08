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
                            <th width="20%">Tanggal</th>  
                            <th width="20%">Uraian</th>   
                            <th width="20%">Aksi</th>  
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                foreach ($data as $key3  ) { ?>
                   <tr>   
                        <td><?= $key3['KD_KASDA'] ?></td>    
                        <td><?= $key3['TANGGAL'] ?></td>    
                        <td><?= $key3['KETERANGAN'] ?></td>      
                        <td>
                            <button onclick="detail('<?= $key3['ID'] ?>')" class="btn btn-primary"> Detail</button>
                        </td>    
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>   