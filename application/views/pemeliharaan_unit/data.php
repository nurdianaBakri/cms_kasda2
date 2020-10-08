 
<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script> 

 <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> 
     <thead>
        <tr> 
            <th>KASDA</th>
            <th>URUSAN</th>
            <th>BIDANG</th>
            <th>KD UNIT</th>
            <th>NM UNIT</th>   
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data) { ?>
            <tr>  
                <td><?php echo $data['KD_KASDA']." - ".$data['NM_KASDA']; ?> </td> 
                <td><?php echo $data['KD_URUSAN']."- ".$data['NM_URUSAN']; ?> </td>    
                <td><?php echo $data['KD_BIDANG']."- ".$data['NM_BIDANG']; ?> </td>    
                <td><?php echo $data['KD_UNIT']; ?> </td>    
                <td><?php echo $data['NM_UNIT']; ?> </td>       
                <td>
                    <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA_UNIT'] ?>')">
                        Edit
                    </button>
                    <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data['KD_DATA_UNIT'] ?>')">Hapus</button>
                </td>
            </tr>  
        <?php } ?>
        
    </tbody>
</table>

<script type="text/javascript">
    function edit(KD_DATA) {   

        //GET DATA DARI DATABASE
        var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanUnit/detail/" ?>"+KD_DATA; 
        console.log(url);
         $.ajax( {
            type: "POST",
            url: url,
            dataType: "Json",
            data: { },
            success: function( response ) {    
                try{      
                    $('#KD_URUSAN').val(response.data.KD_URUSAN).trigger('change');  
                    get_bidang(response.data.KD_BIDANG);

                    $('#KD_UNIT').val(response.data.KD_UNIT);
                    $('#NM_UNIT').val(response.data.NM_UNIT); 
                    $('#KD_DATA_UNIT').val(response.data.KD_DATA_UNIT); 
                    $('#jenis_aksi').val(response.jenis_aksi);  

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }
</script>
