<script type="text/javascript">   

        $(document).ready(function(){ 
            reload_data();   
        }); 


         function reload_data() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanKasda/reload_data";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{   
                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }    
         
 
        function update_and_save()
        {     
          var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanKasda/save'; 
          var data  = $("#myForm").serialize(); 
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
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

         function hapus(primary) { 

            var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanKasda/hapus/'+primary; 
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

         function edit(KD_UNIT) {  
            $('.modal-footer').hide(); 

            //GET DATA DARI DATABASE
            var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanKasda/detail/" ?>"+KD_UNIT; 
             $.ajax( {
                type: "POST",
                url: url,
                data: { },
                success: function( response ) {
                    try{   
                        //masukkan form ke modal 
                        $(".modal-body").html(response);
                        if (KD_UNIT!=""){
                            $('.modal-title').text("Detail Data Urusan");
                        }
                        else
                        {
                            $('.modal-title').text("Tambah Data Urusan"); 
                        }

                        $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 
    
</script>



    <section class="content" >  

        <div class="container-fluid">
            <div class="body">
                <!-- CPU Usage -->
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- Basic Examples -->
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="header">
                                        <h2>
                                            PEMELIHARAAN KASDA
                                        </h2> 

                                        <button type="button" class="btn btn-success waves-effect"  style="position: absolute; right: 10px; top: 5px;" onclick="edit('')">
                                            <i class="material-icons">add_circle</i>
                                            <span>Kasda</span>
                                        </button> 

                                    </div>
                                    <div class="body">
                                        <div class="table-responsive">  
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- #END# Basic Examples -->
 
                    </div>
                </div>
            </div>
        </div>
    </section> 