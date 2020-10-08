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
                                 <button type="button" class="btn btn-success waves-effect"  style="position: absolute; right: 10px; top: 5px;" onclick="edit('')">
                                        <i class="material-icons">add_circle</i>
                                        <span>Bidang</span>
                                </button> 
                            </div>
                        </div>
                        <div class="body">
                            
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
            reload_data();   
        }); 

         function reload_data() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanBidang/reload_data";
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
          var data  = $("#myForm").serialize(); 
          // console.log(data);
          var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanBidang/save';  
          console.log(url);
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {  
                    console.log(response);
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

   function edit(primary) {  
            $('.modal-footer').hide(); 
            //GET DATA DARI DATABASE
            var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanBidang/detail/" ?>"+primary; 
             $.ajax( {
                type: "POST",
                url: url,
                data: { },
                success: function( response ) {
                    try{   
                        //masukkan form ke modal 
                        $(".modal-body").html(response);
                        if (primary!=""){
                            $('.modal-title').text("Detail Data Bidang");
                        }
                        else
                        {
                            $('.modal-title').text("Tambah Data Bidang"); 
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