  
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

                          <?php  $kd_kasda = $this->session->userdata('KD_KASDA'); ?>   
                          <input type="hidden" id="kd_kasda" name="kd_kasda" value="<?php echo $kd_kasda ?>" > 
                            
                            <div class="panel "> 
                                <div class="form_container"></div>    
                            </div> 


                           <div class="row clearfix ">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container">
                                    
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
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            // console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    console.log(response);
                    try{   
                        $('.form_container').html(response);  
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
    
    </script>

 