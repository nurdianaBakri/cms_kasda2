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
                            
                            <div class="panel panel-success form_container"> 

                                <div class="panel-heading"> </div>
                                <div class="panel-body"> 

                                    <form role="form" id="myForm">  

                                    <div class="row">
                                        <div class="col-md-2">
                                                <label>ID User</label>
                                            </div>
                                            <div class="col-md-10 FIELD_USER">   
                                                <select class="form-control" name="USERNAME" id="USERNAME" onchange="get_status()"> 
                                                    <option value="">Pilih salah satu</option> 
                                                    <?php foreach ($data as $key) {  ?>
                                                        <option value="<?= $key['USERNAME']; ?>"> <?= $key['USERNAME']." - ".$key['NM_USER'];?></option> 
                                                    <?php }  ?> 
                                                </select>  
                                            </div>
                                        </div>   

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-10 status" >
                                                 <select class="form-control" name="STATUS" id="STATUS"> 
                                                    <option value="1">Aktif</option> 
                                                    <option value="0">Tidak Aktif</option> 
                                                </select>  
                                            </div> 
                                        </div>     
                                    </form>    
                                    
                                    <button type="button" class="btn btn-warning waves-effect" onclick="reset()">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button>   
                                    <button type="button" class="btn btn-success waves-effect" onclick="save()">
                                        <i class="material-icons">cached</i>
                                        <span>Save</span>
                                    </button>   
                            </div>  
                        </div>   
                        
                </div>
            </div>
        </div> 
    </section>  

    <script>    

    $( document ).ready(function() {    
        //get value dari kd wewenang  
        // get_status(); 
        // get_wewenang(); 
    });  

    function get_status() {  
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"get_status";
        console.log(url);

        console.log(data); 
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) {  
                try{     
                      //PANGGIL VIEW KD_KASDA    
                      $('#STATUS').val(response.STATUS).trigger("change");
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      
       
    function save() {  
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"save"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) {  
                console.log(response);
                try{        
                    alert(response.pesan);  
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      

    function get_user() {  
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"get_user"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) {  
                console.log(response);
                try{         
                    $('.FIELD_USER').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      
 
        
    </script>