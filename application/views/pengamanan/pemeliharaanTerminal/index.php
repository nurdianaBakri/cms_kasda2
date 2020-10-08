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
                                        <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi"> 
                                        <input type="hidden"  name="KD_TERMINAL2" value="tambah" id="KD_TERMINAL2"> 

                                    <div class="row">
                                        <div class="col-md-2">
                                                <label>KD Kasda</label>
                                            </div>
                                            <div class="col-md-10">   
                                                <?php   
                                                    if ($this->session->userdata('is_super_admin')==TRUE || $this->session->userdata('is_super_admin')==1) {
                                                       ?> 
                                                            <select class="form-control" name="KD_KASDA" id="KD_KASDA" > 
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
                                                        <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2" id="KD_KASDA">
                                                        <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA" id="KD_KASDA">
                                                <?php }  ?>
                                            </div>
                                        </div>   

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Kode Terminal</label>
                                            </div>
                                            <div class="col-md-4" >
                                                <input type="text" class="form-control" value="" name="KD_TERMINAL" id="KD_TERMINAL"> 
                                            </div> 

                                            <div class="col-md-2">
                                                <label>Nama Terminal</label>
                                            </div>
                                            <div class="col-md-4" >
                                                <input  type="text" class="form-control" value="" name="NAMA_TERMINAL" id="NAMA_TERMINAL"> 
                                            </div> 
                                        </div>    

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Mac Address</label>
                                            </div>
                                            <div class="col-md-4"> 
                                                <input  type="text" class="form-control" value="" name="MAC_ADDRESS" id="MAC_ADDRESS">  
                                            </div> 

                                            <div class="col-md-2">
                                                <label>IP Address</label>
                                            </div>
                                            <div class="col-md-4"> 
                                                <input  type="text" class="form-control" value="" name="IP_ADDRESS" id="IP_ADDRESS">  
                                            </div> 
                                        </div>   


                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-10"> 
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

                                    <button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
                                        <i class="material-icons">cached</i>
                                        <span>Inquiry</span>
                                    </button>

                                    <button type="button" class="btn btn-success waves-effect button_print" onclick='save();'>
                                        <i class="material-icons">print</i>
                                        <span>save</span>
                                    </button>   

                                    <button type="button" class="btn btn-danger waves-effect button_print" disabled onclick='hapus();'>
                                        <i class="material-icons">print</i>
                                        <span>Delete</span>
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

    function detail(kd_terminal) {   
        $('#kd_wewenang_old').val(kd_terminal);

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                kd_terminal:kd_terminal
            },
            dataType: "Json",
            success: function( response ) {  
                try{      
                    $('#KD_KASDA').val(response.KD_KASDA);
                    $('#KD_TERMINAL2').val(response.KD_TERMINAL);
                    $('#KD_TERMINAL').val(response.KD_TERMINAL);
                    $('#NAMA_TERMINAL').val(response.NAMA_TERMINAL); 
                    $('#MAC_ADDRESS').val(response.MAC_ADDRESS); 
                    $('#IP_ADDRESS').val(response.IP_ADDRESS); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }   
 

    function reset() {   
        $('#jenis_aksi').val('tambah');
        $('#KD_KASDA').val(null);
        $('#KD_TERMINAL').val(null);
        $('#NAMA_TERMINAL').val(null); 
        $('#MAC_ADDRESS').val(null); 
        $('#IP_ADDRESS').val(null); 
    }  

    function save() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"save"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) { 
                $('#loading').hide();  
                console.log(response);
                try{     
                    // aktifkan tombol print  
                    reload_data(); 
                    alert(response.pesan);  
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      

    function hapus() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"hapus"; 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) { 
                $('#loading').hide();  
                // console.log(response);
                try{     
                    // aktifkan tombol print  
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
                    $(".button_print").removeAttr("disabled");   
                    $('.table_container').html(response); 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }     
 
    </script>