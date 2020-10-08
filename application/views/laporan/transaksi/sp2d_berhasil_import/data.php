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
            <center>
                <h2> <?= $judul_tabel; ?> </h2> 
                <h4>  <?= $judul_sub_tabel; ?>  </h4> 
            </center>
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr> 
                            <th width="5%">No.</th> 
                            <th width="20%">NO SP2D</th>
                            <th width="20%">Alasan</th>  
                            <th width="15%">Tanggal</th> 
                        </tr> 
                    </thead>
                <tbody> 

                <?php   
                    $i=1;  
                    $TOTAL_SP2D=0;      
                    foreach ($laporan as $key) { ?> 
                    <tr>
                        <td><?= $i; ?></td> 
                        <td><?= $key['No_SP2D']; ?></td>  
                        <td><?= $key['keterangan_import']; ?></td> 
                        <td><?= $key['tgl_import']; ?></td> 
                    </tr>    
                 <?php $i++; } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div> 