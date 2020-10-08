    <section class="content"> 
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>PEMELIHARAAN BIDANG</h2>
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
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanBidang/reload_data";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: { 
                   KD_URUSAN : $('#KD_URUSAN').val(),
                 },
                dataType: "html",
                success: function( response ) {  

                    $('#KD_BIDANG').val(""); 
                    $('#NM_BIDANG').val(""); 

                    try{   
                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        console.log(e);
                        alert('Exception while request..');
                    }  
                }
            } );  
        }   
        

         function hapus(primary) { 

            var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanBidang/hapus/'+primary; 
            // console.log(url);
              $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "json",
                success: function( response ) { 
                    try{      
                        // console.log(response.pesan);
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

        function get_form() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanBidang/form";
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

   function edit(primary) {  
            $('.modal-footer').hide(); 
            //GET DATA DARI DATABASE
            var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanBidang/detail/" ?>"+primary; 
             $.ajax( {
                type: "POST",
                url: url,
                dataType:"json",
                data: { },
                success: function( response ) {
                    console.log(response);
                    try{   
                        //masukkan form ke modal 
                        $("#KD_BIDANG").val(response.data.KD_BIDANG);
                        $("#NM_BIDANG").val(response.data.NM_BIDANG); 
                        
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }
</script>