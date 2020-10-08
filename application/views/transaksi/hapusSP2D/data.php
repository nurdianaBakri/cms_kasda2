<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive : true, 
        autoWidth  : false, 
    });   
});
</script> 

 <table class="table table-bordered table-hover js-basic-example dataTable" id="tabletest"> 
     <thead>
        <tr> 
            <th width="10%">Aksi</th>
            <th width="10%">Tanggal</th>
            <th width="10%">SKPD</th>
            <th width="10%">No SP2D</th>
            <th width="10%">No SPM</th>
            <th width="5%">Jenis</th>
            <th width="10%">Penerima</th>
            <th width="15%">Rekening Penerima</th>
            <th width="10%">Nilai SP2D</th>
            <th width="10%">Nilai Pajak</th>
            <th width="15%">Nilai Potongan</th>
            <th width="5%">Tahun</th> 
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php  
        $nilai_potongan = 0;
        foreach ($data as $data) { ?>
            <tr>   
                <td> <button class="btn btn-success" onclick="hapus('<?= $data->No_SP2D ?>')">Hapus</button></td>  
                <td><?php echo substr($data->Tgl_SP2D, 0, 10); ?> </td>  
                <td><?php echo $data->Kd_Urusan.".".$data->Kd_Bidang.".".$data->Kd_Unit.'.'.$data->Kd_Sub; ?> </td>  
                <td><?php echo $data->No_SP2D; ?> </td>  
                <td><?php echo $data->No_SPM; ?> </td>  
                <td><?php echo $data->Jn_SPM; ?> </td>   
                <td><?php echo $data->Nm_Penerima; ?> </td>  
                <td><?php echo $data->Rek_Penerima; ?> </td>   
                <td><?php echo number_format($data->TOTAL_SP2D); ?> </td>  
                <td><?php echo number_format($data->TOTAL_SP2D - $data->Nilai); ?> </td>  
                <td><?php echo number_format($nilai_potongan); ?> </td>  
                <td><?php echo $data->Tahun; ?> </td>    
            </tr>  
        <?php } ?>
        
    </tbody>
</table> 