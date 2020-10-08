 
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
                            <th width="5%" colspan="2">No.</th>   
                            <th width="20%">NO SP2D</th>   
                            <th width="20%">Nilai</th>   
                        </tr> 
                    </thead>
                <tbody> 

                <?php     
                    $kd_rek=0;    
                    $i=1;    
                    // var_dump($data);
                    foreach ($data['laporan'] as $key) {

                    if ($kd_rek!=$key['kd_rek']) { ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold;"><?php
                            $i=1; 
                            $data_map = $this->db->query("EXEC get_maping_map @KD_KASDA='".$KD_KASDA."',@KD_MAP='".$key['kd_rek']."'")->row_array(); 

                            echo $data_map['KD_MAP']." - ".$data_map['URAIAN']; ?> 
                        </td>  
                        </tr>   
                    <?php } ?> 
                        <tr>
                            <td > </td> 
                            <td><?= $i++; ?></td> 
                            <td><?= $key['No_SP2D']; ?></td>   
                            <td><?= number_format($key['Nilai'],2); ?></td> 
                        </tr>    
                 <?php 
                    $kd_rek = $key['kd_rek']; 
                } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div> 