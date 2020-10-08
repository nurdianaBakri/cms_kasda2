 

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
            <div class="table-responsive" id="table-responsive">
                <table class="table table-hover js-basic-example dataTable"> 
                    <thead>
                        <tr> 
                            <th width="5%">Kode Kasda</th>  
                            <th width="20%">Username</th>  
                            <th width="20%">Password Database</th>  
                            <th width="20%">Nama Database</th>  
                            <th width="20%">Host </th>  
                            <th > </th>  
                            <th > </th>  
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                foreach ($data as $key  ) { ?>
                   <tr>   
                        <td><?= $key['KD_KASDA'] ?></td>    
                        <td><?= $key['USERNAME']?></td>    
                        <td><?= $key['PASSWORD']; ?></td>     
                        <td><?= $key['DB_NAME']; ?></td>     
                        <td><?= $key['HOST']; ?></td>      
                        <td>
                            <button onclick="detail(<?= $key['ID_INTERFACE'] ?>)" class="btn btn-primary"> Detail</button> 
                        </td> 
                         <td> 
                             <button onclick="hapus(<?= $key['ID_INTERFACE'] ?>)" class="btn btn-danger"> Delete</button>
                        </td>      
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>   

    <script type="text/javascript">
    function detail(ID_INTERFACE) {    

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                ID_INTERFACE:ID_INTERFACE
            },
            dataType: "Json",
            success: function( response ) {  
                console.log(response);
                try{      
                    $('#ID_INTERFACE').val(response.ID_INTERFACE);
                    $('#USERNAME').val(response.USERNAME);
                    $('#PASSWORD').val(response.PASSWORD);
                    $('#HOST').val(response.HOST); 
                    $('#DB_NAME').val(response.DB_NAME); 
                    $('#KD_KASDA').val(response.KD_KASDA);  
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }    

    function do_hapus(ID_INTERFACE) {
         $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();  
        var url = "<?php echo base_url() ?>"+url_controller+"hapus"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                id_interface : ID_INTERFACE
            },
            dataType: "json",
            success: function( response ) {  

                $('#loading').hide();  
                // console.log(response);
                try{     
                    // aktifkan tombol print 
                    reset();  
                    alert(response.pesan);  
                    if (response.status==true)
                    { 
                        reload_data(); 
                    } 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
     } 


    function hapus(ID_INTERFACE) {     
        console.log(ID_INTERFACE);

        Swal.fire({
          title: 'Apakah anda yakin ingin mengahapus data ini ?',
          text: "Data tidak dapat di restore jika anda mengahapusnya",
          type: 'warning',
          position: 'top-end',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus data'
        }).then((result) => {

          if (result.value) {

            //panggil fungsi hapus
            do_hapus(ID_INTERFACE); 
 
          }

        }) 
    }     
      
    </script>