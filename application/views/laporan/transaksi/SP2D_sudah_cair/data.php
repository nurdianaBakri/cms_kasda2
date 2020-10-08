
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
                <h1> LAPORAN SP2D YANG SUDAH CAIR </h1>
                <H3> PERIODE : <?= $periode; ?> </H3>
            </center>
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th width="10%">No.</th>
                            <th width="15%">Tanggal</th>
                            <th width="5%">SKPD</th>
                            <th width="20%">NO. SPM</th>
                            <th width="10%">JENIS</th>
                            <th width="15%">NO. REKENING</th>
                            <th width="15%">PENERIMA</th>
                            <th width="40%">KETERANGAN</th>
                            <th width="15%">JUMLAH(Rp.)</th>
                        </tr>
                    </thead>
                <tbody>

                <?php 
                $i=1;
                foreach ($laporan as $key) {  ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $key['TglCair']; ?></td>
                        <td><?= $key['Kd_Urusan'].".".$key['Kd_Bidang'].".".$key['Kd_Unit'].".".$key['Kd_Sub']; ?></td> 
                        <td><?= $key['No_SPM']; ?></td>
                        <td><?= $key['Jn_SPM']; ?></td>
                        <td><?= $key['Rek_Penerima']; ?></td>
                        <td><?= $key['Nm_Penerima']; ?></td>
                        <td><?= $key['Keterangan']; ?></td> 
                        <td><?= number_format($key['TOTAL_SP2D'],2);?></td>  
                    </tr>    
                <?php $i++;  } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div>