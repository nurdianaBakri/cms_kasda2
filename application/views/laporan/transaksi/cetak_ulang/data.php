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
                <h4>  <?= $judul_sub_tabel; ?>  </h4> 
            </center>
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th width="10%">No.</th>
                            <th width="15%">Tanggal</th>
                            <th width="20%">NO SP2D</th>
                            <th width="20%">NO. SPM</th>
                            <th width="15%">Nilai Transfer (Rp.)</th>
                            <th width="40%">Nilai Potongan (Rp.)</th>
                            <th width="40%">Nilai Pajak (Rp.)</th>
                            <th width="40%">Nilai SP2D (Rp.)</th>
                            <th width="15%">Status</th>
                        </tr>
                    </thead>
                <tbody> 

                <?php 
                    $i=1; 
                    $nilai_tranfer=0;  
                    $nilai_potongan=0;  
                    $TOTAL_SP2D=0;    
                    $nilai_pajak=0;    
                    foreach ($laporan as $key) {  
                        $timestamp = strtotime($key['tgl_verifikasi']);     
                        $nilai_potongan1 = $key['TOTAL_SP2D'] - $key['Nilai'];
                    ?> 
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= date('d-m-Y', $timestamp); ?></td>
                        <td><?= $key['No_SP2D']; ?></td>
                        <td><?= $key['No_SPM']; ?></td>
                        <td><?= number_format($key['Nilai'],2); ?></td>
                        <td><?= number_format($nilai_potongan1,2); ?></td>
                        <td><?= "0.00" ?></td>
                        <td><?= number_format($key['TOTAL_SP2D'],2); ?></td>
                        <td><?php 
                                if ($key['STATUS']==0)
                                {
                                    echo "Import";
                                }
                                else if ($key['STATUS']==1)
                                {
                                    echo "Input";
                                }
                                else if ($key['STATUS']==2)
                                {
                                    echo "Verifikasi";
                                }
                                else
                                {
                                    echo "Cair";
                                }
                            ?></td>  
                    </tr>    
                 <?php 
                 $nilai_tranfer = $nilai_tranfer+$key['Nilai'];
                 $nilai_pajak = 0;
                 $nilai_potongan = $nilai_potongan+$nilai_potongan1;
                 $TOTAL_SP2D = $TOTAL_SP2D+$key['TOTAL_SP2D'];
                 $i++; } ?>

                 <tr>
                    <td colspan="4">Total : </td> 
                    <td><?= number_format($nilai_tranfer,2); ?></td>
                    <td><?= number_format($nilai_potongan,2); ?></td>
                    <td><?= number_format($nilai_pajak,2); ?></td>
                    <td colspan="2"><?= number_format($TOTAL_SP2D,2); ?></td> 
                </tr>    
                </tbody>
                </table>
            </div>
        </div>
    </div>