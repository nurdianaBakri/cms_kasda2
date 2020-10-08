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
                            
                            <div class="panel form_container">   
                        </div>

                        <p class="loading">Loading...</p>
                        <div class="row clearfix ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container" id="table_container">
                                
                            </div>
                        </div>
 
                </div>
            </div>
        </div>
    </section>  

    <script>  
        $( document ).ready(function() {
            $('.loading').hide();
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
            $('.loading').show();

            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/print";
             
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    $('.loading').hide(); 
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

      
        function reload_data() {  

            $('.loading').show();
            $('.table_container').hide();

            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/reload_data";
             
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 

                    $('.loading').hide();
                    $('.table_container').show(); 
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


        function export_to_excel() {
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"export"; 
            // console.log(data);

            var form2 = $('#myForm'); 
            form2.attr('action',"<?php echo base_url() ?>"+url_controller+"export");
            form2.attr('method','POST');
            form2.submit(); 
        }
        </script>