 
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
            <th width="20%">No Rekening</th>
            <th width="45%">Nama Pemilik</th>
            <th width="20%">Jenis Rekening</th>
            <th>Aksi</th>
        </tr>
    </thead>
     <tbody id="tbody-data">  

        <?php
        $USERNAME = $this->session->userdata('username');  
                                               
        foreach ($data as $data) { ?>
            <tr>  
                <td>   
                     <form id="myForm2">   
                        <input type="hidden" id="someid" name="Id[]" value="" />  
                         <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?php echo $USERNAME ?>" >
                        <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?php echo $USERNAME ?>" > 

                        <input type="checkbox" id="basic_checkbox_<?php echo $data['NO_REKENING'] ?>" class="filled-in" id="NO_REKENING" name="NO_REKENING[]" value="<?php echo $data['NO_REKENING'] ?>" <?php echo $data['CHECKED']; ?> />
                        <label for="basic_checkbox_<?php echo $data['NO_REKENING'] ?>"><?php echo $data['NO_REKENING'] ?></label>   
                    </form>
                 </td>   
                <td><?php echo $data['NM_PEMILIK']; ?> </td>
                <td><?php echo $data['JENIS_REK']; ?> </td> 
                <td>
                    <button  class="btn btn-xs btn-success waves-effect m-r-20" onclick="edit('<?php echo $data['KD_DATA'] ?>')">
                        Edit
                    </button> 
                </td> 
            </tr>  
        <?php } ?> 
        
    </tbody>
</table>  
<script type="text/javascript"> 

   $(document).ready(function () { 
        $("input[type='checkbox']:checked").each(
            function() {
                var no_rekening = $(this).val(); 
                idarray.push(no_rekening);
            }
        ); 
        console.log(idarray);  
    });

    $('input[type="checkbox"]').click(function(){
        if($(this).prop("checked") == true){
            cek_validasi(); 
            var no_rekening = $(this).val(); 
            idarray.push(no_rekening);
        }
        else if($(this).prop("checked") == false){ 
            var no_rekening = $(this).val();  

            for( var i = 0; i < idarray.length; i++){ 
               if ( idarray[i] === no_rekening) {
                 idarray.splice(i, 1); 
                 i--;
               }
            } 
        }
        console.log(idarray); 
    });

    function update_and_save_pemeliharaan_rek_koran()
        {    
          var url_controller  = $('#url').val();   
          var USER_INPUT  = $("#USER_INPUT").val();
          var USER_UPDATE  = $("#USER_UPDATE").val();
          var KD_USER  = $("#KD_USER").val();
          var KD_KASDA  = $("#KD_KASDA").val();
          var data  = $("#myForm2").serialize();
          var url = "<?php echo base_url() ?>"+url_controller+'save';

           $.ajax( {  
                type: "POST",
                url: url,
                data: {
                    NO_REKENING :idarray,
                    USER_UPDATE :USER_UPDATE,
                    USER_INPUT :USER_INPUT,
                    KD_USER :KD_USER,
                    KD_KASDA :KD_KASDA,
                },
                success: function( response ) {   
                    console.log(response);
                    try{    
                        var obj = jQuery.parseJSON(response);  
                        //SHOOW MODAL 
                         $('.modal-body').text(obj.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });  
                        reload_data();
                        // get_form();   
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 
</script>
