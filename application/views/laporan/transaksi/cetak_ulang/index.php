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
                                                            <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
                                                            <input readonly type="text" class="form-control" value="<?= $this->session->userdata('KD_KASDA')." - ". $this->session->userdata('NM_KASDA'); ?>" >
                                                    <?php }  ?>
                                                </div>
                                            </div> 

                                            <?php   
                                               $LEVEL_USER = $this->session->userdata('LEVEL_USER');
                                             ?>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Dokumen</label>
                                                </div>
                                                <div class="col-md-10" >
                                                    <select class="form-control" name="dokumen"  id="dokumen"> 
                                                        <?php
                                                        if ($LEVEL_USER=="02") { ?>
                                                            <option value="1">1 - Cetak Ulang Verifikasi SP2D</option> 
                                                        <?php }
                                                        else if ($LEVEL_USER=="01") { ?>

                                                            <option value="5">5 - Cetak Ulang Blanko TTD</option>  
                                                        <?php } else {  ?> 
                                                            <option value="2">2 - Cetak Ulang Validasi SP2D</option> 
                                                            <option value="3">3 - Cetak Ulang Verifikasi SP2D Non Anggaran</option> 
                                                            <option value="4">4 - Cetak Ulang Validasi SP2D Non Anggaran</option> 
                                                        <?php } ?> 
                                                    </select> 
                                                </div> 
                                            </div>  

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>No SP2D</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="no_sp2d" id="no_sp2d">
                                                </div> 
                                            </div>   
                                    </form>   

                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button> 

                                    <button type="button" class="btn btn-success waves-effect button_print" onclick='get_post_data();'>
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

    $('#no_sp2d').on('keypress',function(e) {
        if(e.which == 13) {
             e.preventDefault();
             get_post_data();
        }
    });
 

    function printLaporan() {  
        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"print";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "html",
            success: function( response ) { 
                try{     
                    // get 
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

    function get_post_data() {

        var no_sp2d = $('#no_sp2d').val();
        if (no_sp2d=="") {
            alert('No SP2D tidak boleh kosong');
        }
        else{ 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"get_post_data2";
                console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "Json",
                success: function( response ) { 
                    console.log(response);
                    try{    
                        if(response.is_empty==true)
                        {
                            alert('Data tidak di temukan');
                        }
                        else{
                            printLaporan();
                        }
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 
    }
    </script>