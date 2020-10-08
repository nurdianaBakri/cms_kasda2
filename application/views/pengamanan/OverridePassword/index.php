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

                            <div class="result">
                                
                            </div>   
                            <?php if ($this->session->flashdata('pesan')!="")
                            {
                                echo $this->session->flashdata('pesan');
                            } ?> 
                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                            
                            <div class="panel panel-success form_container"> 

                                <div class="panel-heading"> 
                                    Silahkan reset password user yang anda inginkan
                                </div>
                                <div class="panel-body"> 

                                    <form role="form" id="myForm">     

                                    <div class="row">
                                        <div class="col-md-2">
                                                <label>KD Kasda</label>
                                            </div>
                                            <div class="col-md-10">   
                                                <?php   
                                                    if ($this->session->userdata('is_super_admin')==TRUE || $this->session->userdata('is_super_admin')==1) {
                                                       ?> 
                                                            <select class="form-control" name="KD_KASDA" id="KD_KASDA" onchange="get_user_by_kd_kasda(this.value)"> 
                                                                <?php foreach ($kasda as $key) {  ?>
                                                                    <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option> 
                                                                <?php }  ?> 
                                                            </select> 
                                                    <?php }
                                                    else
                                                    { 
                                                        //get nama kasda by kd_kasda 
                                                        $KD_KASDA = $this->session->userdata('KD_KASDA');
                                                        $this->db->select('NM_KASDA');
                                                        $this->db->where('KD_KASDA',$KD_KASDA);
                                                        $nm_kasda =  $this->db->get('ref_kasda')->row()->NM_KASDA;
                                                        ?> 
                                                        <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2">
                                                        <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
                                                <?php }  ?>
                                            </div>
                                        </div>   

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>User ID</label>
                                            </div>
                                            <div class="col-md-10 kd_user" >
                                            </div> 
                                        </div>    
                                     
                                    </form>    
                                    
                                    <!-- <button type="button" class="btn btn-warning waves-effect" onclick="reset()">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button>  -->

                                    <button type="button" class="btn btn-success waves-effect button_print" onclick='save();'>
                                        <i class="material-icons">print</i>
                                        <span>save</span>
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
        get_user_by_kd_kasda(); 
        // get_wewenang(); 
    });  
       
    function get_user_by_kd_kasda() {  
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"get_user_by_kd_kasda";
        // console.log(url); 

        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "html",
            success: function( response ) {    
                try{     
                    //aktifkan tombol print  
                    $('.kd_user').html(response);  

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
                    $('.result').html(response.password); 
                    alert(response.pesan);  
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }    
        
    </script>