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

<div class="alert alert-success" role="alert">
    <h4>Keterangan Status :</h4>
  <ul>0 : Import dari SIMDA</ul>
  <ul>1 : Pengecekan Rekening sukses</ul>
  <ul>2 : Pengecekan gagal</ul>
  <ul>2 : Rekening tujuan ke Bank Lain</ul> 
</div>

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
                        <th width="15%">Tanggal Import</th> 
                        <th width="20%">NO SPM</th>
                        <th width="5%">Status Import</th>  
                        <th width="20%">Keterangan</th>  
                    </tr> 
                </thead>
            <tbody>  
            <?php    
                $i=1;  
                foreach ($laporan as $key) { 
                $manage = json_decode($key['new_value'], true);   
                ?> 
                <tr>
                    <td><?= $i; ?></td> 
                    <td><?= date("d-m-Y h:m", strtotime($key['tanggal'])); ?></td>  
                    <td><?= $manage['No_SPM']; ?></td>  
                    <td><?= $manage['Status']; ?></td> 
                    <td><?= $manage['Uraian']; ?></td> 
                </tr>    
             <?php $i++; } ?> 
            </tbody>
            </table>
        </div>
    </div>
</div> 