 

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
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php 

        foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['KD_MAP']; ?> </td>  
                <td><?php echo $data['KD_MAP_SIMDA']; ?> </td>   
                <td>
                    <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Edit
                    </button> 
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>

</div>
