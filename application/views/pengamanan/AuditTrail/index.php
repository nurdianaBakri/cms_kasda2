 

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
                                                <label>KD Kasda</label>
                                            </div>
                                            <div class="col-md-10 KD_KASDA">   
                                                <?php   
                                                    if ($this->session->userdata('is_super_admin')==TRUE || $this->session->userdata('is_super_admin')==1) {
                                                        ?> 
                                                            <select class="form-control" name="kd_kasda" id="kd_kasda" onchange="reload_data()"> 
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
                                                <label>Kata Kunci</label>
                                            </div>
                                            <div class="col-md-10">    
                                                <input type="text" class="form-control"  name="kata_kunci" id="kata_kunci" required>  
                                            </div> 
                                        </div>    
                                    </form>

                                    <button type="button" class="btn btn-warning waves-effect" onclick="reset()">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button>

                                    <button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
                                        <i class="material-icons">cached</i>
                                        <span>Inquiry</span>
                                    </button> 
                                    
                                    <button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
                                        <i class="material-icons">cached</i>
                                        <span>Print</span>
                                    </button> 
                            </div>  
                        </div> 
                        <p id="loading">Loading...</p>  
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
        $('#loading').hide(); 

        //get value dari kd wewenang  
        reload_data(); 
        // get_wewenang(); 
    }); 

    function detail(KD_KASDA) {  

        $('#KD_KASDA').val(KD_KASDA);

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                KD_KASDA:KD_KASDA
            },
            dataType: "Json",
            success: function( response ) { 
                try{        

                    //PANGGIL VIEW KD_KASDA   
                    console.log(response.KD_KASDA);
                    $('#KD_KASDA').val(response.KD_KASDA).trigger("change");

                    $('#JAM_BUKA').val(response.JAM_BUKA);   
                    $('#JAM_TUTUP').val(response.JAM_TUTUP);  

                    $('.button_hapus').removeAttr('disabled'); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }   
 

    function reset() {   
        $('#jenis_aksi').val('tambah');
        $('#JAM_BUKA').val(null);   
        $('#JAM_TUTUP').val(null);    
    }  

    function save() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"save";
        console.log(url); 
        // console.log(data); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) {   
                console.log(response); 

                $('#loading').hide();   
                try{     
                    // aktifkan tombol print  

                    reset();
                    //update ID 
                    var ID = Number($('#ID').val());  
                    $('#ID').val(ID+1);

                    reload_data(); 
                    alert(response.pesan);  
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      
 
      
    function reload_data() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"reload_data";
        console.log(url); 
        console.log(data); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "html",
            success: function( response ) {   
                $('#loading').hide(); 
                $('.table_container').show();  
                // console.log(response);
                try{     
                    //aktifkan tombol print   
                    $('.table_container').html(response); 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }    
 
 
    </script>