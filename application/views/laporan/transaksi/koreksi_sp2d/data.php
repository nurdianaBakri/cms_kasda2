<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

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
            <center>
                <h2> <?= $judul_tabel; ?> </h2>  
            </center>
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr> 
                            <th width="20%">NO SP2D</th>
                            <th width="40%">Alasan</th>
                            <th width="15%">Tanggal</th>
                            <th width="10%">KODE USER</th> 
                        </tr>
                    </thead>
                <tbody> 

                <?php     
                    foreach ($laporan as $key) {  ?> 
                    <tr> 
                        <td><?= $key['No_SP2D']; ?></td>
                        <td><?= $key['alasan']; ?></td> 
                        <td><?= $key['tanggal']; ?></td>
                        <td><?= $key['kd_user']; ?></td>
                    </tr>    
                 <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>