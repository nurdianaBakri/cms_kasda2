
    <section class="content">  
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>PEMELIHARAAN UNIT</h2>
                                </div> 
                            </div>
                        </div>
                        <div class="body">

                             <div class="panel panel-success  form_container"> 
                            </div>

                            
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <script type="text/javascript">   

        $(document).ready(function(){ 
            get_form();   
        }); 

         function reload_data() { 

            var KD_KASDA = $('#KD_KASDA').val(); 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanUnit/reload_data";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: { 
                    KD_KASDA : KD_KASDA,
                 },
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{   

                        reload_data

                        $('#KD_DATA_UNIT').val(""); 
                        $('#jenis_aksi').val("add");

                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

           function get_form() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanUnit/form";
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) {  
                    try{   
                        $('.form_container').html(response);    

                        reload_data();
                    }catch(e) {   
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  
 
        function update_and_save()
        {    
          var data  = $("#myForm").serialize(); 

          var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanUnit/save';
          console.log(url);  
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {   
                    try{  
                        // $("#largeModal").modal('hide'); 
                        var obj = jQuery.parseJSON(response);
                        // alert( obj['pesan']);  
                        $('.modal-body').text( obj['pesan']); 
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });   
                         
                        //reload tabel
                        reload_data();
                        reset_form();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

         function hapus(primary) {   
          Swal.fire({
            position: 'top',
            title: 'Informasi',
            text: "Yakin ingin menghapus data ?",
            type: 'success',
            showCancelButton: true,
            confirmButtonColor: '#1f7d50',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',

          }).then((result) => {  
            if (result.value) {   
                do_hapus(primary);
            } 
          }) 
        }   

        function do_hapus(primary) {
             var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanUnit/hapus/'+primary; 
              $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "json",
                success: function( response ) { 
                    try{      
                        console.log(response.pesan);
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }); 

                         //reload tabel
                        reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }
        
    </script>
 
