
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

                            <input type="text" name="url" value="<?php echo $url ?>" id="url">
                            
                            <div class="panel panel-success form_container">
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
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/reload_data";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

         function get_form() { 
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.form_container').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
 

         function hapus() { 
            var url_controller  = $('#url').val();    
            var data  = $("#myForm").serialize(); 
            var url = "<?php echo base_url() ?>"+url_controller+'/hapus/'; 
            console.log(data);
              $.ajax( {
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function( response ) {   
                    try{      
                        // var obj = jQuery.parseJSON(response);  
                        // console.log(obj.pesan); 
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });  
                         //reload tabel
                        get_form();    
                        reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

        function edit(primary) {  
            $('.modal-footer').hide();
            var url_controller  = $('#url').val();   

            //GET DATA DARI DATABASE 
            var data  = $("#myForm").serialize(); 
            var url ="<?php echo base_url()?>"+url_controller+"/detail"; 
            console.log(url);
             $.ajax( {
                type: "POST",
                url: url,
                data: {KD_DATA : primary},
                success: function( response ) { 
 
                    try{   
                        //masukkan form ke modal 
                        $(".form_container").html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }
    </script>
 
