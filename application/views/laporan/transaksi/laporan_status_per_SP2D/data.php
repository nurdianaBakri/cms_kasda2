
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
                <h2> LAPORAN DAFTAR STATUS SP2D </h2> 
            </center>
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr>
                            <th width="10%">No.</th>
                            <th width="15%">Tanggal</th>
                            <th width="5%">KODE SKPD</th>
                            <th width="20%">NO SP2D</th>
                            <th width="20%">NO. SPM</th>
                            <th width="10%">JENIS</th>
                            <th width="15%">NO. REKENING</th>
                            <th width="15%">PENERIMA</th>
                            <th width="40%">STATUS</th>
                            <th width="15%">JUMLAH(Rp.)</th>
                        </tr>
                    </thead>
                <tbody>
 
                    <tr>
                        <td>1</td>
                        <td><?= $laporan['TglCair']; ?></td>
                        <td><?= $laporan['Kd_Urusan'].".".$laporan['Kd_Bidang'].".".$laporan['Kd_Unit'].".".$laporan['Kd_Sub']; ?></td> 
                        <td><?= $laporan['No_SP2D']; ?></td>
                        <td><?= $laporan['No_SPM']; ?></td>
                        <td><?= $laporan['Jn_SPM']; ?></td>
                        <td><?= $laporan['Rek_Penerima']; ?></td>
                        <td><?= $laporan['Nm_Penerima']; ?></td>
                        <td><?php 
                                if ($laporan['STATUS']!==3)
                                {
                                    echo "Belum Cair";
                                }
                                else{
                                    echo "Sudah Cair"; 
                                } 
                            ?></td> 
                        <td><?= number_format($laporan['TOTAL_SP2D'],2);?></td>  
                    </tr>     
                </tbody>
                </table>
            </div>
        </div>
    </div>