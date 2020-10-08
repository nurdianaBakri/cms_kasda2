<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>        
<div class="table-responsive">  

 <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> 
     <thead>
        <tr> 
            <th >No.SP2D</th>
            <th >Tgl.SP2D</th>
            <th >No.SPM</th>
            <th >Kd.SP2D</th>
            <th >Nilai</th>
            <th >Nama Bank</th>
            <th >Tahun</th>  
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php  

        // echo($this->db->last_query());
        foreach ($data as $data) { ?>
            <tr>  
                <td style="cursor: pointer;"> 
                    <b onclick="set_no_SP2D(<?php echo "'".$data['No_SP2D']."'"; ?>)">
                    <?php echo $data['No_SP2D']; ?> </b> </td>  
                <td><?php echo substr($data['Tgl_SP2D'],0,10); ?> </td>  
                <td><?php echo $data['No_SPM']; ?> </td>  
                <td><?php echo $data['Kd_Urusan'].".".$data['Kd_Bidang'].".".$data['Kd_Unit'].".".$data['Kd_Sub']; ?> </td>  
                <td><?php echo number_format(substr($data['Nilai'], 0, strpos($data['Nilai'], ".")),2); ?> </td>  
                <td><?php echo $data['Nm_Bank']; ?> </td>   
                <td><?php echo $data['Tahun']; ?> </td>   
            </tr>  
        <?php } ?>
        
    </tbody>
</table>

</div>

<script type="text/javascript">
    function set_no_SP2D(No_SP2D) { 

        console.log('set_no_SP2D');
        $('#NO_SP2D').val(No_SP2D);
        cek_no_sp2d(No_SP2D);
    }
</script>
