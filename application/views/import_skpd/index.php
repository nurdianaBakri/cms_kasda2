    <section class="content"> 
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>IMPORT SKPD</h2>
                                </div>
                                 <a href="<?php echo base_url()."parameterorganisasi/Skpd/form" ?>" type="button" class="btn btn-success waves-effect"  style="position: absolute; right: 10px; top: 5px;" >
                                        <i class="material-icons">add_circle</i>
                                        <span>IMPORT SKPD</span>
                                </a>  
                            </div>
                        </div>
                        <div class="body form_container">  

                            
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

         function get_form() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/Skpd/get_form";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{   
                        $('.form_container').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }    
 
        function update_and_save()
        {    
          var data  = $("#myForm").serialize();

          var url = "<?php echo base_url() ?>"+'/parameterorganisasi/Skpd/save';  
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {  
                    try{  
                        // $("#largeModal").modal('hide'); 
                        var obj = jQuery.parseJSON(response);  
                            //tampilkan modal
                        $('.modal-body').text( obj['pesan']); 
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });

                         reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

         function hapus(primary) { 

            var url = "<?php echo base_url() ?>"+'/parameterorganisasi/Skpd/hapus/'+primary; 
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

   function edit(primary) {  
            $('.modal-footer').hide(); 
            //GET DATA DARI DATABASE
            var url ="<?php echo base_url()."parameterorganisasi/Skpd/detail/" ?>"+primary; 
             $.ajax( {
                type: "POST",
                url: url,
                data: { },
                success: function( response ) {
                    try{   
                        //masukkan form ke modal 
                        $(".modal-body").html(response);
                        if (primary!=""){
                            $('.modal-title').text("Detail Data SKPD");
                        }
                        else
                        {
                            $('.modal-title').text("Tambah Data SKPD"); 
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