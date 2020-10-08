  
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

                            <div class="pesan"></div>
                             
                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">

                          <?php  $KD_KASDA = $this->session->userdata('KD_KASDA'); ?>   
                          <input type="hidden" id="KD_KASDA" name="KD_KASDA" value="<?php echo $KD_KASDA ?>" > 
                            
                            <div class="panel ">
                                <form id="myForm">  
                                    <div class="form_container"></div>  
                                    <div class="data_inquiry"></div> 
                                </form>  

                              <button type="submit" id="submit" class="btn btn-success waves-effect" disabled onclick="save()">
                                  <i class="material-icons">save</i>  <span>Save</span>
                                </button> 
                                <button class="btn btn-warning waves-effect" onclick="reset_form()">
                                  <i class="material-icons">cached</i>  <span>Reset</span>
                                </button> 
                                 <button class="btn btn-danger waves-effect">
                                  <i class="material-icons">delete</i>  <span>Delete</span>
                                </button> 
                                 <button class="btn btn-info waves-effect" onclick="inquery()">
                                  <i class="material-icons">donut_large</i>  <span>Inquiry</span>
                                </button> 
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
       
    <script type="text/javascript">   

        $(document).ready(function(){ 
            get_form();     
        });   

        function save()
        {    
          var url_controller  = $('#url').val();   
          var data  = $("#myForm").serialize();
          var url = "<?php echo base_url() ?>"+url_controller+'save'; 
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function( response ) {   
                    try{    
                        $('.pesan').html(response.pesan);

                        ///reload data 
                        inquery();

                        //reset form 
                        reset_form();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

        function reset_form(){
            $('.input-visible').val(""); 
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
                        inquery();  
                        $('.loading').hide(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
 
 
        function inquery() {  
            var url_controller  = $('#url').val(); 
            var KD_KASDA  = $('#KD_KASDA').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"inquery";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  
                    KD_KASDA: KD_KASDA
                 },
                dataType: "html",
                success: function( response ) { 
                  console.log();
                    try{   
                        $('.data_inquiry').html(response);
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }   

    </script> 