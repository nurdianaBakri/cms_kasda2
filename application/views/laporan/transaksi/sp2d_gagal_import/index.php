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
                                                    <label>KASDA</label>
                                                </div>
                                                <div class="col-md-10"> 
                                                    <?php   
                                                    if ($this->session->userdata('LEVEL_USER')=="SU") {
                                                       ?> 
                                                            <select class="form-control" name="KD_KASDA" onchange="get_user_id(this.value)" id="kd_kasda"> 
                                                                <?php foreach ($kasda as $key) {  ?>
                                                                    <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option> 
                                                                <?php }  ?> 
                                                            </select> 
                                                        <?php }
                                                        else
                                                        { ?> 
                                                            <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA" id="kd_kasda">
                                                            <input readonly type="text" class="form-control" value="<?= $this->session->userdata('KD_KASDA')." - ". $this->session->userdata('NM_KASDA'); ?>" >
                                                    <?php }  ?>
                                                </div>
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Tanggal</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="tglawal" value="<?php echo date("Y-m-d");?>" >
                                                </div>
                                                <div class=" col-md-2">
                                                    <label>&nbsp&nbsp&nbsps/d</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control" name="tglakhir" value="<?php echo date("Y-m-d");?>"   >
                                                </div>
                                            </div>   
                                    </form>   

                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button>

                                    <button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
                                        <i class="material-icons">cached</i>
                                        <span>Inquiry</span>
                                    </button>

                                    <button type="button" class="btn btn-success waves-effect button_print" disabled onclick='printLaporan();'>
                                        <i class="material-icons">print</i>
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
 
    }); 

    function printLaporan() { 
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"/print";
            console.log(url);
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
                console.log(response);

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