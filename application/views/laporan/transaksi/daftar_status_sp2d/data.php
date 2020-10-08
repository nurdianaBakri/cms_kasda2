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
                            <th width="10%" rowspan="2">No.</th>
                            <th width="15%" rowspan="2">SKPD</th>
                            <th width="20%" rowspan="2">NO SP2D</th>
                            <th width="20%" rowspan="2">NO. SPM</th>
                            <th width="15%" rowspan="2">PENERIMA</th>
                            <th width="40%" rowspan="2">Nilai SP2D (Rp.)</th>
                            <th width="15%" colspan="3"> Status</th> 
                        </tr>
                        <tr> 
                            <th width="15%">Data Entry</th>
                            <th width="15%">Checker</th>
                            <th width="15%">Pencairan</th> 
                        </tr>
                    </thead>
                <tbody> 

                <?php   
                    $i=1;  
                    $TOTAL_SP2D=0;      
                    foreach ($laporan as $key) {  
                        $timestamp = strtotime($key['tgl_verifikasi']);     
                        $nilai_potongan1 = $key['TOTAL_SP2D'] - $key['Nilai'];
                    ?> 
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?php
                            $where = array(
                                'KD_URUSAN' => $key['Kd_Urusan'], 
                                'KD_BIDANG' => $key['Kd_Bidang'], 
                                'KD_UNIT' => $key['Kd_Unit'], 
                                'KD_SUB_UNIT' => $key['Kd_Sub'], 
                            );
                            $this->db->where($where);
                            $NM_SUB_UNIT = $this->db->get('ref_sub_unit')->row()->NM_SUB_UNIT; 
                            echo $NM_SUB_UNIT; 
                        ?></td>
                        <td><?= $key['No_SP2D']; ?></td> 
                        <td><?= $key['No_SPM']; ?></td> 
                        <td><?= $key['Nm_Penerima']; ?></td>
                        <td><?= number_format($key['TOTAL_SP2D'],2); ?></td> 
                        <td><?= $key['user_input']; ?></td>
                        <td><?= $key['user_verifikasi'] ?></td>
                        <td><?= $key['USER_PENCAIRAN'] ?></td>
                    </tr>    
                 <?php  
                 $TOTAL_SP2D = $TOTAL_SP2D+$key['TOTAL_SP2D'];
                 $i++; } ?>

                 <tr>
                    <td colspan="4">Total : </td>  
                    <td colspan="5"><?= number_format($TOTAL_SP2D,2); ?></td> 
                </tr>    
                </tbody>
                </table>
            </div>
        </div>
    </div>