    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2><?PHP echo $title; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">   
                            <?php if ($this->session->flashdata('pesan')!="")
                            {
                                echo $this->session->flashdata('pesan');
                            } ?> 
                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                            
                            <div class=" form_container">  </div>

                        <div class="row clearfix ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container" id="table_container">
                                
                            </div>
                        </div>
 
                </div>
            </div>
        </div>
    </section>  

    <script>  

          $(document).ready(function(){ 
            get_form();     
        });    

         function get_form() {   
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            // console.log(url);
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

        function printLaporan() { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/print";
             
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{     
                        var w = window.open('about:blank');
                        w.document.open();
                        w.document.write(response);
                        w.document.close(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );   
        }

        function exportdata() { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/export";
             
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "application/vnd.ms-excel",
                success: function( response ) { 
                    try{     
                        console.log(response);
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );   
        }
 
        function reload_data() { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/reload_data";
             
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{    
                        // console.log(response);
                        //aktifkan tombol print 
                        $(".button_print").removeAttr("disabled"); 

                        //aktifkan tombol export data ke exel 
                        $(".button_export_to_excel").removeAttr("disabled"); 
                        
                        $('.table_container').html(response); 
 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }      
        </script>