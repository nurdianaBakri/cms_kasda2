 

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
                            <th width="5%">No</th>  
                            <th width="20%">Nama API</th>  
                            <th width="20%">API URL</th>   
                            <th > </th>  
                            <th > </th>  
                        </tr> 
                    </thead>
                <tbody>  
                    
                <?php 
                $no=1;
                foreach ($data as $key  ) { ?>
                   <tr>   
                        <td><?= $no++; ?></td>     
                        <td><?= $key['name_api'] ?></td>    
                        <td><?= $key['api_url']?></td>    
                        <td>
                            <button onclick="detail(<?= $key['id'] ?>)" class="btn btn-primary"> Detail</button> 
                        </td> 
                         <td> 
                             <button onclick="hapus(<?= $key['id'] ?>)" class="btn btn-danger"> Delete</button>
                        </td>      
                    </tr> 
                <?php } ?>  
                    
                </tbody>
                </table>
            </div> 
        </div>
    </div>   

    <script type="text/javascript">
    function detail(id) {    

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                id:id
            },
            dataType: "Json",
            success: function( response ) {  
                console.log(response);
                try{      
                    $('#id').val(response.id);
                    $('#api_url').val(response.api_url);
                    $('#name_api').val(response.name_api); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }    

    function do_hapus(id) {
         $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();  
        var url = "<?php echo base_url() ?>"+url_controller+"hapus"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                id : id
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


    function hapus(id) {     
        console.log(id);

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
            do_hapus(id); 
 
          }

        }) 
    }     
      
    </script>